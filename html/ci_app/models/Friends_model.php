<?php
class Friends_model extends CI_Model {
    private $table_name = "friends";

    public $id;
    public $image;
    public $opinion;
    public $author;

    public function __construct() {
        parent::__construct();
    }

    public function get_random_opinion() {
        // set random order
        $this->db->order_by('id', 'RANDOM');
        // select last 10 entries
        $query = $this->db->get($this->table_name, '10');

        // randomize even more
        $result = $query->result_array();
        shuffle($result);
        // select random element
        $this->load->helper('array');

        return random_element($result);
    }

    public function get_comments($limit = 0) {
        $this->db->order_by('id', 'DESC');
        $query = 0;
        if ($limit) {
            $query = $this->db->get($this->table_name, $limit);
        }
        else {
            $query = $this->db->get($this->table_name);
        }

        return $query->result_array();
    }

    public function get_comment($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table_name);

        return $query->first_row();
    }

    public function update($data) {
        if(count($data)) {
            $this->id = $data['id'];
            $this->author = $data['author'];
            $this->opinion = $data['opinion'];
            $this->image = $data['image'];

            return $this->db->update($this->table_name, $this,
                array('id' => $this->id));
        }
    }

    public function add($data) {
        if(count($data)) {
            $this->author = $data['author'];
            $this->opinion = $data['opinion'];
            $this->image = $data['image'];

            return $this->db->insert($this->table_name, $this);
        }
    }

    public function delete($data) {
        if(count($data)) {
            $this->db->where('id', $data['id']);
            return $this->db->delete($this->table_name);
        }
    }
}
