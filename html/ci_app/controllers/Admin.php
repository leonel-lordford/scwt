<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function index() {
        $userdata = $this->session->userdata;

        if($this->is_valid_user()) {
            redirect("admin/manage");
        }

        // view data
        $view_context = array();

        // check for post data
        if(count($this->input->post())) {
            $u = md5(html_escape($this->input->post('username')));
            $p = md5(html_escape($this->input->post('password')));
            $c = html_escape($this->input->post('captcha'));

            // load validations
            $this->load->library('form_validation');
            // set rules
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            // $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required');
            // $this->form_validation->set_rules('resumem', 'Resumen', 'required',
            //         array('required' => 'Debe escribir el %s de la historia.')
            // );

            if($this->form_validation->run()) {
                $this->load->database();

                // verify login
                $query = $this->db->select('name')->from('admin')->where('username', $u)->where('password', $p)->get();

                $row = $query->row_object();
                if(count($row)) {
                    $view_context['name'] = $row->name;

                    $user_data = array(
                        'authenticated' => true,
                        'username' => $u,
                        'name' => $row->name
                    );
                    $this->session->userdata = $user_data;

                    redirect("admin/manage");
                }
                else {
                    $view_context['login_failed'] = 'login_failed';
                }
            }
        }

        // captcha
        $this->load->helper('captcha');
        $vals = array(
            'img_path' => './captcha/',
            'img_url' => base_url('captcha/'),
            'expiration' => 120,
            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        $cap = create_captcha($vals);

        // TODO
        // insert captcha in DB

        if($cap) {
            $view_context['captcha'] = $cap['image'];
        }

        // load helper and view
        $this->load->helper('form');
        $this->load->view('admin/login', $view_context);
    }

    public function manage() {
        if(!$this->is_valid_user()) {
            redirect('admin');
            // set flash_data like in sessions to show temp data in login page
        }

        $view_context = array();
        $userdata = $this->session->userdata;



        $view_context['title'] = "Main menu";
        $view_context['name'] = $userdata['name'];
        // load manager view
        $this->load->view('admin/manage', $view_context);
    }

    public function logout() {
        $this->session->sess_destroy();

        redirect("admin");
        // set flash_data like in sessions to show temp data in login page
    }

    public function listing($type) {
        if(!$this->is_valid_user()) {
            redirect('admin');
            // set flash_data like in sessions to show temp data in login page
        }

        $view_context = array();

        switch($type) {
            case "text":
                $this->load->model('statictext_model');

                if(count($this->input->post())) {
                    // load validations
                    $this->load->library('form_validation');
                    // set rules
                    $this->form_validation->set_rules('overview', 'Overview heading', 'trim|required');
                    $this->form_validation->set_rules('overview_welcome', 'Overview welcome', 'trim|required');
                    $this->form_validation->set_rules('overview_transport', 'Overview transport', 'trim|required');
                    $this->form_validation->set_rules('overview_accommodation', 'Overview accommodation', 'trim|required');
                    $this->form_validation->set_rules('overview_tours', 'Overview tours', 'trim|required');
                    $this->form_validation->set_rules('stories', 'Stories heading', 'trim|required');
                    $this->form_validation->set_rules('friends', 'Friends heading', 'trim|required');
                    $this->form_validation->set_rules('address', 'Address', 'trim|required');
                    $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
                    $this->form_validation->set_rules('email', 'Email', 'trim|required');
                    $this->form_validation->set_rules('contact_info_yanet', 'Contact info: Yanet', 'trim|required');
                    $this->form_validation->set_rules('contact_info_abel', 'Contact info: Abel', 'trim|required');
                    $this->form_validation->set_rules('contact_info_jane', 'Contact info: Jane', 'trim|required');
                    $this->form_validation->set_rules('transport', 'Transport heading', 'trim|required');
                    $this->form_validation->set_rules('accommodation', 'Accommodation heading', 'trim|required');
                    $this->form_validation->set_rules('tours', 'Tours heading', 'trim|required');

                    // $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required');
              //       $this->form_validation->set_rules('resumem', 'Resumen', 'required',
                    //         array('required' => 'Debe escribir el %s de la historia.')
                    // );

                    if($this->form_validation->run()) {
                        // load array helper
                        $this->load->helper('array');
                        // using elements from array helper to extract data from post
                        $items = array(
                            "id", "overview", "overview_welcome",
                            "overview_transport", "overview_accommodation",
                            "overview_tours", "stories", "friends",
                            "address", "phone", "email", "contact_info_yanet",
                            "contact_info_abel", "contact_info_jane",
                            "transport", "accommodation", "tours"
                        );

                        // update database
                        $result = $this->statictext_model->update(elements($items, $this->input->post()));

                        if($result) {
                            $view_context['data_saved'] = "Data saved.";
                        }
                        else {
                            $error_msg = $this->db->error()['message'];
                            $view_context['errors'] = "Operation failed, please try again. Error: ". $error_msg;
                        }
                    }
                }

                $view_context['section_title'] = "Static Text";
                $view_context['model'] = $this->statictext_model;

                // load helper and view
                $this->load->helper('form');
                $this->load->view('admin/statictext', $view_context);
            break;
            case "images":
                $this->load->model('staticimages_model');

                if(count($this->input->post())) {
                    // upload file and process new image
                    // config options
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    // $config['max_size'] = 0;
                    // $config['max_width'] = 1024;
                    // $config['max_height'] = 768;

                    // load upload library
                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('new_image')) {
                        // select correct destination dir
                        switch($this->input->post('selected_image')) {
                            case 'overview_img_welcome':
                            case 'overview_img_transport':
                            case 'overview_img_accommodation':
                            case 'overview_img_tours':
                                $dest_dir = "assets/imgs/overview/";
                                break;
                            case 'contact_img_yanet':
                            case 'contact_img_abel':
                            case 'contact_img_jane':
                                $dest_dir = "assets/imgs/contact/";
                        }

                        // generate new filename, eliminate common filename mistakes like
                        // spaces, hyphen, dots...
                        $dest = $dest_dir . random_string() . $this->upload->data('file_ext');

                        // move uploaded file to final destination
                        if(rename("uploads/" . $this->upload->data('orig_name'), $dest)) {
                            $view_context['data_saved'] = "Data saved.";

                            // duplicate readonly input->post array and update new_image value
                            $tmp_input = $this->input->post();
                            $tmp_input['new_image'] = $dest;

                            // load array helper
                            $this->load->helper('array');

                            // using elements from array helper to extract data from post
                            $items = array(
                                "id", "selected_image", "new_image"
                            );

                            // update database
                            $result = $this->staticimages_model->update(elements($items, $tmp_input));
                        }
                        else {
                            $view_context['errors'] = "Operation failed, please try again. Error: can't move file to destination dir, please check directory permissions.";
                        }
                    }
                    else {
                        $view_context['errors'] = "Operation failed, please try again. Error: ". $this->upload->display_errors();
                    }
                }

                $view_context['section_title'] = "Static Images";
                $view_context['model'] = $this->staticimages_model;

                // load helper and view
                $this->load->helper('form');
                $this->load->view('admin/staticimages', $view_context);
            break;
            case "stories":
                $this->load->model('stories_model');

                $view_context['section_title'] = "Stories";
                $view_context['stories'] = $this->stories_model->get_stories(10);

                // load helper and view
                $this->load->helper('form');
                $this->load->view('admin/list', $view_context);
            break;
            case "friends":
                $this->load->model('friends_model');

                $view_context['section_title'] = "Friends";
                $view_context['comments'] = $this->friends_model->get_comments(10);

                // load helper and view
                $this->load->helper('form');
                $this->load->view('admin/list', $view_context);
            break;
        }
    }

    public function edit_story($id) {
        if(!$this->is_valid_user()) {
            redirect('admin');
            // set flash_data like in sessions to show temp data in login page
        }

        $this->load->model('stories_model');

        $view_context = array();

        if(count($this->input->post())) {
            // load validations
            $this->load->library('form_validation');
            // set rules
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('summary', 'Summary', 'trim|required');
            $this->form_validation->set_rules('external_link', 'See more link', 'trim|required');

            if($this->form_validation->run()) {
                // upload file and process new image
                // config options
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';

                // load upload library
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('cover_image')) {
                    $dest_dir = "assets/imgs/stories/";
                }
                else {
                    $view_context['errors'] = "Operation failed, please try again. Error: " . $this->upload->display_errors();
                }
                // generate new filename, eliminate common filename mistakes like
                // spaces, hyphen, dots...
                $dest = $dest_dir . random_string() . $this->upload->data('file_ext');

                // move uploaded file to final destination
                if(rename("uploads/" . $this->upload->data('orig_name'), $dest)) {
                    // update database
                    // load array helper
                    $this->load->helper('array');
                    // using elements from array helper to extract data from post
                    $items = array(
                        "id", "title", "summary", "cover_image", "external_link"
                    );
                    // duplicate readonly input->post array and update new_image value
                    $tmp_input = $this->input->post();
                    $tmp_input['cover_image'] = $dest;

                    // update database
                    $result = $this->stories_model->update(elements($items, $tmp_input));

                    if($result) {
                        $view_context['data_saved'] = "Data saved.";
                    }
                    else {
                        $error_msg = $this->db->error()['message'];
                        $view_context['errors'] = "Operation failed, please try again. Error: ". $error_msg;
                    }


                }
                else {
                    $view_context['errors'] = "Operation failed, please try again. Error: can't move file to destination dir, please check directory permissions.";
                }
            }
        }

        $view_context['section_title'] = "Stories";
        if (!isset($id)) {
            redirect("admin");
        }

        $story = $this->stories_model->get_story($id);
        if ($story) {
            $view_context['story'] = $story;
        }
        else {
            redirect('admin/list/stories');
        }

        // load helper and view
        $this->load->helper('form');
        $this->load->view('admin/edit', $view_context);

        // $userdata = $this->session->userdata;
    }

    public function remove_story() {
        if(!$this->is_valid_user()) {
            redirect('admin');
            // set flash_data like in sessions to show temp data in login page
        }

        $this->load->model('stories_model');

        $view_context = array();

        if(count($this->input->post())) {
            $this->load->helper('array');
            $items = array(
                "id"
            );
            // delete from database
            $result = $this->stories_model->delete(elements($items, $this->input->post()));

            if($result) {
                $view_context['data_saved'] = "Data deleted.";
            }
            else {
                $error_msg = $this->db->error()['message'];
                $view_context['errors'] = "Operation failed, please try again. Error: ". $error_msg;
            }

            // load helper and view
            $this->load->helper('form');
            $view_context['section_title'] = "Stories";
            $view_context['stories'] = $this->stories_model->get_stories(10);
            $this->load->view('admin/list', $view_context);
        }
        else {
            redirect("admin/list/stories");
        }
    }

    public function add_story() {
        $view_context = array();

        $this->load->model('stories_model');

        if(count($this->input->post())) {
            // load validations
            $this->load->library('form_validation');
            // set rules
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('summary', 'Summary', 'trim|required');
            $this->form_validation->set_rules('external_link', 'See more link', 'trim|required');

            if($this->form_validation->run()) {
                // upload file and process new image
                // config options
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                // $config['max_size'] = 0;
                // $config['max_width'] = 1024;
                // $config['max_height'] = 768;

                // load upload library
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('cover_image')) {
                    $dest_dir = "assets/imgs/stories/";
                }
                else {
                    $view_context['errors'] = "Operation failed, please try again. Error: " . $this->upload->display_errors();
                }
                // generate new filename, eliminate common filename mistakes like
                // spaces, hyphen, dots...
                $dest = $dest_dir . random_string() . $this->upload->data('file_ext');

                // move uploaded file to final destination
                if(rename("uploads/" . $this->upload->data('orig_name'), $dest)) {
                    // update database
                    // load array helper
                    $this->load->helper('array');
                    // using elements from array helper to extract data from post
                    $items = array(
                        "title", "summary", "cover_image", "external_link"
                    );
                    // duplicate readonly input->post array and update new_image value
                    $tmp_input = $this->input->post();
                    $tmp_input['cover_image'] = $dest;

                    // insert in database
                    $result = $this->stories_model->add(elements($items, $tmp_input));

                    if($result) {
                        $view_context['data_saved'] = "Story \"". $tmp_input['title'] ."\" added.";
                    }
                    else {
                        $error_msg = $this->db->error()['message'];
                        $view_context['errors'] = "Operation failed, please try again. Error: ". $error_msg;
                    }
                }
                else {
                    $view_context['errors'] = "Operation failed, please try again. Error: can't move file to destination dir, please check directory permissions.";
                }
            }
        }

        $view_context['section_title'] = "Stories";
        $view_context['story'] = "";

        // load helper and view
        $this->load->helper('form');
        $this->load->view('admin/add', $view_context);
    }

    public function edit_comment($id) {
        if(!$this->is_valid_user()) {
            redirect('admin');
            // set flash_data like in sessions to show temp data in login page
        }

        $this->load->model('friends_model');

        $view_context = array();

        if(count($this->input->post())) {
            // load validations
            $this->load->library('form_validation');
            // set rules
            $this->form_validation->set_rules('author', 'Author', 'trim|required');
            $this->form_validation->set_rules('opinion', 'Opinion', 'trim|required');

            if($this->form_validation->run()) {
                // upload file and process new image
                // config options
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';

                // load upload library
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $dest_dir = "assets/imgs/friends/";
                }
                else {
                    $view_context['errors'] = "Operation failed, please try again. Error: " . $this->upload->display_errors();
                }
                // generate new filename, eliminate common filename mistakes like
                // spaces, hyphen, dots...
                $dest = $dest_dir . random_string() . $this->upload->data('file_ext');

                // move uploaded file to final destination
                if(rename("uploads/" . $this->upload->data('orig_name'), $dest)) {
                    // update database
                    // load array helper
                    $this->load->helper('array');
                    // using elements from array helper to extract data from post
                    $items = array(
                        "id", "author", "opinion", "image"
                    );
                    // duplicate readonly input->post array and update new_image value
                    $tmp_input = $this->input->post();
                    $tmp_input['image'] = $dest;

                    // update database
                    $result = $this->friends_model->update(elements($items, $tmp_input));

                    if($result) {
                        $view_context['data_saved'] = "Data saved.";
                    }
                    else {
                        $error_msg = $this->db->error()['message'];
                        $view_context['errors'] = "Operation failed, please try again. Error: ". $error_msg;
                    }


                }
                else {
                    $view_context['errors'] = "Operation failed, please try again. Error: can't move file to destination dir, please check directory permissions.";
                }
            }
        }

        $view_context['section_title'] = "Friends";
        if (!isset($id)) {
            redirect("admin/list/friends");
        }

        $comment = $this->friends_model->get_comment($id);
        if ($comment) {
            $view_context['comment'] = $comment;
        }
        else {
            redirect('admin/list/friends');
        }

        // load helper and view
        $this->load->helper('form');
        $this->load->view('admin/edit', $view_context);

        // $userdata = $this->session->userdata;
    }

    public function remove_comment() {
        if(!$this->is_valid_user()) {
            redirect('admin');
            // set flash_data like in sessions to show temp data in login page
        }

        $this->load->model('friends_model');

        $view_context = array();

        if(count($this->input->post())) {
            $this->load->helper('array');
            $items = array(
                "id"
            );
            // delete from database
            $result = $this->friends_model->delete(elements($items, $this->input->post()));

            if($result) {
                $view_context['data_saved'] = "Data deleted.";
            }
            else {
                $error_msg = $this->db->error()['message'];
                $view_context['errors'] = "Operation failed, please try again. Error: ". $error_msg;
            }

            $view_context['section_title'] = "Friends";
            $view_context['comments'] = $this->friends_model->get_comments(10);

            // load helper and view
            $this->load->helper('form');
            $this->load->view('admin/list', $view_context);
        }
        else {
            redirect("admin/list/friends");
        }
    }

    public function add_comment() {
        $view_context = array();

        $this->load->model('friends_model');

        if(count($this->input->post())) {
            // load validations
            $this->load->library('form_validation');
            // set rules
            $this->form_validation->set_rules('author', 'Author', 'trim|required');
            $this->form_validation->set_rules('opinion', 'Opinion', 'trim|required');

            if($this->form_validation->run()) {
                // upload file and process new image
                // config options
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';

                // load upload library
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $dest_dir = "assets/imgs/friends/";
                }
                else {
                    $view_context['errors'] = "Operation failed, please try again. Error: " . $this->upload->display_errors();
                }
                // generate new filename, eliminate common filename mistakes like
                // spaces, hyphen, dots...
                $dest = $dest_dir . random_string() . $this->upload->data('file_ext');

                // move uploaded file to final destination
                if(rename("uploads/" . $this->upload->data('orig_name'), $dest)) {
                    // update database
                    // load array helper
                    $this->load->helper('array');
                    // using elements from array helper to extract data from post
                    $items = array(
                        "author", "opinion", "image"
                    );
                    // duplicate readonly input->post array and update new_image value
                    $tmp_input = $this->input->post();
                    $tmp_input['image'] = $dest;

                    // insert in database
                    $result = $this->friends_model->add(elements($items, $tmp_input));

                    if($result) {
                        $view_context['data_saved'] = "Comment \"". $tmp_input['author'] . " - " . word_limiter($tmp_input['opinion'], 10) ."\" added.";
                    }
                    else {
                        $error_msg = $this->db->error()['message'];
                        $view_context['errors'] = "Operation failed, please try again. Error: ". $error_msg;
                    }
                }
                else {
                    $view_context['errors'] = "Operation failed, please try again. Error: can't move file to destination dir, please check directory permissions.";
                }
            }
        }

        $view_context['section_title'] = "Friends";
        $view_context['comment'] = "";

        // load helper and view
        $this->load->helper('form');
        $this->load->view('admin/add', $view_context);
    }

    private function is_valid_user() {
        $userdata = $this->session->userdata;

        if(isset($userdata['authenticated']) && $userdata['authenticated'] &&
            isset($userdata['username']) && isset($userdata['name']))
            return true;

        return false;
    }
}

// generate unique verification code for comments... var_dump(bin2hex(openssl_random_pseudo_bytes(16, $cstrong)));

// check every CRUD operation for the correct csrf using POST data and
// helpers:
// get_csrf_hash
// get_csrf_token_name

// echo "<pre>"; print_r($userdata); echo "</pre>";
