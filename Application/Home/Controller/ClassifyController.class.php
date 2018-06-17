<?php
namespace Home\Controller;
use Think\Controller;
class ClassifyController extends Controller {
	public function add() {
		$classifyModel = D('classify');
		$classify=$classifyModel->getLists();
		$this->assign('classify',$classify);
		$this->display();
	}
	public function doAdd() {
		$classifyModel = D('classify');
		$name = I('post.name','');
		$parent_id = I('post.parent_id',0) ;
		$data = array(
			'name'       => $name,
			'parent_id'  => $parent_id,
			);
		$status = $classifyModel->add($data);
		if ($status) {
			$this->success('添加成功',U('Home/blog/add'));
		}	else {
			$this->error('error');
		}
	}
	public function lists() {
		$classifyModel = D('classify');
		$data = $classifyModel->lists();
		$this->assign('data',$data);
		$this->display();
	}
	public function onLine() {
		$id = $_GET['id'];
		$classifyModel = D('classify');	
		$data = $classifyModel->audit($id,1);
		if ($data) {
			$this->success('上线成功',U('Home/Classify/lists'));
		}	else {
			$this->error('error');
		}
	}
	public function offLine() {
		$id = $_GET['id'];
		$classifyModel = D('classify');
		$data = $classifyModel->audit($id,0);
		if ($data) {
			$this->success('下线成功',U('Home/Classify/lists'));
		}	else {
			$this->error('error');
		}
	}
	public function edit() {
		$id = $_GET['id'];
		$classifyModel = D('classify');
		$classify=$classifyModel->getLists();
		$data=$classifyModel->getInfoById($id);
		include"./view/classify/edit.html";
	}
	public function doEdit() {
		$id =$_POST['id'];
		$classifyModel = D('classify');
		$name = $_POST['name'] ? $_POST['name'] : '' ;
		$parent_id = $_POST['parent_id'] ? $_POST['parent_id'] : 0 ;
		$status = $classifyModel->edit($name,$parent_id,$id);
	
		if ($status) {
			header('Refresh:1,Url=index.php?c=classify&a=lists');
			echo "修改成功";
		}
	}
}