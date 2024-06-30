<?php
if(isset($_POST["btnDetails"])){
	$tasktype=TaskType::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="task_types">Manage TaskType</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>TaskType Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$tasktype->id</td></tr>";
		$html.="<tr><th>Name</th><td>$tasktype->name</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
