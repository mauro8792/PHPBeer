<?php namespace Vistas;

?>
<section style="margin-bottom: 50px">
		<div class="container">
        	<div class="row centered-form">
		        <div class="col-md-10 col-md-offset-1">
		        	
					<?php 
					foreach ($cervezas as $i) {
						
					?>
					<form role="form" method="POST"  action="<?php echo DIR . 'pedido/elegirEnvase'; ?>" enctype="multipart/form-data">
						<div class="col-md-3" style="border: 2px" align="center">
							
							<div class="form-group">
								<h3 style="color: white"><?php echo $i['nombre']?></h3>	
									
								<img src="<?php echo DIR . $i['foto'];?>" width='150' >		
									
								<input type="hidden" name="idCerveza" value='<?php echo $i['idCerveza']; ?>'>
							</div>
							
							<input type="submit" class="btn btn-primary btn-block" style="color: white" value="Agregar al Carrito" height="50">		
						</div>
					</form>
					<?php
						}
					?>
			   </div>
		    </div>
		</div>
</section>
