<?php
namespace Mm\RecycleBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BatterypackType extends AbstractType
{
    const BATTERYPACK_ENTITY = 'Mm\RecycleBundle\Entity\Batterypack';
    const FORM_NAME = 'batterypack';

    /**
    * build Batterypack form
    * @param FormBuilderInterface $builder
    * @param array                $options
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'text')
            ->add('count', 'integer')
            ->add('name', 'text', array('required' => false))
            ->add('save', 'submit', array('label' => 'Create'));
    }

    /**
    * @param OptionsResolverInterface $resolver
    */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => self::BATTERYPACK_ENTITY
        ));
    }

    /**
    * @return string
    */
    public function getName()
    {
        return self::FORM_NAME;
    }
}
