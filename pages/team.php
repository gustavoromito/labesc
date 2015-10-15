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
                <!-- /.col-lg-12 -->
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
                </div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

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
