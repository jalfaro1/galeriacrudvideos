
	 <?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>GALERIA DE VIDEOS</title>
	
	  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	 <link rel="stylesheet" href="../estilos.css">
      <link rel="stylesheet"  href="../fancybox.css" />
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://stacksnippets.net/scripts/snippet-javascript-console.min.js?v=1"></script>
<style>
    table{
    table-layout: fixed;
    width: 250px;
}

th, td, barra-busqueda {
    border: 1px solid blue;
    width: 100px;
    word-wrap: break-word;
}
	
	
	.toTop {
  border: none;
  display: flex;
  right: 1rem;
  bottom: 1rem;
  position: fixed;
  z-index: 9999;
  cursor: pointer;
  transition: opacity 0.3s, transform 0.3s;
  background-color: #252525;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
  border-radius: 0.5rem;
  padding: 0.75rem;
  color: #fff;
}
.toTop:not(.is-visible) {
  pointer-events: none;
  opacity: 0;
  transform: translateY(-2rem);
}
.toTop svg {
  stroke-width: 3px;
  stroke: currentColor;
  fill: none;
  width: 24px;
}

*,
::after,
::before {
  box-sizing: border-box;
}
	

        
</style>	
	
</head>
<body translate="no">
<h4 class=""  align="right">Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido.<a href="logout.php" class="btn btn-danger ml-3">Salir</a></h4>
<nav class="navbar navbar-default">
	
  <h4  align="center">Administrador de galería</h4>
    <!-- Brand and toggle get grouped for better mobile display -->
    
  
  <!-- /.container-fluid --> 
</nav>
<div class="container">
	
	<div class="row">
		<div class="">
			<p><a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Nuevo Registro</a>&nbsp;<a href="http://localhost/fancybox-master/" class="btn btn-primary" >Galeria</a>&nbsp;<a href="http://localhost/fancybox-master/Simple filter.php" class="btn btn-primary" >Galeria 2</a>&nbsp;&nbsp;<a href="../datatable/index.php" class="btn btn-primary" >Tables</a>&nbsp;&nbsp;
		
				
				
			
      
        <span class="input-group-text">Filtrar</span>
     
      <input id="myInput" type="text" class="btn form-control" style="width: 400px;" placeholder="Busca..">
   	
				
				
				
				
				
			
			</p>
<?php 
	
	if(isset($_SESSION['message'])){
		?>
		<div class="alert alert-info text-center midiv" style="margin-top:20px;">
			<?php echo $_SESSION['message']; ?>
		</div>
		<?php

		unset($_SESSION['message']);
	}
	
?>
 		
 
 
 
 
 
 
 
 
 
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		
 
        
        
        
        
        
        
        
        
        
   <?php
	
$m = '';

if (empty($_POST["signo"])) {
$m = '';
  } else {
	 
     $m = $_POST["signo"];
	
  }
	
 ?>      
        
        
        
        
        <span class="input-group-text" >Operador</span>
		<select id="signo" name="signo" class="form-select form-select-sm mt-3" title="Operadores de comparación" data-toggle="popover" data-trigger="hover" data-content="se utilizan para comparar dos valores (número o cadena)">
      
		<option  value="<?php echo $m ?>" selected><?php echo $m ?></option>
      
<option  value="<"><</option>
<option value=">" >></option>
<option  value="=">=</option>
<option  value="==">==</option>			
	<option  value="<>"><></option>		
	<option  value="<="><=</option>	
		<option  value=">=">>=</option>
</select>
		
			<?php
	
$n = '';

if (empty($_POST["num"])) {
$n = '';
  } else {
	 
     $n = $_POST["num"];
	
  }
	
 ?>  
  <span class="input-group-text">Cantidad</span>
    <input type="number" id="num" name="num" min="1" max="3000" required value="<?php echo $n ?>" title="Operadores de comparación" data-toggle="popover" data-trigger="hover" data-content="diferentes tipos de datos (número o cadena)">
		
				<?php
	
$i = '';

if (empty($_POST["campo"])) {
$i = '';
  } else {
	 
     $i = $_POST["campo"];
	
  }
	
 ?>  
 	<span class="input-group-text">Campo</span>
		<select id="campo" name="campo" class="form-select form-select-sm mt-3" title="Campos" data-toggle="popover" data-trigger="hover" data-content="Seleccione el campo a buscar">
        
<option  value="<?php echo $i  ?>"><?php echo $i  ?></option>			
<option  value="id">Id</option>
<option value="title" >Titulo</option>
<option  value="description">Descripcion</option>
<option  value="content">Video</option>			
	<option  value="category">Categoria</option>		
	
</select>
		
		
			<?php
	
$o = '';

if (empty($_POST["orden"])) {
$o = '';
  } else {
	 
     $o = $_POST["orden"];
	
  }
	
 ?> 		
		
		<span class="input-group-text">Orden</span>
		<select id="orden" name="orden" class="form-select form-select-sm mt-3" title="Orden de registros" data-toggle="popover" data-trigger="hover" data-content="Ordena los datos">
	<option  value="<?php echo $o  ?>"><?php echo $o  ?></option>		
<option  value="ASC">ASC</option>
<option value="DESC" >DESC</option>

</select>
		
    <input type="submit" name="btnenviar" value="Operar" class="btn btn-success btn-sm">
    <input name="atraz" type="button" value="Atraz" onClick="regrasr()" class="btn btn-success btn-sm">
