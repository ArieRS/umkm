<?php

/*
 * @Author:    Kiril Kirkov
 *  Gitgub:    https://github.com/kirilkirkov
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class PublishSlider extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'Slider_model'
        ));
    }

    public function index($id = 0)
    {
        $this->login_check();
        $is_update = false;
        $trans_load = null;
        /*if ($id > 0 && $_POST == null) {
            $_POST = $this->Products_model->getOneProduct($id);
            $trans_load = $this->Products_model->getTranslations($id);
        }*/
        if (isset($_POST['submit'])) {
            if (isset($_GET['to_lang'])) {
                $id = 0;
            }
            $_POST['image'] = $this->uploadImage();
            $this->Slider_model->setSlider($_POST, $id);
            $this->session->set_flashdata('result_publish', 'Slider Image is published!');
            if ($id == 0) {
                $this->saveHistory('Success published slider image');
            } else {
                $this->saveHistory('Success updated slider image');
            }
            if (isset($_SESSION['filter']) && $id > 0) {
                $get = '';
                foreach ($_SESSION['filter'] as $key => $value) {
                    $get .= trim($key) . '=' . trim($value) . '&';
                }
                redirect(base_url('admin/sliderimage?' . $get));
            } else {
                redirect('admin/sliderimage');
            }
        }
        $data = array();
        $head = array();
        $head['title'] = 'Administration - Publish Slider Image';
        $head['description'] = '!';
        $head['keywords'] = '';
        $data['id'] = $id;
        $data['trans_load'] = $trans_load;                
        $this->load->view('_parts/header', $head);
        $this->load->view('ecommerce/publishslider', $data);
        $this->load->view('_parts/footer');
        $this->saveHistory('Go to publish slider');
    }

    private function uploadImage()
    {
        $config['upload_path'] = './attachments/slider_image/';
        $config['allowed_types'] = $this->allowed_img_types;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('userfile')) {
            log_message('error', 'Image Upload Error: ' . $this->upload->display_errors());
        }
        $img = $this->upload->data();
        return $img['file_name'];
    }
    
}
