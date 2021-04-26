<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-6">
            <form method="post">
               <div class="card card-danger">
                  <div class="card-header ">
                     <h3 class="card-title">Formulário de cadastro de novas vagas...</h3>

                     <div class="align-items-end" style="margin-left: 86%;">
                        <button type="submit" class="btn btn-warning">
                           <i class="fas fa-check"></i> Atualizar
                        </button>
                     </div>

                  </div>
                  <!-- /.card-header -->
                  <div class="card card-primary">

                     <div class="card-body">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Titulo da vaga</label>
                           <input type="text" class="form-control" placeholder="Entre com Titlo" name="titulo" value="<?= $obVagas->titulo ?>">
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword1">Descrição</label>
                           <textarea type="text" class="form-control" name="descricao" rows="5"><?= $obVagas->descricao ?></textarea>
                        </div>

                        <div class="form-grop">

                           <label>Lista de Usuários</label>

                           <select name="" id="user" class="form-control">

                              <option value="">Selecione um usuário !!!</option>

                              <?= $resultados ?>


                           </select>

                        </div>


                        <div class="form-group">

                           <label>Status</label>
                           <div>
                              <div class="form-check form-check-inline">
                                 <label class="form-control">
                                    <input type="radio" name="ativo" value="s" checked> Ativo
                                 </label>
                              </div>

                              <div class="form-check form-check-inline">
                                 <label class="form-control">
                                    <input type="radio" name="ativo" value="n" <?= $obVagas->ativo == 'n' ? 'checked' : '' ?>> Inativo
                                 </label>
                              </div>
                           </div>
                        </div>

                     </div>

                  </div>

               </div>
            </form>

         </div>


</section>

</div>
</section>