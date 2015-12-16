<!DOCTYPE html>
<html lang="en">

<?php include("../php/head.php"); ?>

<body>
    <div id="wrapper">
      <!-- include navigation.php -->
      <?php
      include("../php/navigation.php");
      $user = getUserDetails($_GET['user_id']);
      ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $user['nome'] ?></h1>
                </div>
            </div>
            <div class="row text-center">
              <img class="img-circle img-responsive img-center" src="../src/loren.jpg" style="width: 150px; height: 150px;">
            </div>
            <div class="text-left" style="padding-bottom:15px;">
                  <p class="form-control-static">
                    <label>Função:</label> <?php echo getRoleName($user['role_id']);?>
                  </p>
                  <p class="form-control-static">
                    <label>Membro Desde:</label> <?php
                      $time = strtotime($user['membroDesde']);
                      $newformat = date('d/m/Y',$time);
                      echo $newformat;?>
                  </p>
                  
                  <p class="form-control-static">
                    <label>Lattes:</label>
                    <a target="_blank" href="http://lattes.cnpq.br/7701978370621549">http://lattes.cnpq.br/7701978370621549</a>
                  </p>
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
