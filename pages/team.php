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
                <?php
                $result = getAllUsers();
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-4 col-sm-6 text-center" style="padding-top: 15px; padding-right: 0px; padding-left: 0px; padding-bottom: 15px; background: #ededed; border-radius: 10px; margin: 10px; max-width: 30%;">
                            <img class="img-circle img-responsive img-center" src="../src/romito.jpg" alt="" style="margin: auto; width: 200px; height: 200px;">
                            <h3 style="margin: auto; max-width: 300px; height: 52px;">' . $row['nome'] . '</h3>
                            <h4 style="color: #808080;">'. getRoleName($row['role_id']) . '</h4>
                            <a href="profile.php?user_id=' . $row['id'] . '">
                                <button type="button" class="btn btn-success btn-xs user-details" userid="'. $row['id'] .'">Ver Perfil</button>
                            </a>
                        </div>';
                } ?>

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
