<?php
class Filemanager extends Ajax_Controller
{
    function files()
    {
        $upload_folder = 'upload/';
        $files = glob($upload_folder . '*.*');
        usort($files, function($a, $b) {
            return filemtime($a) <=> filemtime($b);
        });
        $this->response('status',true);
        $this->response('files',($files));
    }
    function remove_file(){
        if(isset($_POST['file'])){
            $filename= $_POST['file'];
            if(unlink($filename))
                $this->response('status', true);
            else
                $this->response('error','File not Deleted, Permission Denied');
        }
        else{
            $this->response('error','Something Went Wrong..');
        }
    }
}