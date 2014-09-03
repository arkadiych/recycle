<?php

namespace Mm\RecycleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Batterypack
 *
 * @ORM\Entity(repositoryClass= "Mm\RecycleBundle\Entity\BatterypackRepository")
 * @ORM\Table(name="Batterypack")
 */
class Batterypack
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    private $type;

    /**
     * @ORM\Column(type="integer", options={"unsigned" = true})
     * @Assert\NotBlank()
     * @Assert\GreaterThan(value = 0)
     */
    private $count;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Assert\Length(max=255)
     */
    private $name;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Batterypack
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set count
     *
     * @param integer $count
     * @return Batterypack
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return integer 
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Batterypack
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}
