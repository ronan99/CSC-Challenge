<?php

namespace api\usuario;

use lib\Model;
use object\usuario\Usuario;


class apiUsuario extends Model
{

    public function get(Usuario $obj)
    {
        $query = $this->First($this->Select("SELECT * FROM users WHERE usuario = '{$obj->usuario}'"));

        $this->setObject($obj, $query);
    }

    public function getList()
    {
        return $this->Select("SELECT * FROM users");
    }



    public function save(Usuario $obj, $desative = false)
    {


        $result = $this->Select("SELECT * FROM users  WHERE usuario = '{$obj->usuario}'");


        if ($result <> 0) {
            return $this->Update($obj, array('usuario' => $obj->usuario), 'users');
        } else {
            return $this->Insert($obj, 'users');
        }

        #precisa reestruturar.
        if ($desative) {
            return $this->Update($obj, array('usuario' => $obj->usuario), 'users');
        }
    }
}
