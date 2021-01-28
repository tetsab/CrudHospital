namespace Hospital\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

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
                'Could not find row with identifier %d',
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

        try {
            $this->getHospital$id);
        } catch (RuntimeException $e) {
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