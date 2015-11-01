<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editar Usuário</title>

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
                    <h1 class="page-header">Editar Usuário</h1>
                </div>
            </div>
            <div class="col-lg-6 text-left" style="padding-bottom:15px;">
                    <label>Nome:</label>
                    <input class="form-control" placeholder="Nome Completo" value="Mateus Lourenção">
                    <label>Função:</label>
                    <select class="form-control">
                        <option>Professor</option>
                        <option>Pesquisador Visitante</option>
                        <option>Aluno Pós-Graduação</option>
                        <option>Aluno Graduação</option>
                    </select>
                    <label>E-mail:</label>
                    <input class="form-control" placeholder="E-mail" value="mateus.lourencao.dias@usp.br">
                    <label>Lattes:</label>
                    <input class="form-control" placeholder="Lattes" value="">
                    <label>Área de Pesquisa:</label>
                    <textarea class="form-control" rows="3" placeholder="Clique para inserir uma descrição sobre a área de atuação"></textarea>
            </div>
            <div class="row text-center">
                <img class="img-circle img-responsive img-center" src="../src/loren.jpg" style="width: 200px; height: 200px; margin-bottom: 10px;">
                <button type="button" class="btn btn-default">Alterar Foto</button>
            </div>
            <div class="row text-center">
                <button type="submit" class="btn btn-default">Salvar</button>
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
