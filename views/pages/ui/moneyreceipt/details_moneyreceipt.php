<?php
if(isset($_POST["btnDetails"])){
	$moneyreceipt=MoneyReceipt::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="money_receipts">Manage MoneyReceipt</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>MoneyReceipt Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$moneyreceipt->id</td></tr>";
		$html.="<tr><th>Created At</th><td>$moneyreceipt->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$moneyreceipt->updated_at</td></tr>";
		$html.="<tr><th>Customer Id</th><td>$moneyreceipt->customer_id</td></tr>";
		$html.="<tr><th>Remark</th><td>$moneyreceipt->remark</td></tr>";
		$html.="<tr><th>Receipt Total</th><td>$moneyreceipt->receipt_total</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
