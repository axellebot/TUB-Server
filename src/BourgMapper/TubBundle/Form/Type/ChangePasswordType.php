<?php

namespace BourgMapper\TubBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;


class ChangePasswordType extends AbstractType
{

    /**
     * @var string
     */
    private $class;


    /**
     * {@inheritdoc}
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
        $constraintsOptions = array(
            'message' => 'fos_user.current_password.invalid',
        );
        if (!empty($options['validation_groups'])) {
            $constraintsOptions['groups'] = array(reset($options['validation_groups']));
        }
        $builder->add('current_password', PasswordType::class, array(
            'label' => 'form.current_password',
            'label_attr' => array(
                'class' => ''
            ),
            'attr' => array(
                'class' => 'validate',
            ),
            'translation_domain' => 'FOSUserBundle',
            'mapped' => false,
            'constraints' => new UserPassword($constraintsOptions),
            'required' => true
        ));
        $builder->add('plainPassword', RepeatedType::class, array(
            'type' => PasswordType::class,
            'options' => array('translation_domain' => 'FOSUserBundle'),
            'first_options' => array(
                'label' => 'form.new_password',
                'label_attr' => array(
                    'class' => ''
                ),
                'attr' => array(
                    'class' => 'validate',
                )),
            'second_options' => array(
                'label' => 'form.new_password_confirmation',
                'label_attr' => array(
                    'class' => ''
                ),
                'attr' => array(
                    'class' => 'validate',
                )),
            'invalid_message' => 'fos_user.password.mismatch',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'csrf_token_id' => 'change_password',
            // BC for SF < 2.8
            'intention' => 'change_password',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'app_user_change_password';
    }

    /**
     * {@inheritdoc}
     */
    protected function buildUserForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array(
                'label' => 'form.email',
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
                'label' => 'form.username',
                'label_attr' => array(
                    'class' => 'mdl-textfield__label'
                ),
                'attr' => array(
                    'class' => 'mdl-textfield__input',
                ),
                'translation_domain' => 'FOSUserBundle',
                'required' => true
            ));
    }
}