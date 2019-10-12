<?php

namespace api\Endereco;

use lib\Model;
use object\endereco\Endereco;


class apiEndereco extends Model
{

    public function get(Endereco $obj)
    {
        $query = $this->First($this->Select("SELECT * FROM endereco WHERE usuario = '{$obj->enderecoId}'"));

        $this->setObject($obj, $query);
    }

    public function getList()
    {
        return $this->Select("SELECT * FROM endereco");
    }



    public function save(Endereco $obj, $desative = false)
    {


        $result = $this->Select("SELECT * FROM endereco  WHERE usuario = '{$obj->usuario}'");


        if ($result <> 0) {
            return $this->Update($obj, array('enderecoId' => $obj->enderecoId), 'endereco');
        } else {
            return $this->Insert($obj, 'endereco');
        }

        #precisa reestruturar.
        if ($desative) {
            return $this->Update($obj, array('enderecoId' => $obj->enderecoId), 'endereco');
        }
    }
}
