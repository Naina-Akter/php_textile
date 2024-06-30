<?php
class Production implements JsonSerializable{
	public $id;

	public function __construct(){
	}
	public function set($id,){
		$this->id=$id;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}production()values()");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}production set  where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}production where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id from {$tx}production");
		$data=[];
		while($production=$result->fetch_object()){
			$data[]=$production;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id from {$tx}production $criteria limit $top,$perpage");
		$data=[];
		while($production=$result->fetch_object()){
			$data[]=$production;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}production $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id from {$tx}production where id='$id'");
		$production=$result->fetch_object();
			return $production;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}production");
		$production =$result->fetch_object();
		return $production->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbProduction"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}production");
		while($production=$result->fetch_object()){
			$html.="<option value ='$production->id'>$production->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}production $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id from {$tx}production $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-production\">New Production</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th></tr>";
		}
		while($production=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$production->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-production"]);
				$action_buttons.= action_button(["id"=>$production->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-production"]);
				$action_buttons.= action_button(["id"=>$production->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"production"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$production->id</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id from {$tx}production where id={$id}");
		$production=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Production Details</th></tr>";
		$html.="<tr><th>Id</th><td>$production->id</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
