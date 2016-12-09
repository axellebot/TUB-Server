<?php

namespace BourgMapper\TubBundle\Form\Type;

use BourgMapper\TubBundle\Entity\Line;
use BourgMapper\TubBundle\Entity\Repository\StopGroupRepository;
use BourgMapper\TubBundle\Entity\Repository\StopRepository;
use BourgMapper\TubBundle\Entity\Stop;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;

class LinePathType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // init way choice
        $wayChoices = array(
            "Outbound" => StopGroupRepository::WAY_OUTBOUND,
            "Inbound" => StopGroupRepository::WAY_INBOUND
        );

        $builder
            ->add('line', EntityType::class, array(
                'class' => 'TubBundle:Line',
                'query_builder' => function (EntityRepository $lr) {
                    return $lr->createQueryBuilder('l')
                        ->orderBy('l.order', 'ASC');
                },
                'label' => 'Choose Line',
                'placeholder' => 'Choose Line',
                'multiple' => false,
                'required' => true
            ))
            ->add('way', ChoiceType::class, array(
                'label' => 'Choose Way',
                'placeholder' => 'Choose Way',
                'choices' => $wayChoices,
                'multiple' => false,
                'required' => true
            ))
            ->add('stops', CollectionType::class, array(
                // each entry in the array will be an "email" field
                'entry_type' => EntityType::class,
                // these options are passed to each "email" type
                'entry_options' => array(
                    'class' => 'TubBundle:Stop',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('s')
                            ->orderBy('s.label', 'ASC');
                    },
                    'label' => 'Choose Stop',
                    'placeholder' => 'Choose Stop',
                    'multiple' => false,
                    'required' => true
                ),
                'allow_add' => true,
                'allow_delete' => true,
                'required' => true
            ))
            ->add('dateStart', DateType::class, array(
                'widget' => 'single_text',
                'input' => 'datetime',
                'label' => 'Date Start',
                'label_attr' => array(
                    'class' => ''
                ),
                'attr' => array(
                    'class' => 'datepicker'
                ),
                // do not render as type="date", to avoid HTML5 date pickers
                'html5' => true,
                'required' => true
            ))
            ->add('dateEnd', DateType::class, array(
                'widget' => 'single_text',
                'input' => 'datetime',
                'label' => 'Date End',
                'label_attr' => array(
                    'class' => ''
                ),
                'attr' => array(
                    'class' => 'datepicker'
                ),
                // do not render as type="date", to avoid HTML5 date pickers
                'html5' => true,
                'required' => true
            ));;
    }

    /**
     * @param FormEvent $event
     */
    public function onPreSubmit(FormEvent $event)
    {
        $form = $event->getForm();
        $data = $event->getData();
        $object = $event->getForm()->getData();

        // Loop on form fields
        foreach ($event->getForm()->all() as $field) {
            /** @var FormInterface $field */
            $fieldName = $field->getName();
            if ($field->getConfig()->getType()->getBlockPrefix() == 'collection') {
                if (isset($data[$fieldName]) && $object) {
                    $collection = $data[$fieldName];
                    $data[$fieldName] = array();
                    $k = 0;
                    foreach ($collection as $i => $c) {
                        $data[$fieldName][$k++] = $c;
                        unset($collection[$i]);
                    }
                }
            }
        }
        $event->setData($data);
    }
}