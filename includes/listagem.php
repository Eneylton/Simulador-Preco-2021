<?php

use App\Entidy\Fatura;

if ($_GET['acao'] == 'up') {

   if (is_array($_POST['val'])) {

      foreach ($_POST['val'] as $id => $preco) {

          $item = Fatura::getID($id);

          $item->valor = $preco;
          $item->atualizar();
      }

  }

}

$resultados1  = '';
$resultados2  = '';
$resultados3  = '';
$resultados4  = '';
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

$preco_venda = 1200;


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


?>

<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-6">
            <div class="card card-warning">
               <div class="card-header">
                  <div class="row my-7">
                     <div class="col d-flex align-items-end">
                      PARAMETRÔS DA EMPRESA
                     </div>

                  </div>
              </div>

               <div class="card-body">
                  
               <div class="col-12">
               <form action="index.php?acao=up" method="post">
               <table class="table table-bordered table-hover table-striped table-sm">
                    
                     <tbody >
                        <?= $resultados4 ?>
                     </tbody>
                    

                  </table>
                  </form>
                <hr>
               </div>
                  <div class="col d-flex align-items-end">
                       
                  <table class="table table-bordered table-hover table-striped table-sm">
                     <thead class="thead-dark">
                        <tr>
                           <th> ID </th>
                           <th> PRODUTO </th>
                           <th> VALOR</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?= $resultados1 ?>
                     </tbody>
                     <tr style="background-color: #343a40; color:#ffffff">
                      <td colspan="2" style="font-weight: 500; text-transform:uppercase">Total Gasto Fixo</td>
                      <td> R$ <?= number_format($total1,"2",",",".") ?></td>
                     </tr>
                     <tr style="background-color: #343a40; color:#ffffff">
                      <td colspan="2" style="font-weight: 500; text-transform:uppercase">Relação Gasto Fixo/Faturamento</td>
                      <td style="background-color:#de0002;"><?= $porcentagem ?> % </td>
                     </tr>

                  </table>


                  </div>
                  <hr>
                  <div class="card-body">
                  
                  <div class="col-12">
                   <span style="font-weight: 700; font-size:23px;">CUSTO VARÁVEIS</span>
                   <hr>
                  </div>
                     <div class="col d-flex align-items-end">
                          
                     <table class="table table-bordered table-hover table-striped table-sm">
                        <thead class="thead-dark">
                           <tr>
                              <th> ID </th>
                              <th> PRODUTO </th>
                              <th> VALOR</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?= $resultados3 ?>
                        </tbody>
                        <tr style="background-color: #343a40; color:#ffffff">
                         <td colspan="2" style="font-weight: 500; text-transform:uppercase">Total Gasto Fixo</td>
                         <td style="background-color:#de0002;"> R$ <?= round($total3,2) ?> %</td>
                        </tr>
                       
   
                     </table>
   
   
                     </div>
                  </div>

                  <hr>

                  <div class="card-body">
               <div class="col-12">
                <span style="font-weight: 700; font-size:23px; color:#000">ANÁLISE DE CUSTO   </span>
                <hr>
               </div>

                  <div class="col d-flex align-items-end">
                       
                  <table class="table table-bordered table-hover table-striped table-sm">
                     
                     <tr style="background-color: #000; color:#ffffff">
                      <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Preço de venda</td>
                      <td style="font-size:20px; font-weight:600""> R$ <?= number_format($preco_venda,"2",",",".") ?></td>
                      <td style="font-size:20px; font-weight:600""> <?= round($cust02,2)  ?> %</td>
                     </tr>
                     <tr style="background-color: #001f3f; color:#ffffff">
                      <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Despesas fixas </td>
                      <td style="background-color:#de0002; color:#ffffff; font-size:18px; font-weight:600">R$ <?= number_format($cust04,"2",",",".") ?></td>
                      <td style="background-color:#de0002; color:#ffffff; font-size:18px; font-weight:600"> <?= round($cust06,2) ?> %</td>
                     </tr>
                     <tr style="background-color: #001f3f; color:#ffffff">
                      <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Custos variáveis</td>
                      <td style="background-color: #077776; color:#ffffff; font-size:18px; font-weight:600">R$ <?= number_format($cust08,"2",",",".") ?> </td>
                      <td style="background-color: #077776; color:#ffffff; font-size:18px; font-weight:600"> <?= round($cust10,2) ?> %</td>
                     </tr>
                     <tr style="background-color: #001f3f; color:#ffffff">
                      <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Custo direto</td>
                      <td style="background-color: #077776; color:#ffffff; font-size:18px; font-weight:600">R$ <?= number_format($total_frete,"2",",",".") ?> </td>
                      <td style="background-color: #077776; color:#ffffff; font-size:18px; font-weight:600"> <?= round($cust12,2) ?> %</td>
                     </tr>
                     <tr style="background-color: #001f3f; color:#ffffff">
                      <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Lucro</td>
                      <td style="background-color: #077776; color:#ffffff; font-size:18px; font-weight:600">R$ <?= number_format($cust13,"2",",",".") ?> </td>
                      <td style="background-color: #077776; color:#ffffff; font-size:18px; font-weight:600"> <?= round($cust15,2) ?> %</td>
                     </tr>
   
                   </table>


                  </div>
               </div>
               </div>

            </div>

         </div>

         <div class="col-6">
            <div class="card card-dark">
               <div class="card-header">
                  <div class="row my-7">
                     <div class="col d-flex align-items-end">
                      CUSTOS DIRETOS
                     </div>

                  </div>
              </div>

               <div class="card-body">
               <div class="col-12">
                <span style="font-weight: 700; font-size:23px;">VALOR DO FRETE: R$ <?= number_format($frete,"2",",",".") ?></span>
                <hr>
               </div>

                  <div class="col d-flex align-items-end">
                       
                  <table class="table table-bordered table-hover table-striped table-sm">
                     <thead class="thead-dark">
                        <tr>
                           <th> ID </th>
                           <th> PRODUTO </th>
                           <th style="text-align:center"> QTD </th>
                           <th> VALOR</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?= $resultados2 ?>
                     </tbody>
                     <tr style="background-color: #343a40; color:#ffffff">
                      <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Total de Produto</td>
                      <td> R$ <?= number_format($total2,"2",",",".") ?></td>
                     </tr>
                     <tr style="background-color: #343a40; color:#ffffff">
                      <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Frete</td>
                      <td> R$ <?= number_format($frete,"2",",",".") ?></td>
                     </tr>

                     <tr style="background-color: #343a40; color:#ffffff">
                      <td colspan="3" style="font-weight: 500; text-transform:uppercase; background-color:#545d65">Total</td>
                      <td style="font-weight: 700; font-size:23px; background-color:#de0002;"> R$ <?= number_format($total_frete,"2",",",".") ?></td>
                     </tr>
                   </table>


                  </div>
               </div>
               <hr>

               
               <div class="card-body">
               <div class="col-12">
                <span style="font-weight: 700; font-size:23px; color:#ff0000">MARKUP</span>
                <hr>
               </div>

                  <div class="col d-flex align-items-end">
                       
                  <table class="table table-bordered table-hover table-striped table-sm">
                     
                     <tr style="background-color: #343a40; color:#ffffff">
                      <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Lucratividade</td>
                      <td> <?= round($margem_lucro,"2") ?> %</td>
                     </tr>
                     <tr style="background-color: #343a40; color:#ffffff">
                      <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Lucro</td>
                      <td style="background-color:#545d65; color:#ffffff"> R$ <?= number_format($lucro,"2",",",".") ?></td>
                     </tr>
                     <tr style="background-color: #343a40; color:#ffffff">
                      <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Markup</td>
                      <td> R$ <?= $markup_total ?></td>
                     </tr>
                     <tr style="background-color: #343a40; color:#ffffff">
                      <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Preço de venda</td>
                      <td style="background-color: #077776; color:#ffffff; font-size:22px; font-weight:600"> R$ <?= number_format($preco_venda2,"2",",",".") ?></td>
                     </tr>

                    
                   </table>


                  </div>
               </div>

               <hr>

               <div class="card-body">
               <div class="col-12">
                <span style="font-weight: 700; font-size:23px; color:#ff0000">MARGEM DE LUCRO   </span>
                <hr>
               </div>

                  <div class="col d-flex align-items-end">
                       
                  <table class="table table-bordered table-hover table-striped table-sm">
                     
                     <tr style="background-color: #343a40; color:#ffffff">
                      <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Preço de venda</td>
                      <td> R$ <?= number_format($preco_venda,"2",",",".") ?></td>
                     </tr>
                     <tr style="background-color: #343a40; color:#ffffff">
                      <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Lucro </td>
                      <td style="background-color:#de0002; color:#ffffff; font-size:18px; font-weight:600"> R$ <?= number_format($margem,"2",",",".") ?></td>
                     </tr>
                     <tr style="background-color: #343a40; color:#ffffff">
                      <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Margem de lucro</td>
                      <td style="background-color: #077776; color:#ffffff; font-size:22px; font-weight:600"> <?= $res8 ?> %</td>
                     </tr>

                   </table>


                  </div>
               </div>

            </div>

         </div>

        
         <div class="col-6">
            <div class="card card-success">
               <div class="card-header">
                  <div class="row my-7">
                     <div class="col d-flex align-items-end">
                     <span>ANÁLISE DE CUSTO</span>
                     </div>

                  </div>
              </div>

               <div class="card-body">

                  <div class="col d-flex align-items-end">
                       
                       0003


                  </div>
               </div>

            </div>

         </div>

         <div class="col-6">
            <div class="card card-gray">
               <div class="card-header">
                  <div class="row my-7">
                     <div class="col d-flex align-items-end">
                     <span>ANÁLISE DE CUSTO</span>
                     </div>

                  </div>
              </div>

               <div class="card-body">

                  <div class="col d-flex align-items-end">
                       
                       0003


                  </div>
               </div>

            </div>

         </div>

      </div>

   </div>

</section>