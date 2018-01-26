<?php

/*
 * @Author:    Kiril Kirkov
 *  Gitgub:    https://github.com/kirilkirkov
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Profile extends VENDOR_Controller
{

    private $num_rows = 20;

    /**
     * Profile constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vendorprofile_model');
    }

    /**
     * @param int $page
     */
    public function index()
    {
        $data = array();
        $head = array();
        $head['title'] = lang('vendor_profile');
        $head['description'] = lang('vendor_profile');
        $head['keywords'] = '';
        $this->load->view('_parts/header', $head);
        $this->load->view('profile', $data);
        $this->load->view('_parts/footer');
    }
}
