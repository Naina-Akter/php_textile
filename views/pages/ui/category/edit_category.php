<?php
if(isset($_POST["btnEdit"])){
	$category=Category::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*

*/
	if(count($errors)==0){
		$category=new Category();
		$category->id=$_POST["txtId"];

		$category->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="categories">Manage Category</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-category' method='post' enctype='multipart/form-data'>
<?php
	$html="";

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
