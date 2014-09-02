<?php
# src/Mm/RecycleBundle/Form/Type/BatterypackType.php
namespace Mm\RecycleBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BatterypackType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'text')
            ->add('count', 'integer')
            ->add('name', 'text', array('required' => false))
            ->add('save', 'submit', array('label' => 'Create'));
    }

    public function getName()
    {
        return 'batterypack';
    }
    //todo: via method setDefaultOptions() you could set "data_class" parameter.
    // Then it would be much easier to work with form in controller
}
