<?php
class Task implements JsonSerializable{
	public $id;
	public $name;
	public $task_types_id;
	public $department_id;
	public $duration;

	public function __construct(){
	}
	public function set($id,$name,$task_types_id,$department_id,$duration){
		$this->id=$id;
		$this->name=$name;
		$this->task_types_id=$task_types_id;
		$this->department_id=$department_id;
		$this->duration=$duration;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}Tasks(name,task_types_id,department_id,duration)values('$this->name','$this->task_types_id','$this->department_id','$this->duration')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}Tasks set name='$this->name',task_types_id='$this->task_types_id',department_id='$this->department_id',duration='$this->duration' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}Tasks where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,task_types_id,department_id,duration from {$tx}Tasks");
		$data=[];
		while($task=$result->fetch_object()){
			$data[]=$task;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,task_types_id,department_id,duration from {$tx}Tasks $criteria limit $top,$perpage");
		$data=[];
		while($task=$result->fetch_object()){
			$data[]=$task;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}Tasks $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,task_types_id,department_id,duration from {$tx}Tasks where id='$id'");
		$task=$result->fetch_object();
			return $task;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}Tasks");
		$task =$result->fetch_object();
		return $task->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Task Types Id:$this->task_types_id<br> 
		Department Id:$this->department_id<br> 
		Duration:$this->duration<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbTask"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}Tasks");
		while($task=$result->fetch_object()){
			$html.="<option value ='$task->id'>$task->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}Tasks $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,task_types_id,department_id,duration from {$tx}Tasks $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-task\">New Task</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Task Types Id</th><th>Department Id</th><th>Duration</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Task Types Id</th><th>Department Id</th><th>Duration</th></tr>";
		}
		while($task=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$task->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-task"]);
				$action_buttons.= action_button(["id"=>$task->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-task"]);
				$action_buttons.= action_button(["id"=>$task->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"Tasks"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$task->id</td><td>$task->name</td><td>$task->task_types_id</td><td>$task->department_id</td><td>$task->duration</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,task_types_id,department_id,duration from {$tx}Tasks where id={$id}");
		$task=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Task Details</th></tr>";
		$html.="<tr><th>Id</th><td>$task->id</td></tr>";
		$html.="<tr><th>Name</th><td>$task->name</td></tr>";
		$html.="<tr><th>Task Types Id</th><td>$task->task_types_id</td></tr>";
		$html.="<tr><th>Department Id</th><td>$task->department_id</td></tr>";
		$html.="<tr><th>Duration</th><td>$task->duration</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
