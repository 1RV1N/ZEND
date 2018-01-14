<?php

declare(strict_types=1);

namespace Meetup\Form;

use Meetup\Entity\Meetup;
use Doctrine\ORM\EntityManager;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator\StringLength;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;


class MeetupForm extends Form implements InputFilterProviderInterface{

    public function __construct(EntityManager $entityManager){
        parent::__construct('meetup');
        $hydrator = new DoctrineHydrator($entityManager, Meetup::class);
        $this->setHydrator($hydrator);

        $this->add([
            'type' => Element\Text::class,
            'name' => 'title',
            'options' => [
                'label' => 'Titre',
            ],
            'attributes' => [
                    'class' => 'form-group',
            ],
        ]);
        $this->add([
            'type' => Element\Text::class,
            'name' => 'description',
            'options' => [
                'label' => 'Description',
            ],
            'attributes' => [
                    'class' => 'form-group',
            ],
        ]);
        $this->add([
            'type' => Element\Text::class,
            'name' => 'dateBegin',
            'options' => [
                'label' => 'commencement',
            ],
            'attributes' => [
                'class' => 'form-control-lg',
                'id' => 'datetimepicker1',
            ],
        ]);
        $this->add([
            'type' => Element\Text::class,
            'name' => 'dateEnd',
            'options' => [
                'label' => 'fin',
            ],
            'attributes' => [
                'class' => 'form-control-lg',
                'id' => 'datetimepicker2',
            ],
        ]);
        $this->add([
            'type' => Element\Submit::class,
            'name' => 'submit',
            'attributes' => [
                'value' => 'Submit',
                'class' => 'btn btn-secondary',
            ],
        ]);
    }

    public function FilterSpecification()
    {
        return [
            'title' => [
                'validators' => [
                    [
                        'name' => StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 20,
                        ],
                    ],
                ],
            ],
        ];
    }
}
