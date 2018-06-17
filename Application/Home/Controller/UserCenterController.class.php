<?php
namespace Home\Controller;
use Think\Controller;
	class UserCenterController extends Controller{
		public function login() {
				$this->display();
		}
		public function doLogin() {
				$email = I('post.email');
				$password = I('post.password');

				$verifyCode=I('post.verify');
				
				$userModel = D('User');
				$userInfo = $userModel->getInfoByEmail($email);
			if (empty($email) || empty($password) || empty($verifyCode)) { 
				$this->error('用户名或密码错误，登录不成功',U('Home/UserCenter/login'));      
       		}

       			$res = check_verify($verifyCode,'');
       		if (!$res) {
       			$this->error('验证码错误，登录不成功',U('Home/UserCenter/login'));	
       		}

			if ($userInfo['password'] == $password) {
				unset($userInfo['password']); //一般来说 密码对外开放
				$_SESSION['me'] = $userInfo;
				$this->success('登陆成功',U('Home/index/index'));
			} else {
				$this->error('1用户名或密码错误，登录不成功',U('Home/UserCenter/login'));
			}
		}
		public function reg () {
			$this->display();
		}
		public function doReg() {
			$image = uploadFile('image','user');
			$name 	= I('post.name');
			$email 	= I('post.email');
			$password = $_POST['password'];			
			if (empty($name) || empty($password)) {
				$this->error('用户名或密码为空，注册不成功',U('/Home/UserCenter/reg'));
			}
			$userModel = D('User');
			$userInfo = $userModel->getInfoByEmail($email);
			if (!empty($userInfo)) {
				$this->error('邮箱已存在，注册失败',U('/Home/UserCenter/reg'));
			}
			$status = $userModel->add($name,$email,$password,$image);
			if ($status) {
				$this->success('注册成功',U('/Home/UserCenter/login'));
			} else {
				$this->error('参数错误',U('/Home/UserCenter/reg'));
			}
		}
		public function logout () {
				unset($_SESSION['me']);
				$this->success('注销成功',U('/Home/Index/index'));
		}
		public function userInfo() {
			$user_id = $_SESSION['me']['id'];
			$userModel = D('User');
			$userInfo = $userModel->getList();
			$this->display();
		}
		public function	editUserInfo() {
			$user_id = $_SESSION['me']['id'];
			$userModel = D('User');
			$userInfo = $userModel->getUserInfo();
			include "./view/usercenter/edit.html";
		}
		public function doEditUserInfo() {
			$id = $_POST['id'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$upload =L("Upload");
			$image = $upload->run('image');
			$userModel = D('User');
			$status = $userModel->editUserInfo($name,$email,$password,$image,$id);
			if ($status) {
				header('Refresh:1,Url=index.php?c=UserCenter&a=userInfo');
				echo '修改成功，1秒后跳转';
				die();
			}
		}
}