<?php
if(isset($_POST["btnDetails"])){
	$production=Production::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="production">Manage Production</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>Production Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$production->id</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
