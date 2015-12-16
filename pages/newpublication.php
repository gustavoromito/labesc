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

        $("#create-new-publication").click(function() {
            var title = $("#title").val();
            var doi = $("#doi").val();
            var date = $("#data").val();
            var user_id = $('option:selected', $("#selectUser")).attr('user_id');

            var data = 'title='+ title;
            data += '&doi='+ doi;
            data += '&date='+ date;
            data += '&user_id='+ user_id;


            post("../php/create-publication.php", data, function(response) {
                console.log(response);
                var obj = convertDataToJSON(response);
                alert(obj.message);
                if (obj.status == "200") {
                    window.location.href = "publications.php";
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
                    <h1 class="page-header">Novo Usuário</h1>
                </div>
            </div>
            <div class="col-lg-12 text-left" style="padding-bottom:15px;">
                    <label>Título</label>
                    <input class="form-control" type="text" id="title" placeholder="Titulo da Publicação">
                    <label>DOI:</label>
                    <input class="form-control" id="doi" type="text" placeholder="DOI">
                    <label>Pesquisador:</label>
                    <select class="form-control" id="selectUser">
                        <?php
                        $result = getAllUsers();
                        while ($row = $result->fetch_assoc()) {
                            echo '<option user_id="'. $row['id'] . '">' . $row['nome'] . '</option>';
                        }
                        ?>
                    </select>
                    <label>Data de Publicação:</label>
                    <input class="form-control" type="date" id="data" placeholder="dd/mm/YYYY">
                <button type="submit" style="margin: 10px;" class="btn btn-default" id="cancel">Cancelar</button>
                <button type="submit" style="margin: 10px;" class="btn btn-default" id="create-new-publication">Criar Publicação</button>
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
