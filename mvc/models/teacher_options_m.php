<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class teacher_options_m extends MY_Model {

	protected $_table_name = 'teacher_options';
	protected $_primary_key = 'teacher_options_id';
	protected $_primary_filter = 'intval';
	protected $_order_by = "teacherID,option_type,option_type_id";

	function __construct() {
		parent::__construct();
	}

	function get_teacher_options_max_option_type_id($option_type) {
		$this->db->select_max('option_type_id');
		$this->db->where('option_type', $option_type);
		$query = $this->db->get($this->_table_name);
		$max = $query->result_array()[0][option_type_id];
		if($max){
			return $max + 1;
		}else{
			return 1;
		}
	}

	function get_teacher_options_id($array){
		$this->db->select('teacher_options_id');
		$this->db->where($array);
		$query = $this->db->get($this->_table_name);
		return $query->result_array()[0][teacher_options_id];
	}

	function get_teacher_options($array){
		$this->db->select("teacherID,option_type,option_type_id,
       group_concat(case when option_key='name' then option_value end order by 1) as name,
       group_concat(case when option_key='start_station' then option_value end order by 1) as start_station,
       group_concat(case when option_key='end_station' then option_value end order by 1) as end_station,
       group_concat(case when option_key='fare' then option_value end order by 1) as fare,
       group_concat(case when option_key='note' then option_value end order by 1) as note,
       group_concat(case when option_key='createusername' then option_value end order by 1) as createusername");
		$this->db->where($array)->group_by('teacherID,option_type,option_type_id')->order_by($this->_order_by);
		$query = $this->db->get($this->_table_name);
		return $query->result();
	}

	function get_order_by_teacher_options($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function insert_teacher_options_batch($data) {
		return $this->db->insert_batch($this->_table_name, $data);
	}

	function update_teacher_options($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	function delete_teacher_options($id) {
		parent::delete($id);
	}

	function hash($string) {
		return parent::hash($string);
	}
}

/* End of file teacher_m.php */
/* Location: .//D/xampp/htdocs/school/mvc/models/teacher_m.php */
