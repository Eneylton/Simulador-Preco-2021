<?php 

require __DIR__.'/vendor/autoload.php';

use \App\Entidy\Despesa;
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
$faturas   = Fatura ::getListar(null,null,null);

if ($_GET['acao'] == 'up') {
    if(isset($_POST['val'])){

        if (is_array($_POST['val'])) {
 
            foreach ($_POST['val'] as $id => $preco) {
      
                $item = Fatura::getID($id);
      
                $item->valor = $preco;
                $item->atualizar();
            }


    }
   
 
   }

   $faturas   = Fatura ::getListar(null,null,null);
 
 }

 if(isset($_GET['acao'])){

    if ($_GET['acao'] == 'up2') {

        if (is_array($_POST['fat'])) {
     
           foreach ($_POST['fat'] as $id => $preco) {
     
               $item = Fatura::getID($id);
     
               $item->fatura = $preco;
               $item->atualizar();
           }
     
       }
    
       $faturas   = Fatura ::getListar(null,null,null);
     
     }
    


 }



$resultados1  = '';
$resultados2  = '';
$resultados3  = '';
$resultados4  = '';
$resultados5  = '';
$margem_lucro = 25;
$total_venda  = 0;
$total1 = 0;
$total2 = 0;
$total3 = 0;
$total4 = 0;
$total5 = 0;
$total6 = 0;
$lucro  = 0;
$markup = 0;
$markup_total = 0;
$markup_totalfrete = 0;
$calc  = 0;
$frete = 230.00;
$porcentagem = 0;
$preco_venda = 0;
$preco_venda2 = 0;
$preco_venda3 = 0;


// PRODUTOS

foreach ($faturas as $item) {
   
   $resultados4 .= '<tr style="background-color: #e1e1e1; color:#000; font-size:22px; font-weight: 500;">
                      <td>FATURAMENTO MÉDIO</td>
                      <td> R$  <input style="background-color:#20c92b; color:#fff; border:none;" type="text" size="10" name="val[' . $item->id . ']" value="' . $item->valor . '" /></td>
                      <td style="text-align:center"><input class="btn btn-primary" type="submit" value="Atualizar" style="color:#fff" /></td>
                    </tr>';

                    $faturamento_medio = $item->valor;
}

foreach ($faturas as $item) {
   
   $resultados5 .= '<tr style="background-color: #e1e1e1; color:#000; font-size:22px; font-weight: 500;">
                      <td>PREÇO DE VENDA</td>
                      <td> R$  <input style="background-color:#20c92b; color:#fff; border:none;" type="text" size="10" name="fat[' . $item->id . ']" value="' . $item->fatura . '" /></td>
                      <td style="text-align:center"><input class="btn btn-primary" type="submit" value="Atualizar" style="color:#fff" /></td>
                    </tr>';

                    $preco_venda = $item->fatura;
}

foreach ($despesas as $item) {
   
   $resultados1 .= '<tr>
                      <td>' . $item->id . '</td>
                      <td>' . $item->nome . '</td>
                      <td> R$ ' . number_format($item->valor, "2", ",", ".") . '</td>
                   </tr>';

   $total1 += $item->valor;
            
}

$calc = ($total1 / $faturamento_medio) * 100;   
$porcentagem = round($calc, 2);   

// PEDIDOS

foreach ($pedidos as $item) {
   
   $resultados2 .= '<tr>
                      <td>' . $item->id . '</td>
                      <td>' . $item->nome . '</td>
                      <td style="text-align:center">' . $item->qtd . '</td>
                      <td> R$ ' . number_format($item->valor, "2", ",", ".") . '</td>
                   </tr>';
            
                   $total2 += $item->valor;
}

$total5 = $total2 * $item->qtd ;

$total_frete = $total5 + $frete;

// TAXAS

foreach ($taxas as $item) {
   
   $resultados3 .= '<tr>
                      <td>' . $item->id . '</td>
                      <td>' . $item->nome . '</td>
                      <td>' . round($item->valor, 2). '% </td>
                   </tr>';

   $total3 += $item->valor;
            
}

$total4 = ($total3 + $porcentagem + $margem_lucro);
$total6 = 1 - ($total4 / 100 );

$markup = (1/($total6));

$markup_total = round($markup,4);

$preco_venda2 = $total_frete * $markup_total;


$lucro = $preco_venda2 * $margem_lucro / 100;


// CALCULANDO LUCRO

$res1 = $porcentagem + $total3;
$res2 = $res1 / 100;
$res3 = $res2 * $preco_venda;
$res4 = $res3 + $total_frete;
$res5 = $preco_venda - $res4;
$res6 = $res5 / $preco_venda;
$res7 = $res6 * 100;
$res8 = round($res7,2);
$margem = $preco_venda * $res8 / 100;

// ANALISE DE CUSTO

$cust01 = $preco_venda / $preco_venda;
$cust02 = $cust01 * 100;

$cust03 = $porcentagem  * $preco_venda;
$cust04 = $cust03 / 100; 

$cust05 = $cust04 / $preco_venda;
$cust06 = $cust05 * 100;

$cust07 = $preco_venda * $total3;
$cust08 = $cust07 / 100;

$cust09 = $cust08 / $preco_venda;
$cust10 = $cust09 * 100;

$cust11 = $total_frete / $preco_venda;
$cust12 = $cust11 * 100;

$cust13 = $preco_venda - ($cust04 + $cust08 + $total_frete);

$cust14 = $cust13 / $preco_venda;
$cust15 = $cust14 * 100;


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/top.php';
include __DIR__.'/includes/menu.php';
include __DIR__.'/includes/content.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';


?>

<script>
var ctx = document.getElementById('grafico').getContext('2d');
var grafico = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Despesas Fixas', 'Custos variáveis', 'Custo Direto', 'Lucro'],
        datasets: [{
            label: '# Análise custos',
            data: [<?= $cust04 ?>, <?= $cust08 ?>,<?= $total_frete ?>, <?= $cust13 ?>],
            backgroundColor: [
                '#e64425',
                '#f59d25',
                '#43b2ab',
                '#ece617'
            ],
            borderColor: [
                '#e64425',
                '#f59d25',
                '#43b2ab',
                '#ece617'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

</script>


<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Despesas Fixas', 'Custos variáveis', 'Custo Direto', 'Lucro'],
        datasets: [{
            label: 'Análise de custos',
            data: [<?= $cust06 ?>, <?= $cust10 ?>,<?= $cust12 ?>, <?= $cust15 ?>],
            backgroundColor: [
                '#e64425',
                '#f59d25',
                '#43b2ab',
                '#ece617'
            ],
            borderColor: [
                '#e64425',
                '#f59d25',
                '#43b2ab',
                '#ece617'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<script>
     $(document).ready(function(){
         $("#form1 #select-all").click(function(){
            $("#form1 input[type='checkbox']").prop('checked',this.checked);
         });
     });
</script>
