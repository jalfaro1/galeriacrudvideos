


 <div class="timeline grid row" style="
    margin-left: 6px;
">
 <?php
include("config.php");


if(isSet($_POST['lastmsg']))
{
$lastmsg=$_POST['lastmsg'];
	
$result=mysqli_query($bd,"select * from dataporn where id<'$lastmsg' order by id desc limit 18");
$count=mysqli_num_rows($result);
while($row=mysqli_fetch_array($result))
{
$msg_id=$row['id'];

	
	 $message='<img src="'.$row["thumbnail"].'" style="width:187px; height:150px;">';
	
?>


<li>
	 
<?php echo $message; ?>
	  
</li>


<?php
	
	

	
}


?>





<div align="justify" id="more<?php echo $msg_id; ?>" class="morebox" style="width: 100%;"> <a href="#" class="more" id="<?php echo $msg_id; ?>">Mostrar mas&nbsp;&nbsp;<?php echo $msg_id; ?></a></div>

<?php
}
?>
</div>



