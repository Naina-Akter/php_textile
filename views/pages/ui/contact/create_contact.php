<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbContactCatagoryId"])){
		$errors["contact_catagory_id"]="Invalid contact_catagory_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtContactNo"])){
		$errors["contact_no"]="Invalid contact_no";
	}
	if(!is_valid_email($_POST["txtEmail"])){
		$errors["email"]="Invalid email";
	}

*/
	if(count($errors)==0){
		$contact=new Contact();
		$contact->name=$_POST["txtName"];
		$contact->contact_catagory_id=$_POST["cmbContactCatagoryId"];
		$contact->contact_no=$_POST["txtContactNo"];
		$contact->email=$_POST["txtEmail"];

		$contact->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="contacts">Manage Contact</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='create-contact' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName"]);
	$html.=select_field(["label"=>"Contact Catagory","name"=>"cmbContactCatagoryId","table"=>"contact_catagories"]);
	$html.=input_field(["label"=>"Contact No","type"=>"text","name"=>"txtContactNo"]);
	$html.=input_field(["label"=>"Email","type"=>"text","name"=>"txtEmail"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
