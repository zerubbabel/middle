<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_ajax extends Ajax_Controller {

    function login_in()
    {
        $this->load->model('login_model');
        $script = <<< JS
$('#qd').show();
$('#main').hide();

JS;
        $this->response->script($script);
        $userid=$this->input->get_post('userid');
        $password=$this->input->get_post('password');
        //$this->login_model->login_in($userid,$password);
        //$this->poll_model->update_poll($this->input->get_post('id'));
        $this->response->send();
    }

    function rush(){
        $this->load->model('login_model');
        $userid=$this->input->get_post('userid');
        $r=$this->login_model->rush($userid);
        if($r)
        {
            $script="showResult(".$r.")";
            $this->response->script($script);
            $this->response->send();
        }
    }
}

/* End of file skeleton_ajax.php */
/* Location: ./application/modules/skeleton/controllers/skeleton_ajax.php */