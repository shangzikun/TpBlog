<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	// phpinfo();
    	// die();
    	$ClassifyModel = D('classify');
        $lists = D('blog')->select();
    	foreach ($lists as $key => $value) {
			$lists[$key]['year']= substr($value['createtime'], 0,5);
			$lists[$key]['month']= substr($value['createtime'], 5,5);
			$classify_info = $ClassifyModel->getInfoById($value['classify_id']);
			$lists[$key]['classify_name']= $classify_info['name'];
		}
    	$this->assign('lists',$lists);
        $this->display();
    }
    public function info(){
    	$id = I('get.id');
    	$info = D('blog')->where(array('id'=>$id))->find();
        $classifyModel = D('classify');
        $userModel = D('user');
        $commentModel = D('comment');
        $where = "classify_id = {$info['classify_id']} and id !={$id} ";
        $data = D('blog')->where($where)->select();
        $commentWhere = "blog_id = {$info['id']}";
        $commentLists = $commentModel->getList(0,20,'id desc',$commentWhere);
        $commentCount = $commentModel->getCount($commentWhere);
        foreach ($commentLists as $key => $comment) {
            $userInfo = $userModel->getInfoById($comment['user_id']);
            $commentLists[$key]['author'] = $userInfo;
        }
        $this->assign('commentCount',$commentCount);
        $this->assign('commentLists',$commentLists);
    	$this->assign('blogInfo',$info);
        $this->assign('data',$data);
    	$this->display();
    }
    public function doComment() {
        $blog_id = I("post.blog_id");
        $user_id = I("post.user_id");
        $parent_id = I("post.parent_id");
        $content = I("post.content",'');
        if (!isset($_SESSION['me']['id']) || !$_SESSION['me']['id']) {
            header('Refresh:1,Url=index.php?c=UserCenter&a=login');
            echo "请登录";
            die();
        } 
        if (!$blog_id || !$content) {
            $this->error('error');         
        }
        $commentModel = D('Comment')->add($blog_id,$user_id,$parent_id,$content);
        if ($commentModel) {
            $this->success('评论成功',U('Home/index/info/id/'.$blog_id));
           
        }       
    }
    public function back() {
            echo "<script>alert('返回上一页');history.go(-2);</script>";  
    }
    public function verifycode() {
    	$config =    array(
	    'fontSize'    =>    30,    // 验证码字体大小
	    'length'      =>    4,     // 验证码位数
	    'useNoise'    =>    false, // 关闭验证码杂点
	    'fontttf'     =>   '5.ttf',// 验证码字体使用 ThinkPHP/Library/Think/Verify/ttfs/5.ttf
	    'useImgBg'    =>    true,  // 开启验证码背景图片功能 随机使用 ThinkPHP/Library/Think/Verify/bgs 目录下面的图片
		//'codeSet'     => '0123456789',// 设置验证码字符为纯数字
	   );
		$Verify =     new \Think\Verify($config);
		$Verify->entry();
    }    
}