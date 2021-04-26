<?php 

require __DIR__.'/vendor/autoload.php';

use \App\Entidy\Vaga;
use   \App\Session\Login;


Login::requireLogin();



if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$obVagas = Vaga::getVagasID($_GET['id']);

if(!$obVagas instanceof Vaga){
    header('location: index.php?status=error');

    exit;
}



if(isset($_POST['excluir'])){
    
 
    $obVagas->excluir();

    header('location: index.php?status=success');

    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar.php';
include __DIR__.'/includes/footer.php';