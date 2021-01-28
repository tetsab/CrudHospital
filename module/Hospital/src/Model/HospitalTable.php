<?php

namespace Hospital\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class HospitalTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getHospital($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Identificador %d não encontrado',
                $id
            ));
        }

        return $row;
    }

    public function saveHospital(Hospital $hospital)
    {
        $data = [
            'nome'      => $hospital->nome,
            'endereco'  => $hospital->endereco,
            'bairro'    => $hospital->bairro,
            'cep'       => $hospital->cep,
            'telefone'  => $hospital->telefone,
        ];

        $id = (int) $hospital->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if(!$this->getHospital($id)) {
            throw new RuntimeException(sprintf(
                'Não foi possivel realizar o update do identificador %d pois nao existe',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteHospital($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}