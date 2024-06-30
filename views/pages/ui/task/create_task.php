<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtTaskTypesId"])){
		$errors["task_types_id"]="Invalid task_types_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDepartmentId"])){
		$errors["department_id"]="Invalid department_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDuration"])){
		$errors["duration"]="Invalid duration";
	}

*/
	if(count($errors)==0){
		$task=new Task();
		$task->name=$_POST["txtName"];
		$task->task_types_id=$_POST["txtTaskTypesId"];
		$task->department_id=$_POST["txtDepartmentId"];
		$task->duration=$_POST["txtDuration"];

		$task->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="Tasks">Manage Task</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='create-task' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName"]);
	$html.=input_field(["label"=>"Task Types Id","type"=>"text","name"=>"txtTaskTypesId"]);
	$html.=input_field(["label"=>"Department Id","type"=>"text","name"=>"txtDepartmentId"]);
	$html.=input_field(["label"=>"Duration","type"=>"text","name"=>"txtDuration"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
