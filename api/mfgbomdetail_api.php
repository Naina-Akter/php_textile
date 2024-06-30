<?php
class MfgBomDetailApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["mfg_bom_details"=>MfgBomDetail::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["mfg_bom_details"=>MfgBomDetail::pagination($page,$perpage),"total_records"=>MfgBomDetail::count()]);
	}
	function find($data){
		echo json_encode(["mfgbomdetail"=>MfgBomDetail::find($data["id"])]);
	}
	function delete($data){
		MfgBomDetail::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$mfgbomdetail=new MfgBomDetail();
		$mfgbomdetail->bom_id=$data["bom_id"];
		$mfgbomdetail->product_id=$data["product_id"];
		$mfgbomdetail->qty=$data["qty"];
		$mfgbomdetail->cost=$data["cost"];
		$mfgbomdetail->uom_id=$data["uom_id"];

		$mfgbomdetail->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$mfgbomdetail=new MfgBomDetail();
		$mfgbomdetail->id=$data["id"];
		$mfgbomdetail->bom_id=$data["bom_id"];
		$mfgbomdetail->product_id=$data["product_id"];
		$mfgbomdetail->qty=$data["qty"];
		$mfgbomdetail->cost=$data["cost"];
		$mfgbomdetail->uom_id=$data["uom_id"];

		$mfgbomdetail->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
