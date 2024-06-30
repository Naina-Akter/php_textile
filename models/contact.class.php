<?php
class Contact implements JsonSerializable{
	public $id;
	public $name;
	public $contact_catagory_id;
	public $contact_no;
	public $email;

	public function __construct(){
	}
	public function set($id,$name,$contact_catagory_id,$contact_no,$email){
		$this->id=$id;
		$this->name=$name;
		$this->contact_catagory_id=$contact_catagory_id;
		$this->contact_no=$contact_no;
		$this->email=$email;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}contacts(name,contact_catagory_id,contact_no,email)values('$this->name','$this->contact_catagory_id','$this->contact_no','$this->email')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}contacts set name='$this->name',contact_catagory_id='$this->contact_catagory_id',contact_no='$this->contact_no',email='$this->email' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}contacts where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,contact_catagory_id,contact_no,email from {$tx}contacts");
		$data=[];
		while($contact=$result->fetch_object()){
			$data[]=$contact;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,contact_catagory_id,contact_no,email from {$tx}contacts $criteria limit $top,$perpage");
		$data=[];
		while($contact=$result->fetch_object()){
			$data[]=$contact;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}contacts $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,contact_catagory_id,contact_no,email from {$tx}contacts where id='$id'");
		$contact=$result->fetch_object();
			return $contact;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}contacts");
		$contact =$result->fetch_object();
		return $contact->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Contact Catagory Id:$this->contact_catagory_id<br> 
		Contact No:$this->contact_no<br> 
		Email:$this->email<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbContact"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}contacts");
		while($contact=$result->fetch_object()){
			$html.="<option value ='$contact->id'>$contact->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}contacts $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,contact_catagory_id,contact_no,email from {$tx}contacts $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-contact\">New Contact</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Contact Catagory Id</th><th>Contact No</th><th>Email</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Contact Catagory Id</th><th>Contact No</th><th>Email</th></tr>";
		}
		while($contact=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$contact->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-contact"]);
				$action_buttons.= action_button(["id"=>$contact->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-contact"]);
				$action_buttons.= action_button(["id"=>$contact->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"contacts"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$contact->id</td><td>$contact->name</td><td>$contact->contact_catagory_id</td><td>$contact->contact_no</td><td>$contact->email</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,contact_catagory_id,contact_no,email from {$tx}contacts where id={$id}");
		$contact=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Contact Details</th></tr>";
		$html.="<tr><th>Id</th><td>$contact->id</td></tr>";
		$html.="<tr><th>Name</th><td>$contact->name</td></tr>";
		$html.="<tr><th>Contact Catagory Id</th><td>$contact->contact_catagory_id</td></tr>";
		$html.="<tr><th>Contact No</th><td>$contact->contact_no</td></tr>";
		$html.="<tr><th>Email</th><td>$contact->email</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
