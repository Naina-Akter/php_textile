<?php
if(isset($_POST["btnDetails"])){
	$category=Category::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="categories">Manage Category</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>Category Details</th></tr>
<?php
	$html="";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
