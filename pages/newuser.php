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

        $('#selectRole').on('change', function (e) {
            var role_description = $(this).val();
            role_description = role_description.toLowerCase();
            if (role_description.indexOf("aluno") > -1) {
                $("#professor_picker").show();
            } else {
                $("#professor_picker").hide();
            }
        });

        $("#create-new-user").click(function() {
            var first_name = $("#firstname").val();
            var last_name = $("#lastname").val();
            var email = $("#email").val();
            var password = $("#password").val();
            var role_id = $('option:selected', $("#selectRole")).attr('roleid');
            var birthDate = $("#birthDate").val();
            var lattes = $("#lattes").val();
            var profile_pic = $('#perfil_pic_upload').contents().find('#link').attr("link");
            console.log(profile_pic);

            var data = 'first_name='+ first_name;
            data += '&last_name='+ last_name;
            data += '&email='+ email;
            data += '&password='+ password;
            data += '&role_id='+ role_id;
            data += '&birthDate='+ birthDate;
            data += '&lattes='+ lattes;
            data += "&profile_pic=" + profile_pic;

            post("../php/create-user.php", data, function(response) {
                console.log(response);
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
                    <h1 class="page-header">Novo Usuário</h1>
                </div>
            </div>
            <div class="col-lg-12 text-left" style="padding-bottom:15px;">
                    <label>Primeiro Nome:</label>
                    <input class="form-control" id="firstname" placeholder="Primeiro Nome">
                    <label>Sobrenome:</label>
                    <input class="form-control" id="lastname" placeholder="Sobrenome">
                    <label>Função:</label>
                    <select class="form-control" id="selectRole">
                        <?php
                        $result = getAllRoles();
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="'. $row['descricao'] .'" roleid="'. $row['id'] . '">' . $row['descricao'] . '</option>';
                        }
                        ?>
                    </select>
                    <div id="professor_picker" style="display: none;">
                        <label>Professor Associado:</label>
                        <select class="form-control" id="selectProfessor">
                            <?php
                            $result = getAllProfessors();
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="'. $row['id'] . '">' . $row['nome'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <label>E-mail:</label>
                    <input class="form-control" id="email" placeholder="E-mail">
                    <label>Senha:</label>
                    <input class="form-control" type="password" id="password" placeholder="">
                    <label>Data de Nascimento:</label>
                    <input class="form-control" id="birthDate" type="date" placeholder="">
                    <label>Lattes:</label>
                    <input class="form-control" id="lattes" placeholder="Lattes">
                    <label>Área de Pesquisa:</label>
                    <textarea class="form-control" rows="3" placeholder="Clique para inserir uma descrição sobre a área de atuação"></textarea>
                    <br><br>
                    <label>Selecione uma image de Perfil</label>
                    <iframe style="width:100%; height:100px; border:none; " id="perfil_pic_upload" src="../uploader/"></iframe>
            </div>
            <div class="row text-center" style="padding-bottom: 20px;">
                <button type="submit" class="btn btn-default" id="create-new-user">Criar Usuário</button>
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
