<?php
if(isset($_POST["btnEdit"])){
	$mfgproduction=MfgProduction::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbBomId"])){
		$errors["bom_id"]="Invalid bom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtQty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtLaborCost"])){
		$errors["labor_cost"]="Invalid labor_cost";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbManagerId"])){
		$errors["manager_id"]="Invalid manager_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtTotalCost"])){
		$errors["total_cost"]="Invalid total_cost";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbProductId"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbUomId"])){
		$errors["uom_id"]="Invalid uom_id";
	}

*/
	if(count($errors)==0){
		$mfgproduction=new MfgProduction();
		$mfgproduction->id=$_POST["txtId"];
		$mfgproduction->production_datetime=date("Y-m-d",strtotime($_POST["txtProductionDatetime"]));
		$mfgproduction->bom_id=$_POST["cmbBomId"];
		$mfgproduction->qty=$_POST["txtQty"];
		$mfgproduction->labor_cost=$_POST["txtLaborCost"];
		$mfgproduction->manager_id=$_POST["cmbManagerId"];
		$mfgproduction->total_cost=$_POST["txtTotalCost"];
		$mfgproduction->product_id=$_POST["cmbProductId"];
		$mfgproduction->uom_id=$_POST["cmbUomId"];

		$mfgproduction->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="mfg_productions">Manage MfgProduction</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-mfgproduction' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$mfgproduction->id"]);
	$html.=input_field(["label"=>"Production Datetime","type"=>"text","name"=>"txtProductionDatetime","value"=>"$mfgproduction->production_datetime"]);
	$html.=select_field(["label"=>"Bom","name"=>"cmbBomId","table"=>"boms","value"=>"$mfgproduction->bom_id"]);
	$html.=input_field(["label"=>"Qty","type"=>"text","name"=>"txtQty","value"=>"$mfgproduction->qty"]);
	$html.=input_field(["label"=>"Labor Cost","type"=>"text","name"=>"txtLaborCost","value"=>"$mfgproduction->labor_cost"]);
	$html.=select_field(["label"=>"Manager","name"=>"cmbManagerId","table"=>"managers","value"=>"$mfgproduction->manager_id"]);
	$html.=input_field(["label"=>"Total Cost","type"=>"text","name"=>"txtTotalCost","value"=>"$mfgproduction->total_cost"]);
	$html.=select_field(["label"=>"Product","name"=>"cmbProductId","table"=>"products","value"=>"$mfgproduction->product_id"]);
	$html.=select_field(["label"=>"Uom","name"=>"cmbUomId","table"=>"uom","value"=>"$mfgproduction->uom_id"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
