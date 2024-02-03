<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <?php echo $row['id']; ?> <h4 class="modal-title" id="myModalLabel" style="margin-left: 134px;"><p align="center" >Editar Registro</p></h4><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">
			
			<form method="POST" action="EditarRegistro.php?id=<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Imagen:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nombres" value="<?php echo $row['thumbnail']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Titulo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="apellidos" value="<?php echo $row['title']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Descripcion:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="telefono" value="<?php echo $row['description']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Video:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="carrera" value="<?php echo $row['content']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Categoria:</label>
					</div>
					<div class="col-sm-10">
					
						
									<?
$mysqli = new mysqli('localhost', 'jalfaro', 'leny12', 'videodb');
?>
		<select    size="1"  class="form-control" name="pais" style="width:300px;" >
        <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
        <?php
          $query = $mysqli -> query ("SELECT DISTINCT category FROM dataporn");
		  
		  
          while ($row2 = mysqli_fetch_array($query)) {
			  
			
			  
			  
            echo '<option  value="'.$row2["category"].'">'.$row2["category"].'</option>';
          }
	
	  
        ?>
	  
	  
      </select>	
				
						
						
						
						
						
						
						
					</div>
				</div>
				
				
				
			<div class="row form-group">
					
						<img  style="width: 120px; height: 80px; margin-left: 50px;" src="<?php echo $row['thumbnail'];?>" >
				
					
						 <video  style="width:140px; height:80px;  margin-left: 80px; object-fit: cover;" src="<?php echo $row['content'];?>#t=20,50" autoplay muted controls  poster="<?php echo $row['thumbnail'];?>" preload="auto"></video>
					
				</div>
				
				
            
				
		
               
 		
			
				
            <div class="modal-footer"> 
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="editar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Actualizar Ahora</a>
			</form>
            

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Borrar Registro</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de Borrar el registro?</p>
				<h2 class="text-center"><?php echo $row['title'].' '.$row['id']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="BorrarRegistro.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Si</a>
            </div>

        </div>
    </div>
</div>


