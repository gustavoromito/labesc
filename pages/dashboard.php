<!DOCTYPE html>
<html lang="en">

<?php include("../php/head.php"); ?>

<body>

    <div id="wrapper">
    	<!-- include navigation.php -->
    	<?php include("../php/navigation.php"); ?>
    	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Opções
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Novo Sequenciamento...</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">Listar Sequenciamentos...</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>Sequenciamentos</div>
                                </div>
                            </div>
                        </div>
                        <a href="sequenciamentos.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Todos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> Linha do Tempo
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-badge"><i class="fa fa-check"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 horas atrás</small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Kaio editou o <a href="#">Sequenciamento #1234</a></p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
                                    </div>
                                    <div class="timeline-panel">
                                    	<div class="timeline-heading">
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 15 de Setembro de 2015</small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Leonardo Paladia criou o <a href="#">Sequenciamento #1234</a></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-badge danger"><i class="fa fa-bomb"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
											<p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 de Setembro de 2015</small>
                                            </p>
										</div>
                                        <div class="timeline-body">
                                            <p>Geraldo Jr. removeu o Sequenciamento #4321</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge success"><i class="fa fa-graduation-cap"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
											<p><small class="text-muted"><i class="fa fa-clock-o"></i> 10 de Setembro de 2015</small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Administrador adicionou novo usuário Matheus Pavanelli.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Painel de Notificações
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <a href="#" class="btn btn-default btn-block">Ver Alertas</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
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
