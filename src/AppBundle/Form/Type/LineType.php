<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label_attr' => array(
                    'class' => 'mdl-textfield__label'
                ),
                'attr' => array(
                    'class' => 'mdl-textfield__input'
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