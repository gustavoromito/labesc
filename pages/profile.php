<!DOCTYPE html>
<html lang="en">

<?php include("../php/head.php"); ?>

<body>
    <div id="wrapper">
      <!-- include navigation.php -->
      <?php
      include("../php/navigation.php");
      $profile_of_user = getUserDetails($_GET['user_id']);
      ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if ($user['role_id'] == $admin_role_id) {
                        echo '<a href="edituser.php?user_id='.$profile_of_user['id'].'">
                                    <button type="button" style="margin: 40px 0 20px; width: 15%; float: right;" class="btn btn-outline btn-primary" id="newBtn">Editar Usuário</button>
                                  </a>';
                    }
                    ?>
                    <h1 class="page-header"><?php echo $profile_of_user['nome'] ?></h1>
                </div>
            </div>
            <div class="row text-center">
                <?php
                    $img = "../src/default-profile-pic.png";
                    if ($user['profile_pic'] !== 'undefined') {
                        $img = $user['profile_pic'];
                    }
                    echo '<img class="img-circle img-responsive img-center" src="' . $img . '" style="width: 150px; height: 150px;">';


                ?>
            </div>
            <div class="text-left" style="padding-bottom:15px;">
                  <p class="form-control-static">
                    <label>Função:</label> <?php echo getRoleName($profile_of_user['role_id']);?>
                  </p>
                  <p class="form-control-static">
                    <label>Membro Desde: </label> <?php
                      $time = strtotime($profile_of_user['membroDesde']);
                      $newformat = date('d/m/Y',$time);
                      echo $newformat;?>
                  </p>

                    <p class="form-control-static">
                        <label>Data de Nascimento: </label> <?php
                        $time = strtotime($profile_of_user['dataNascimento']);
                        $newformat = date('d/m/Y',$time);
                        echo $newformat;?>
                    </p>

                    <p class="form-control-static">
                        <label>Area de Atuação: </label><?php echo $profile_of_user['area_atuacao'];?>
                    </p>
                    <p class="form-control-static">
                        <label>Lattes: </label><?php echo $profile_of_user['lattes'];?>
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
