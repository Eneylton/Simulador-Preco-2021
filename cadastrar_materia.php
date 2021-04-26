<?php 

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar Materia');
define('BRAND','Cadastrar Materia');

use \App\Entidy\Materia;
use \App\Entidy\Vaga;
use   \App\Session\Login;

Login::requireLogin();

$obVagas = Vaga::getVagasID($_GET['id']);

$id = $obVagas->id;

if(isset($_POST['nome'])){
    $obMateria = new Materia;
    $obMateria->nome = $_POST['nome'];
    $obMateria->vagas_id = $id;
   
    $obMateria-> cadastar();

    header('location: index.php?status=success');

    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/top.php';
include __DIR__.'/includes/menu.php';
include __DIR__.'/includes/content.php';
include __DIR__.'/includes/form-materia.php';
include __DIR__.'/includes/footer.php';