<?php
if(isset($_POST["btnEdit"])){
	$productcategory=ProductCategory::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbSectionId"])){
		$errors["section_id"]="Invalid section_id";
	}

*/
	if(count($errors)==0){
		$productcategory=new ProductCategory();
		$productcategory->id=$_POST["txtId"];
		$productcategory->name=$_POST["txtName"];
		$productcategory->section_id=$_POST["cmbSectionId"];
		$productcategory->created_at=$now;

		$productcategory->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="product_categories">Manage ProductCategory</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-productcategory' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$productcategory->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$productcategory->name"]);
	$html.=select_field(["label"=>"Section","name"=>"cmbSectionId","table"=>"sections","value"=>"$productcategory->section_id"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
