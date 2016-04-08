<?php
namespace Admin\Model;

use Think\Model\RelationModel;
class NewsModel extends RelationModel{

	protected $_link = array(
			
		'NewsClass' =>array(
				'mapping_type' => self::BELONGS_TO,
				'class_name' => 'NewsClass',
				'foreign_key' => 'class_id',
				'as_fields' =>'class_name:type',

				)
		);

}