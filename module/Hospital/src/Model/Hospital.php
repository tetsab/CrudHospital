<?php

// use DomainException;
// use Zend\Filter\StringTrim;
// use Zend\Filter\StripTags;
// use Zend\Filter\ToInt;
// use Zend\InputFilter\InputFilter;
// use Zend\InputFilter\InputFilterAwareInterface;
// use Zend\InputFilter\InputFilterInterface;
// use Zend\Validator\StringLength;
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

    //public function setInputFilter()
}