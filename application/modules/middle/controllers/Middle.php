<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Middle extends MY_Controller {

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
        $_SESSION['users']=array();
        $this->load->library('template');
        $this->load->model('middle_model');
        $data['teams']=$this->middle_model->get_teams();
        $this->template->set_title('余姚初中生');
        $this->template->add_js('modules/Chart.min.js');
        $this->template->add_js('modules/questions.js');
        $this->template->add_js('modules/middle.js');
        $this->template->load_view('middle',$data);
    }
}
