<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_Authentication extends MX_Controller
{
    function __construct() {
        parent::__construct();

        // Load facebook library
        $this->load->library('facebook');

        //Load user model
        $this->load->model('user');
    }

    public function index(){
        $userData = array();

        // Check if user is logged in
        if($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $userProfile = $this->facebook->request('get', '/me?fields=id,name,email,gender,locale,address');

//            // Preparing data for database insertion
//            $userData['oauth_provider'] = 'facebook';
//            $userData['oauth_uid'] = $userProfile['id'];
//            $userData['first_name'] = $userProfile['first_name'];
//            $userData['last_name'] = $userProfile['last_name'];
//            if(isset ($userProfile['email'])) { $userData['email'] = $userProfile['email'];} else {$userData['email'] =  $userData['first_name']."@facebook.com";}
//            $userData['gender'] = $userProfile['gender'];
//            $userData['locale'] = $userProfile['locale'];
//            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
//            $userData['picture_url'] = $userProfile['picture']['data']['url'];


            var_dump($userProfile);
//            redirect(base_url());
            // Insert or update user data
//            if ($userData['email']!=null)  $userID = $this->user->checkUser($userData);
//            else redirect(base_url());
//
//            // Check user data insert or update status
//            if(!empty($userID)){
//                $data['userData'] = $userData;
//                $this->session->set_userdata('userData',$userData);
//            }else{
//                $data['userData'] = array();
//            }
//
//            // Get logout URL
//            $data['logoutUrl'] = $this->facebook->logout_url();
        }else{
            $fbuser = '';

            // Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
        }

        // Load login & profile view
        var_dump($this->facebook->is_authenticated());
        $this->load->view('user_authentication',$data);
    }

    public function logout() {
        // Remove local Facebook session
        $this->facebook->destroy_session();

        // Remove user data from session
        $this->session->unset_userdata('userData');

        // Redirect to login page
        redirect('/user_authentication');
    }
}