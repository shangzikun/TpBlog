<?php
namespace Api\Model;
use Api\Model\BaseModel;
class BlogModel extends BaseModel {
		public function format1($info) {
		$data = array(
			"id" 			=>$info['id'],
			"title"			=>$info['title'],
			"classify_id"	=>$info['classify_id'],
			"date"			=>$info['createtime'],
			"author_name"	=>'yjh',
			"read_num"		=>1000,
		);
		return $data;
		}
		public function format2($info) {
		$data = array(
			"id" 			=>$info['id'],
			"title"			=>$info['title'],
			"date"			=>$info['createtime'],
			"content"		=>$info['content'],
			"author_name"	=>'yyx',
			"author_img"	=>'123',
			"read_num"		=>1002,
		);
		return $data;
		}
		public function format3($info) {
		$data = array(
			"id" 			=>$info['id'],
			"title"			=>$info['title'],
			"date"			=>$info['createtime'],
			"author_name"	=>'hs',
			"author_img"	=>222,
			"read_num"		=>2000,
		);
		return $data;
		}
}
