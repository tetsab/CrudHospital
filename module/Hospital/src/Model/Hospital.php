<?php

use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;
class Hospital
{
    public $id;
    public $nome;
    public $endereco;
    public $bairro;
    public $cep;
    public $telefone;

    private $inputFilter;

    public function exchangeArray(array $data)
    {
        $this->id        = !empty($data['id'])       ? $data['id']       : null;
        $this->nome      = !empty($data['nome'])     ? $data['artist']   : null;
        $this->endereco  = !empty($data['endereco']) ? $data['title']    : null;
        $this->bairro    = !empty($data['bairro'])   ? $data['bairro']   : null;
        $this->cep       = !empty($data['cep'])      ? $data['cep']      : null;
        $this->telefone  = !empty($data['telefone']) ? $data['telefone'] : null;
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new DomainException(sprintf(
            '%s não permite injeção de um filtro de entrada alternativo.',
            __CLASS__
        ));
    }

    public function getInputFilter()
    {
        if($this->inputFilter){
            return $this->inputFilter;
        }

        $inputFilter = new InputFilter();

        $inputFilter->add([
            'name' => 'id',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'nome',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 40,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'endereco',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 50,
                    ],
                ],
            ],
        ]);

        
        $inputFilter->add([
            'name' => 'bairro',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 20,
                    ],
                ],
            ],
        ]);


        $inputFilter->add([
            'name' => 'cep',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 10,
                    ],
                ],
            ],
        ]);
        

        $inputFilter->add([
            'name' => 'telefone',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 10,
                    ],
                ],
            ],
        ]);

        $this->inputFilter = $inputFilter;
        return $this->inputFilter;

    }
}