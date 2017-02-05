<?php
class Stories_model extends CI_Model {
    private $table_name = "stories";

    public $id;
    public $title;
    public $summary;
    public $cover_image;
    public $external_link;

    public function __construct() {
        parent::__construct();
    }

    public function get_stories($limit = 0) {
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

    public function get_story($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table_name);

        return $query->first_row();
    }

    public function update($data) {
        if(count($data)) {
            $this->id = $data['id'];
            $this->title = $data['title'];
            $this->summary = $data['summary'];
            $this->cover_image = $data['cover_image'];
            $this->external_link = $data['external_link'];

            return $this->db->update($this->table_name, $this,
                array('id' => $this->id));
        }
    }

    public function add($data) {
        if(count($data)) {
            $this->title = $data['title'];
            $this->summary = $data['summary'];
            $this->cover_image = $data['cover_image'];
            $this->external_link = $data['external_link'];

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

// $this->db->delete('mytable', array('id' => $id));  // Produces: // DELETE FROM mytable  // WHERE id = $id
