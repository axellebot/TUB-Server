<?php

namespace BourgMapper\TubBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use BourgMapper\TubBundle\Entity\Repository\PeriodRepository;

class PeriodType extends AbstractType
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
            ->add('dateStart', DateType::class, array(
                'widget' => 'single_text',
                'input'=>'datetime',
                'label' => 'Date Start',
                'label_attr' => array(
                    'class' => ''
                ),
                'attr' => array(
                    'class'=>'datepicker'
                ),
                // do not render as type="date", to avoid HTML5 date pickers
                'html5' => true,
                'required' => true
            ))
            ->add('dateEnd', DateType::class, array(
                'widget' => 'single_text',
                'input'=>'datetime',
                'label' => 'Date End',
                'label_attr' => array(
                    'class' => ''
                ),
                'attr' => array(
                    'class'=>'datepicker'
                ),
                // do not render as type="date", to avoid HTML5 date pickers
                'html5' => true,
                'required' => true
            ));

        $DAYS = array(
            "Monday" => PeriodRepository::DAY_MONDAY,
            "Tuesday" => PeriodRepository::DAY_TUESDAY,
            "Wednesday" => PeriodRepository::DAY_WEDNESDAY,
            "Thursday" => PeriodRepository::DAY_THURSDAY,
            "Friday" => PeriodRepository::DAY_FRIDAY,
            "Saturday" => PeriodRepository::DAY_SATURDAY,
            "Sunday" => PeriodRepository::DAY_SUNDAY
        );

        $DAYS_SELECTION = array_merge(array("Choose Days" => null), $DAYS);

        $builder->add('dayCycle', ChoiceType::class, array(
            'placeholder' => 'Choose Days',
            'choices' => $DAYS_SELECTION,
            'label' => 'Choose Days',
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