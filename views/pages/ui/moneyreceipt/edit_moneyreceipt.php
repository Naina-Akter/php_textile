<?php
if(isset($_POST["btnEdit"])){
	$moneyreceipt=MoneyReceipt::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbCustomerId"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemark"])){
		$errors["remark"]="Invalid remark";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtReceiptTotal"])){
		$errors["receipt_total"]="Invalid receipt_total";
	}

*/
	if(count($errors)==0){
		$moneyreceipt=new MoneyReceipt();
		$moneyreceipt->id=$_POST["txtId"];
		$moneyreceipt->customer_id=$_POST["cmbCustomerId"];
		$moneyreceipt->remark=$_POST["txtRemark"];
		$moneyreceipt->receipt_total=$_POST["txtReceiptTotal"];

		$moneyreceipt->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="money_receipts">Manage MoneyReceipt</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-moneyreceipt' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$moneyreceipt->id"]);
	$html.=select_field(["label"=>"Customer","name"=>"cmbCustomerId","table"=>"customers","value"=>"$moneyreceipt->customer_id"]);
	$html.=input_field(["label"=>"Remark","type"=>"text","name"=>"txtRemark","value"=>"$moneyreceipt->remark"]);
	$html.=input_field(["label"=>"Receipt Total","type"=>"text","name"=>"txtReceiptTotal","value"=>"$moneyreceipt->receipt_total"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
