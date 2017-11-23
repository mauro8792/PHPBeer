<?php namespace Vistas;
	
	
?>

<section style="margin-bottom: 50px" >
		<div class="container">
        	<div class="row centered-form">
		        <div class="col-md-10 col-md-offset-1" style="color:#FFFFFF">
		        	<div >
		        		
					  	<table class="table table-inverse"  border="0">
							<thead>
								<tr>
									<th width="100px"><h3>Nombre</h3></th>
									<th width="35px"><h3>Descripcion</h3></th>
									<th width="90px"><h3>Precio Lt</h3></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($cervezas as $i) { ?>
									<tr>
										<td align="center"><img src="<?php echo DIR . $i['foto'] ; ?>" width='150' ><br><p align="center"><?php echo $i['nombre']; ?></p></td>
										<td><h4><?php echo $i['descripcion'] ; ?></h4></a></td>
										<td align="center"><h4><?php echo '$'.$i['precioLitro'] ; ?></h4></td>
										
									</tr> 
									<?php } ?>
							</tbody>
						</table>
			    	</div>
		    	</div>
		    </div>
    	</div>
</section>