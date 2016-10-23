<!DOCTYPE html>
<html lang="en">

<?php include("../php/head.php"); ?>

<body>
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

        $("#sendBtn").click(function() {
            var name_input = $("#name_input").val();
            var email_input = $("#email_input").val();
            var comments_input = $("#comments_input").val();

            var params = 'name='+ name_input;
            params += '&email=' +  email_input;
            params += '&comments=' +  comments_input;

            post("../php/send_mail.php", params, function(response) {
                var obj = convertDataToJSON(response);
                alert(obj.message);
                if (obj.status == "200") {
                    location.reload();
                }
            });
        });

    });
</script>
    <div id="wrapper">
    	<!-- include navigation.php -->
    	<?php include("../php/navigation.php"); ?>
    	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12" style="text-align: center">
                    <img src="../src/labesc-logo.jpg" alt="LabEsC">
                </div>
            </div>

            <div class="col-lg-12">
                    <p>
                        <label>Nome:</label><br />
                        <input class='form-control' id='name_input' type='text'>
                    </p>

                    <p>
                        <label>E-mail:</label><br />
                        <input class='form-control' id='email_input' type='text'>
                    </p>

                    <p>
                        <label>Comentários:</label><br />
                        <textarea class='form-control' id='comments_input'></textarea>
                    </p>

                    <p>
                        <button type="button" style="float: right;" class="btn btn-outline btn-primary" id="sendBtn">Enviar</button>
                    </p>
                </form>
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

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
