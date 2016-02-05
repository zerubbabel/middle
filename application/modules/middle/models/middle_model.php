<?php
class Middle_model extends CI_Model {
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        }
        public function check_rush(){
                $this->db->from('rush');
                $this->db->order_by('rush_time','desc');
                $this->db->limit(1);
                //$query = $this->db->get('rush').order_by('rush_time','desc').limit(1);
                $query = $this->db->get();
                $data=$query->result_array();
                //var_dump($data);
                if (count($data)<1 || $data[0]['userid']=='0'){
                    return 0;
                };
                return $data[0]['userid'];
        }
        public function get_teams()
        {
                $query = $this->db->get('login');
                
                return $query->result_array();
        }

        public function get_qd()
        {
                $query = $this->db->get_where('qd', array('userid' => $userid));
                
                return $query->result_array();
        }
        public function start_rush(){               
                $this->userid=0;
                $this->db->insert('rush',$this);
        }

        public function right($userid,$point=1){

                $query = $this->db->get_where('login', array('userid' => $userid));
                $points=$query->result_array()[0]['points'];
                $this->points= $points+1; 
                $this->db->update('login', $this, array('userid' => $userid));
        }
        public function update_poll($id)
        {
                $query = $this->db->get_where('polls', array('id' => $id));
                $qty=$query->result_array()[0]['qty'];
                $this->qty= $qty+1; 
                $this->db->update('polls', $this, array('id' => $id));
                
        }
        /*
        public function insert_entry()
        {
                $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->insert('entries', $this);
        }*/
}
?>