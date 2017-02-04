<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scwt extends CI_Controller {
    public function index() {
        $view_context = array();

        // load index.php page data
        // static text
        $this->load->model("statictext_model");
        $view_context['overview_summary'] = $this->statictext_model->overview;
        $view_context['overview_welcome'] = $this->statictext_model->overview_welcome;
        $view_context['overview_transport'] = $this->statictext_model->overview_transport;
        $view_context['overview_accommodation'] = $this->statictext_model->overview_accommodation;
        $view_context['overview_tours'] = $this->statictext_model->overview_tours;
        $view_context['stories_summary'] = $this->statictext_model->stories;
        $view_context['friends_summary'] = $this->statictext_model->friends;

        // static images
        $this->load->model("staticimages_model");
        $view_context['overview_img_welcome'] = $this->staticimages_model->overview_img_welcome;
        $view_context['overview_img_transport'] = $this->staticimages_model->overview_img_transport;
        $view_context['overview_img_accommodation'] = $this->staticimages_model->overview_img_accommodation;
        $view_context['overview_img_tours'] = $this->staticimages_model->overview_img_tours;

        // stories
        $this->load->model("stories_model");
        $stories = $this->stories_model->get_stories(3);
        $view_context['stories'] = $stories;

        // friends
        $this->load->model("friends_model");
        $friends = $this->friends_model->get_random_opinion();
        $view_context['friends'] = $friends;

        // general view's contexts
        // page title
        $header_context['title'] = 'Welcome';
        // show the correct menu
        $nav_context['nav_index'] = '';
        $nav_context['brand_link'] = site_url();
        // show random carousel
        $carousel_context = array();
        // carousel images
        $carousel_context['carousel'] = $this->get_carousel_images_helper();
        // contact info
        $contact_context = $this->get_contact_info_helper();

        $this->load->view('header', $header_context);
        $this->load->view('nav', $nav_context);
        $this->load->view('carousel', $carousel_context);
        $this->load->view('main', $view_context);
        $this->load->view('contact', $contact_context);
        $this->load->view('footer');
    }

    public function transport() {
        $view_context = array();

        // static text
        $this->load->model("statictext_model");

        $view_context['transport_summary'] = $this->statictext_model->transport;

        // transports
        $this->load->model("transport_model");
        $transports = $this->transport_model->get_transports();
        $view_context['transports'] = $transports;

        // general view's contexts
        // page title
        $header_context['title'] = 'Transport';
        // show the correct menu
        $nav_context['nav_transport'] = '';
        $nav_context['brand_link'] = site_url();
        // show random carousel
        $carousel_context = array();
        // carousel images
        $carousel_context['carousel'] = $this->get_carousel_images_helper();
        // contact info
        $contact_context = $this->get_contact_info_helper();

        $this->load->view('header', $header_context);
        $this->load->view('nav', $nav_context);
        $this->load->view('carousel', $carousel_context);
        $this->load->view('transport', $view_context);
        $this->load->view('contact', $contact_context);
        $this->load->view('footer');
    }

    public function accommodation() {
        $view_context = array();

        // static text
        $this->load->model("statictext_model");

        $view_context['accommodation_summary'] = $this->statictext_model->accommodation;

        // accommodations
        $accommodations = array();
        $this->load->model("accommodation_model");
        $accommodations = $this->accommodation_model->get_accommodations();
        $view_context['accommodations'] = $accommodations;

        // general view's contexts
        // page title
        $header_context['title'] = 'Accommodation';
        // show the correct menu
        $nav_context['nav_accommodation'] = '';
        $nav_context['brand_link'] = site_url();
        // show random carousel
        $carousel_context = array();
        // carousel images
        $carousel_context['carousel'] = $this->get_carousel_images_helper();
        // contact info
        $contact_context = $this->get_contact_info_helper();

        $this->load->view('header', $header_context);
        $this->load->view('nav', $nav_context);
        $this->load->view('carousel', $carousel_context);
        $this->load->view('accommodation', $view_context);
        $this->load->view('contact', $contact_context);
        $this->load->view('footer');
    }

    public function tours() {
        $view_context = array();

        // static text
        $this->load->model("statictext_model");

        $view_context['tours_summary'] = $this->statictext_model->tours;

        // tours
        $tours = array();
        $this->load->model("tours_model");
        $tours = $this->tours_model->get_tours();
        $view_context['tours'] = $tours;

        // general view's contexts
        // page title
        $header_context['title'] = 'Tours';
        // show the correct menu
        $nav_context['nav_tours'] = '';
        $nav_context['brand_link'] = site_url();
        // show random carousel
        $carousel_context = array();
        // carousel images
        $carousel_context['carousel'] = $this->get_carousel_images_helper();
        // contact info
        $contact_context = $this->get_contact_info_helper();

        $this->load->view('header', $header_context);
        $this->load->view('nav', $nav_context);
        $this->load->view('carousel', $carousel_context);
        $this->load->view('tours', $view_context);
        $this->load->view('contact', $contact_context);
        $this->load->view('footer');
    }

    public function send_message() {
        $view_context = array();

        $this->load->library('user_agent');

        $this->load->model('contactus_model');

        if(count($this->input->post())) {
            // load array helper
            $this->load->helper('array');
            // using elements from array helper to extract data from post
            $items = array(
                "name", "email", "message"
            );
            // generate verification code (len = 32)
            $this->load->helper('string');
            $code = random_string('alnum', 32);
            // insert new message
            $result = $this->contactus_model->new_message(elements($items,
                $this->input->post()), $code);

            if($result) {
                // echo site_url('verify_message') . '/' . $code;
                // die();

                // send verification code
                // $this->load->library('email');

                // $this->email->from('your@example.com', 'Your Name');
                // $this->email->to('someone@example.com');
                // $this->email->cc('another@another-example.com');
                // $this->email->bcc('them@their-example.com');
                // $this->email->subject('Email Test');
                // $this->email->message('Testing the email class.');
                // $this->email->send();

                // $this->load->library('email');
                // $this->email->from('sender@example.com', 'Sender Name');
                // $this->email->to('recipient@example.com','Recipient Name');
                // $this->email->subject('Your Subject');
                // $this->email->message('Your Message');
                // try {
                //     $this->email->send();
                //     echo 'Message has been sent.';
                // }
                // catch (Exception $e) {
                //     echo $e->getMessage();
                // }

                $view_context['data_saved'] = "Your message have been saved. "
                    . "We sent you an email with a verification code, please check "
                    . "your inbox and confirm you message following the link. Thank you.";
            }
            else {
                $error_msg = $this->db->error()['message'];
                $view_context['errors'] = "Operation failed, please try again. Error: ". $error_msg;
            }

            $view_context['referrer'] = $this->agent->referrer();
            // general view's contexts
            $header_context = array();
            $this->load->view('header', $header_context);
            $this->load->view('message', $view_context);
        }
        else {
            redirect("/");
        }
    }

    public function verify_message($key) {
        $view_context = array();

        // use here a captcha image to verify HUMAN ACTION
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
            $view_context['key'] = $key;
        }

        // load helper and view
        $this->load->helper('form');
        $this->load->view('verify_code', $view_context);
    }

    // helpers
    private function get_contact_info_helper() {
        // load helper
        $this->load->helper('form');

        // contact info
        $result = array();

        // static text
        $this->load->model("statictext_model");
        $result['contact_info_yanet'] = $this->statictext_model->contact_info_yanet;
        $result['contact_info_abel'] = $this->statictext_model->contact_info_abel;
        $result['contact_info_jane'] = $this->statictext_model->contact_info_jane;
        $result['address'] = $this->statictext_model->address;
        $result['phone'] = $this->statictext_model->phone;
        $result['email'] = $this->statictext_model->email;

        // static images
        $this->load->model("staticimages_model");
        $result['contact_img_yanet'] = $this->staticimages_model->contact_img_yanet;
        $result['contact_img_abel'] = $this->staticimages_model->contact_img_abel;
        $result['contact_img_jane'] = $this->staticimages_model->contact_img_jane;

        return $result;
    }

    private function get_carousel_images_helper() {
        // carousel images
        $this->load->model("carousel_model");

        return $this->carousel_model->get_random_images();
    }
}

// generate unique verification code for comments... var_dump(bin2hex(openssl_random_pseudo_bytes(16, $cstrong)));
// or use CI_Security::get_random_bytes to generate verification codes...
// random_string in string helper
