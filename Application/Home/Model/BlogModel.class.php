<?php
namespace Home\Model;
use Think\Model;
	class BlogModel extends BaseModel {
		public function getBlogLists($offset=0,$limit=20,$order='id desc',$where='1') {
			$data = $this->getList($offset=0,$limit=20,$order='id desc',$where);
			return $data;
		}
		public function getBlogInfoById($id) {
			$data = $this->getInfoById($id);
			return $data;
		}
		public function getBlogCount() {
			$data = $this->getCount();
			return $data;
		}
		public function audit($id,$status=0) {
		$sql ="update blog set status = {$status} where id = {$id}";
		$res=$this->mysqli->query($sql);
		return $res;
		}
	}