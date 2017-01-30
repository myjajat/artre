<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2016 moegi
 */
 
class P extends CI_Controller {
    private function show_page($url, $vars = array(), $nav_active = ""){
        $data['content'] = $this->load->view($url, $vars, true);
        $data['nav_active'] = $nav_active;
        $this->load->view('public/layout', $data);
    }
    
	public function index(){
		redirect('p/home');
	}
    
    public function home(){
        $this->db->order_by('id_banner');
        $data['banners'] = $this->db->get('banners');
        
        $this->db->order_by('id_story', 'DESC');
        $data['stories'] = $this->db->get('stories', 3);
        
        $sql = "SELECT products.id_product, products.name, products.colors, products_photo.filename
                FROM products JOIN (
                    SELECT MIN(id_photo) as id_photo, id_product 
                    FROM products_photo 
                    GROUP BY id_product
                ) photo
                ON products.id_product = photo.id_product
                JOIN products_photo
                ON photo.id_photo = products_photo.id_photo
                ORDER BY id_product DESC
                LIMIT 0,9";
        $data['products'] = $this->db->query($sql);
        
        $this->show_page("public/home", $data);
    }
    
    public function stories(){
        $this->db->order_by('id_story', 'DESC');
        $data['query'] = $this->db->get('stories', 9);
        $this->show_page("public/stories", $data, 'stories');
    }
    
    public function stories_ajax(){
        $offset = $this->input->get('offset');
        $this->db->order_by('id_story', 'DESC');
        $data['query'] = $this->db->get('stories', 9, $offset);
        $this->load->view('public/stories_ajax', $data);
    }
    
    public function story($id_story, $title = ""){
        $this->db->where('id_story', $id_story);
        $query = $this->db->get('stories', 1);
        if ($query->num_rows() == 1){
            $data['query'] = $query;
            $this->show_page('public/story', $data, 'stories');
        } else {
            $this->session->set_flashdata('msg', 'Story not found');
            $this->session->set_flashdata('msg_type', 'danger');
            redirect('p/stories');
        }
    }
    
    public function products($id_category = NULL){
        // get category
        $query = $this->db->get('categories');
        $data['categories'] = $query;
        
        // get products
        $where = $id_category == NULL ? "" : "WHERE id_category = '$id_category'"; 
        $sql = "SELECT products.id_product, products.name, products.colors, products_photo.filename
                FROM products JOIN (
                    SELECT MIN(id_photo) as id_photo, id_product 
                    FROM products_photo 
                    GROUP BY id_product
                ) photo
                ON products.id_product = photo.id_product
                JOIN products_photo
                ON photo.id_photo = products_photo.id_photo
                $where
                ORDER BY id_product DESC
                LIMIT 0,9";
        $query = $this->db->query($sql);
        
        $data['query'] = $query;
        $this->show_page('public/products', $data);
    }
    
    public function products_ajax($id_category = NULL){
        $offset = $_GET['offset'];
        // get products
        $where = $id_category == NULL ? "" : "WHERE id_category = '$id_category'"; 
        $sql = "SELECT products.id_product, products.name, products.colors, products_photo.filename
                FROM products JOIN (
                    SELECT MIN(id_photo) as id_photo, id_product 
                    FROM products_photo 
                    GROUP BY id_product
                ) photo
                ON products.id_product = photo.id_product
                JOIN products_photo
                ON photo.id_photo = products_photo.id_photo
                $where
                ORDER BY id_product DESC
                LIMIT $offset,9";
        $query = $this->db->query($sql);
        $data['query'] = $query;
        $this->load->view('public/products_ajax', $data);
    }
    
    public function product_detail($id_product){
        $sql = "SELECT * FROM product";
        $this->db->where('id_product', $id_product);
        $query = $this->db->get('products', '1');
        if ($query->num_rows() == 0){
            $this->session->set_flashdata('msg', 'Product not found');
            $this->session->set_flashdata('msg_type', 'danger');
            redirect('p/products');
        }
        $data['query'] = $query;
        
        $this->db->where('id_product', $id_product);
        $this->db->order_by('id_photo', 'ASC');
        $query = $this->db->get('products_photo');
        $data['photos'] = $query;
        
        $query = $this->db->get('colors');
        $data['tbl_colors'] = $query;
        
        $this->show_page('public/product_detail', $data);
    }
    
    public function product_order($id_product){
        $this->show_page('public/product_order');
    }
    
    public function contact(){
        if (isset($_POST['name'])){
            $name = $this->input->post('name', true);
            $phone = $this->input->post('phone', true);
            $email = $this->input->post('email', true);
            $subject = $this->input->post('subject', true);
            $message = $this->input->post('message', true);
            
            $content = "";
            $this->sendEmail('New [message] from '.$name, $content);
        }
        $this->show_page('public/contact');
    }
    
    public function about(){
        $this->show_page('public/about');
    }
    
    public function send_message(){
        if (isset($_POST['name']) && !empty($_POST['message'])){
            $name = $this->input->post('name', true);
            $phone = $this->input->post('phone', true);
            $email = $this->input->post('email', true);
            $subject = $this->input->post('subject', true);
            $message = $this->input->post('message', true);
            
            $content = "
Anda baru saja mendapatkan pesan baru dari halaman Contact dengan detail berikut:

Nama : $name
Phone Number : $phone
Email : $email

Subject : $subject
Message : 
$message

This email is automatically send by sistem artreoutgear.id .
Do not reply!";
            $this->sendEmail('New [message] '.$subject, $content);
        }
    }
    
    public function submit_order(){
        if (isset($_POST['product']) && !empty($_POST['name'])){
            $name = $this->input->post('name', true);
            $phone = $this->input->post('phone', true);
            $email = $this->input->post('email', true);
            $address = $this->input->post('address', true);
            $color = $this->input->post('color');
            $size = $this->input->post('size');
            $note = $this->input->post('note', true);
            $product = $this->input->post('product');
            
            $content = "
Anda mendapatkan order baru dengan detail berikut:

Name : $name
Phone Number : $phone
Email : $email
Address : $address

Product : $product
Color : $color
Size : $size
Extra Note : $note

This email is automatically send by sistem artreoutgear.id . 
Do not reply!";
            $this->sendEmail('New [order] '.$product, $content);
        }
    }
    
    private function sendEmail($subject, $content){
        $this->load->library('email');

        $this->email->from('sistem@artreoutgear.id', 'Artre Outgear');
        $this->email->to('artreoutgear@gmail.com');
        $this->email->cc('rahmandikasoepian@gmail.com');
        
        $this->email->subject($subject);
        $this->email->message($content);
        
        $this->email->send();
    }
}
?>