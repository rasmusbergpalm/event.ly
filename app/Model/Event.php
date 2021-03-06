<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 */
class Event extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
        public $hasMany = array('Guest');
        public $actsAs = array('Containable');
        
        private function createRandomId(){
            $id = '';
            $n = strlen(BASE62);
            $b62 = BASE62;
            for($i=0; $i<7;$i++){
                $id .= $b62[rand(0,$n)];
            }
            return $id;
        }
        
        public function beforeSave(){
            if(empty($this->data['Event']['id'])){ //creating a new record
                $this->data['Event']['view_id'] = $this->createRandomId();
            }
            
            $this->data['Event']['from'] = date('Y-m-d H:i:s', strtotime($this->data['Event']['from'].' '.$this->data['Event']['fromTime']));
            if(!empty($this->data['Event']['to'])){
                $this->data['Event']['to'] = date('Y-m-d H:i:s', strtotime($this->data['Event']['to'].' '.$this->data['Event']['toTime']));
            }
            return true;
        }
/**
 * Validation rules
 *
 * @var array
 */
        /*
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'from' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'to' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'location' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
        */
}
