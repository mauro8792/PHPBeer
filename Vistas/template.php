<?php namespace Vistas;


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BeerCharge</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href= "/BeerChargeCopia/Vistas/css/bootstrap.min.css" rel="stylesheet">
  <link href='/BeerChargeCopia/Vistas/images/favicon.png' rel='shortcut icon' type='image/png'/>
  <script src="/BeerChargeCopia/Vistas/js/jquery.js"></script>
  <script src="/BeerChargeCopia/Vistas/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      position: relative;
      margin-bottom: 0;
      border-radius: 0;
      background: rgba(0, 0, 0, 0.8);
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
      padding-top: 
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background: rgba(0, 0, 0, 0.8);
      color: grey;
      position: fixed;
      left:0px;
      bottom:0px;
      height:30px;
      width:100%;

    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }

    .boton {
      background: rgba(135,101,15,1);
background: -moz-linear-gradient(left, rgba(135,101,15,1) 0%, rgba(140,87,7,1) 44%, rgba(41,26,2,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(135,101,15,1)), color-stop(44%, rgba(140,87,7,1)), color-stop(100%, rgba(41,26,2,1)));
background: -webkit-linear-gradient(left, rgba(135,101,15,1) 0%, rgba(140,87,7,1) 44%, rgba(41,26,2,1) 100%);
background: -o-linear-gradient(left, rgba(135,101,15,1) 0%, rgba(140,87,7,1) 44%, rgba(41,26,2,1) 100%);
background: -ms-linear-gradient(left, rgba(135,101,15,1) 0%, rgba(140,87,7,1) 44%, rgba(41,26,2,1) 100%);
background: linear-gradient(to right, rgba(135,101,15,1) 0%, rgba(140,87,7,1) 44%, rgba(41,26,2,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#87650f', endColorstr='#291a02', GradientType=1 );
    }

.centered-form{
  margin-top: 40px;

}

.centered-form .panel{
  background: rgba(255, 255, 255, 0.8);
  box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}

label.label-floatlabel {
    font-weight: bold;
    color: #46b8da;
    font-size: 11px;
} 
  </style>
</head>
<body>

<img id="estirada" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%" src="/BeerChargeCopia/Vistas/images/ladrilloOscuro.jpg" /> 
<header>
        <nav class="navbar navbar-inverse" role="banner" style="width: 100%">
            <div id='wrapper' class="container">
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                      <!-- <?php// if ($_SESSION['rol']=='Administrador' or $_SESSION['rol']=='Empleado') {?> -->
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" >Personal <span class="caret"></span></a>
                             <ul class="dropdown-menu">
                                <li><a href="">Nueva Empleado</a></li>
                                <li><a href="">Consultar Empleados</a></li>
                            </ul>
                        </li> <!--  cierra el dropdown  !-->
                        
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="B" >Envases <span class="caret"></span></a>
                             <ul class="dropdown-menu">
                                <li><a href="<?php echo DIR. 'envase/ingresarEnvase'?>">Nueva Envase</a></li>
                                <li><a href="<?php echo DIR. 'envase/listarEnvases'?>">Consultar Envases</a></li>
                                
                            </ul>
                        </li> <!--  cierra el dropdown  !-->
                        
                  

                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="" >Cervezas <span class="caret"></span></a>
                             <ul class="dropdown-menu">
                                <li><a href="<?php echo DIR . 'cerveza/ingresarCerveza'?>">Nueva Cerveza</a></li>
                                <li><a href="<?php echo DIR . 'cerveza/listarCervezas'?>">Consultar Cervezas</a></li>
                                <li><a href="<?php echo DIR . 'cerveza/listarCliCervezas'?>">Consultar Cervezas para clientes</a></li>
                            </ul>
                        </li> <!--  cierra el dropdown  !-->    
                        </li><li class="dropdown">
                             <a class="dropdown-toggle" data-toggle="dropdown" href="#" >Sucursales <span class="caret"></span></a>
                             <ul class="dropdown-menu">
                                <li><a href="<?php echo DIR . 'sucursal/ingresarSucursal'?>">Nueva Sucursal</a></li>
                                <li><a href=" <?php echo DIR . 'sucursal/listarSucursales' ?>">Consultar Sucursal</a></li>
                               <!-- <li><a href="../envase/buscarPorNombre">Buscar envase</a></li> -->
                            </ul>
                        </li>
                        
                       <!-- <?php 
                            //} 
                        ?> -->

                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="B" >Pedido <span class="caret"></span></a>
                             <ul class="dropdown-menu">
                                <li><a href="<?php echo DIR. 'pedido/elegirCerveza'?>">Nuevo Pedido</a></li>
                                <li><a href="<?php echo DIR. 'pedido/verPedido'?>">Consultar Pedido</a></li>
                                
                            </ul>
                        </li> <!--  cierra el dropdown  !-->                 
                      
                        <li class="dropdown">
                            <a href="../login/logout" class="dropdown-toggle" data-toggle="dropdown"><?php
                            if(isset($_SESSION['user'])){
                             echo $_SESSION['user'];?><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo DIR . 'login/logout'?>">Cerrar Sesion</a></li>
                                <li><a href="#">Configuracion</a></li>
                            <?php
                          }?>
                            </ul>
                        </li>  <!--  cierra el dropdown  !-->

                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
</header>



<footer id="footer" class= "navbar-fixed-bottom midnight-blue" style="padding-bottom: 20px">
        <div class="container ">
            <div class="row">
                <div class="col-md-5">
                    &copy; 2017 <a target="_blank" href="#" title="sarasa">Laboratorio 4</a>. All Rights Reserved.
                </div>
                <div class="col-md-4">
                    <a href="#">Home | </a>
                    <a href="#">Sobre nosotros | </a>
                    <a href="#">Contactanos</a>
                </div>
            </div>
        </div>
    </footer>
<script type="text/javascript">
<!--
function CargarFoto(img, ancho, alto){
  derecha=(screen.width-ancho)/2;
  arriba=(screen.height-alto)/2;
  string="toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width="+ancho+",height="+alto+",left="+derecha+",top="+arriba+"";
  fin=window.open(img,"",string);
}
// -->
</script>
