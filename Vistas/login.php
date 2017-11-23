<?php namespace Vistas;


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BeerCharge</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href= "/BeerChargeCopia/Vistas/css/bootstrap.min.css" rel="stylesheet">
  <link href= "/BeerChargeCopia/Vistas/images/favicon.png" rel='shortcut icon' type='image/png'/>
  <script src="/BeerChargeCopia/Vistas/js/jquery.js"></script>
  <script src="/BeerChargeCopia/Vistas/js/bootstrap.min.js"></script>
</head>
<style type="text/css">

.centered-form{
  margin-top: 180px;
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


</style>

<body class="body-background">
<div class="container">
	<img id="estirada" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%" src="/BeerChargeCopia/Vistas/images/ladrilloOscuro.jpg" />
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title"> Ingresar <small></small></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" method="POST" action="logueo">
			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" required="on" placeholder="Email">
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" required="on" placeholder="Password">
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<input type="submit" class="btn boton btn-block" style="color: white">
			    			<br>
			    			<div align="center">
			    			<a href="vistaRegistro">Registrarse</a>
			    		</div>
			    		</form>
			    		<br>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>

    <script type="text/javascript">
	$(function() {
  $('input').floatlabel({labelEndTop:0});
});</script>

</body>


</html>