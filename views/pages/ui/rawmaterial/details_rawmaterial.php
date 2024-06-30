<?php
if(isset($_POST["btnDetails"])){
	$rawmaterial=RawMaterial::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="raw_materials">Manage RawMaterial</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>RawMaterial Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$rawmaterial->id</td></tr>";
		$html.="<tr><th>Name</th><td>$rawmaterial->name</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
