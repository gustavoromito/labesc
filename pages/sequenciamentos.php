<!DOCTYPE html>
<html lang="en">

<?php include("../php/head.php"); ?>
<?php include("../php/databaseManager.php"); ?>
<script>
    $(document).ready(function() {
        $("#fileUploader").uploadFile({
            url:"../jquery-upload-file-master/php/upload.php",
            multiple:false,
            dragDrop:false,
            maxFileCount:1,
            fileName:"testField",
            uploadStr:"Selecionar..."
        });

        $("#cancelBtn").click(function (){
            console.log("ENTROU");
            $("#list-sequenciamento").show("fast");
            $("#new-sequenciamento").hide("fast");
        });

        $("#newBtn").click(function (){
            console.log("AQUI");
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
        var last_name = $("#lastname").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var role_id = $('option:selected', $("#selectRole")).attr('roleid');
        var birthDate = $("#birthDate").val();
        var lattes = $("#lattes").val();

        var data = 'first_name='+ first_name;
        data += '&last_name='+ last_name;
        data += '&email='+ email;
        data += '&password='+ password;
        data += '&role_id='+ role_id;
        data += '&birthDate='+ birthDate;
        data += '&lattes='+ lattes;

            console.log("ENTROU AQUI");

            post("../php/create-sequenciamento.php", data, function(response) {
                alert(response);
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
                                            $result = getAllUsers();
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option>' . $row['nome'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Observações</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                    <div id="fileUploader">Upload</div>
                                    <div class="form-group">
                                        <form action="../php/uploadFile.php" method="post" enctype="multipart/form-data">
                                            <label>Eletroferogramas:</label>
                                            <input type="file" name="uploadEletro" id="uploadEletro">
                                        </form>
                                    </div>
                                    <div class="form-group">
                                        <form action="upload.php" method="post" enctype="multipart/form-data">
                                            <label>Nucleotídicas:</label>
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                            <input type="submit" value="Submeter Arquivo" name="submit">
                                        </form>
                                    </div>
                                    <div class="form-group">
                                        <form action="upload.php" method="post" enctype="multipart/form-data">
                                            <label>Mapa da Placa:</label>
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                            <input type="submit" value="Submeter Arquivo" name="submit">
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
