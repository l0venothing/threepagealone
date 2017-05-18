<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends MY_Controller {
    public function __construct()
    {
		 parent::__construct();
        $this->load->model("Portfolio_Model");
	}
	public function index()
	{
           $this->data["query"] = $this->Portfolio_Model->get_where();
       
		$this->render('portfolio_vw');
	}
}