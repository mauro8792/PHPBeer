<?php namespace Vistas;
	
?>
<section style="margin-bottom: 50px">
		<div class="container">
        	<div class="row centered-form">
		        <div class="col-md-10 col-md-offset-1">
		        	
					<?php 
					foreach ($sucursales as $i) {
						
					?>
					<form role="form" method="POST"  action="<?php echo DIR . 'pedido/finalizarPedido'; ?>" enctype="multipart/form-data">
						<div class="col-md-3" style="border: 2px" align="center">
							
							<div class="form-group" align="center">
								
								<h3 style="color: white"><?php echo $i['direccion']?></h3>	
								<h3 style="color: white">  Tel:<?php echo $i['telefono']?> </h3>	
								 <a href="<?php echo  $i['ubicacion'] ; ?> " target='_blank'>	
								 <img src="<?php echo DIR . $i['foto'] ; ?> " width='200' ></a>
									
								<input type="hidden" name="idSucursal" value='<?php echo $i['idSucursal']; ?>'>
							</div>
							
							<input type="submit" class="btn btn-primary btn-block" style="color: white" value="Aquí" height="50">		
						</div>

					</form>
					<?php
						}
					?>
			   </div>
		    </div>

		</div>
</section>