<?php
if(isset($_POST["btnEdit"])){
	$mfgbom=MfgBom::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCode"])){
		$errors["code"]="Invalid code";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbProductId"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtQty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtLabourCost"])){
		$errors["labour_cost"]="Invalid labour_cost";
	}

*/
	if(count($errors)==0){
		$mfgbom=new MfgBom();
		$mfgbom->id=$_POST["txtId"];
		$mfgbom->code=$_POST["txtCode"];
		$mfgbom->name=$_POST["txtName"];
		$mfgbom->product_id=$_POST["cmbProductId"];
		$mfgbom->qty=$_POST["txtQty"];
		$mfgbom->labour_cost=$_POST["txtLabourCost"];

		$mfgbom->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="mfg_boms">Manage Bom</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-mfgbom' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$mfgbom->id"]);
	$html.=input_field(["label"=>"Code","type"=>"text","name"=>"txtCode","value"=>"$mfgbom->code"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$mfgbom->name"]);
	$html.=select_field(["label"=>"Product","name"=>"cmbProductId","table"=>"products","value"=>"$mfgbom->product_id"]);
	$html.=input_field(["label"=>"Qty","type"=>"text","name"=>"txtQty","value"=>"$mfgbom->qty"]);
	$html.=input_field(["label"=>"Labour Cost","type"=>"text","name"=>"txtLabourCost","value"=>"$mfgbom->labour_cost"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
