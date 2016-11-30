<?php

namespace BourgMapper\TubBundle\Form\Type;

use Doctrine\DBAL\Types\DecimalType;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class StopType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label', TextType::class, array(
                'label' => "Label",
                'label_attr' => array(
                    'class' => ''
                ),
                'attr' => array(
                    'class' => 'validate'
                ),
                'required' => true
            ))->add('latitude', NumberType::class, array(
                'label' => "Latitude",
                'label_attr' => array(
                    'class' => ''
                ),
                'attr' => array(
                    'class' => 'validate'
                ),
                'required' => true
            ))->add('longitude', NumberType::class, array(
                'label' => "Longitude",
                'label_attr' => array(
                    'class' => ''
                ),
                'attr' => array(
                    'class' => 'validate'
                ),
                'required' => true
            ));
    }
}