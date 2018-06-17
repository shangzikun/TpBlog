<?php
namespace Home\Model;
use Think\Model;
class UserModel extends BaseModel {
	public function add($name,$email,$password,$image) {
		$data = array('name'=>$name,
			   		  'email'=>$email,
			   		  'password'=>$password,
			   		  'image'=>$image,);
		$res = parent::add($data);
		return $res;
	}

}