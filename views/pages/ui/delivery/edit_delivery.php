<?php
if(isset($_POST["btnEdit"])){
	$delivery=Delivery::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbCustomersId"])){
		$errors["customers_id"]="Invalid customers_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtAddress"])){
		$errors["address"]="Invalid address";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbDistrictId"])){
		$errors["district_id"]="Invalid district_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbThanaId"])){
		$errors["thana_id"]="Invalid thana_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbProductCategoriesId"])){
		$errors["product_categories_id"]="Invalid product_categories_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtSellingPrice"])){
		$errors["selling_price"]="Invalid selling_price";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDeliveryCharge"])){
		$errors["delivery_charge"]="Invalid delivery_charge";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtTotal"])){
		$errors["total"]="Invalid total";
	}

*/
	if(count($errors)==0){
		$delivery=new Delivery();
		$delivery->id=$_POST["txtId"];
		$delivery->customers_id=$_POST["cmbCustomersId"];
		$delivery->phone=$_POST["txtPhone"];
		$delivery->address=$_POST["txtAddress"];
		$delivery->district_id=$_POST["cmbDistrictId"];
		$delivery->thana_id=$_POST["cmbThanaId"];
		$delivery->product_categories_id=$_POST["cmbProductCategoriesId"];
		$delivery->selling_price=$_POST["txtSellingPrice"];
		$delivery->delivery_charge=$_POST["txtDeliveryCharge"];
		$delivery->total=$_POST["txtTotal"];

		$delivery->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="delivery">Manage Delivery</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-delivery' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=select_field(["label"=>"Customers","name"=>"cmbCustomersId","table"=>"customerss","value"=>"$delivery->customers_id"]);
	$html.=input_field(["label"=>"Phone","type"=>"text","name"=>"txtPhone","value"=>"$delivery->phone"]);
	$html.=input_field(["label"=>"Address","type"=>"text","name"=>"txtAddress","value"=>"$delivery->address"]);
	$html.=select_field(["label"=>"District","name"=>"cmbDistrictId","table"=>"districts","value"=>"$delivery->district_id"]);
	$html.=select_field(["label"=>"Thana","name"=>"cmbThanaId","table"=>"thanas","value"=>"$delivery->thana_id"]);
	$html.=select_field(["label"=>"Product Categories","name"=>"cmbProductCategoriesId","table"=>"product_categoriess","value"=>"$delivery->product_categories_id"]);
	$html.=input_field(["label"=>"Selling Price","type"=>"text","name"=>"txtSellingPrice","value"=>"$delivery->selling_price"]);
	$html.=input_field(["label"=>"Delivery Charge","type"=>"text","name"=>"txtDeliveryCharge","value"=>"$delivery->delivery_charge"]);
	$html.=input_field(["label"=>"Total","type"=>"text","name"=>"txtTotal","value"=>"$delivery->total"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
