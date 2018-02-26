<?php
class Backend_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function save($inputdata, $filename) {

		$this->db->insert('items', $inputdata); 
		$insert_id = $this->db->insert_id();

		if($filename!='' ){
			$filename1 = explode(',',$filename);
			foreach($filename1 as $file){
				$file_data = array('image' => $file, 'item_id' => $insert_id);
				$this->db->insert('item_img', $file_data);
			}
		}
	}

	public function view_data(){
		$query = $this->db->query("SELECT ud.* FROM items ud ORDER BY ud.id DESC");
		return $query->result_array();
	}

	public function edit_data($id){
		$query = $this->db->query("SELECT ud.* FROM items ud WHERE ud.id = $id");
		return $query->result_array();
	}

	public function delete_data($id){
		$query = $this->db->query("DELETE FROM `items` WHERE id = $id");
		$this->delete_data_image($id);
		// return $query->result_array();
	}

	public function edit_data_image($id){
		$query=$this->db->query("SELECT * FROM item_img INNER JOIN items ON item_img.item_id = $id");
		return $query->result_array();
	}

	public function delete_data_image($id){
		$query=$this->db->query("DELETE FROM `item_img` WHERE item_id = $id");
		// return $query->result_array();
	}

	public function edit_upload_image($item_id, $inputdata, $filename = '') {

		$data = array('title' => $inputdata['title'], 'price' => $inputdata['price'], 'details' => $inputdata['details']);
		$this->db->where('id', $item_id);
		$this->db->update('items', $data);

		if($filename!='' ) {
			$filename1 = explode(',',$filename);
			foreach($filename1 as $file) {
				$file_data = array('image' => $file, 'item_id' => $item_id);
				$this->db->insert('item_img', $file_data);
			}
		}
	}

}