<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library('session');
    }

    function index()
    {
        $session_result=$this->session->userdata('logged_in');
        if(!$session_result)
        {
            $this->load->view('login_view');

        }

    }
}
?>
