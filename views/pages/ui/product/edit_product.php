<?php
if(isset($_POST["btnEdit"])){
	$product=Product::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbManufacturerId"])){
		$errors["manufacturer_id"]="Invalid manufacturer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRegularPrice"])){
		$errors["regular_price"]="Invalid regular_price";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhoto"])){
		$errors["photo"]="Invalid photo";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbProductCategorieId"])){
		$errors["product_categorie_id"]="Invalid product_categorie_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtOfferDiscount"])){
		$errors["offer_discount"]="Invalid offer_discount";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtBarcode"])){
		$errors["barcode"]="Invalid barcode";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbProductTypeId"])){
		$errors["product_type_id"]="Invalid product_type_id";
	}

*/
	if(count($errors)==0){
		$product=new Product();
		$product->id=$_POST["txtId"];
		$product->name=$_POST["txtName"];
		$product->manufacturer_id=$_POST["cmbManufacturerId"];
		$product->regular_price=$_POST["txtRegularPrice"];
		if($_FILES["filePhoto"]["name"]!=""){
			$product->photo=upload($_FILES["filePhoto"], "img",$_POST["txtId"]);
		}else{
			$product->photo=Product::find($_POST["txtId"])->photo;
		}
		$product->product_categorie_id=$_POST["cmbProductCategorieId"];
		$product->offer_discount=$_POST["txtOfferDiscount"];
		$product->barcode=$_POST["txtBarcode"];
		$product->product_type_id=$_POST["cmbProductTypeId"];
		$product->created_at=$now;

		$product->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-warning" href="products">Manage Product</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-product' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$product->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$product->name"]);
	$html.=select_field(["label"=>"Manufacturer","name"=>"cmbManufacturerId","table"=>"manufacturers","value"=>"$product->manufacturer_id"]);
	$html.=input_field(["label"=>"Regular Price","type"=>"text","name"=>"txtRegularPrice","value"=>"$product->regular_price"]);
	$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"filePhoto"]);
	$html.=select_field(["label"=>"Product Categorie","name"=>"cmbProductCategorieId","table"=>"product_categories","value"=>"$product->product_categorie_id"]);
	$html.=input_field(["label"=>"Offer Discount","type"=>"text","name"=>"txtOfferDiscount","value"=>"$product->offer_discount"]);
	$html.=input_field(["label"=>"Barcode","type"=>"text","name"=>"txtBarcode","value"=>"$product->barcode"]);
	$html.=select_field(["label"=>"Product Type","name"=>"cmbProductTypeId","table"=>"product_types","value"=>"$product->product_type_id"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
