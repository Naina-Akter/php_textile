<?php
if(isset($_POST["btnEdit"])){
	$contact=Contact::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
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
		$contact->id=$_POST["txtId"];
		$contact->name=$_POST["txtName"];
		$contact->contact_catagory_id=$_POST["cmbContactCatagoryId"];
		$contact->contact_no=$_POST["txtContactNo"];
		$contact->email=$_POST["txtEmail"];

		$contact->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="contacts">Manage Contact</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-contact' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$contact->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$contact->name"]);
	$html.=select_field(["label"=>"Contact Catagory","name"=>"cmbContactCatagoryId","table"=>"contact_catagories","value"=>"$contact->contact_catagory_id"]);
	$html.=input_field(["label"=>"Contact No","type"=>"text","name"=>"txtContactNo","value"=>"$contact->contact_no"]);
	$html.=input_field(["label"=>"Email","type"=>"text","name"=>"txtEmail","value"=>"$contact->email"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
