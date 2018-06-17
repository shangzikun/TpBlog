<?php
namespace Home\Model;
use Think\Model;
class ClassifyModel extends BaseModel {
	public function getLists($parent_id=0) {
		$data = $this->where(array('parent_id'=>$parent_id))->select();
		return $data;
	}
	public function getClassifyLists($parent_id=0) {
		$data = $this->where("parent_id={$parent_id}")->select();		
		foreach ($data as $key => $value) {
			$child = $this->where("parent_id = {$value['id']}")->select();
			$data[$key]['child'] = $child;
		}
		return $data;
	}
	public function lists() {
		$data=$this->select();
		return $data;
	}
	public function audit($id,$status=0) {
		$this->status = $status;
		$res = $this->where("id={$id}")->save();
		return $res;
	}
	public function edit($name,$parent_id,$id) {
		$sql = "update classify set name='{$name}',parent_id={$parent_id} where id= {$id}";
		$res = $this->mysqli->query($sql);
		return $res;
	}
}