<?php
namespace Api\Controller;
use Think\Controller;
class UserController extends Controller  {
		public function doReg() {
			$name 		= $_POST['name'];
			$phone 		= $_POST['phone'];
			$password 	= $_POST['password'];
			if (isset($name)&&!empty($name)&&isset($phone)&&!empty($phone)&&isset($password)&&!empty($password)) {
				$userModel = D('user');
				$data = array(
					'name'		=>$name,
					'phone'		=>$phone,
					'password'	=>$password,
				);
				$user = $userModel->add($data);
				if ($user) {
					_res($data,true,0);
				}
			}

		}
		public function doLogin(){
			$phone = $_POST['phone'];
			$password = $_POST['password'];
			if (isset($phone)&&!empty($phone)) {
				$userModel = D('user');
				$where = "phone = {$phone}";
				$user = $userModel->getList($where);
				if($user) {
					if ($password == $user['password']) {
						$Login = $userModel->format($user);
						$data = array(
							'phone' 	=> $phone,
							'password'	=> $password,
					);
						_res($data,true,0);
					}
					else {
						_res('参数错误',false,1000);
					}
				}						
			}
			return $Login;

		}	
		
}