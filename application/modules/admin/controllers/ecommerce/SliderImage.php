<?php

/*
 * @Author:    Kiril Kirkov
 *  Gitgub:    https://github.com/kirilkirkov
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class SliderImage extends ADMIN_Controller
{

    private $num_rows = 10;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Slider_model'));
    }

  public function index($page = 0)
    {
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administration - View Slider Image';
        $head['description'] = '!';
        $head['keywords'] = '';

        if (isset($_GET['delete'])) {
            $this->Slider_model->deleteSlider($_GET['delete']);
            $this->session->set_flashdata('result_delete', 'slider image is deleted!');
            $this->saveHistory('Delete slider id - ' . $_GET['delete']);
            redirect('admin/sliderimage');
        }

        unset($_SESSION['filter']);
        
        $data['products_lang'] = $products_lang = $this->session->userdata('admin_lang_products');        
        $data['sliderimage'] = $this->Slider_model->getslider($this->num_rows, $page);
        
        $this->saveHistory('Go to slider image');
        $this->load->view('_parts/header', $head);
        $this->load->view('ecommerce/sliderimage', $data);
        $this->load->view('_parts/footer');
    }

    public function getProductInfo($id)
    {
        $this->login_check();
        return $this->Products_model->getOneProduct($id);
    }

    /*
     * called from ajax
     */

    public function productStatusChange()
    {
        $this->login_check();
        $result = $this->Products_model->productStatusChange($_POST['id'], $_POST['to_status']);
        if ($result == true) {
            echo 1;
        } else {
            echo 0;
        }
        $this->saveHistory('Change product id ' . $_POST['id'] . ' to status ' . $_POST['to_status']);
    }

}
