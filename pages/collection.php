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
                    <h1 class="page-header" style="float: left; width: 80%; text-align: cnter;">Coleções</h1>
                    <a href="newuser.php">
                        <button type="button" style="margin: 40px 0 20px; width: 15%; float: right;" class="btn btn-outline btn-primary" id="newBtn">Novo Usuário</button>
                    </a>
                </div>
            </div>
            <div class="row">
              <!-- o container sera montado atraves de um template de forma dinamica-->
              <!-- adicionar um crop para o tamanho da imagem-->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Coleções
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; width: 90px;">ID Coleção</th>
                                            <th style="text-align: center;">Data de Inserção</th>
                                            <th style="text-align: center;">Código SRMP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;">1</td>
                                            <td style="text-align: center;">12/07/1998</td>
                                            <td style="text-align: center;">1467456</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
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
    <script src="../js/team.js"></script>
</body>

</html>
