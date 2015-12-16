<!-- Navigation -->
<?
include("../php/authenticate.php");
include("../php/databaseManager.php");
$user;
if ($userIsLogged) {
    $result = getUserWithToken($token);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
}
?>

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./">LabEsC v1.0</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <?php
                        if ($userIsLogged) {
                            echo '<li><a href="../php/logout.php"><i class="fa fa-sign-out fa-fw sign-out-user"></i> Sair</a></li>';
                        } else {
                            echo '<li><a href="../pages/login.html"><i class="fa fa-sign-out fa-fw"></i> Entrar</a></li>';
                        }
                        ?>

                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <?php
            if ($userIsLogged) {
                echo '<p class="navbar-right" style="top: 15px; position: relative; color: #7D7979;">Seja Bem-Vindo, '.$user['primeiro_nome']. '</p>';
            }
            ?>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
<!--                        <li class="sidebar-search">-->
<!--                            <div class="input-group custom-search-form">-->
<!--                                <input type="text" class="form-control" placeholder="Search...">-->
<!--                                <span class="input-group-btn">-->
<!--                                <button class="btn btn-default" type="button">-->
<!--                                    <i class="fa fa-search"></i>-->
<!--                                </button>-->
<!--                            </span>-->
<!--                            </div>-->
<!--                            <!-- /input-group -->
<!--                        </li>-->
                        <li>
                            <a href="../index.html"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="team.php"><i class="fa fa-bar-chart-o fa-fw"></i> Equipe</a>
                        </li>
                        <li>
                            <a href="publications.php"><i class="fa fa-table fa-fw"></i> Publicações</a>
                        </li>
                        <li>
                            <a href="collection.php"><i class="fa fa-edit fa-fw"></i> Coleção SRMP</a>
                        </li>
                        <?php
                            if ($userIsLogged) {
                                echo '<li>
                                        <a href="dashboard.php"><i class="fa fa-wrench fa-fw"></i> Dashboard</a>
                                    </li>';
                            }
                        ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>