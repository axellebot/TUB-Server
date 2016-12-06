<?php

namespace BourgMapper\TubBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;

class ScheduleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('eta', TimeType::class, array(
            'input'  => 'datetime',
            'widget' => 'single_text',
            'attr'=> array(
                'class' => 'timepicker'
            )
        ));
    }
}