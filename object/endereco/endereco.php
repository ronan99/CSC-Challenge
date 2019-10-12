<?php

namespace object\endereco;


use lib\BaseObject;

class Endereco extends BaseObject
{
    public $enderecoId;
    public $numero;
    public $rua;
    public $bairro;
    public $cidade;
    public $pais;
    public $estado;
    public $complemento;
    public $latitude;
    public $longitude;
    public $usuarioId;
}
