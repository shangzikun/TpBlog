<?php
namespace Api\Controller;
use Think\Controller;
class BlogController extends Controller  {
		public function blogInfo() {
		$id = I('get.id',0);
		$blogModel = D('blog');
		$classify = D('classify');
		$userModel = D('user');
		$blogInfo = $blogModel->where("id={$id}")->find();
		$blog_Info = $blogModel->format2($blogInfo);
		$where = "classify_id={$blogInfo['classify_id']} and id != {$id}";
		$related_blog = $blogModel->getList($where,0,20,'id asc');	
		foreach ($related_blog as $key => $value) {
			$related_blog[$key] = $blogModel->format3($value);
		}
		$res = array(
			'error'   =>0,
			'message' =>'success',
			'data'    =>array(),
		);
		$res['data']['blog_Info']=$blog_Info;
		$res['data']['related_blog']=$related_blog;
		echo json_encode($res);
	}
}