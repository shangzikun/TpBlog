<?php
namespace Api\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function lists() {
		$blogModel = D('Blog');
		$classifyModel = D('classify');
		$userModel = D('user');
		$adModel = D('ad');
		$ad = $adModel->getList();
		foreach ($ad as $key => $value) {
			$ad[$key] = $adModel->format($value);
		}
		$data = $blogModel->getList();
		foreach ($data as $key => $value) {			
			$classify = $classifyModel->where("id={$value['classify_id']}")->find();
   			$data[$key]['classify_name'] = $classify['name'];
   			$data[$key] = $blogModel->format1($value);
		}
		$res = array(
			'error'		=>0,
			'message'	=>'success',
			'data'		=>array()
		);
		$res['data']['blog']=$data;
		$res['data']['ad']=$ad;
		echo json_encode($res);
		
	}

}