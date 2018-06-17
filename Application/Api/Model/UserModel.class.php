<?php
namespace Api\Model;
use Api\Model\BaseModel;
class UserModel extends BaseModel {
	public function format($info) {
		$data = array(
			'name' 		=>$info['name'],
			'phone'		=>$info['phone'],
			'password'	=>$info['password'],
		);
		return $data;
	}
}