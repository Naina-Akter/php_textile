<?php
class MfgBomApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["mfg_boms"=>MfgBom::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["mfg_boms"=>MfgBom::pagination($page,$perpage),"total_records"=>MfgBom::count()]);
	}
	function find($data){
		echo json_encode(["mfgbom"=>MfgBom::find($data["id"])]);
	}
	function delete($data){
		MfgBom::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}


	// "code": code,
    //           "bom_name": bom_name,
    //           "mfg_product_id": mfg_product_id,
    //           "qty": qty,
    //           "labor_cost": labor_cost,
    //           "date": date,
    //           "remark": remark,
    //           "raw_items": raw_items 

	function save($data,$file=[]){

		$mfgbom=new MfgBom();
		$mfgbom->code=$data["code"];
		$mfgbom->name=$data["bom_name"];
		$mfgbom->product_id=$data["mfg_product_id"];
		$mfgbom->qty=$data["qty"];
		$mfgbom->labour_cost=$data["labor_cost"];

		$bom_id=$mfgbom->save();

		// "name": name,
        // "product_id": product_id,
        // "uom_id":uom_id,
        // "uom_name":uom_name,
        // "cost": cost,
        // "qty": parseFloat(qty)

		$bom_details=$data["raw_items"];

		foreach($bom_details as $item){
			$details=new MfgBomDetail();
			$details->product_id=$item["product_id"];
			$details->bom_id=$bom_id;
			$details->uom_id=$item["uom_id"];
			$details->qty=$item["qty"];
			$details->cost=$item["cost"];
			$details->save();
		}



		echo json_encode(["success" => "yes","id"=>$bom_id]);
	}
	function update($data,$file=[]){
		$mfgbom=new MfgBom();
		$mfgbom->id=$data["id"];
		$mfgbom->code=$data["code"];
		$mfgbom->name=$data["name"];
		$mfgbom->product_id=$data["product_id"];
		$mfgbom->qty=$data["qty"];
		$mfgbom->labour_cost=$data["labour_cost"];

		$mfgbom->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
