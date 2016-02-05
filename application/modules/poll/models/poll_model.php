<?php
class Poll_model extends CI_Model {
        public $qty;
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        }
        public function get_polls()
        {
                $query = $this->db->get('polls');
                
                return $query->result_array();
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