<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');                    /***** LOADING HELPER TO AVOID PHP ERROR ****/
        $this->load->model('Backend_model','backend'); /* LOADING MODEL * backend_model as backend */
    }

    public function index() {
        // $this->load->view('backend/view');
        redirect('backend/view');
    }

    public function add() {
        $this->load->view('backend/add');
    }

    public function file_upload() {
        $files = $_FILES;
        $count = count($_FILES['userfile']['name']);
        for($i=0; $i<$count; $i++) {
            $_FILES['userfile']['name']= time().$files['userfile']['name'][$i];
            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
            $_FILES['userfile']['size']= $files['userfile']['size'][$i];
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2000000';
            $config['remove_spaces'] = true;
            $config['overwrite'] = false;
            $config['max_width'] = '';
            $config['max_height'] = '';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload();
            $fileName = $_FILES['userfile']['name'];
            $images[] = $fileName;
        }

        $fileName = implode(',',$images);

        $this->backend->save($this->input->post(), $fileName);

        redirect('backend/view');
    }

    public function view() {
        $this->data['view_data']= $this->backend->view_data();
        $this->load->view('backend/view', $this->data, FALSE);
    }

    public function edit($edit_id) {
        $this->data['edit_data']= $this->backend->edit_data($edit_id);
        $this->data['edit_data_image']= $this->backend->edit_data_image($edit_id);
        $this->load->view('backend/edit', $this->data, FALSE);
    }

    public function delete($delete_id) {
        $this->backend->delete_data($delete_id);
        redirect('backend/view');
    }

    public function deleteimage() {
        $deleteid  = $this->input->post('image_id');
        $this->db->delete('item_img', array('item_id' => $deleteid)); 
        $verify = $this->db->affected_rows();
        echo $verify;
    }


    public function edit_file_upload() {
        $files = $_FILES;
        if(!empty($files['userfile']['name'][0])) {
            $count = count($_FILES['userfile']['name']);
            $item_id = $this->input->post('item_id');
            for($i=0; $i<$count; $i++)
            {
                $_FILES['userfile']['name']= time().$files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000000';
                $config['remove_spaces'] = true;
                $config['overwrite'] = false;
                $config['max_width'] = '';
                $config['max_height'] = '';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload();
                $fileName = $_FILES['userfile']['name'];
                $images[] = $fileName;
            }

            $fileName = implode(',',$images);
            $this->backend->edit_upload_image($item_id,$this->input->post(),$fileName);
        } else {
            $item_id = $this->input->post('item_id');
            $this->backend->edit_upload_image($item_id,$this->input->post());
        }
        redirect('backend/view');
    }

}
