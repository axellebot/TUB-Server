<?php

namespace BourgMapper\TubBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array(
                'label'=>'form.email',
                'label_attr' => array(
                    'class' => 'mdl-textfield__label'
                ),
                'attr' => array(
                    'class' => 'mdl-textfield__input',
                ),
                'translation_domain' => 'FOSUserBundle',
                'required' => true
            ))
            ->add('username', TextType::class, array(
                'label'=>'form.username',
                'label_attr' => array(
                    'class' => 'mdl-textfield__label'
                ),
                'attr' => array(
                    'class' => 'mdl-textfield__input',
                ),
                'translation_domain' => 'FOSUserBundle',
                'required' => true
            ))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'options' => array(
                    'translation_domain' => 'FOSUserBundle'
                ),
                'first_options' => array(
                    'label'=>'form.password',
                    'label_attr' => array(
                        'class' => 'mdl-textfield__label'
                    ),
                    'attr' => array(
                        'class' => 'mdl-textfield__input',
                    )
                ),
                'second_options' => array(
                    'label'=>'form.password_confirmation',
                    'label_attr' => array(
                        'class' => 'mdl-textfield__label'
                    ),
                    'attr' => array(
                        'class' => 'mdl-textfield__input',
                    )
                ),
                'invalid_message' => 'fos_user.password.mismatch',
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BourgMapper\TubBundle\Entity\User',
            'csrf_token_id' => 'registration',
            // BC for SF < 2.8
            'intention' => 'registration',
        ));
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
}