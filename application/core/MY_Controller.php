<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller {

    public $data = array();
    public function render($view, $template='template/base/base')
    {
        $this->data["view_content"] = $this->load->view($view, $this->data, TRUE);
        $this->load->view($template, $this->data);
    }
}