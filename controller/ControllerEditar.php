<?php
require_once("../model/banco.php");
class editarController {
    private $editar;
    private $nome;
    private $cpf;
    private $endereco;
    private $cnpj;
    private $email;
    private $telefone;
    private $razao_social;
    public function __construct($id){
        $this->editar = new Banco();
        $this->criarFormulario($id);
    }
    private function criarFormulario($id){
        $row = $this->editar->pesquisaUsuario($id);
        $this->nome         =$row['nome'];
        $this->cpf          =$row['cpf'];
        $this->endereco     =$row['endereco'];
        $this->cnpj         =$row['cnpj'];
        $this->email        =$row['email'];
        $this->telefone     =$row['telefone'];
        $this->razao_social =$row['razao_social'];
    }
    public function editarFormulario($nome,$cpf,$endereco,$cnpj,$email,$telefone,$razao_social,$id){
        if($this->editar->updateUsuario($nome,$cpf,$endereco,$cnpj,$telefone,$email,$razao_social,$id) == TRUE){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/index.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
    public function getNome(){
        return $this->nome;
    }
    public function getCPF(){
        return $this->cpf;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function getCNPJ(){
        return $this->cnpj;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function getRazaoSocial(){
        return $this->razao_social;
    }
}
$id = $_REQUEST['id'];
$editar = new editarController($id);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $editar->editarFormulario($_POST['nome'],$_POST['cpf'],$_POST['endereco'],$_POST['cnpj'],$_POST['email'],$_POST['telefone'],$_POST['razao_social'],$_POST['id']);
}
?>