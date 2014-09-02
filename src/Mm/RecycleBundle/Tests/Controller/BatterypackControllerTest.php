<?php

namespace Mm\RecycleBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BatterypackControllerTest extends WebTestCase
{
    private $client;

    public static function setUpBeforeClass()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/batterypack/add');

        $btn = $crawler->selectButton('form_save');

        $form = $btn->form(array(
            'form[type]' => 'AA',
            'form[count]' => 4
        ));
        $client->submit($form);

        $form = $btn->form(array(
            'form[type]' => 'AAA',
            'form[count]' => 3
        ));
        $client->submit($form);

        $form = $btn->form(array(
            'form[type]' => 'AA',
            'form[count]' => 1
        ));
        $client->submit($form);
    }

    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function tearDown()
    {
        unset($this->client);
    }

    public function testRowsCont()
    {
        $crawler = $this->client->request('GET', '/');
        $this->assertCount(2, $crawler->filter('table.battery-stats tbody tr'));
    }

    /**
    * @dataProvider provider
    */
    public function testTypeCount($type, $count, $pos)
    {
        //todo: you should combine this test method with "testRowsCont"
        // also code from setUpBeforeClass should be moved into this test method
        // you should take care of test's performance. In your case there are 15 ! requests to controller.
        // the same functionality could be covered with only 5 calls: 1 - to render form first time, 3 - to submit data 3 times, 1 - to check statistics page
        $crawler = $this->client->request('GET', '/');
        $this->assertTrue($crawler->filter('table.battery-stats tbody td')->eq($pos)->text() == $count);
    }

    public function provider ()
    {
      return array(
        array('AA', 5, 1),
        array('AAA', 3, 3)
      );
  }

}
