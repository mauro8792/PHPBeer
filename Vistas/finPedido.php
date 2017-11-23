<?php namespace Vistas;
	//var_dump($sucursales);
	//echo $sucursales[1];
	foreach ($sucursales as $i) {
		//echo $i['direccion'];
	}

	$total=0;


 ?>
<div class="container">
 	
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Pedido <small></small></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" method="POST" action="?">
			    			<?php foreach ($cabecera as $i) { ?>
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label>Nombre</label>
			                			<input type="text" name="nombre" id="nombre" class="form-control input-sm floatlabel"  placeholder="<?php echo $i['nombre'] ?>" disabled>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label>Apellido</label>
			    						<input type="text" name="apellido" id="apellido" class="form-control input-sm" disabled placeholder="<?php echo $i['apellido'] ?>">
			    					</div>
			    				</div>
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label>Direccion</label>
			               				 <input type="text" name="direccion" id="direccion" class="form-control input-sm floatlabel" disabled placeholder="<?php echo $i['direccion'] ?>">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label>Telefono</label>
			    						<input type="text" name="telefono" id="telefono" class="form-control input-sm" disabled placeholder="<?php echo $i['telefono'] ?>">
			    					</div>
			    				</div>
			    			</div>
			    			<div class="form-group">
			    				<label>Direccion de la Sucursal</label>
			    				<input type="text" name="sucursal" id="sucursal" class="form-control input-sm" disabled placeholder=" <?php echo $sucursales[1] ?>">
			    			</div>
			    			<?php }  ?>
			    			<label>Productos</label>

			    			<div class="form-group">
			    				<table class="table table-inverse"  border="1">
											<thead>
												<tr>
													
													<th width="100px">Cerveza</th>
													<th width="35px">Envase</th>
													<th width="5px">Cantidad</th>
													<th width="5px">Precio Linea</th>
												<!--	<th width="5px">Total</th> -->
												</tr>
											</thead>
											<tbody>
									<?php
									if(!empty($lnPedido)){
											
										foreach ($lnPedido as $lineas) {
											$linea = $lineas->listar();

											//$idLn = $linea->getIdLineaPedido();
											$cerveza = $linea->devolverCerveza();
											$envase = $linea->devolverEnvase();
											$precioxenvase=$linea->getPrecioXenvase();
											$idCerveza = $cerveza[0]["idCerveza"];
											$nombreCerveza = $cerveza[0]["nombre"];
											$nombreEnvase  = $envase[0]['descripcion'];
											$cantidad = $linea->getCantidad();
											$precioLn = $linea->getPrecioLinea();
											$total=$total+$precioLn;
											
										
										
									
									?>
									<tr>
									<!--	<td><?php //echo $idLn?></td> -->
										<td><?php echo $nombreCerveza?></td>
										<td><?php echo $nombreEnvase?></td>
									<!--	<td><?php //echo $precioxenvase?></td> -->
										<td align="center"><?php echo $cantidad ?></td>
										<td><?php echo "$". $precioLn ?></td>
										
									</tr>
									<?php }
									  ?>
									
										<tr>
											<td colspan="4" align="center">Total: $<?php echo $total ?></td>
											<?php } ?>
										</tr>
									</tbody>
			    				</table>
			    			</div>

			    			
			    			
			    			<input type="submit" class="btn boton btn-block" style="color: white" value="Confirmar">
			    			
			    		</form>
			    		<form method="post" action="<?php echo DIR . 'pedido/verPedido'; ?>">
			    			<br>
			    			<input type="submit" class="btn boton btn-block" style="color: white" value="Regresar">
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