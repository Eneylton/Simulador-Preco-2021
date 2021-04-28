<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-6">
            <div class="card card-warning">
               <div class="card-header">
              
               </div>

               <div class="card-body">

                  <div class="col-12">
                     <form action="index.php?acao=up" method="post">
                        <table class="table table-bordered table-hover table-striped table-sm">

                           <tbody>
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
                           <td> R$ <?= number_format($total1, "2", ",", ".") ?></td>
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
                              <td style="background-color:#de0002;"> R$ <?= round($total3, 2) ?> %</td>
                           </tr>


                        </table>


                     </div>
                  </div>

                  <hr>

                  <div class="card-body">
                     <div class="col-12">
                        <span style="font-weight: 700; font-size:23px; color:#000">ANÁLISE DE CUSTO </span>
                        <hr>
                     </div>

                     <div class="col d-flex align-items-end">

                        <table class="table table-bordered table-hover table-striped table-sm">

                           <tr style="background-color: #000; color:#ffffff">
                              <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Preço de venda</td>
                              <td style="font-size:20px; font-weight:600""> R$ <?= number_format($preco_venda, "2", ",", ".") ?></td>
                      <td style=" font-size:20px; font-weight:600""> <?= round($cust02, 2)  ?> %</td>
                           </tr>
                           <tr style="background-color: #001f3f; color:#ffffff">
                              <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Despesas fixas </td>
                              <td style="background-color:#de0002; color:#ffffff; font-size:18px; font-weight:600">R$ <?= number_format($cust04, "2", ",", ".") ?></td>
                              <td style="background-color:#de0002; color:#ffffff; font-size:18px; font-weight:600"> <?= round($cust06, 2) ?> %</td>
                           </tr>
                           <tr style="background-color: #001f3f; color:#ffffff">
                              <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Custos variáveis</td>
                              <td style="background-color: #077776; color:#ffffff; font-size:18px; font-weight:600">R$ <?= number_format($cust08, "2", ",", ".") ?> </td>
                              <td style="background-color: #077776; color:#ffffff; font-size:18px; font-weight:600"> <?= round($cust10, 2) ?> %</td>
                           </tr>
                           <tr style="background-color: #001f3f; color:#ffffff">
                              <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Custo direto</td>
                              <td style="background-color: #077776; color:#ffffff; font-size:18px; font-weight:600">R$ <?= number_format($total_frete, "2", ",", ".") ?> </td>
                              <td style="background-color: #077776; color:#ffffff; font-size:18px; font-weight:600"> <?= round($cust12, 2) ?> %</td>
                           </tr>
                           <tr style="background-color: #001f3f; color:#ffffff">
                              <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Lucro</td>
                              <td style="background-color: #077776; color:#ffffff; font-size:18px; font-weight:600">R$ <?= number_format($cust13, "2", ",", ".") ?> </td>
                              <td style="background-color: #077776; color:#ffffff; font-size:18px; font-weight:600"> <?= round($cust15, 2) ?> %</td>
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
                     <span style="font-weight: 700; font-size:23px;">VALOR DO FRETE: R$ <?= number_format($frete, "2", ",", ".") ?></span>
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
                           <td> R$ <?= number_format($total2, "2", ",", ".") ?></td>
                        </tr>
                        <tr style="background-color: #343a40; color:#ffffff">
                           <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Frete</td>
                           <td> R$ <?= number_format($frete, "2", ",", ".") ?></td>
                        </tr>

                        <tr style="background-color: #343a40; color:#ffffff">
                           <td colspan="3" style="font-weight: 500; text-transform:uppercase; background-color:#545d65">Total</td>
                           <td style="font-weight: 700; font-size:23px; background-color:#de0002;"> R$ <?= number_format($total_frete, "2", ",", ".") ?></td>
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
                           <td> <?= round($margem_lucro, "2") ?> %</td>
                        </tr>
                        <tr style="background-color: #343a40; color:#ffffff">
                           <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Lucro</td>
                           <td style="background-color:#545d65; color:#ffffff"> R$ <?= number_format($lucro, "2", ",", ".") ?></td>
                        </tr>
                        <tr style="background-color: #343a40; color:#ffffff">
                           <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Markup</td>
                           <td> R$ <?= $markup_total ?></td>
                        </tr>
                        <tr style="background-color: #343a40; color:#ffffff">
                           <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Preço de venda</td>
                           <td style="background-color: #077776; color:#ffffff; font-size:22px; font-weight:600"> R$ <?= number_format($preco_venda2, "2", ",", ".") ?></td>
                        </tr>


                     </table>


                  </div>
               </div>

               <hr>

               <div class="card-body">
                  <div class="col-12">
                     <span style="font-weight: 700; font-size:23px; color:#ff0000">MARGEM DE LUCRO </span>
                     <hr>
                  </div>

                  <form action="index.php?acao=up2" method="post">
                     <table class="table table-bordered table-hover table-striped table-sm">

                        <tbody>
                           <?= $resultados5 ?>
                        </tbody>


                     </table>
                  </form>

                  <div class="col d-flex align-items-end">

                     <table class="table table-bordered table-hover table-striped table-sm">

                        <tr style="background-color: #343a40; color:#ffffff">
                           <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Preço de venda</td>
                           <td> R$ <?= number_format($preco_venda, "2", ",", ".") ?></td>
                        </tr>
                        <tr style="background-color: #343a40; color:#ffffff">
                           <td colspan="3" style="font-weight: 500; text-transform:uppercase;">Lucro </td>
                           <td style="background-color:#de0002; color:#ffffff; font-size:18px; font-weight:600"> R$ <?= number_format($margem, "2", ",", ".") ?></td>
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

                     <canvas id="grafico" style="width: 40%; height:40%"></canvas>

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

                     <canvas id="myChart" style="width: 40%; height:40%"></canvas>


                  </div>
               </div>

            </div>

         </div>

      </div>

   </div>

</section>