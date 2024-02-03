

	 <?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../admin/login.php");
    exit;
}
?>




<?php require('config.php');

include_once('dbconect.php');

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Datatable</title>
<link rel="shortcut icon" href="https://www.jose-aguilar.com/blog/wp-content/themes/jaconsulting/favicon.ico" />
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
<link rel="stylesheet" href="css/styles.css">
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>









<script type="text/javascript">
$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>
<style>
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
  padding: 0.55rem;
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
  width: 20px;
}

*,
::after,
::before {
  box-sizing: border-box;
}
	

        
</style>


</head>

<body>
<div class="container">
  <div class="row">
		<h4 class=""  align="right">Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido.<a href="logout.php" class="btn btn-danger ml-3">Salir</a></h4>
      <div id="header" class="col-lg-12">
       
		
        <form action="">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Admin </button>
          <div class="dropdown-menu"><a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Nuevo Registro</a>  <a class="dropdown-item" href="/fancybox-master/Simple filter.php">Simple filter</a> <a class="dropdown-item" href="/fancybox-master/admin/index.php">Admin</a> <a class="dropdown-item" href="/fancybox-master/hls-m3u8/index.php" target="_blank">M3u8 Player</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/fancybox-master/docs/demo.html" target="_blank" >Pruebas</a>
        </form>
     
      </p> </div>  </div>
		<?php 
	
	if(isset($_SESSION['message'])){
		?>
		<div class="alert alert-info text-center midiv" style="margin-top:20px;" id="">
			<?php echo $_SESSION['message']; ?>
		</div>
		<?php

		unset($_SESSION['message']);
	}
	
?>
    
	
    <div class="row">
		
		
		
		
		
        <div id="content" class="col-lg-12">
<?php
$result = $connexion->query(
    'SELECT * FROM dataporn WHERE id 
    ORDER BY id DESC LIMIT 100'
);
?>
<?php if ($result->num_rows > 0) { ?>
    <table id="datatable" class="table">
        <thead>
            <tr>
            <th>ID</th>
                <th>Imagen</th>
                <th>title</th>
                <th>description</th>
                <th>content</th>
                <th>category</th>
                
                <th style="width: 80px;">Acciones</th>
               
            </tr>
        </thead>
       <tbody id="myTable" > 
        
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
             <td><?php echo $row['id']; ?></td>
                <td><img class="img-fluid mx-auto" src="<?php echo $row['thumbnail']; ?>" width="70" height="50" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>"></td>
                <td><?php echo utf8_encode($row['title']); ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['content']; ?></td>
                <td><?php echo $row['category']; ?></td>
               
                <td >
                    <a class="btn btn-success btn-sm" href="<?php echo $row['content']; ?>" target="_blank"><i class="fa fa-eye"></i> </a>
					<a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><i class="fa fa-pencil-square"></i></a>
				   <a href="#delete_<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" name="delete"  id="delete"data-toggle="modal" ><i class="fa fa-trash"></i> </a>
                </td>
				
				
				
   <div id="myModal<?php echo $row['id']; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $row['title']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" align="center">
         <div class="embed-responsive embed-responsive-16by9">
                    <iframe id="cartoonVideo<?php echo $row['id']; ?>" class="embed-responsive-item" width="560" height="315" src="<?php echo $row['content'];?>#t=20,50" allowfullscreen></iframe>
                  </div>
        
        
        
        
        
        
        
         
          <?php echo $row['description']; ?>
          
        </div>
            </div>
        </div>
    </div>
 <?php include ('eliminaModal.php'); ?>
<?php include('BorrarEditarModal.php'); ?>
           </tr>
 <!-- The Modal -->
           
 <script>
$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
    var url = $("#cartoonVideo").attr('src');
    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#myModal<?php echo $row['id']; ?>").on('hide.bs.modal', function(){
        $("#cartoonVideo").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#myModal<?php echo $row['id']; ?>").on('show.bs.modal', function(){
        $("#cartoonVideo").attr('src', url);
    });
});
</script>
           
            
        
        
            
            
            
        <?php } ?>
        
       
        
      </tbody>  
    </table>
    
       
    <button class="toTop" id="toTop">
  <svg viewBox="0 0 24 24">
    <path d="m4 16 8-8 8 8"></path>
  </svg>
</button> 
    
  
    
<?php } ?>
       
   
    	
	
  
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


<?php include('AgregarModal.php'); ?>

    

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
