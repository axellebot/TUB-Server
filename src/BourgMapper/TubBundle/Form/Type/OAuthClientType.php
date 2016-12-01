<?php

namespace BourgMapper\TubBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use OAuth2\OAuth2;

class OAuthClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label', TextType::class, array(
                'label' => 'Label',
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
                'entry_type' => UrlType::class,
                // these options are passed to each "email" type
                'entry_options' => array(
                    'label' => 'Redirect Uri',
                    'label_attr' => array(
                        'class' => ''
                    ),
                    'attr' => array(
                        'class' => 'validate',
                    )
                ),
                'allow_add' => true,
                'required' => true
            ));

        $GRANT_TYPES = array(
            'Authorization' => OAuth2::GRANT_TYPE_AUTH_CODE,
            'Client Credentials' => OAuth2::GRANT_TYPE_CLIENT_CREDENTIALS,
            'Refresh Token' => OAuth2::GRANT_TYPE_REFRESH_TOKEN,
            'Token' => OAuth2::GRANT_TYPE_IMPLICIT,
            'User Credentials' => OAuth2::GRANT_TYPE_USER_CREDENTIALS
        );

        $GRANT_TYPES_SELECTION = array_merge(array("Choose Grant Type" => null), $GRANT_TYPES);

        $builder->add('allowedGrantTypes', ChoiceType::class, array(
            'placeholder' => 'Choose Grant Type',
            'choices' => $GRANT_TYPES_SELECTION,
            'label' => 'Choose Grant Type',
            'multiple' => true,
            'required' => true,
            'choice_attr' => function ($val, $key, $index) {
                if ($index == 0) {
                    return ['disabled' => true];
                } else {
                    return ['selected' => false];
                }
            },
        ));
    }
}