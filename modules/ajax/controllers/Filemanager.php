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
}