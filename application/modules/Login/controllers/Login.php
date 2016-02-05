<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('login_model','',TRUE);
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/skeleton
     *  - or -
     *      http://example.com/index.php/skeleton/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/skeleton/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {        
        $this->load->library('template');
        $this->load->model('login_model');
        //$data['polls']=$this->register_model->get_polls();
        $this->template->set_title('登录');
        $data['title']='登录';
        //$this->template->add_js('modules/Chart.min.js');
        $this->template->add_js('modules/login.js');
        $this->template->load_view('login',$data);

    }

    public function create()
    {
        $this->load->helper('form');
        //$this->load->library('form_validation');
        $this->load->library('template');
        //$this->load->model('register_model');
        //$data['polls']=$this->register_model->get_polls();
        $this->template->set_title('网上报名');
        $data['title'] = '网上报名';

        $this->form_validation->set_rules('name', '姓名', 'required');
        $this->form_validation->set_rules('phone', '手机', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->template->load_view('register',$data);
        }
        else
        {
            $this->register_model->new_student();
            
            //$this->load->view('success');
            $this->template->load_view('success',$data);
        }
    }
}
