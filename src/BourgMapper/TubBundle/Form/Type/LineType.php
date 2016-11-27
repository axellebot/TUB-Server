<?php

namespace BourgMapper\TubBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number', NumberType::class, array(
                'label_attr' => array(
                    'class' => 'mdl-textfield__label'
                ),
                'attr' => array(
                    'class' => 'mdl-textfield__input',
                    'pattern'=>"-?[0-9]*(\.[0-9]+)?"
                ),
                'required' => true
            ))
            ->add('color', TextType::class, array(
                'label_attr' => array(
                    'class' => 'mdl-textfield__label'
                ),
                'attr' => array(
                    'class' => 'mdl-textfield__input'
                ),
                'required' => true
            ))
            ->add('save',SubmitType::class,array(
                'attr' => array(
                    'class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'
                )
            ));
    }
}