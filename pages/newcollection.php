<!DOCTYPE html>
<html lang="en">

<?php include("../php/head.php"); ?>

<script>
    $(document).ready(function() {
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

        $("#create-new-collection").click(function() {
            var title = $("#title_collection").val();
            var cod = $("#cod_srmp").val();
            var dt = $("#dt_collection").val();

            var data = 'title='+ title;
            data += '&codigo='+ cod;
            data += '&date='+ dt;


            post("../php/create-collection.php", data, function(response) {
                var obj = convertDataToJSON(response);
                alert(obj.message);
                if (obj.status == "200") {
                    window.location.href = "collection.php";
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
                    <h1 class="page-header">Nova Coleta</h1>
                </div>
            </div>
            <div class="col-lg-6 text-left" style="padding-bottom:15px;">
                    <label>Título:</label>
                    <input class="form-control" id="title_collection" placeholder="Título da Coleta">
                    <label>Código SRMP:</label>
                    <input class="form-control" id="cod_srmp" placeholder="Código SRMP">
                    <label>Data:</label>
                    <input class="form-control" type="date" id="dt_collection" placeholder="Data da Coleta">
                    <div class="row text-center" style="padding-bottom: 20px; margin-top: 10px;">
                        <button type="submit" class="btn btn-default" id="create-new-collection">Salvar</button>
                    </div>
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
