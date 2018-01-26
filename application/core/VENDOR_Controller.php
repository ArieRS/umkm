<?php

/*
 * @Author:    Kiril Kirkov
 * Github:     https://github.com/kirilkirkov
 * @Maintain:  Arie Rachmad Syulistyo
 * Github:     https://github.com/ariers
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class VENDOR_Controller extends MY_Controller
{

    protected $allowed_img_types;
    public $vendor_id;
    public $vendor_name;
    public $vendor_address;
    public $vendor_email;
    public $vendor_phone;
    public $vendor_city;
    public $vendor_post_code;

    protected $template;

    public function __construct()
    {
        parent::__construct();
        $this->loginCheck();
        $this->setVendorInfo();
        $this->loadTemplate();
        $this->allowed_img_types = $this->config->item('allowed_img_types');
        $vars = array();
        $vars['load'] = $this->loop;
        $vars['vendor_name'] = $this->vendor_name;
        $vars['vendor_address'] = $this->vendor_address;
        $vars['vendor_email'] = $this->vendor_email;
        $vars['vendor_phone'] = $this->vendor_phone;
        $vars['vendor_city'] = $this->vendor_city;
        $vars['vendor_post_code'] = $this->vendor_post_code;
        $this->load->vars($vars);
        if (isset($_POST['saveVendorDetails'])) {
            $this->saveNewVendorDetails();
        }
    }
    public function _render($view, $head, $data = null, $footer = null)
    {
        $this->load->view($this->template . '_parts/header', $head);
        $this->load->view($this->template . $view, $data);
        $this->load->view($this->template . '_parts/footer', $footer);
    }

    protected function loginCheck()
    {
        if (!isset($_SESSION['logged_vendor']) && get_cookie('logged_vendor') != null) {
            $_SESSION['logged_vendor'] = get_cookie('logged_vendor');
        }
        $authPages = array(
            'vendor/login',
            'vendor/register',
            'vendor/forgotten-password'
        );
        $urlString = uri_string();
        if (preg_match('/[a-zA-Z]{2}/', $urlString)) {
            $urlString = preg_replace('/^[a-zA-Z]{2}\//', '', $urlString);
        }
        if (!isset($_SESSION['logged_vendor']) && !in_array($urlString, $authPages)) {
            redirect(LANG_URL . '/vendor/login');
        } else if (isset($_SESSION['logged_vendor']) && in_array($urlString, $authPages)) {
            redirect(LANG_URL . '/vendor/me');
        }
    }

    /**
     * @param $email
     * @param $remember_me
     */
    protected function setLoginSession($email, $remember_me)
    {
        if ($remember_me == true) {
            set_cookie('logged_vendor', $email, 2678400);
        }
        $_SESSION['logged_vendor'] = $email;

        //
        $this->load->model('Vendorprofile_model');
        if (isset($_SESSION['logged_vendor'])) {
            $array = $this->Vendorprofile_model->getVendorInfoFromEmail($_SESSION['logged_vendor']);
            $this->vendor_name = $array['name'];
            if ($remember_me == true)  set_cookie('logged_vendor_name', $this->vendor_name, 2678400);
            else $_SESSION['logged_vendor_name'] = $this->vendor_name;
        }

    }

    private function setVendorInfo()
    {
        $this->load->model('Vendorprofile_model');
        if (isset($_SESSION['logged_vendor'])) {
            $array = $this->Vendorprofile_model->getVendorInfoFromEmail($_SESSION['logged_vendor']);
            $this->vendor_id = $array['id'];
            $this->vendor_name = $array['name'];
            $this->vendor_email = $array['email'];
            if (isset($array['phone'])==false) $this->vendor_phone = ""; else $this->vendor_phone = $array['phone'] ;
            if (isset($array['address'])==false) $this->vendor_address = ""; else $this->vendor_address = $array['address'] ;
            if (isset($array['city'])==false) $this->vendor_city = ""; else $this->vendor_city = $array['city'] ;
            if (isset($array['post_code'])==false) $this->vendor_post_code = ""; else $this->vendor_post_code = $array['post_code'] ;
        }
    }

    private function saveNewVendorDetails()
    {
        $this->load->model('Auth_model');
        $errors = array();
        if (mb_strlen(trim($_POST['vendor_name'])) == 0) {
            $errors[] = lang('enter_vendor_name');
        }
        //validitas email ada 2
        if (mb_strlen(trim($_POST['vendor_email'])) == 0) {
            $errors[] = lang('enter_vendor_email');
        }else if (!filter_var($_POST['vendor_email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = lang('invalid_email');
        }
        //ketika email yang dimasukkan ke db berbeda dengan email sebelumnya
        if ((isset($_SESSION['logged_vendor'])) && ($_POST['vendor_email']!=$_SESSION['logged_vendor'])){
            $count_emails = $this->Auth_model->countVendorsWithEmail($_POST['vendor_email']);
            if ($count_emails > 0) {
                $errors[] = lang('vendor_email_is_taken');
            }
        }
        $_POST['vendor_phone'] = preg_replace("/[^0-9]/", '', $_POST['vendor_phone']);
        if (mb_strlen(trim($_POST['vendor_phone'])) == 0) {
            $errors[] = lang('enter_vendor_phone');
        }

        if (mb_strlen(trim($_POST['vendor_address'])) == 0) {
            $errors[] = lang('enter_vendor_address');
        }
        if (mb_strlen(trim($_POST['vendor_city'])) == 0) {
            $errors[] = lang('enter_vendor_city');
        }
        if (mb_strlen(trim($_POST['vendor_post_code'])) == 0) {
            $errors[] = lang('enter_vendor_post_code');
        }
//        if (!$this->Vendorprofile_model->isVendorUrlFree($_POST['vendor_url'])) {
//            $errors[] = lang('vendor_url_taken');
//        }
        if (empty($errors)) {
            $_SESSION['logged_vendor_name'] = $_POST['vendor_name'];
            $this->session->set_flashdata('update_vend_details', lang('vendor_details_updated'));
            $this->Vendorprofile_model->saveNewVendorDetails($_POST, $this->vendor_id);
        } else {
            $this->session->set_flashdata('update_vend_err', $errors);
        }
        redirect(LANG_URL . '/vendor/profile');
    }
    
    
    private function loadTemplate()
    {
        $template = $this->Home_admin_model->getValueStore('template');
        if ($template == null) {
            $template = $this->config->item('template');
        } else {
            $this->config->set_item('template', $template);
        }
        if (!is_dir(TEMPLATES_DIR . $template)) {
            show_error('The selected template does not exists!');
        }
        $this->template = 'templates' . DIRECTORY_SEPARATOR . $template . DIRECTORY_SEPARATOR;
    }


}
