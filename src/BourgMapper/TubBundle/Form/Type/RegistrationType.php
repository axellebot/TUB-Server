<?php

namespace BourgMapper\TubBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{

    /**
     * @var string
     */
    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct()
    {
        $this->class = 'BourgMapper\TubBundle\Entity\User';
    }


    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array(
                'label' => 'form.email',
                'label_attr' => array(
                    'class' => ''
                ),
                'attr' => array(
                    'class' => 'validate',
                ),
                'translation_domain' => 'FOSUserBundle',
                'required' => true
            ))
            ->add('username', TextType::class, array(
                'label' => 'form.username',
                'label_attr' => array(
                    'class' => ''
                ),
                'attr' => array(
                    'class' => 'validate',
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
                    'label' => 'form.password',
                    'label_attr' => array(
                        'class' => ''
                    ),
                    'attr' => array(
                        'class' => 'validate',
                    )
                ),
                'second_options' => array(
                    'label' => 'form.password_confirmation',
                    'label_attr' => array(
                        'class' => ''
                    ),
                    'attr' => array(
                        'class' => 'validate',
                    )
                ),
                'invalid_message' => 'fos_user.password.mismatch',
                'required' => true
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'csrf_token_id' => 'registration',
            // BC for SF < 2.8
            'intention' => 'registration',
        ));
    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
}