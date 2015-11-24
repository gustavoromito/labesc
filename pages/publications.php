<!DOCTYPE html>
<html lang="en">

<?php include("../php/head.php"); ?>
<?php include("../php/databaseManager.php"); ?>

<body>

    <div id="wrapper">
    	<!-- include navigation.php -->
    	<?php include("../php/navigation.php"); ?>
    	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="float: left; width: 80%;">Publicações</h1>
                    <button type="button" style="margin: 40px 0 20px; width: 15%; float: right;" class="btn btn-outline btn-primary" id="newBtn">Nova Publicação</button>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                <?php
                $result = getAllPublications();
                while ($row = $result->fetch_assoc()) {
                    echo '<div style="background: rgba(211, 211, 211, 0.37); border-radius: 10px;">
                        <div style="padding: 10px;">
                            <h3 style="color: #3c763d; display: inline;">'. $row['title']. '</h3>
                            <h4 style="margin: 0px;color: #367CB8; display: inline; float: right;">DOI: ' . $row['DOI'] . '</h4>
                            <h4 style="color: #068E06;">Responsável: ' . getUserDetails($row['user_id'])['nome'] . '</h4>
                            <h5 style="color: #999;">Publicado em: ' . date("d/m/Y", strtotime($row['data'])) . '</h5>
                        </div>
                    </div>';
                }
                ?>
                </div>
                <!-- /.col-lg-12 -->
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
