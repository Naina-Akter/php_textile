<?php
class Product implements JsonSerializable{
	public $id;
	public $name;
	public $manufacturer_id;
	public $regular_price;
	public $photo;
	public $product_categorie_id;
	public $offer_discount;
	public $barcode;
	public $product_type_id;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$name,$manufacturer_id,$regular_price,$photo,$product_categorie_id,$offer_discount,$barcode,$product_type_id,$created_at,$updated_at){
		$this->id=$id;
		$this->name=$name;
		$this->manufacturer_id=$manufacturer_id;
		$this->regular_price=$regular_price;
		$this->photo=$photo;
		$this->product_categorie_id=$product_categorie_id;
		$this->offer_discount=$offer_discount;
		$this->barcode=$barcode;
		$this->product_type_id=$product_type_id;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}products(name,manufacturer_id,regular_price,photo,product_categorie_id,offer_discount,barcode,product_type_id,created_at,updated_at)values('$this->name','$this->manufacturer_id','$this->regular_price','$this->photo','$this->product_categorie_id','$this->offer_discount','$this->barcode','$this->product_type_id','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}products set name='$this->name',manufacturer_id='$this->manufacturer_id',regular_price='$this->regular_price',photo='$this->photo',product_categorie_id='$this->product_categorie_id',offer_discount='$this->offer_discount',barcode='$this->barcode',product_type_id='$this->product_type_id',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}products where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,manufacturer_id,regular_price,photo,product_categorie_id,offer_discount,barcode,product_type_id,created_at,updated_at from {$tx}products");
		$data=[];
		while($product=$result->fetch_object()){
			$data[]=$product;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,manufacturer_id,regular_price,photo,product_categorie_id,offer_discount,barcode,product_type_id,created_at,updated_at from {$tx}products $criteria limit $top,$perpage");
		$data=[];
		while($product=$result->fetch_object()){
			$data[]=$product;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}products $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,manufacturer_id,regular_price,photo,product_categorie_id,offer_discount,barcode,product_type_id,created_at,updated_at from {$tx}products where id='$id'");
		$product=$result->fetch_object();
			return $product;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}products");
		$product =$result->fetch_object();
		return $product->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Manufacturer Id:$this->manufacturer_id<br> 
		Regular Price:$this->regular_price<br> 
		Photo:$this->photo<br> 
		Product Categorie Id:$this->product_categorie_id<br> 
		Offer Discount:$this->offer_discount<br> 
		Barcode:$this->barcode<br> 
		Product Type Id:$this->product_type_id<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbProduct"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}products");
		while($product=$result->fetch_object()){
			$html.="<option value ='$product->id'>$product->name</option>";
		}
		$html.="</select>";
		return $html;
	}


	static function html_select_finished_goods($name="cmbFinishedProduct"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}products where product_type_id =1");
		while($product=$result->fetch_object()){
			$html.="<option value ='$product->id'>$product->name</option>";
		}
		$html.="</select>";
		return $html;
	}  
	static function html_select_raw_material($name="cmbRawProducts"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}products where product_type_id =2");
		while($product=$result->fetch_object()){
			$html.="<option value ='$product->id'>$product->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}products $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,manufacturer_id,regular_price,photo,product_categorie_id,offer_discount,barcode,product_type_id,created_at,updated_at from {$tx}products $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-warning\" href=\"create-product\"><b></b>New Product</b></a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Manufacturer Id</th><th>Regular Price</th><th>Photo</th><th>Product Categorie Id</th><th>Offer Discount</th><th>Barcode</th><th>Product Type Id</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Manufacturer Id</th><th>Regular Price</th><th>Photo</th><th>Product Categorie Id</th><th>Offer Discount</th><th>Barcode</th><th>Product Type Id</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($product=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$product->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-product"]);
				$action_buttons.= action_button(["id"=>$product->id, "name"=>"Edit", "value"=>"Edit", "class"=>"danger", "url"=>"edit-product"]);
				$action_buttons.= action_button(["id"=>$product->id, "name"=>"Delete", "value"=>"Delete", "class"=>"info", "url"=>"products"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$product->id</td><td>$product->name</td><td>$product->manufacturer_id</td><td>$product->regular_price</td><td><img src='img/$product->photo' width='100' /></td><td>$product->product_categorie_id</td><td>$product->offer_discount</td><td>$product->barcode</td><td>$product->product_type_id</td><td>$product->created_at</td><td>$product->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,manufacturer_id,regular_price,photo,product_categorie_id,offer_discount,barcode,product_type_id,created_at,updated_at from {$tx}products where id={$id}");
		$product=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Product Details</th></tr>";
		$html.="<tr><th>Id</th><td>$product->id</td></tr>";
		$html.="<tr><th>Name</th><td>$product->name</td></tr>";
		$html.="<tr><th>Manufacturer Id</th><td>$product->manufacturer_id</td></tr>";
		$html.="<tr><th>Regular Price</th><td>$product->regular_price</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\'img/$product->photo\' width=\'100\' /></td></tr>";
		$html.="<tr><th>Product Categorie Id</th><td>$product->product_categorie_id</td></tr>";
		$html.="<tr><th>Offer Discount</th><td>$product->offer_discount</td></tr>";
		$html.="<tr><th>Barcode</th><td>$product->barcode</td></tr>";
		$html.="<tr><th>Product Type Id</th><td>$product->product_type_id</td></tr>";
		$html.="<tr><th>Created At</th><td>$product->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$product->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
