<?php 

require __DIR__.'/vendor/autoload.php';

use \App\Entidy\Despesa;
use  \App\Db\Pagination;
use App\Entidy\Fatura;
use App\Entidy\Pedido;
use App\Entidy\Taxa;
use   \App\Session\Login;

define('TITLE','Simulador de preços de produtos');
define('BRAND','despesas');


Login::requireLogin();

$despesas = Despesa::getListar(null,null,null);
$pedidos  = Pedido ::getListar(null,null,null);
$taxas    = Taxa   ::getListar(null,null,null);

if ($_GET['acao'] == 'up') {

    if (is_array($_POST['val'])) {
 
       foreach ($_POST['val'] as $id => $preco) {
 
           $item = Fatura::getID($id);
 
           $item->valor = $preco;
           $item->atualizar();
       }
 
   }

   $faturas   = Fatura ::getListar(null,null,null);
 
 }
 

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/top.php';
include __DIR__.'/includes/menu.php';
include __DIR__.'/includes/content.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';