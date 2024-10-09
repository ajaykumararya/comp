<?php
class Cms extends MY_Controller
{
    function add_page()
    {
        $this->ki_theme->breadcrumb_action_html(
            $this->ki_theme->with_icon('tablet-text-down text-warning', 4)->with_pulse('warning')->outline_dashed_style('warning')->set_class('text-warning')->add_action('List Pages', ('cms/list-pages'))
        );
        $this->view('add-page');
    }
    function list_pages(){
        $this->view('list-pages');
    }
    function menu_section(){
        $this->view('menu-section');
    }
    function manage_page_content(){
        $link = $this->uri->segment(3,0);
        // exit($link); 
        $get = $this->SiteModel->get_page_content($link);
        if($get->num_rows()){
            $this->set_data($get->row_array());
            $this->view('manage-page-content',['isValid' => true]);
        }
        else
            $this->view('template/not-found',['isValid' => true]);
    }
    function manage_page_schema(){
        $link = $this->uri->segment(3,0);
        // exit($link); 
        $get = $this->SiteModel->get_page_content($link);
        if($get->num_rows()){
            $this->set_data('schema',$this->SiteModel->get_page_schema($get->row('page_id'))->result_array());
            $this->view('manage-page-schema',['isValid' => true,'page-id' => $get->row('page_id')]);
        }
        else
            $this->view('template/not-found',['isValid' => true]);
    }
    function setting(){
        $this->view('setting');    
    }
    function slider(){
        $this->view('slider');
    }
    function forms(){
        $this->view('forms');
    }
    function static_page(){
        $id = $this->uri->segment(3,0);       
        $this->set_data('type',$id);
        $this->set_data('form',cms_content_form($id));
        if(THEME != 'theme=03' AND !in_array($id,['our_certificate','faculty','header'])){
            $this->ki_theme->breadcrumb_action_html(
                $this->ki_theme->drawer_button('page',$id,humanize($id))
            );
        }
        // echo $id;
        // echo THEME_PATH;
        if(file_exists(THEME_PATH.'static-pages/'.$id.EXT)){
            $this->view('static-pages/'.$id);
        }
        else
            $this->view('static/'.$id);
        
        // $this->view('static-pages/'.$id);
    }
    function gallery_images(){
        $this->ki_theme->breadcrumb_action_html(
            $this->ki_theme->drawer_button('image_gallery','0','Image Gallery')
        );
        $this->view('gallery-images');
    }
    function enquiry_data(){
        // (THEME == 'theme-02' ? 'get_in_touch' : 'enquiry')
        $this->set_data('list',$this->SiteModel->list_enquiries()->result_array());
        $this->view('enquiry-data');
    }

}
