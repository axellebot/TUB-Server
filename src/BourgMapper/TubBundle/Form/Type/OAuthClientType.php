<?php

namespace BourgMapper\TubBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class OAuthClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label', TextType::class, array(
                'label'=>'Label',
                'label_attr' => array(
                    'class' => ''
                ),
                'attr' => array(
                    'class' => 'validate',
                ),
                'required' => true
            ))
            ->add('redirectUris', CollectionType::class, array(
                // each entry in the array will be an "email" field
                'entry_type'   => UrlType::class,
                // these options are passed to each "email" type
                'entry_options'  => array(
                    'label'=>'Redirect Uri',
                    'label_attr' => array(
                        'class' => ''
                    ),
                    'attr' => array(
                        'class' => 'validate',
                    )
                ),
                'allow_add'    => true,
                'required' => true
            ));
    }
}