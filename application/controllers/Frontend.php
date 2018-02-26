<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');                    /***** LOADING HELPER TO AVOID PHP ERROR ****/
        $this->load->model('Frontend_model','frontend'); /* LOADING MODEL * Welcome_model as welcome */
    }

	public function index() {
        $this->data['view_data'] = $this->frontend->view_data();
        $this->load->view('frontend/index', $this->data, FALSE);
	}

	public function view(){
		$this->data['view_data']= $this->frontend->view_data();
        $this->load->view('view', $this->data, FALSE);
	}

}
