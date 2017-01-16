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
		$this->home();
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
        
        $this->show_page('public/product_detail', $data);
    }
}
?>