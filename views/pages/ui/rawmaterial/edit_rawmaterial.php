<?php
if(isset($_POST["btnEdit"])){
	$rawmaterial=RawMaterial::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}

*/
	if(count($errors)==0){
		$rawmaterial=new RawMaterial();
		$rawmaterial->id=$_POST["txtId"];
		$rawmaterial->name=$_POST["txtName"];

		$rawmaterial->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="raw_materials">Manage RawMaterial</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-rawmaterial' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$rawmaterial->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$rawmaterial->name"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