</form>






	
	<?php	
	 
if(isset($_POST['btnenviar'])){
	
    $m = $_POST['signo'];
    $n = $_POST['num'];
	$i = $_POST['campo'];
	
	$o = $_POST['orden'];
	
}
?>	
		
<script> 








function myFunction() {
 
 var rs = document.getElementById("panel").style="visibility: collapse";
    
  document.getElementById("panel").style="visibility: collapse";
  
  
  
}
function myFunction2() {
 var rs = document.getElementById("panel").style="visibility: collapse";
    
  document.getElementById("panel").style="visibility: collapse.false";


}



</script>		

		  
			
	<button onclick="document.getElementById('panel').style='visibility: collapse';">Ocultar</button>

<button onclick="myFunction2()">Mostrar</button>	
			
<table class="table table-bordered table-striped table-hover" style="margin-top:20px;">
<colgroup >
    
     <col id="panel" span="1">
  
  </colgroup>
	<thead>
		<th style="width: 25px;">ID</th>
		<th style="width: 60px;">Imagen</th>
		<th>Titulo</th>
		<th>Descripcion</th>
		<th>Url Video</th>
		<th style="width: 40px;">Categoria</th>
		<th style="width: 80px;">Acción</th>
	</thead>
	<tbody id="myTable" >
		<?php
			//incluimos el fichero de conexion
			include_once('dbconect.php');

			$database = new Connection();
			$db = $database->open();
			try{
				
				

if (empty($n)) {
	
 $sql = "SELECT * FROM dataporn WHERE id < 10 ORDER BY id ASC ";
  } else {
	 
     $sql = "SELECT * FROM dataporn WHERE $i $m '$n' ORDER BY $i $o ";
	

				 }
					
				
				foreach ($db->query($sql) as $row) {
					
					 
					
					?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><img  style="width: 120px; height: 80px;" src="<?php echo $row['thumbnail'];?>" data-toggle="modal" data-target="#myModalv<?php echo $row['id']; ?>"></td>
						<td><?php echo $row['title']; ?></td>
						<td><?php echo $row['description']; ?></td>
						<td><?php echo $row['content']; ?></td>
						<td><?php echo $row['category']; ?></td>
						<td><p>
							<a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Editar</a>
						 <a href="#delete_<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" name="delete"  id="delete" data-toggle="modal" ><i class="fa fa-trash"></i> Borrar</a></p>
						</td>
					
  
                       
                     
                         
                        
              <div class="modal fade" id="myModalv<?php echo $row['id']; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button  type="button" class="close" data-dismiss="modal" ><?php echo $row['id']; ?>&times;</button>
          <h4 class="modal-title"><?php echo $row['title']; ?> &nbsp;/&nbsp;Categoria:&nbsp;<?php echo $row['category']; ?></h4>
        </div>
        <div class="modal-body" align="center">
         <div class="embed-responsive embed-responsive-16by9">
                    <iframe id="cartoonVideo<?php echo $row['id']; ?>" class="embed-responsive-item" width="560" height="315" src="<?php echo $row['content'];?>#t=20,50" allowfullscreen></iframe>
                  </div>
        
        
        
        
        
        
        
         
          <?php echo $row['description']; ?>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>          
                        
     </div>                   
                        
                        
   
                        
	 <?php include ('eliminaModal.php'); ?>                                      
                    
                    	<?php include('BorrarEditarModal.php'); ?>		
						
						
					</tr>
		
	
			
  

<script>
$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
    var url = $("#cartoonVideo<?php echo $row['id']; ?>").attr('src');
    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#myModalv<?php echo $row['id']; ?>").on('hide.bs.modal', function(){
        $("#cartoonVideo<?php echo $row['id']; ?>").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#myModalv<?php echo $row['id']; ?>").on('show.bs.modal', function(){
        $("#cartoonVideo<?php echo $row['id']; ?>").attr('src', url);
    });
});
</script>    
	
					<?php 
				}
			}
			catch(PDOException $e){
				echo "Hubo un problema en la conexión: " . $e->getMessage();
			}

			//Cerrar la Conexion
			$database->close();

		?>
				</tbody>
			</table>
		
	
<?php include('AgregarModal.php'); ?>
	
  	
		
		
	<script>
    function regrasr(){
        window.history.back();
    }
</script>	
		
		
		


	
	<button class="toTop" id="toTop">
  <svg viewBox="0 0 24 24">
    <path d="m4 16 8-8 8 8"></path>
  </svg>
</button>
  
      <script id="rendered-js" >
// Subir
const toTop = (() => {
  let button = document.getElementById("toTop");
  window.onscroll = () => {
    button.classList[
    document.documentElement.scrollTop > 200 ? "add" : "remove"](
    "is-visible");
  };
  button.onclick = () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  };
})();
//# sourceURL=pen.js
    </script>
	
	<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();   
});
</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<script type="text/javascript">
//Funcion que hace desaparecer el div transcurridos 3000 milisegundos!
$(document).ready(function() {
    setTimeout(function() {
		// Declaramos la capa mediante una clase para ocultarlo
        $(".midiv").fadeOut(1500);
    },3000);
});

$(document).ready(function() {
	setTimeout(function() {
		// Declaramos la capa  mediante una clase para ocultarlo
        $(".midiv2").fadeIn(1500);
		// Transcurridos 5 segundos aparecera la capa midiv2
    },5000);
});

</script>




</body>
</html>