<?php
if(isset($_POST["btnEdit"])){
	$production=Production::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*

*/
	if(count($errors)==0){
		$production=new Production();
		$production->id=$_POST["txtId"];

		$production->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="production">Manage Production</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-production' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$production->id"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
