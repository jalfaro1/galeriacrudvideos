<html>
<head>
<title>Buscador simple en PHP</title>
</head>
<body>
<form action="buscar.php" method="post">
Buscar: <input name="palabra">
<input type="submit" name="buscador" id="buscador" value="Buscar">
</form>
<?
if($_POST['buscador'])
{
// Tomamos el valor ingresado
$buscar = $_POST["palabra"];

// Si está vacío, lo informamos, sino realizamos la búsqueda
if(empty($buscar))
{
echo "No se ha ingresado una cadena a buscar";
}else{
// Conexión a la base de datos y seleccion de registros
$con=mysqli_connect('localhost','jalfaro','leny12');
$sql = "SELECT * FROM dataporn WHERE category like '$buscar' ORDER BY id DESC";
mysqli_select_db('videodb', $con);

$result = mysqli_query($sql, $con);

// Tomamos el total de los resultados
$total = mysqli_num_rows($result);

// Imprimimos los resultados
if ($row = mysql_fetch_array($result)){
echo "Resultados para: <b>$buscar</b>";
do {
?>
<p><b><a href="buscar.php?id=<?=$row['id'];?>"><?=$row['category'];?></a></b></p>
<?
} while ($row = mysql_fetch_array($result));
echo "<p>Resultados: $total</p>";
} else {
// En caso de no encontrar resultados
echo "No se encontraron resultados para: <b>$buscar</b>";
}
}
}
?>
</body>
</html>