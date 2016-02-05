<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Middle_ajax extends Ajax_Controller {

    function check_rush(){
        $this->load->model('middle_model');
        /*while (true){
            
            if($data!=0){
                break;
            }
        }*/
        $data=$this->middle_model->check_rush();
        /*$script = "setSelectTeam(".$data.")"; 

        $this->response->script($script);
        $this->response->send();  */  
        echo json_encode($data);
    }
    function start_rush(){
        $this->load->model('middle_model');
        $data=$this->middle_model->start_rush();

        //$this->check_rush();
    }
    function right(){
        $this->load->model('middle_model');
        $userid=$this->input->get_post('userid');
        
        $result=$this->middle_model->right($userid);
        $script = "recount(".$userid.")";
    
        $this->response->script($script);
        $this->response->send();
    }

    function test_ajaxify()
    {
        $this->load->model('poll_model');
        switch ($this->input->get_post('type'))
        {
            case 'a':
                $script = <<< JS
var count = parseInt($(this).find('.badge').text());
$(this).find('.badge').text(count + 1);
window.location.reload();
//reloadPie();
JS;
                $this->response->script($script);
                $this->poll_model->update_poll($this->input->get_post('id'));
                break;
            /*case 'form':
                $title = $this->input->get_post('title');
                $content = $this->input->get_post('content');

                $content = nl2br($content);

                $html = "<p><strong>Title: </strong>{$title}</p><p><strong>Content: </strong>{$content}</p>";
                $json_html = json_encode($html);

                $this->response->script("$($(this).data('target')).html({$json_html})");
                break;
            case 'alert':
                $this->response->alert('$title', '$body');
                break;
            case 'confirm':
                if ($this->response->confirm('$title', '$body'))
                {
                    $this->response->script('$(this).data("caller").after("<div>Confirmed!</div>");');
                }
                break;
            case 'dialog':
                $this->response->dialog(array(
                    'title' => '$title',
                    'content' => '$content',
                    'body' => '$body',
                    'footer' => '$footer',
                ));
                break;
            case 'dialog_small':
                $this->response->dialog(array(
                    'title' => '$title',
                    'content' => '$content',
                    'body' => '$body',
                    'footer' => '$footer',
                    'size' => 'small',
                ));
                break;
            case 'dialog_large':
                $this->response->dialog(array(
                    'title' => '$title',
                    'content' => '$content',
                    'body' => '$body',
                    'footer' => '$footer',
                    'size' => 'large',
                ));*/
                break;
        }
        $this->response->send();
    }
}

/* End of file skeleton_ajax.php */
/* Location: ./application/modules/skeleton/controllers/skeleton_ajax.php */