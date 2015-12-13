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
                    <h1 class="page-header" style="float: left; width: 80%;">Equipe</h1>
                    <a href="newuser.php">
                        <button type="button" style="margin: 40px 0 20px; width: 15%; float: right;" class="btn btn-outline btn-primary" id="newBtn">Novo Usuário</button>
                    </a>
                </div>
            </div>
            <div class="row">
              <!-- o container sera montado atraves de um template de forma dinamica-->
              <!-- adicionar um crop para o tamanho da imagem-->
                <?php
                $result = getAllUsers();
                while ($row = $result->fetch_assoc()) {
                    $profile_picture = $row['profile_pic'];
                    if ($profile_picture == 'undefined') {
                        $profile_picture = "../src/default-profile-pic.png";
                    }
                    $style = "background-image:url('" . $profile_picture . "'); background-position: center center; background-size: cover;margin: auto; width: 200px; height: 200px;";
                    echo '<div class="col-lg-4 col-sm-6 text-center" style="padding-top: 15px; padding-right: 0px; padding-left: 0px; padding-bottom: 15px; background: #ededed; border-radius: 10px; margin: 10px; max-width: 30%;">
                            <div class="img-circle img-responsive img-center" style="' . $style . '"></div>
                            <h3 style="margin: auto; max-width: 300px; height: 52px;">' . $row['nome'] . '</h3>
                            <h4 style="color: #808080;">'. getRoleName($row['role_id']) . '</h4>
                            <a href="profile.php?user_id=' . $row['id'] . '">
                                <button type="button" class="btn btn-success btn-xs user-details" userid="'. $row['id'] .'">Ver Perfil</button>
                            </a>
                        </div>';
                } ?>

<!--                -->
<!--                <div class="col-lg-4 col-sm-6 text-center" style="padding-bottom:15px;">-->
<!--                  <img class="img-circle img-responsive img-center" src="../src/loren.jpg" alt="" style="width: 200px; height: 200px;">-->
<!--                  <h3>Mateus Lourenção</h3>-->
<!--                  <h4>Professor Doutor</h4>-->
<!--                  <button type="button" class="btn btn-success btn-xs">Ver Perfil</button>-->
<!--                </div>-->
<!--                -->
<!--                <div class="col-lg-4 col-sm-6 text-center" style="padding-bottom:15px;">-->
<!--                  <img class="img-circle img-responsive img-center" src="../src/paladia.jpg" alt="" style="width: 200px; height: 200px;">-->
<!--                  <h3>Leonardo Paladia</h3>-->
<!--                  <h4>Professor</h4>-->
<!--                  <button type="button" class="btn btn-success btn-xs">Ver Perfil</button>-->
<!--                </div>-->
<!---->
<!--                <div class="col-lg-4 col-sm-6 text-center" style="padding-bottom:15px;">-->
<!--                  <img class="img-circle img-responsive img-center" src="../src/pavanelli.jpg" alt="" style="width: 200px; height: 200px;">-->
<!--                  <h3>Matheus Pavanelli</h3>-->
<!--                  <h4>Professor Visitante</h4>-->
<!--                  <button type="button" class="btn btn-success btn-xs">Ver Perfil</button>-->
<!--                </div>-->
<!--                -->
<!--                <div class="col-lg-4 col-sm-6 text-center" style="padding-bottom:15px;">-->
<!--                  <img class="img-circle img-responsive img-center" src="../src/kaio.jpg" alt="" style="width: 200px; height: 200px;">-->
<!--                  <h3>Kaio Pedroza</h3>                -->
<!--                  <h4>Aluno</h4>-->
<!--                  <button type="button" class="btn btn-success btn-xs">Ver Perfil</button>-->
<!--                </div>-->
<!--                -->
<!--                <div class="col-lg-4 col-sm-6 text-center" style="padding-bottom:15px;">-->
<!--                  <img class="img-circle img-responsive img-center" src="../src/jr.jpg" alt="" style="width: 200px; height: 200px;">-->
<!--                  <h3>Geraldo Júnior</h3>-->
<!--                  <h4>Aluno Pós-Graduação</h4>-->
<!--                  <button type="button" class="btn btn-success btn-xs">Ver Perfil</button>-->
<!--                </div>-->

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
    <script src="../js/team.js"></script>
</body>

</html>
