<?php
if(isset($_POST["btnDetails"])){
	$delivery=Delivery::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="delivery">Manage Delivery</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>Delivery Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Customers Id</th><td>$delivery->customers_id</td></tr>";
		$html.="<tr><th>Phone</th><td>$delivery->phone</td></tr>";
		$html.="<tr><th>Address</th><td>$delivery->address</td></tr>";
		$html.="<tr><th>District Id</th><td>$delivery->district_id</td></tr>";
		$html.="<tr><th>Thana Id</th><td>$delivery->thana_id</td></tr>";
		$html.="<tr><th>Product Categories Id</th><td>$delivery->product_categories_id</td></tr>";
		$html.="<tr><th>Selling Price</th><td>$delivery->selling_price</td></tr>";
		$html.="<tr><th>Delivery Charge</th><td>$delivery->delivery_charge</td></tr>";
		$html.="<tr><th>Total</th><td>$delivery->total</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
