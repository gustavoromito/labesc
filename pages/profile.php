<?php
include("../php/databaseManager.php");

$user = getUserDetails($_GET['user_id']);

?>
<!DOCTYPE html>
<html lang="en">

<?php include("../php/head.php"); ?>

<body>
    <div id="wrapper">
      <!-- include navigation.php -->
      <?php include("../php/navigation.php"); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="float: left; width: 80%;"><?php echo $user['nome'] ?></h1>
                    <a href="edituser.php?user_id=" . <?php echo (string)$user['id']?>>
                        <button type="button" style="margin: 40px 0 20px; width: 15%; float: right;" class="btn btn-outline btn-primary" id="newBtn" userid=<?php echo (string)$user['id']?>>Editar Usuário</button>
                    </a>
                </div>
            </div>
            <div class="row text-center">
              <img class="img-circle img-responsive img-center" src="../src/loren.jpg" style="width: 150px; height: 150px; display: initial;">
            </div>
            <div class="text-left" style="padding-bottom:15px;">
            	  <p class="form-control-static">
                    <label>E-mail:</label> <?php echo $user['email'];?>
                  </p>

                  <p class="form-control-static">
                    <label>Data de Nascimento:</label> <?php echo date('d/m/Y', strtotime($user['dataNascimento']))?>
                  </p>

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
                    <a target="_blank" href=<?php echo $user['lattes'];?>><?php echo $user['lattes'];?></a>
                  </p>

                  <p class="form-control-static">
                    <label>Área de Atuação:</label> <?php echo $user['area_atuacao'];?>
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
