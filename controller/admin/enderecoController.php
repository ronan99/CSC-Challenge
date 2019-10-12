<?php

namespace controller\admin;

use lib\Controller;
use object\endereco\Endereco;
use api\endereco\apiEndereco;
use helper\Seguranca;

class enderecoController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        new Seguranca();
    }


    public function index()
    {
        $api = new apiEndereco();

        $this->dados = array(
            'list' => $api->getList()
        );
        $this->view();
    }



    public function formCadastro()
    {

        $Endereco = new Endereco();

        $Endereco->endereco = $this->getParams(0);



        $api = new apiEndereco();
        $api->get($Endereco);


        $this->dados = array(
            'dados' => $Endereco
        );

        $this->view();
    }


    public function formDelCadastro()
    {

        $Endereco = new Endereco();
        $Endereco->endereco = $this->getParams(0);


        $api = new apiEndereco();
        $api->get($Endereco);

        $this->dados = array(
            'dados' => $Endereco
        );

        $this->view();
    }



    public function save()
    {
        $api = new apiEndereco();

        print_r($api->save(new Endereco('POST')));
    }




    public function desative()
    {
        $api = new apiEndereco();

        print_r($api->save(new Endereco('POST')), 1);
    }
}
