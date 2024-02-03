<!-- Modal elimina registro -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
              
                <center><h4 class="modal-title" id="myModalLabel">Borrar Registro</h4></center>  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
              <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de Borrar el registro? <?php echo $row['id']; ?></p>
				<h2 class="text-center"><?php echo $row['title']; ?><br /><?php echo $row['description']; ?></h2>
			</div>

            <div class="modal-footer">
                <form action="BorrarRegistro.php?id=<?php echo $row['id']; ?>" method="post">

                    <input type="hidden" name="id" id="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="delete" id="delete" class="btn btn-danger">Eliminar</button>
                </form>
            </div>

        </div>
    </div>
</div>