<?php
class Login_model extends CI_Model {
        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
            $this->load->database();
        }
   
        public function login_in($userid,$password)
        {
            $this->userid = $userid; 
            //$this->password = $password;
            $this->db->insert('login', $this);
        }
        public function get_rush_time(){
            $query = $this->db->get_where('rush','order by rush_time desc',$limit=1);                
            return $query->result_array();
        }
        public function rush($userid){
            //$query = $this->db->get_where('rush','order by rush_time desc',$limit=1);                
            $this->db->from('rush');
            //$this->db->where(array('userid'=>'0'));
            $this->db->order_by('rush_time','desc');
            $this->db->limit(1);
            //$query = $this->db->get('rush').order_by('rush_time','desc').limit(1);
            $query = $this->db->get();
            $data=$query->result_array();
            if (count($data)<1){
                return false;
            };
            $date=$data[0]['rush_time'];
            $id=$data[0]['id'];
            //var_dump($data[0]['userid']);
            $r=false;
            //$f=(strtotime(date('Y-m-d H:i:s'))>strtotime($date)) && ($data[0]['userid']==0);
            
            //var_dump(((strtotime(date('Y-m-d H:i:s'))>strtotime($date))&& (((int)$data[0]['userid'])==0)));
            //return $r;
            //$flag=strtotime(date('Y-m-d H:i:s'))>strtotime($date);
            //var_dump($flag);
            if ((strtotime(date('Y-m-d H:i:s'))>strtotime($date))&& (((string)$data[0]['userid'])=='0')){
                //$this->userid=$userid;
                $this->db->update('rush', array('userid'=>$userid), array('id' => $id));
                $r=true;
            }
            //var_dump($r);
            return $r;
        }
}
?>