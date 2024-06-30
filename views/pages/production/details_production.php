<?php
if(isset($_POST["btnDetails"])){
	$mfgproduction=MfgProduction::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="mfg_productions">Manage MfgProduction</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>MfgProduction Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$mfgproduction->id</td></tr>";
		$html.="<tr><th>Production Datetime</th><td>$mfgproduction->production_datetime</td></tr>";
		$html.="<tr><th>Bom Id</th><td>$mfgproduction->bom_id</td></tr>";
		$html.="<tr><th>Qty</th><td>$mfgproduction->qty</td></tr>";
		$html.="<tr><th>Labor Cost</th><td>$mfgproduction->labor_cost</td></tr>";
		$html.="<tr><th>Manager Id</th><td>$mfgproduction->manager_id</td></tr>";
		$html.="<tr><th>Total Cost</th><td>$mfgproduction->total_cost</td></tr>";
		$html.="<tr><th>Product Id</th><td>$mfgproduction->product_id</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$mfgproduction->uom_id</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
