<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OnlyScrim</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="assets/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="assets/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="assets/images/logo3.png">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

   <?php
    //Control de Seguridad
    include("12e47baJKD93153mS0zBsD3sQVfC.php");
    if (empty($_GET['encrypt'])){
         header('Location: index.php'); 
              }
    else{
    $encript1=$_GET["encrypt"];
    $encript=desencriptarUsuario($encript1);
    $link = mysqli_connect("127.0.0.1","root","","db696349657");
    $resultado=$link->query("SELECT * FROM `usuario` WHERE `email` = '$encript'");
    $row=mysqli_fetch_array($resultado);
        if(empty($row)){
           header('Location: index.php');
        }
        else{
        $email=$row["email"];
        }
    }
    ?>

<body>


    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="assets/images/logo2.png"></img>
            </div>
            <!-- /.navbar-header -->

            <div class="navbar-right" style="margin-right: 0">
                <a class="navbar-brand">Bienvenido 
                <?php printf ("%s\n", $row["nombre_equipo"]);?>
                </a>
            </div>


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="agenda.php?encrypt=<?php echo urlencode($encript1);?>"><i class="fa fa-calendar fa-fw"></i> Agenda<span class="fa arrow"></a>
                        </li>
                        <li>
                            <a href="historial_partidos.php?encrypt=<?php echo urlencode($encript1);?>"><i class="fa fa-user fa-fw"></i> Tus partidos<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="solicitar_partido.php?encrypt=<?php echo urlencode($encript1);?>"><i class="fa fa-sign-in fa-fw"></i> Solicitar partido<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="partido_disponible.php?encrypt=<?php echo urlencode($encript1);?>"><i class="fa fa-calendar-o fa-fw"></i> Partidos disponibles<span class="fa arrow"></a>
                        </li>
                        <li>
                            <a href="ajustes.php?encrypt=<?php echo urlencode($encript1);?>"><i class="fa fa-wrench fa-fw"></i> Ajustes<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesion<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                <br>
                <div class="panel panel-default">
                        <div class="panel-heading">
                             <h3><i class="fa fa-calendar fa-fw"></i> Información personal</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        <form class="form-horizontal" method="POST" action="">
                        <fieldset>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="nombre_equipo">Nombre del equipo</label>  
                          <div class="col-md-4">
                          <input id="nombre_equipo" name="nombre_equipo" type="text" placeholder="" class="form-control input-md" required="" value="<?php echo $row["nombre_equipo"]?>">
                            
                          </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="elo">Division del equipo</label>
                          <div class="col-md-4">
                            <select id="elo" name="elo" class="form-control">
                              <option value="Bronce" <?php if($row["elo"]=="Bronce"){?> selected <?php } ?> >Bronce</option>
                              <option value="Plata" <?php if($row["elo"]=="Plata"){?> selected <?php } ?> >Plata</option>
                              <option value="Oro" <?php if($row["elo"]=="Oro"){?> selected <?php } ?> >Oro</option>
                              <option value="Platino" <?php if($row["elo"]=="Platino"){?> selected <?php } ?> >Platino</option>
                              <option value="Diamante" <?php if($row["elo"]=="Diamante"){?> selected <?php } ?> >Diamante</option>
                              <option value="Master" <?php if($row["elo"]=="Master"){?> selected <?php } ?> >Master</option>
                              <option value="Challenger" <?php if($row["elo"]=="Challenger"){?> selected <?php } ?> >Challenger</option>
                            </select>
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="email">Email de contacto</label>  
                          <div class="col-md-4">
                          <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required="" value="<?php echo $row["email"]?>">
                            
                          </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="modificardatos"></label>
                          <div class="col-md-4">
                            <center><button id="modificardatos" name="modificardatos" class="btn btn-primary">Modificar datos</button></center>
                          </div>
                        </div>

                        </fieldset>
                        </form>

                            
                        </div>
                        <!-- /.panel-body -->
                    </div>

                </div>
                <!-- /.col-lg-8 -->

            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                <br>
                <div class="panel panel-default">
                        <div class="panel-heading">
                             <h3><i class="fa fa-calendar fa-fw"></i> Modificar contraseña</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        <form class="form-horizontal" method="POST" action="">
                        <fieldset>

                        <!-- Password input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="password">Contraseña</label>
                          <div class="col-md-4">
                            <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
                            
                          </div>
                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="passwordconfirm">Confirmar contraseña</label>
                          <div class="col-md-4">
                            <input id="passwordconfirm" name="passwordconfirm" type="password" placeholder="" class="form-control input-md" required="">
                            
                          </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="changepassword"></label>
                          <div class="col-md-4">
                            <center><button id="changepassword" name="changepassword" class="btn btn-primary">Cambiar contraseña</button></center>
                          </div>
                        </div>

                        </fieldset>
                        </form>

                            
                        </div>
                        <!-- /.panel-body -->
                    </div>

                </div>
                <!-- /.col-lg-8 -->

            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="bower_components/raphael/raphael-min.js"></script>
    <script src="bower_components/morrisjs/morris.min.js"></script>
    <script src="js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
