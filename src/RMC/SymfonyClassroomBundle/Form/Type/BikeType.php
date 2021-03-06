<?php
/**
 * Created by PhpStorm.
 * User: richardmccarthy
 * Date: 17/11/14
 * Time: 16:42
 */

namespace RMC\SymfonyClassroomBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BikeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('price', 'number')
            ->add('description', 'text')
            ->add('save', 'submit', array('label' => 'Create Bike'));
    }

    // This returns a unique identifier for this form 'type'
    public function getName()
    {
        return 'createBike';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver -> setDefaults(array(
                'data_class' => 'RMC\SymfonyClassroomBundle\Entity\Bike',
                'csrf_protection' => false
            ));
    }

}






