<?php
namespace Api\Model;
use Api\Model\BaseModel;
class AdModel extends BaseModel {
	public function format($info) {
		$data = array(
			"id" 		=>$info['id'],
			"img"		=>$info['image'],
			"url"		=>$info['url'],
			"title"		=>你好,
		);
		return $data;
	}
}