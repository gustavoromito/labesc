<!DOCTYPE html>
<html lang="en">

<?php include("../php/head.php"); ?>
<?php include("../php/databaseManager.php"); ?>


<body>

    <div id="wrapper">
    	<!-- include navigation.php -->
    	<?php include("../php/navigation.php"); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Equipe</h1>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-8">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> Time
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                  			<div class="table-responsive">
                              <table class="table table-bordered table-hover table-striped">
                                  <thead>
                                      <tr>
                                          <th>Nome</th>
                                          <th>Membro desde</th>
                                          <th>Ativo</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                  $result = getAllUsers();
                                  while ($row = $result->fetch_assoc()) {?>
                                      <tr>
                                          <td><?php echo $row['nome'];?></td>
                                          <td><?php echo $row['membroDesde'];?></td>
                                          <td><?php echo $row['ativo'];?></td>
                                      </tr>
                                  <?php  } ?>
                                  </tbody>
                              </table>
                          </div>
                          <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

              <!-- o container sera montado atraves de um template de forma dinamica-->
              <!-- adicionar um crop para o tamanho da imagem-->
                <div class="col-lg-4 col-sm-6 text-center" style="padding-bottom:15px;">
                  <img class="img-circle img-responsive img-center" src="../src/romito.jpg" alt="" style="width: 200px; height: 200px;">
                  <h3>Gustavo Romito</h3>
                  <h4>Administrador</h4>
                  <button type="button" class="btn btn-success btn-xs">Ver Perfil</button>
                </div>
                
                <div class="col-lg-4 col-sm-6 text-center" style="padding-bottom:15px;">
                  <img class="img-circle img-responsive img-center" src="../src/loren.jpg" alt="" style="width: 200px; height: 200px;">
                  <h3>Mateus Lourenção</h3>
                  <h4>Professor Doutor</h4>
                  <button type="button" class="btn btn-success btn-xs">Ver Perfil</button>
                </div>
                
                <div class="col-lg-4 col-sm-6 text-center" style="padding-bottom:15px;">
                  <img class="img-circle img-responsive img-center" src="../src/paladia.jpg" alt="" style="width: 200px; height: 200px;">
                  <h3>Leonardo Paladia</h3>
                  <h4>Professor</h4>
                  <button type="button" class="btn btn-success btn-xs">Ver Perfil</button>
                </div>

                <div class="col-lg-4 col-sm-6 text-center" style="padding-bottom:15px;">
                  <img class="img-circle img-responsive img-center" src="../src/pavanelli.jpg" alt="" style="width: 200px; height: 200px;">
                  <h3>Matheus Pavanelli</h3>
                  <h4>Professor Visitante</h4>
                  <button type="button" class="btn btn-success btn-xs">Ver Perfil</button>
                </div>
                
                <div class="col-lg-4 col-sm-6 text-center" style="padding-bottom:15px;">
                  <img class="img-circle img-responsive img-center" src="../src/kaio.jpg" alt="" style="width: 200px; height: 200px;">
                  <h3>Kaio Pedroza</h3>                
                  <h4>Aluno</h4>
                  <button type="button" class="btn btn-success btn-xs">Ver Perfil</button>
                </div>
                
                <div class="col-lg-4 col-sm-6 text-center" style="padding-bottom:15px;">
                  <img class="img-circle img-responsive img-center" src="../src/jr.jpg" alt="" style="width: 200px; height: 200px;">
                  <h3>Geraldo Júnior</h3>
                  <h4>Aluno Pós-Graduação</h4>
                  <button type="button" class="btn btn-success btn-xs">Ver Perfil</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
