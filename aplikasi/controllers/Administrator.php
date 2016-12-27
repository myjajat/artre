<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2016 moegi
 */
 
class Administrator extends CI_Controller {
    private $content = '';
    
    private function show_page($url, $vars = array()){
        $data['content'] = $this->load->view($url, $vars, true);
        $this->load->view('admin/layout', $data);
    }
    
    private function upload_image($name, $path){
        $config['upload_path']          = './assets/images/'.$path.'/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|bmp';
        $config['encrypt_name']         = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload($name)){
            $upload_data = $this->upload->data();
            $return['success'] = true;
            $return['msg'] = '';
            $return['file_name'] = $upload_data['file_name']; 
        } else {
            $return['success'] = false;
            $return['msg'] = $this->upload->display_errors();
            $return['file_name'] = '';
        }
        return $return;
    }
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') == TRUE){
            
        }
    }
    
    public function index()
	{
		$this->load->view('admin/layout');
	}
    
    public function logout(){
        $this->session->destroy();
        redirect('login');
    }
    
    public function stories($page = 1){
        if (isset($_POST['delete'])){
            $this->db->where('id_story', $this->input->post('id_story', true));
            $this->db->limit(1);
            $this->db->delete('stories');
            if ($this->db->affected_rows() != 0){
                $this->session->set_flashdata('msg', '1 story successfully deleted');
                $this->session->set_flashdata('msg_type', 'success');
            } else {
                $this->session->set_flashdata('msg', 'The story can not be deleted');
                $this->session->set_flashdata('msg_type', 'danger');
            }
            redirect('administrator/stories');
        }
        
        $page = $page < 1 ? 1 : $page;
        $limit = 10;
        $offset = $limit * ($page - 1);
        
        $this->db->order_by('insert_date', 'DESC');
        $data['query'] = $this->db->get('stories', $limit, $offset);
        $this->show_page('admin/stories', $data);
    }
    
    public function story_add(){
        $title = $this->input->post('title');
        $story = $this->input->post('story');
        $creator = $this->input->post('creator');
        $link = $this->input->post('link');
        $data  = null;
        
        if (!empty($title) and !empty($story)){
            $upload = $this->upload_image('cover', 'stories');
            if ($upload['success']){
                $this->db->set('cover', $upload['file_name']);
                $this->db->set('title', $title);
                $this->db->set('story', $story);
                $this->db->set('creator', $creator);
                $this->db->set('link', $link);
                $this->db->insert('stories');
                if ($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('msg', 'New story successfully published.');
                    $this->session->set_flashdata('msg_type', 'success');
                    redirect('administrator/stories');
                } else {
                    $data['er_msg'] = 'Sorry, something error on saving new story.';
                }
            } else {
                $data['er_msg'] = $upload['msg'];
            }
        }
        $this->show_page('admin/story_add', $data);
    }
    
    public function story_edit($id_story){
        $this->db->where('id_story', $id_story);
        $query = $this->db->get('stories', 1);
        if ($query->num_rows() == 0){
            $this->session->set_flashdata('msg', 'Story not found');
            $this->session->set_flashdata('msg_type', 'danger');
            redirect('administrator/stories');
        }
        
        $upload['msg'] = '';
        if (!empty($_FILES['cover']['name'])){
            $upload = $this->upload_image('cover', 'stories');
            if ($upload['success']){
                $this->db->set('cover', $upload['file_name']);
            } else {
                $data['er_msg'] = $upload['msg'];
            }
        }
        
        if (isset($_POST['title']) && $upload['msg'] == ''){
            $this->db->set('title', $this->input->post('title', true));
            $this->db->set('story', $this->input->post('story'));
            $this->db->set('creator', $this->input->post('creator', true));
            $this->db->set('link', $this->input->post('link', true));
            $this->db->where('id_story', $id_story);
            $this->db->limit(1);
            $this->db->update('stories');
            if ($this->db->affected_rows() == 1){
                $this->session->set_flashdata('msg', '1 story successfully edited.');
                $this->session->set_flashdata('msg_type', 'success');
                redirect('administrator/stories');
            } else {
                $data['er_msg'] = "Something error on saving data.";
            }
        }
        
        $data['row'] = $query->row();
        $this->show_page('admin/story_edit', $data);
        return;
    }
    
    public function subscribers($page = 1){
        if (isset($_POST['delete'])){
            $this->db->where('id_subscriber', $this->input->post('id_subscriber', true));
            $this->db->limit(1);
            $this->db->delete('subscribers');
            if ($this->db->affected_rows() != 0){
                $this->session->set_flashdata('msg', '1 subscriber successfully deleted');
                $this->session->set_flashdata('msg_type', 'success');
            } else {
                $this->session->set_flashdata('msg', 'The subscriber can not be deleted');
                $this->session->set_flashdata('msg_type', 'danger');
            }
            redirect('administrator/subscribers');
        }
        
        $page = $page < 1 ? 1 : $page;
        $limit = 10;
        $offset = $limit * ($page - 1);
        
        $this->db->order_by('id_subscriber', 'DESC');
        $data['query'] = $this->db->get('subscribers', $limit, $offset);
        $this->show_page('admin/subscribers', $data);
    }
    
    public function products($page = 1){
        if (isset($_POST['delete'])){
            $this->db->where('id_product', $this->input->post('id_product', true));
            $this->db->limit(1);
            $this->db->delete('products');
            if ($this->db->affected_rows() != 0){
                $this->session->set_flashdata('msg', '1 product successfully deleted');
                $this->session->set_flashdata('msg_type', 'success');
            } else {
                $this->session->set_flashdata('msg', 'The product can not be deleted');
                $this->session->set_flashdata('msg_type', 'danger');
            }
            redirect('administrator/products');
        }
        
        $page = $page < 1 ? 1 : $page;
        $limit = 10;
        $offset = $limit * ($page - 1);
        
        $this->db->order_by('insert_date', 'DESC');
        $sql = "SELECT products.*, categories.category
                FROM products
                LEFT JOIN categories
                ON products.id_category = categories.id_category
                ORDER BY id_product DESC
                LIMIT $offset, $limit";
        $data['query'] = $this->db->query($sql);
        $this->show_page('admin/products', $data);
    }
    
    public function product_add(){
        $data  = null;
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        $discount = $this->input->post('discount');
        $colors = $this->input->post('colors');
        $backstories = $this->input->post('backstories');
        $specification = $this->input->post('specification');
        $id_category = $this->input->post('category');
        
        if (isset($_POST['name'])){
            $this->db->set('name', $name);
            $this->db->set('price', $price);
            $this->db->set('discount', $discount);
            $this->db->set('colors', implode(',',$colors));
            $this->db->set('backstories', $backstories);
            $this->db->set('specification', $specification);
            $this->db->set('id_category', $id_category);
            $this->db->insert('products');
            if ($this->db->affected_rows() > 0){
                $id_product = $this->db->insert_id();
                $this->session->set_flashdata('msg', 'New product successfully created. Upload some photos of the product!');
                $this->session->set_flashdata('msg_type', 'success');
                redirect('administrator/product/'.$id_product.'/photos');
            } else {
                $data['er_msg'] = 'Sorry, something error on saving new product.';
            }
        }
        
        $data['list_categories'] = $this->db->get('categories');
        $data['list_colors'] = $this->db->get('colors');
        $this->show_page('admin/product_add', $data);
    }
    
    public function product_photos($id_product){
        $this->db->where('id_product',$id_product);
        $query = $this->db->get('products','1');
        if ($query->num_rows() != 1){
            $this->session->set_flashdata('msg', 'Product not found!');
            $this->session->set_flashdata('msg_type', 'danger');
            redirect('administrator/products');
        } else {
            //$row = 
        }
        
        $this->db->where('id_product', $id_product);
        $query = $this->db->get('products_photo');
        $data['query'] = $query;
        $this->show_page('admin/products_photo', $data);
    }
    
    public function tes(){
        $this->show_page('admin/tes');
    }
}
?>