<?php
include("../php/databaseManager.php");

//$user = getUserDetails($_GET['user_id']);
$user = getUserDetails(1);

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
                    <h1 class="page-header">Editar Usuário</h1>
                </div>
            </div>
            <div class="col-lg-6 text-left" style="padding-bottom:15px;">
                    <label>Nome:</label>
                    <input id="name" class="form-control">

                    <label>Função:</label>
                    <input class="form-control" id="function">

                    <label>E-mail:</label>
                    <input class="form-control" id="email">

                    <label>Lattes:</label>
                    <input class="form-control" id="lattes">


                    <label>Área de Pesquisa:</label>
                    <input class="form-control" rows=3 id="actuation">

                    <script>
$('#name').value = toString(<?php echo (string)$user['nome']?>);
                        $('#name').val(<?php echo (string)$user['nome']?>);

                        $('#function').val(<?php echo getRoleName($user['role_id'])?>);
                        $('#email').val(<?php echo $user['email']?>);
                        $('#lattes').val(<?php echo $user['lattes']?>);
                        $('#actuation').val(<?php echo $user['area_atuacao']?>);
                    
                    </script>
            </div>
            <div class="row text-center">
                <img class="img-circle img-responsive img-center" src="../src/loren.jpg" style="width: 200px; height: 200px; margin-bottom: 10px;">
                <button type="button" class="btn btn-default">Alterar Foto</button>
            </div>
            <div class="row text-center">
                <button type="submit" class="btn btn-default">Salvar</button>
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
