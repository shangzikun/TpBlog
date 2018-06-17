<?php
namespace Home\Controller;
use Think\Controller;
class BlogController extends Controller{
	public function add() {
		$classifyModel = D('classify');
		$data = $classifyModel->getClassifyLists();
		$this->assign('classify',$data);
		$this->display();
	}
	public function doAdd() {
		$image = uploadFile('image','blog');
		$title = I('post.title','');
		$content = I('post.content','');
		$classify = I('post.classify');
		$createtime = date("Y-m-d H:i:s");
		$data = array(
				'content' 	=> $content,
				'image' 	=> $image,				
				'title' 	=> $title,
				'classify_id' 	=> $classify,
				'createtime'=> $createtime,
				);
 	  	$blogModel = D('blog');
		$status = $blogModel->add($data);
		if ($status) {
			$this->success('添加成功，1秒后跳转到list',U('Home/blog/lists'));
		} else {
			$this->error('error');
		}	
	}
	public function lists() {
		$lists = D('blog')->select();
		$ClassifyModel = D('classify');
		foreach ($lists as $key => $value) {
				$classify_info = $ClassifyModel->getInfoById($value['classify_id']);
				$lists[$key]['name'] = $classify_info['name'];
			}
		$this->assign('data',$lists);
		$this->display();
	}
}