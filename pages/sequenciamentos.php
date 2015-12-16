<!DOCTYPE html>
<html lang="en">

<?php include("../php/head.php"); ?>

<script>
    Date.prototype.toDateInputValue = (function() {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0,10);
    });

    $(document).ready(function() {
        $('#seq_date').val(new Date().toDateInputValue());

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

        $('input[type=radio][name=optionsRadios]').change(function() {
            if (this.value == 'unico') {
                $("#multiplo_only").hide();
            }
            else if (this.value == 'multiplo') {
                $("#multiplo_only").show();
            }
        });

        $("#create-sequenciamento").click(function() {
            var type = $('input[name=optionsRadios]:checked', '#select_seq_type').val();

            var eletro_upload = $('#eletro_upload').contents().find('#link').attr("link");
            var nucleo_upload = $('#nucleo_upload').contents().find('#link').attr("link");
            var mapa_upload = $('#mapa_upload').contents().find('#link').attr("link");

            var pesquisador_id = $('#pesquisador_select').find(":selected").val();
            var animal_id = $('#animal_select').find(":selected").val();

            var date = $('#seq_date').val();
            var obs = $("#seq_obs").val();
            var service = $("#seq_service").val();
            var num_seq = $("#seq_num").val();

            if (typeof eletro_upload === 'undefined') {
                alert("Você não fez o upload do Eletroferograma.");
                return;
            }

            if (typeof nucleo_upload === 'undefined') {
                alert("Você não fez o upload da Sequência Nucleotídica");
                return;
            }

            var params = 'type='+ type;
            params += '&eletro_path=' +  eletro_upload;
            params += '&nucleo_path=' + nucleo_upload;
            params += '&pesquisador_id=' + pesquisador_id;
            params += '&animal_id=' + animal_id;
            params += '&date=' + date;
            params += '&obs=' + obs;
            params += '&service=' + service;

            if (type == 'multiplo') { //sequenciamento multiplo
                if (typeof mapa_upload === 'undefined') {
                    alert("Você não fez o upload do Mapa da Placa.");
                    return;
                }
                params += '&mapa_path=' + mapa_upload;
                params += "&num_seq=" + num_seq;
            }

            post("../php/create-sequenciamento.php", params, function(response) {
                console.log(response);
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
                                Lista de todos Sequenciamentos Únicos do seu acesso
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-unico">
                                        <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Animal</th>
                                            <th>Pesquisador</th>
                                            <th>Serviço Utilizado</th>
                                            <th>Observações</th>
                                            <th>Eletroferograma</th>
                                            <th>Nucleotidicas</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $result = getAllUniqueSequenciamentos($user['id'], $user['professor_id'], $user['role_id']);
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr class="">
                                                        <td>' . $row['data']  .'</td>
                                                        <td>' . $row['animal_id'] .'</td>
                                                        <td>' . $row['pesquisador_id'] .'</td>
                                                        <td>' . $row['servico_utilizado'] .'</td>
                                                        <td>' . $row['observacoes'] .'</td>
                                                        <td><a class="glyphicon glyphicon-file" href="' . $row['eletroferograma'] .'" target="_blank"></a></td>
                                                        <td><a class="glyphicon glyphicon-file" href="' . $row['nucleotidicas'] .'" target="_blank"></a></td>
                                                      </tr>';
                                        }
                                        ?>
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

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lista de todos Sequenciamentos Múltiplos do seu acesso
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-multiplo">
                                        <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Animal</th>
                                            <th>Pesquisador</th>
                                            <th>Serviço Utilizado</th>
                                            <th>Observações</th>
                                            <th>Eletroferograma</th>
                                            <th>Nucleotidicas</th>
                                            <th>Mapa da Placa</th>
                                            <th>Numeo de Sequencias</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $result = getAllMultiSequenciamentos($user['id'], $user['professor_id'], $user['role_id']);
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<tr class="">
                                                        <td>' . $row['data']  .'</td>
                                                        <td>' . $row['animal_id'] .'</td>
                                                        <td>' . $row['pesquisador_id'] .'</td>
                                                        <td>' . $row['servico_utilizado'] .'</td>
                                                        <td>' . $row['observacoes'] .'</td>
                                                        <td><a class="glyphicon glyphicon-file" href="' . $row['eletroferograma'] .'" target="_blank"></a></td>
                                                        <td><a class="glyphicon glyphicon-file" href="' . $row['nucleotidicas'] .'" target="_blank"></a></td>
                                                        <td><a class="glyphicon glyphicon-file" href="' . $row['mapa_placa'] .'" target="_blank"></a></td>
                                                        <td>' . $row['numero_sequencias'] .'</td>
                                                      </tr>';
                                            }
                                        ?>
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
                                    <div class="form-group" id="select_seq_type">
                                        <label>Tipo Sequenciamento</label>
                                        <div class="radio" style="display: inline-block;">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="radio_unico" value="unico" checked="">Único
                                            </label>
                                        </div>
                                        <div class="radio" style="display: inline-block;">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="radio_multiplo" value="multiplo">Múltiplo
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Coleção</label>
                                        <select class="form-control" id="animal_select">
                                            <?php
                                            $result = getAllAnimals();
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row['id'] . '">' . $row['numero_smrp'] . " - " . $row['nome'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Serviço Utilizado</label>
                                        <input class="form-control" id="seq_service">
                                    </div>
                                    <div class="form-group">
                                        <label>Pesquisador</label>
                                            <?php
                                            $disabled = "";
                                            if (isAluno($user['role_id'])) {
                                                $disabled = "disabled";
                                            }
                                            echo '<select class="form-control" id="pesquisador_select" '.$disabled.'>';
                                            $result = getAllUsers();
                                            while ($row = $result->fetch_assoc()) {
                                                $selected = "";
                                                if ($user['id'] == $row['id']) { $selected = "selected"; }
                                                echo '<option value="' . $row['id'] . '" '.$selected. '>' . $row['nome'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Observações</label>
                                        <textarea class="form-control" rows="3" id="seq_obs"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Data do Sequenciamento</label>
                                        <input class="form-control" id="seq_date" type="date">
                                    </div>

                                    <div class="form-group">
                                        <label>Eletroferograma</label>
                                        <iframe style="width:100%; height:130px; border:none; " id="eletro_upload" src="../uploader/"></iframe>
                                    </div>

                                    <div class="form-group">
                                        <label>Sequência Nucleotídica</label>
                                        <iframe style="width:100%; height:130px; border:none; " id="nucleo_upload" src="../uploader/"></iframe>
                                    </div>

                                    <div id="multiplo_only" class="panel-body" style="display: none;">
                                        <div class="form-group">
                                            <label>Mapa da Placa</label>
                                            <iframe style="width:100%; height:130px; border:none; " id="mapa_upload" src="../uploader/"></iframe>
                                        </div>

                                        <div class="form-group">
                                            <label>Número de Sequências</label>
                                            <input type="number" class="form-control" id="seq_num">
                                        </div>
                                    </div>
                                    <button type="submit" id="create-sequenciamento" class="btn btn-default">Enviar</button>
                                    <button type="reset" class="btn btn-default">Cancelar</button>
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

    <script>
    $(document).ready(function() {
        $('#dataTables-unico').DataTable({
            responsive: true
        });

        $('#dataTables-multiplo').DataTable({
                responsive: true
        });

    });
    </script>

</body>

</html>
