<?php
if(isset($_POST["btnEdit"])){
	$inventory=Inventory::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*

*/
	if(count($errors)==0){
		$inventory=new Inventory();
		$inventory->id=$_POST["txtId"];

		$inventory->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="inventories">Manage Inventory</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-inventory' method='post' enctype='multipart/form-data'>
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
