<?php
class Delivery implements JsonSerializable{
	public $customers_id;
	public $phone;
	public $address;
	public $district_id;
	public $thana_id;
	public $product_categories_id;
	public $selling_price;
	public $delivery_charge;
	public $total;

	public function __construct(){
	}
	public function set($customers_id,$phone,$address,$district_id,$thana_id,$product_categories_id,$selling_price,$delivery_charge,$total){
		$this->customers_id=$customers_id;
		$this->phone=$phone;
		$this->address=$address;
		$this->district_id=$district_id;
		$this->thana_id=$thana_id;
		$this->product_categories_id=$product_categories_id;
		$this->selling_price=$selling_price;
		$this->delivery_charge=$delivery_charge;
		$this->total=$total;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}delivery(customers_id,phone,address,district_id,thana_id,product_categories_id,selling_price,delivery_charge,total)values('$this->customers_id','$this->phone','$this->address','$this->district_id','$this->thana_id','$this->product_categories_id','$this->selling_price','$this->delivery_charge','$this->total')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}delivery set customers_id='$this->customers_id',phone='$this->phone',address='$this->address',district_id='$this->district_id',thana_id='$this->thana_id',product_categories_id='$this->product_categories_id',selling_price='$this->selling_price',delivery_charge='$this->delivery_charge',total='$this->total' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}delivery where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select customers_id,phone,address,district_id,thana_id,product_categories_id,selling_price,delivery_charge,total from {$tx}delivery");
		$data=[];
		while($delivery=$result->fetch_object()){
			$data[]=$delivery;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select customers_id,phone,address,district_id,thana_id,product_categories_id,selling_price,delivery_charge,total from {$tx}delivery $criteria limit $top,$perpage");
		$data=[];
		while($delivery=$result->fetch_object()){
			$data[]=$delivery;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}delivery $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select customers_id,phone,address,district_id,thana_id,product_categories_id,selling_price,delivery_charge,total from {$tx}delivery where id='$id'");
		$delivery=$result->fetch_object();
			return $delivery;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}delivery");
		$delivery =$result->fetch_object();
		return $delivery->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Customers Id:$this->customers_id<br> 
		Phone:$this->phone<br> 
		Address:$this->address<br> 
		District Id:$this->district_id<br> 
		Thana Id:$this->thana_id<br> 
		Product Categories Id:$this->product_categories_id<br> 
		Selling Price:$this->selling_price<br> 
		Delivery Charge:$this->delivery_charge<br> 
		Total:$this->total<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbDelivery"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}delivery");
		while($delivery=$result->fetch_object()){
			$html.="<option value ='$delivery->id'>$delivery->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}delivery $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select customers_id,phone,address,district_id,thana_id,product_categories_id,selling_price,delivery_charge,total from {$tx}delivery $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-delivery\">New Delivery</a></th></tr>";
		if($action){
			$html.="<tr><th>Customers Id</th><th>Phone</th><th>Address</th><th>District Id</th><th>Thana Id</th><th>Product Categories Id</th><th>Selling Price</th><th>Delivery Charge</th><th>Total</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Customers Id</th><th>Phone</th><th>Address</th><th>District Id</th><th>Thana Id</th><th>Product Categories Id</th><th>Selling Price</th><th>Delivery Charge</th><th>Total</th></tr>";
		}
		while($delivery=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$delivery->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-delivery"]);
				$action_buttons.= action_button(["id"=>$delivery->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-delivery"]);
				$action_buttons.= action_button(["id"=>$delivery->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"delivery"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$delivery->customers_id</td><td>$delivery->phone</td><td>$delivery->address</td><td>$delivery->district_id</td><td>$delivery->thana_id</td><td>$delivery->product_categories_id</td><td>$delivery->selling_price</td><td>$delivery->delivery_charge</td><td>$delivery->total</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select customers_id,phone,address,district_id,thana_id,product_categories_id,selling_price,delivery_charge,total from {$tx}delivery where id={$id}");
		$delivery=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Delivery Details</th></tr>";
		$html.="<tr><th>Customers Id</th><td>$delivery->customers_id</td></tr>";
		$html.="<tr><th>Phone</th><td>$delivery->phone</td></tr>";
		$html.="<tr><th>Address</th><td>$delivery->address</td></tr>";
		$html.="<tr><th>District Id</th><td>$delivery->district_id</td></tr>";
		$html.="<tr><th>Thana Id</th><td>$delivery->thana_id</td></tr>";
		$html.="<tr><th>Product Categories Id</th><td>$delivery->product_categories_id</td></tr>";
		$html.="<tr><th>Selling Price</th><td>$delivery->selling_price</td></tr>";
		$html.="<tr><th>Delivery Charge</th><td>$delivery->delivery_charge</td></tr>";
		$html.="<tr><th>Total</th><td>$delivery->total</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
