<?php
namespace Hospital\Form;

use Zend\Form\Form;

class HospitalForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('hospital');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'nome',
            'type' => 'text',
            'options' => [
                'label' => 'Nome',
            ],
        ]);
        $this->add([
            'name' => 'endereco',
            'type' => 'text',
            'options' => [
                'label' => 'Endereco',
            ],
        ]);
        $this->add([
            'name' => 'bairro',
            'type' => 'text',
            'options' => [
                'label' => 'Bairro',
            ],
        ]);
        $this->add([
            'name' => 'cep',
            'type' => 'text',
            'options' => [
                'label' => 'Cep',
            ],
        ]);
        $this->add([
            'name' => 'telefone',
            'type' => 'text',
            'options' => [
                'label' => 'Telefone',
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id' => 'submitbutton',
            ],
        ]); 

    }
}

