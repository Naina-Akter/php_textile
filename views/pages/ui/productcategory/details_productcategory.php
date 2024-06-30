<?php
if(isset($_POST["btnDetails"])){
	$productcategory=ProductCategory::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="product_categories">Manage ProductCategory</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>ProductCategory Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$productcategory->id</td></tr>";
		$html.="<tr><th>Name</th><td>$productcategory->name</td></tr>";
		$html.="<tr><th>Section Id</th><td>$productcategory->section_id</td></tr>";
		$html.="<tr><th>Created At</th><td>$productcategory->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$productcategory->updated_at</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
