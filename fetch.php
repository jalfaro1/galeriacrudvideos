

<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM dataporn ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE title LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR category LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY id DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$thumbnail = '';
	if($row["thumbnail"] != '')
	{
		$thumbnail = '<a href="'.$row["content"].'" data-fancybox="video-gallery"><img src="'.$row["thumbnail"].'" class="img-thumbnail" width="70" height="55" /></a>';
	}
	else
	{
		$thumbnail = '';
	}
	$sub_array = array();
	$sub_array[] = $thumbnail;
	$sub_array[] = $row["title"];
	$sub_array[] = $row["category"];

	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>