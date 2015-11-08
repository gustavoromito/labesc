<!DOCTYPE html>
<html lang="en">

<?php include("../php/head.php"); ?>
<?php include("../php/databaseManager.php"); ?>
<script>
    $(document).ready(function() {
        $("#cancelBtn").click(function (){
            console.log("ENTROU");
            $("#list-sequenciamento").show();
            $("#new-sequenciamento").hide();
        });

        $("#newBtn").click(function (){
            console.log("AQUI");
            $("#list-sequenciamento").hide();
            $("#new-sequenciamento").show();
        });
    });
</script>
<body>

    <div id="wrapper">
        <!-- include navigation.php -->
        <?php include("../php/navigation.php"); ?>

        <div id="page-wrapper">
            <div id="list-sequenciamento">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="float: left; width: 80%;">Sequenciamentos</h1>
                        <button type="button" style="margin: 40px 0 20px; width: 15%; float: right;" class="btn btn-outline btn-primary" id="newBtn">Novo Sequenciamento</button>
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

            <div id="new-sequenciamento" style="display: none;">
                <div class="row">
                    <button type="button" class="btn btn-outline btn-danger" id="cancelBtn">Cancelar</button>
                    <div class="col-lg-12">
                        <h1 class="page-header">Novo Sequenciamento</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form role="form">
                                    <div class="form-group">
                                        <label>Tipo Sequenciamento</label>
                                        <div class="radio" style="display: inline-block;">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">Único
                                            </label>
                                        </div>
                                        <div class="radio" style="display: inline-block;">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Múltiplo
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <input class="form-control" placeholder="Exemplo: Sequenciamento Sapo na Lagoa">
                                    </div>
                                    <div class="form-group">
                                        <label>Pesquisador</label>
                                        <select class="form-control">
                                            <option>Pesquisador 1</option>
                                            <option>Pesquisador 2</option>
                                            <option>Pesquisador 3</option>
                                            <option>Pesquisador 4</option>
                                            <option>Pesquisador 5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Observações</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Eletroferogramas</label>
                                        <input type="file">
                                    </div>
                                    <div class="form-group">
                                        <label>Nucleotídicas</label>
                                        <input type="file">
                                    </div>
                                    <div class="form-group">
                                        <label>Mapa da Placa</label>
                                        <input type="file">
                                    </div>
                                    <button type="submit" class="btn btn-default">Enviar</button>
                                    <button type="reset" class="btn btn-default">Cancelar</button>
                                </form>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            <div>
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
