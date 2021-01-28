class Hospital
{
    public $id;
    public $nome;
    public $endereco;
    public $bairro;
    public $cep;
    public $telefone;

    public function exchangeArray(array $data)
    {
        $this->id        = !empty($data['id'])       ? $data['id']       : null;
        $this->nome      = !empty($data['nome'])     ? $data['artist']   : null;
        $this->endereco  = !empty($data['endereco']) ? $data['title']    : null;
        $this->bairro    = !empty($data['bairro'])   ? $data['bairro']   : null;
        $this->cep       = !empty($data['cep'])      ? $data['cep']      : null;
        $this->telefone  = !empty($data['telefone']) ? $data['telefone'] : null;
    }
}

