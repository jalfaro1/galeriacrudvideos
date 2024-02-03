<?php
include('config.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Twitter Style load more results.</title>
<link href="frame.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script type="text/javascript">
$(function() {
//More Button
$('.more').live("click",function() 
{
var ID = $(this).attr("id");
if(ID)
{
$("#more"+ID).html('<img src="moreajax.gif" />');

$.ajax({
type: "POST",
url: "ajax_more.php",
data: "lastmsg="+ ID, 
cache: false,
success: function(html){
$("ol#updates").append(html);
$("#more"+ID).remove();
}
});
}
else
{
$(".morebox").html('The End');

}


return false;


});
});

</script>
<style>
body
{
	font-family: Arial, 'Helvetica', sans-serif;
	color: #000;
	font-size: 15px;
	margin-left: 15px;
}
a { text-decoration:none; color:#0066CC}
a:hover {
	text-decoration: none;
	color: #0066cc
}
*
{ margin:0px; padding:0px }
ol.timeline
	{ list-style:none}ol.timeline li{ position:relative;border-bottom:1px #dedede dashed; padding:8px; }ol.timeline li:first-child{}
	.morebox
	{
	font-weight:bold;
	color:#333333;
	text-align:center;
	border:solid 1px #333333;
	padding:8px;
	margin-top:8px;
	margin-bottom:8px;
	-moz-border-radius: 6px;-webkit-border-radius: 6px;
	}
	.morebox a{ color:#333333; text-decoration:none}
	.morebox a:hover{ color:#333333; text-decoration:none}
	#container{margin-left:60px; width:580px }
	
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:active {
	text-decoration: none;
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

<body>
<div style="padding:4px; margin-bottom:10px; border-bottom:solid 1px #333333; width: 95%; "><h3>Tutorial Link <a href="http://9lessons.blogspot.com/2009/12/twitter-style-load-more-results-with.html">Click Here</a></h3>
</div>
<div id="myTable" style="width: 95%">
	
<ol class="timeline grid row" id="updates">
	
<?php
	
	
$sql=mysqli_query($bd,"select * from dataporn ORDER BY id DESC LIMIT 18");
	
	
	
	
	
	
while($row=mysqli_fetch_array($sql))
{
	

$msg_id=$row['id'];
 $message='<img src="'.$row["thumbnail"].'" style="width:187px; height:150px;">';
	
?>
<center>
  <li style="width: 95%">
    <?php echo $message; ?>
  </li>
</center>
<?php 

		



} ?>
	 
</ol>
	
<div id="more<?php echo $msg_id; ?>" class="morebox"style="width: 100%;">
<a href="#" class="more" id="<?php echo $msg_id; ?>">Mostrar mas&nbsp;&nbsp;<?php echo $msg_id; ?></a>
</div>
</div>
<button class="toTop" id="toTop" onClick="regrasr()">
  <svg viewBox="0 0 24 24">
    <path d="m4 16 8-8 8 8"></path>
  </svg>
</button>
	
	
<script>
    function regrasr(){
        window.history.back();
    }
</script>	
	
	
  
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
</body>
</html>
