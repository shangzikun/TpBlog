<?php
namespace Home\Model;
use Think\Model;
class CommentModel extends BaseModel {

	public function add($blog_id,$user_id,$parent_id=0,$content='') {
		$createtime = date("Y-m-d H:i:s");
		$data = array('blog_id'=>$blog_id,
			   		  'user_id'=>$user_id,
			   		  'parent_id'=>$parent_id,
			   		  'content'=>$content,
			   		  'createtime'=>$createtime,);
		$res = parent::add($data);
		return $res;
	}
}