<?php
namespace  Admin\Model;
use Think\Model\RelationModel;
class ShowModel extends RelationModel{

	protected $_link = array(
			
		'ShowClass' =>array(
				'mapping_type' => self::BELONGS_TO,
				'class_name' => 'ShowClass',
				'foreign_key' => 'class_id',
				'as_fields' =>'class_name:type',

				)
		);

}