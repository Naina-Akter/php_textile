<?php
if(isset($_POST["btnDetails"])){
	$task=Task::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="Tasks">Manage Task</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>Task Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$task->id</td></tr>";
		$html.="<tr><th>Name</th><td>$task->name</td></tr>";
		$html.="<tr><th>Task Types Id</th><td>$task->task_types_id</td></tr>";
		$html.="<tr><th>Department Id</th><td>$task->department_id</td></tr>";
		$html.="<tr><th>Duration</th><td>$task->duration</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
