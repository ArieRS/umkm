<?php

class Vendorprofile_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @description mendapatkan info vendor berdasar email
     * @param $email email yang digunakan vendor
     * @return row_array()
     */
    public function getVendorInfoFromEmail($email)
    {
        $this->db->where('email', $email);
        $result = $this->db->get('vendors');
        return $result->row_array();
    }

    public function getVendorByUrlAddress($urlAddr)
    {
        $this->db->where('url', $urlAddr);
        $result = $this->db->get('vendors');
        return $result->row_array();
    }

    /**
     * @description untuk menyimpan data detail data vendor
     * @param $post
     * @param $vendor_id
     */
    public function saveNewVendorDetails($post, $vendor_id)
    {
        if (!$this->db->where('id', $vendor_id)->update('vendors', array(
                    'name' => $post['vendor_name'],
                    'address' => $post['vendor_address'],
                    'email' => $post['vendor_email'],
                    'phone' => $post['vendor_phone'],
                    'city' => $post['vendor_city'],
                    'post_code' => $post['vendor_post_code'])))
        {
            log_message('error', print_r($this->db->error(), true));
        }else{
            $_SESSION['logged_vendor'] = $post['vendor_email'];
            $_SESSION['logged_vendor_name'] = $post['vendor_name'];
        }
    }

    public function isVendorUrlFree($vendorUrl)
    {
        $this->db->where('url', $vendorUrl);
        $num = $this->db->count_all_results('vendors');
        if ($num > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function getOrdersByMonth($vendor_id)
    {
        $result = $this->db->query("SELECT YEAR(FROM_UNIXTIME(date)) as year, MONTH(FROM_UNIXTIME(date)) as month, COUNT(id) as num FROM vendors_orders WHERE vendor_id = $vendor_id GROUP BY YEAR(FROM_UNIXTIME(date)), MONTH(FROM_UNIXTIME(date)) ASC");
        $result = $result->result_array();
        $orders = array();
        $years = array();
        foreach ($result as $res) {
            if (!isset($orders[$res['year']])) {
                for ($i = 1; $i <= 12; $i++) {
                    $orders[$res['year']][$i] = 0;
                }
            }
            $years[] = $res['year'];
            $orders[$res['year']][$res['month']] = $res['num'];
        }
        return array(
            'years' => array_unique($years),
            'orders' => $orders
        );
    }

}
