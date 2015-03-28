<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Memperbaiki masalah dengan session yang hilang ketika menggunakan banyak ajax 
//https://degreesofzero.com/article/55

//atau jika ini tikda berhasil, pake http://hadiariawan.web.id/2011/11/12/codeigniter-session-problem/

require_once BASEPATH . '/libraries/Session.php';

class MY_Session extends CI_Session
{

    function __construct()
    {
        parent::__construct();

        $this->CI->session = $this;
    }

    function sess_update()
    {
        // Do NOT update an existing session on AJAX calls.
        if (!$this->CI->input->is_ajax_request())
            return parent::sess_update();
    }

}

/* End of file MY_Session.php */
/* Location: ./application/libraries/MY_Session.php */