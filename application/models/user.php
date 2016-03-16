<?php
Class User extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    function login($username, $password)
    {
        $query_string="select * from users where username='".$username."'and   password='".$password."'";

        $query=$this->db->query($query_string);

        return $query->row();
    }
}
?>