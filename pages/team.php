<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Equipe</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/round-about.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
    	<!-- include navigation.php -->
    	<?php include("../php/navigation.php"); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Equipe</h1>
                </div>
            </div>
            <div class="row">

              <!-- o container sera montado atraves de um template de forma dinamica-->
              <!-- adicionar um crop para o tamanho da imagem-->
                <div class="col-lg-4 col-sm-6 text-center" style="padding-bottom:15px;">
                  <img class="img-circle img-responsive img-center" src="../src/romito.jpg" alt="" style="width: 200px; height: 200px;">
                  <h3>Gustavo Romito</h3>
                  <h4>Administrador</h4>
                  <button type="button" class="btn btn-success btn-xs">Ver Perfil</button>
                </div>
                
                <div class="col-lg-4 col-sm-6 text-center" style="padding-bottom:15px;">
                  <img class="img-circle img-responsive img-center" src="../src/loren.jpg" alt="" style="width: 200px; height: 200px;">
                  <h3>Mateus Lourenção</h3>
                  <h4>Professor Doutor</h4>
                  <button type="button" class="btn btn-success btn-xs">Ver Perfil</button>
                </div>
                
                <div class="col-lg-4 col-sm-6 text-center" style="padding-bottom:15px;">
                  <img class="img-circle img-responsive img-center" src="../src/paladia.jpg" alt="" style="width: 200px; height: 200px;">
                  <h3>Leonardo Paladia</h3>
                  <h4>Professor</h4>
                  <button type="button" class="btn btn-success btn-xs">Ver Perfil</button>
                </div>

                <div class="col-lg-4 col-sm-6 text-center" style="padding-bottom:15px;">
                  <img class="img-circle img-responsive img-center" src="../src/pavanelli.jpg" alt="" style="width: 200px; height: 200px;">
                  <h3>Matheus Pavanelli</h3>
                  <h4>Professor Visitante</h4>
                  <button type="button" class="btn btn-success btn-xs">Ver Perfil</button>
                </div>
                
                <div class="col-lg-4 col-sm-6 text-center" style="padding-bottom:15px;">
                  <img class="img-circle img-responsive img-center" src="../src/kaio.jpg" alt="" style="width: 200px; height: 200px;">
                  <h3>Kaio Pedroza</h3>                
                  <h4>Aluno</h4>
                  <button type="button" class="btn btn-success btn-xs">Ver Perfil</button>
                </div>
                
                <div class="col-lg-4 col-sm-6 text-center" style="padding-bottom:15px;">
                  <img class="img-circle img-responsive img-center" src="../src/jr.jpg" alt="" style="width: 200px; height: 200px;">
                  <h3>Geraldo Júnior</h3>
                  <h4>Aluno Pós-Graduação</h4>
                  <button type="button" class="btn btn-success btn-xs">Ver Perfil</button>
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
