<!DOCTYPE html>
<html lang="en">

<?php include("../php/head.php"); ?>
<?php include("../php/databaseManager.php"); ?>
<script>
    $(document).ready(function() {
        $("#cancelBtn").click(function (){
            $("#list-sequenciamento").show("fast");
            $("#new-sequenciamento").hide("fast");
        });

        $("#newBtn").click(function (){
            $("#list-sequenciamento").hide("fast");
            $("#new-sequenciamento").show("fast");
        });

        function post(url, data, success, fail)
        {
            $.post( url, data, function(datar) {
                typeof success === 'function' && success(datar);
            })
                .done(function() {
                    //alert( "second success" );
                })
                .fail(function(error) {
                    typeof fail === 'function' && fail(error);
                })
                .always(function() {
                    //alert( "finished" );
                });
        }

        $("#create-sequenciamento").click(function() {
            var first_name = $("#firstname").val();
            var data = 'first_name='+ first_name;
            post("../php/create-sequenciamento.php", data, function(response) {
                alert(response);
                console.log(response);
                var obj = convertDataToJSON(response);
                alert(obj.message);

            });
        });

        function convertDataToJSON(data) {
            try{
                var obj = jQuery.parseJSON(data);
                return obj;
            }
            catch(e){
                var obj = {
                    status: 0,
                    message: e.message
                };
                return obj;
            }
        }
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
                        <h1 class="page-header" style="margin-top: 20px;">Novo Sequenciamento</h1>
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
                                            <?php
//                                            $result = getAllUsers();
//                                            while ($row = $result->fetch_assoc()) {
//                                                echo '<option>' . $row['nome'] . '</option>';
//                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Observações</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                    <div id="fileUploader">Upload</div>
                                    <div class="form-group">
                                        <label>Eletroferogramas:</label>
                                        <input type="file" id="uploadEletro" name="files[]" data-url="../jQuery-File-Upload-9.11.2/server/php">
                                    </div>
                                    <div class="form-group">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <label>Nucleotídicas:</label>
                                            <input type="file" name="uploadNucleo" id="fileToUpload">
                                        </form>
                                    </div>
                                    <div class="form-group">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <label>Mapa da Placa:</label>
                                            <input type="file" name="uploadMapa" id="fileToUpload">
                                        </form>
                                    </div>
                                    <button type="submit" id="create-sequenciamento" class="btn btn-default">Enviar</button>
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



    <script src="../jQuery-File-Upload-9.11.2/js/vendor/jquery.ui.widget.js"></script>
    <script src="../jQuery-File-Upload-9.11.2/js/jquery.iframe-transport.js"></script>
    <script src="../jQuery-File-Upload-9.11.2/js/jquery.fileupload.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });

        $('#uploadEletro').fileupload({
            maxFileSize: 100000000,
            acceptFileTypes: /(\.|\/)(pdf|xlsx)$/i,
            singleFileUploads: true,
            maxNumberOfFiles: 1,
            dataType: 'json',
            done: function (e, data) {
                console.log(JSON.stringify(data, null, 2));
                $.each(data.result.files, function (index, file) {
                    console.log(file.name);
//                    $('<p/>').text(file.name).appendTo(document.body);
                });
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                console.log(progress + "%");
            },
            fail: function(e, data) {
                console.log('Fail!');
            }
        });
    });
    </script>

</body>

</html>
