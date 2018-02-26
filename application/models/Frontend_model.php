<?php
class Frontend_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function view_data(){
		$query = $this->db->query("SELECT * FROM items LEFT JOIN item_img ON item_img.item_id = items.id");
		return $query->result_array();
	}
}