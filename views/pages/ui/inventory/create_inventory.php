<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*

*/
	if(count($errors)==0){
		$inventory=new Inventory();

		$inventory->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="inventories">Manage Inventory</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='create-inventory' method='post' enctype='multipart/form-data'>
<?php
	$html="";

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
