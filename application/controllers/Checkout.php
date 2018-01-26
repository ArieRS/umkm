<?php

/**
 * @Author:    Kiril Kirkov
 * Github:     https://github.com/kirilkirkov
 * @Maintain:  Arie Rachmad Syulistyo
 * Github:     https://github.com/ariers
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends MY_Controller
{

    private $orderId;
    public $vendor_id;
    public $vendor_name;
    public $vendor_address;
    public $vendor_email;
    public $vendor_phone;
    public $vendor_city;
    public $vendor_post_code;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('currency_convertor'));
        $this->load->model('admin/Orders_model');

        $this->setVendorInfo();
        $vars = array();
        $vars['load'] = $this->loop;
        $vars['vendor_name'] = $this->vendor_name;
        $vars['vendor_address'] = $this->vendor_address;
        $vars['vendor_email'] = $this->vendor_email;
        $vars['vendor_phone'] = $this->vendor_phone;
        $vars['vendor_city'] = $this->vendor_city;
        $vars['vendor_post_code'] = $this->vendor_post_code;
        $this->load->vars($vars);
    }

    public function index()
    {
        $data = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('checkout');
        $head['title'] = @$arrSeo['title'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);

        if (isset($_POST['payment_type'])) {
            $errors = $this->userInfoValidate($_POST);
            if (!empty($errors)) {
                $this->session->set_flashdata('submit_error', $errors);
            } else {
                $_POST['referrer'] = $this->session->userdata('referrer');
                $_POST['clean_referrer'] = cleanReferral($_POST['referrer']);
                $orderId = $this->Public_model->setOrder($_POST);
                if ($orderId != false) {
                    /*
                     * Save product orders in vendors profiles
                     */
                    $this->setVendorOrders();
                    $this->orderId = $orderId;
                    $this->setActivationLink();
                    $this->goToDestination();
                } else {
                    log_message('error', 'Cant save order!! ' . implode('::', $_POST));
                    $this->session->set_flashdata('order_error', true);
                    redirect(LANG_URL . '/checkout/order-error');
                }
            }
        }
        $data['bank_account'] = $this->Orders_model->getBankAccountSettings();
        $data['cashondelivery_visibility'] = $this->Home_admin_model->getValueStore('cashondelivery_visibility');
        $data['paypal_email'] = $this->Home_admin_model->getValueStore('paypal_email');
        $data['bestSellers'] = $this->Public_model->getbestSellers();
        $this->render('checkout', $head, $data);
    }

    private function setVendorInfo()
    {
        $this->load->model('vendor/Vendorprofile_model');
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

    private function setVendorOrders()
    {
        $this->Public_model->setVendorOrder($_POST);
        $this->Vendorprofile_model->saveNewVendorDetails($_POST, $this->vendor_id);
    }

    /**
     * @description kirim pesan ke customer dengan email yang sudah
     */
    private function setActivationLink()
    {
        if ($this->config->item('send_confirm_link') === true) {
            $link = md5($this->orderId . time());
            $result = $this->Public_model->setActivationLink($link, $this->orderId);
            if ($result == true) {
                $url = parse_url(base_url());
                $msg = lang('please_confirm') . base_url('confirm/' . $link);
                $this->sendmail->sendTo($_POST['email'], $_POST['name'], lang('confirm_order_subj') . $url['host'], $msg);
            }
        }
    }

    /**
     * @description Untuk mengeset $_SESSION['final_amount'] (jumlah pembayaran) yang harus dibayarkan pembeli
     */

    private function goToDestination()
    {
        if ($_POST['payment_type'] == 'cashOnDelivery' || $_POST['payment_type'] == 'Bank') {
            $this->shoppingcart->clearShoppingCart();
            $this->session->set_flashdata('success_order', true);
        }
        if ($_POST['payment_type'] == 'Bank') {
            $_SESSION['order_id'] = $this->orderId;
            $_SESSION['final_amount'] = $_POST['amount_currency'].' '.$_POST['final_amount'];
            redirect(LANG_URL . '/checkout/successbank');
        }
        if ($_POST['payment_type'] == 'cashOnDelivery') {
            redirect(LANG_URL . '/checkout/successcash');
        }
        if ($_POST['payment_type'] == 'PayPal') {
            @set_cookie('paypal', $this->orderId, 2678400);
            $_SESSION['discountAmount'] = $_POST['discountAmount'];
            redirect(LANG_URL . '/checkout/paypalpayment');
        }
    }

    private function userInfoValidate($post)
    {
//        var_dump($post['quantity'][0]);

        $errors = array();
        if (mb_strlen(trim($post['vendor_name'])) == 0) {
            $errors[] = lang('enter_vendor_name');
        }
//        tidak diperlukan
        if (!filter_var($post['vendor_email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = lang('invalid_email');
        }
//        //perlu ditambah kalau email bisa diubah waktu checkout
//        $count_emails = $this->Auth_model->countVendorsWithEmail($_POST['vendor_email']);
//        if ($count_emails > 1) {
//            $errors[] = lang('vendor_email_is_taken').' '.$count_emails;
//        }
        $post['vendor_phone'] = preg_replace("/[^0-9]/", '', $post['vendor_phone']);
        if (mb_strlen(trim($post['vendor_phone'])) == 0) {
            $errors[] = lang('invalid_phone');
        }
        if (mb_strlen(trim($post['vendor_address'])) == 0) {
            $errors[] = lang('address_empty');
        }
        if (mb_strlen(trim($post['vendor_city'])) == 0) {
            $errors[] = lang('invalid_city');
        }
        if (mb_strlen(trim($post['vendor_post_code'])) == 0) {
            $errors[] = lang('enter_vendor_post_code');
        }
        return $errors;
    }

    public function orderError()
    {
        if ($this->session->flashdata('order_error')) {
            $data = array();
            $head = array();
            $arrSeo = $this->Public_model->getSeo('checkout');
            $head['title'] = @$arrSeo['title'];
            $head['description'] = @$arrSeo['description'];
            $head['keywords'] = str_replace(" ", ",", $head['title']);
            $this->render('checkout_parts/order_error', $head, $data);
        } else {
            redirect(LANG_URL . '/checkout');
        }
    }

    public function paypalPayment()
    {
        $data = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('checkout');
        $head['title'] = @$arrSeo['title'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
        $data['paypal_sandbox'] = $this->Home_admin_model->getValueStore('paypal_sandbox');
        $data['paypal_email'] = $this->Home_admin_model->getValueStore('paypal_email');
        $data['paypal_currency'] = $this->Home_admin_model->getValueStore('paypal_currency');
        $this->render('checkout_parts/paypal_payment', $head, $data);
    }

    public function successPaymentCashOnD()
    {
        if ($this->session->flashdata('success_order')) {
            $data = array();
            $head = array();
            $arrSeo = $this->Public_model->getSeo('checkout');
            $head['title'] = @$arrSeo['title'];
            $head['description'] = @$arrSeo['description'];
            $head['keywords'] = str_replace(" ", ",", $head['title']);
            $this->render('checkout_parts/payment_success_cash', $head, $data);
        } else {
            redirect(LANG_URL . '/checkout');
        }
    }

    public function successPaymentBank()
    {
        if ($this->session->flashdata('success_order')) {
            $data = array();
            $head = array();
            $arrSeo = $this->Public_model->getSeo('checkout');
            $head['title'] = @$arrSeo['title'];
            $head['description'] = @$arrSeo['description'];
            $head['keywords'] = str_replace(" ", ",", $head['title']);
            $data['bank_account'] = $this->Orders_model->getBankAccountSettings();
            $this->render('checkout_parts/payment_success_bank', $head, $data);
        } else {
            redirect(LANG_URL . '/checkout');
        }
    }

    public function paypal_cancel()
    {
        if (get_cookie('paypal') == null) {
            redirect(base_url());
        }
        @delete_cookie('paypal');
        $orderId = get_cookie('paypal');
        $this->Public_model->changePaypalOrderStatus($orderId, 'canceled');
        $data = array();
        $head = array();
        $head['title'] = '';
        $head['description'] = '';
        $head['keywords'] = '';
        $this->render('checkout_parts/paypal_cancel', $head, $data);
    }

    public function paypal_success()
    {
        if (get_cookie('paypal') == null) {
            redirect(base_url());
        }
        @delete_cookie('paypal');
        $this->shoppingcart->clearShoppingCart();
        $orderId = get_cookie('paypal');
        $this->Public_model->changePaypalOrderStatus($orderId, 'payed');
        $data = array();
        $head = array();
        $head['title'] = '';
        $head['description'] = '';
        $head['keywords'] = '';
        $this->render('checkout_parts/paypal_success', $head, $data);
    }

}
