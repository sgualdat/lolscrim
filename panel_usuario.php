<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Scrim League</title>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

   <?php
    /*//Control de Seguridad
    include("12e47baJKD93153mS0zBsD3sQVfC.php");
    if (empty($_GET['encrypt'])){
         header('Location: index.php'); 
              }
    else{
    $encript1=urlencode($_GET["encrypt"]);
    $encript=desencriptarSocio($encript1);
    $link = mysqli_connect("127.0.0.1","root","","atletismoboston");
    $resultado=$link->query("SELECT * FROM `socios` WHERE `DNI` = '$encript'");
    $row=mysqli_fetch_array($resultado);
        if(empty($row)){
           header('Location: index.php');
        }
        else{
        $idSocio=$row["idSocios"];
        }
    }*/
    ?>

<body>

    <?php

        function addNoticia($id){
            $link = mysqli_connect("127.0.0.1","root","","atletismoboston");

            //Recogida de valores
            $idSocio=$id;
            $titulo=$_POST["titulo"];
            $noticia=$_POST["noticia"];

            //Acceder a la base de datos
            $resultado=$link->query("SELECT * FROM `noticias`");
            $num_noticias = $resultado->num_rows;
            $idnoticia=$num_noticias+1;

            $link->query("INSERT INTO `noticias`(`idNoticias`,`Noticia`, `Titulo`, `Estado` , `Socios_idSocios`) VALUES ('$idnoticia','$noticia','$titulo','Activado','$idSocio')");

            //Redireccionar
            $temp=urlencode($_GET["encrypt"]);
            ?>
                  <script type=text/javascript> 
                          window.location.href = 'panel_usuario.php?encrypt=<?php echo $temp;?>'; 
                  </script>
            <?php

            }

    ?>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand"><img src="images/logo1.jpg"></img></a>
            </div>
            <!-- /.navbar-header -->

            <div class="navbar-right" style="margin-right: 0">
                <a class="navbar-brand">Bienvenido 
                <?php printf ("%s\n", $row["Nombre"]);?>
                <?php printf ("%s\n", $row["Apellidos"]);?>
                </a>
            </div>


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="panel_usuario.php?encrypt=<?php echo $encript1;?>"><i class="fa fa-dashboard fa-fw"></i> Panel de Control</a>
                        </li>
                        <li>
                            <a href="lista_carreras.php?encrypt=<?php echo $encript1;?>"><i class="fa fa-user fa-fw"></i> Carreras<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tienda_productos.php?encrypt=<?php echo $encript1;?>"><i class="fa fa-shopping-cart fa-fw"></i> Pedidos de Material<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="noticias_usuario.php?encrypt=<?php echo $encript1;?>"><i class="fa fa-newspaper-o fa-fw"></i> Noticias<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="cuotas_socio.php?encrypt=<?php echo $encript1;?>"><i class="fa fa-dashboard fa-fw"></i> Pagos</a>
                        </li>
                        <li>
                            <a href="ajuste_usuario.php?encrypt=<?php echo $encript1;?>"><i class="fa fa-wrench fa-fw"></i> Ajustes<span class="fa arrow"></span></a>
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
                    <h1 class="page-header">Panel de Control</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                <div class="panel panel-default">
                        <div class="panel-heading">
                             Entrada de Noticia
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <?php
                              if(isset($_POST['aceptar'])){
                                  addNoticia($idSocio);
                               }
                            ?>
                                <form class="form-horizontal" method="post">
                                <fieldset>

                                <!-- Text input-->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="titulo">Titulo</label>  
                                  <div class="col-md-4">
                                  <input id="titulo" name="titulo" type="text" placeholder="" class="form-control input-md" required="">
                                    
                                  </div>
                                </div>

                                <!-- Textarea -->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="noticia">Noticia</label>
                                  <div class="col-md-4">                     
                                    <textarea class="form-control" id="noticia" name="noticia"></textarea>
                                  </div>
                                </div>

                                <!-- Button -->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="aceptar"></label>
                                  <div class="col-md-4">
                                    <button id="aceptar" name="aceptar" class="btn btn-primary">Publicar</button>
                                  </div>
                                </div>

                                </fieldset>
                                </form>

                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Propuestas de Carreras Disponibles
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            

                            <table class="table table-striped custab">
                                <thead>

                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Fecha</th>
                                        <th>Lugar</th>
                                        <th>Web</th>
                                        <th>Precio</th>
                                        <th>Fecha de Cierre</th>
                                    </tr>
                                </thead>
                                <?php
                                    $link = mysqli_connect("127.0.0.1","root","","atletismoboston");
                                    $resultado=$link->query("SELECT * FROM `propuesta_carreras`");
                                    $num_carreras = $resultado->num_rows;
                                    for ($i=1; $i <= $num_carreras; $i++) {
                                        $resultado1=$link->query("SELECT * FROM `propuesta_carreras` WHERE `idPropuesta_Carreras`='$i' AND `Estado`='Activado'");
                                        $resultado2=$link->query("SELECT * FROM `socios_has_propuesta_carreras` WHERE `Propuesta_Carreras_idPropuesta_Carreras`= '$i' AND `Socios_idSocios`= '$idSocio'");
                                        $row=mysqli_fetch_array($resultado1);
                                        $row1=mysqli_fetch_array($resultado2);
                                        if(!empty($row) && empty($row1)){
                                            //Comparacion de tiempo
                                             $localtime = date("Y-m-d");
                                             $fecha_cierre=$row["Fecha_Cierre"];
                                             if($localtime < $fecha_cierre){
                                ?>
                                        <tr>
                                            <td><?php printf ("%s\n", $row["idPropuesta_Carreras"]);?></td>
                                            <td><?php printf ("%s\n", $row["Nombre"]);?></td>
                                            <td><?php printf ("%s\n", $row["Fecha"]);?></td>
                                            <td><?php printf ("%s\n", $row["Lugar"]);?></td>
                                            <td><?php printf ("%s\n", $row["Web"]);?></td>
                                            <td><?php printf ("%s\n", $row["Precio"]);?></td>
                                            <td><?php printf ("%s\n", $row["Fecha_Cierre"]);?></td>
                                        </tr>

                                <?php
                                            }
                                        }
                                    }
                                ?>
                                </table>

                        </div>
                        <!-- /.panel-body -->
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Pedidos Disponibles
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <table class="table table-striped custab">
                            <thead>


                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Fecha de Cierre</th>
                                    <th>Precio</th>
                                    <th>Web</th>
                                </tr>
                            </thead>
                            <?php
                                $link = mysqli_connect("127.0.0.1","root","","atletismoboston");
                                $resultado=$link->query("SELECT * FROM `pedidos_material`");
                                $num_pedidos = $resultado->num_rows;
                                for ($i=1; $i <= $num_pedidos; $i++) {
                                    $resultado1=$link->query("SELECT * FROM `pedidos_material` WHERE `idPedidos_Material`='$i' AND `Estado`='Activado'");
                                    $resultado2=$link->query("SELECT * FROM `socios_has_pedidos_material` WHERE `Pedidos_Material_idPedidos_Material`= '$i' AND `Socios_idSocios`= '$idSocio'");
                                    $row=mysqli_fetch_array($resultado1);
                                    $row1=mysqli_fetch_array($resultado2);
                                    if(!empty($row) && empty($row1)){
                                        //Comparacion de tiempo
                                         $localtime = date("Y-m-d");
                                         $fecha_cierre=$row["Fecha_Cierre"];
                                         if($localtime < $fecha_cierre){
                             ?>
                                    <tr>
                                        <td><?php printf ("%s\n", $row["idPedidos_Material"]);?></td>
                                        <td><?php printf ("%s\n", $row["Nombre"]);?></td>
                                        <td><?php printf ("%s\n", $row["Fecha_Cierre"]);?></td>
                                        <td><?php printf ("%s\n", $row["Precio_Orientativo"]);?></td>
                                        <td><?php printf ("%s\n", $row["Web_Producto"]);?></td>
                                    </tr>
                            <?php
                                    }
                                }
                            }
                            ?>
                            </table>

                        </div>
                        <!-- /.panel-body -->
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Cuotas Disponibles
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>


                </div>
                <!-- /.col-lg-8 -->

            </div>
            <!-- /.row -->
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
