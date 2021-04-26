<?php 

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar Vaga');
define('BRAND','Cadastrar Vaga');

use \App\Entidy\Vaga;
use   \App\Session\Login;

$usuariologado = Login:: getUsuarioLogado();

$usuario = $usuariologado['id'];

$vagasUsuarios = Vaga::getVagasUsuarios(null,null,null);

Login::requireLogin();

if(isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])){
    $obVagas = new Vaga;
    $obVagas->titulo = $_POST['titulo'];
    $obVagas->descricao = $_POST['descricao'];
    $obVagas->ativo = $_POST['ativo'];
    $obVagas->usuarios_id = $usuario;
    $obVagas-> cadastar();

    header('location: index.php?status=success');

    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/top.php';
include __DIR__.'/includes/menu.php';
include __DIR__.'/includes/content.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';