<?php
if(isset($_POST["btnCreate"])){
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
		$moneyreceipt->created_at=$now;
		$moneyreceipt->created_at=$now;
		$moneyreceipt->updated_at=$now;
		$moneyreceipt->updated_at=$now;
		$moneyreceipt->customer_id=$_POST["cmbCustomerId"];
		$moneyreceipt->remark=$_POST["txtRemark"];
		$moneyreceipt->receipt_total=$_POST["txtReceiptTotal"];

		$moneyreceipt->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="money_receipts">Manage MoneyReceipt</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='create-moneyreceipt' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=select_field(["label"=>"Customer","name"=>"cmbCustomerId","table"=>"customers"]);
	$html.=input_field(["label"=>"Remark","type"=>"text","name"=>"txtRemark"]);
	$html.=input_field(["label"=>"Receipt Total","type"=>"text","name"=>"txtReceiptTotal"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
