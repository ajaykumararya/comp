<?php
class Assets extends MY_Controller
{
    public $file_path = ('upload/');
    public $real_path = ('assets/file/');
    function file()
    {
        $file = '';
        if ($this->uri->segment(3, 0)) {
            $files = $this->uri->segment_array();
            $t = &$files;
            array_splice($t, 0, 2);
            $file = implode('/', $t);
        }
        // exit(urldecode($file));
        $this->_view($file);
    }
    private function _view($file)
    {
        $file = urldecode($this->file_path . $file);
        // exit($file);
        if (!file_exists(($file))) {
            $file = 'assets/no_image.png';
        }
        $ext = strtolower((substr(strrchr($file, '.'), 1)));
        switch ($ext) {
            case 'pdf':
                header('Content-Type: application/pdf');
                // Specify the file name for download
                header('Content-Disposition: inline; filename="' . basename($file) . '"');
                break;
            case 'gif':
                $ctype = 'image/gif';
                break;
            case 'png':
                $ctype = 'image/png';
                break;
            case 'jpg':
            case 'jpeg':
                $ctype = 'image/jpeg';
                break;
            case 'svg':
                $ctype = 'image/svg+xml';
                break;
        }
        if ($ext != 'pdf')
            header('Content-Type: ' . $ctype);
        readfile($file);
    }
    // function student_study()
    // {
    //     $file = ($this->uri->segment(3, 0));
    //     if($this->student_model->isStudent() or $this->center_model->isAdminOrCenter()){
    //         $this->_view('study-mat/'.$file);
    //     }
    //     else{
    //         $this->output->set_status_header(403);
    //         $this->output->set_output("Permission Denied: You do not have access to this file.");
            
    //     }
    // }
    function student_study($para)
    {
        $file = ($this->uri->segment(3, 0));
        if ($this->student_model->isStudent() or $this->center_model->isAdminOrCenter()) {
            if ($this->uri->segment(4, 0) === 'preview')
                $this->load->view('student/panel/study', ['url' => base_url('assets/student-study/' . $file)]);
            else
                $this->_view('study-mat/' . $file);

        } else {
            $this->load->module('site');
            $this->site->error_404(403,'Permission Denied');
            // $this->output->set_status_header(403);
            // $this->output->set_output("Permission Denied: You do not have access to this file.");
        }
    }
    function youtube()
    {
        $file = ($this->uri->segment(3, 0));
        // exit($file);
        if ($file) {
            $this->load->view('student/panel/youtube-study', ['id' => $file, 'title' => 'Play Video']);
        }
    }
    function all_files()
    {
        $testmode = "off";
        $path = $this->file_path;
        $images = array();
        $counter = 0;
        if ($handle = @opendir($path)) {
            while (false !== ($file = readdir($handle))) {
                if (strpos($file, ".") != 0) {
                    $images[$counter]['title'] = $file;
                    $images[$counter]['value'] = base_url() . $this->real_path . "/" . $file;
                    $counter++;
                }
            }
            closedir($handle);
        } elseif ($testmode == "on") {
            echo "Error: Can't find directory. Please write a valid path.";
            exit;
        }
        if ($counter == 0 && $testmode == "on") {
            echo "Error: This directory seems to be empty.";
            exit;
        }
        ksort($images);
        if ($testmode == "on") {
            echo "<p><strong>This is the JSON I'll be delivering:</strong></p>";
        }
        echo json_encode($images);
    }
    function all_pages_extra_set_in_page()
    {
        $pages = $this->list_pages();
        extract($this->input->post());
        echo '  <table class="table table-bordered table-striped" data-type="' . $type . '" data-type_id="' . $type_id . '">
                    <thead>
                        <tr>
                            <th>#.</th>
                            <th>Title</th>
                            <th>Set Page</th>
                        </tr>
                    </thead>
                    <tbody>';
        $i = 1;
        foreach ($pages as $item) {
            echo '<tr>
                            <td>' . $i++ . '</td>
                            <td>' . $item['title'] . '</td>
                            <td><button class="btn btn-xs btn-sm btn-warning set-exta-in-page" data-id="' . $item['id'] . '">Action</button></td>
                          </tr>';
        }
        echo '</tbody>
                </table>';
    }
    function list_pages()
    {
        $query = $this->SiteModel->list_page();
        $thisRef = [];
        $items = [];
        foreach ($query->result() as $k => $data) {
            $thisRef['id'] = $data->id;
            $thisRef['link'] = $data->link;
            $thisRef['type'] = start_with('http', $data->link) ? 'Link' : 'Content';
            $thisRef['isPrimary'] = $data->id == DefaultPage;
            $thisRef['url'] = $data->id == DefaultPage ? base_url() : ($data->link ? (start_with($data->link, 'http') ? $data->link : base_url($data->link)) : (base_url . '/web/' . AJ_ENCODE($data->id, true) . '/' . Print_page($data->page_name)));
            $thisRef['title'] = $data->page_name;
            array_push($items, $thisRef);
        }
        ksort($items);
        return $items;
    }
    function json_pages()
    {
        echo json_encode($this->list_pages());
    }
    function get_schema_vars()
    {
        echo json_encode($this->load->config('admin/schema', true));
    }
    function all_pages_links()
    {
        $items = $this->list_pages();
        $type = $this->uri->segment(3, 0);
        $id = $this->uri->segment(4, 0);
        if ($type == 'table') {
            echo $type . '<table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#.</th>
                            <th>Title</th>
                            <th>Set Page</th>
                        </tr>
                    </thead>
                    <tbody>';
            $i = 1;
            foreach ($items as $item) {
                echo '<tr>
                            <td>' . $i++ . '</td>
                            <td>' . $item['title'] . '</td>
                            <td><button class="btn btn-xs btn-sm btn-warning set-link" data-id="' . $id . '" data-url="' . $item['url'] . '">Set Link</button></td>
                          </tr>';
            }
            echo '</tbody>
                 </table>';
        } else
            echo json_encode($items);
    }
}
?>