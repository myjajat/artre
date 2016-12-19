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
        
    }
    
    public function stories(){
        $this->db->order_by('id_story', 'DESC');
        $data['query'] = $this->db->get('stories', 8);
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
    
    public function products(){
        
    }
}
?>