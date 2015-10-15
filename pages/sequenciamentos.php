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
                    <h1 class="page-header">Sequenciamentos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lista de todos Sequenciamentos do seu acesso
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Descrição</th>
                                            <th>Pesquisador</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="even gradeC">
                                            <td>12/12/1994</td>
                                            <td>Sequenciamento Sapo</td>
                                            <td>Mateus Loren</td>
                                        </tr>
                                        <tr class="odd gradeA">
                                            <td>12/12/1994</td>
                                            <td>Sequenciamento Sapo</td>
                                            <td>Gustavo Romito</td>
                                        </tr>
                                        <tr class="even gradeA">
                                            <td>12/12/1994</td>
                                            <td>Sequenciamento Sapo</td>
                                            <td>Leonardo Paladia</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
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

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
