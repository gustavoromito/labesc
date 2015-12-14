<!DOCTYPE html>
<html lang="en">

<?php include("../php/head.php"); ?>
<?php include("../php/databaseManager.php"); ?>

<script>
    $(document).ready(function(){
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

        $('.remove-collection').click(function(){
            var remove = $(this).attr('collection_id');

            var data = 'id='+ remove;
            post("../php/remove-collection.php", data, function(response) {
                var obj = convertDataToJSON(response);
                alert(obj.message);
                if (obj.status == "200") {
                    location.reload();
                }
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
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="float: left; width: 80%;">Coleções</h1>
                    <a href="newcollection.php">
                        <button type="button" style="margin: 40px 0 20px; width: 15%; float: right;" class="btn btn-outline btn-primary" id="newBtn">Nova Coleção</button>
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
                                            <th style="text-align: center;">Nome</th>
                                            <th style="text-align: center;">Data de Inserção</th>
                                            <th style="text-align: center;">Código SRMP</th>
                                            <th style="text-align: center;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $collections = getAllCollections();
                                            while ($row = $collections->fetch_assoc()) {
                                                echo '<tr>
                                                        <td style="text-align: center;border-top: 0px solid #ddd;">'.$row['id'].'</td>
                                                        <td style="text-align: center;border-top: 0px solid #ddd;">'.$row['nome'].'</td>
                                                        <td style="text-align: center;border-top: 0px solid #ddd;">'.$row['data_coletado'].'</td>
                                                        <td style="text-align: center;border-top: 0px solid #ddd;">'.$row['numero_smrp'].'</td>
                                                        <td style="text-align: center;border-top: 0px solid #ddd;" collection_id="'. $row['id'] . '"class="glyphicon glyphicon-remove-circle remove-collection"></td>
                                                    </tr>';
                                            }
                                        ?>
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
