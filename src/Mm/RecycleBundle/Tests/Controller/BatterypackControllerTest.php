<?php

namespace Mm\RecycleBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BatterypackControllerTest extends WebTestCase
{
    private $inputValues = array(
        array(
            'batterypack[type]' => 'AA',
            'batterypack[count]' => 4
        ),
        array(
            'batterypack[type]' => 'AAA',
            'batterypack[count]' => 3
        ),
        array(
            'batterypack[type]' => 'AA',
            'batterypack[count]' => 1
        )
    );

    public function testStatistic()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/batterypack/add');
        $btn = $crawler->selectButton('batterypack_save');

        foreach($this->inputValues as $val) {
            $form = $btn->form($val);
            $client->submit($form);
        }

        $crawler = $client->request('GET', '/');
        $this->assertCount(2, $crawler->filter('table.battery-stats tbody tr'));

        $this->assertCount(1, $crawler->filterXPath(
            "//tr[td[normalize-space(text())='AA'] and td[normalize-space(text())='5']]"));
        $this->assertCount(1, $crawler->filterXPath(
            "//tr[td[normalize-space(text())='AAA'] and td[normalize-space(text())='3']]"));
    }
}
