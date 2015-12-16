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

        $("#create-new-user").click(function() {
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

            post("../php/create-user.php", data, function(response) {
                var obj = convertDataToJSON(response);
                alert(obj.message);
                if (obj.status == "200") {
                    window.location.href = "team.php";
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
                    <input class="form-control" id="id_collection" placeholder="Título da Coleta">
                    <label>Código SRMP:</label>
                    <input class="form-control" id="cod_srmp" placeholder="Código SRMP">
                    <label>Data:</label>
                    <input class="form-control" type="date" id="dt_collection" placeholder="Data da Coleta">
                    <div class="row text-center" style="padding-bottom: 20px; margin-top: 10px;">
                        <button type="submit" class="btn btn-default" id="create-new-user">Salvar</button>
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
