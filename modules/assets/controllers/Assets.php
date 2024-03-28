<?php
class Assets extends MY_Controller
{
    public $file_path = ('upload/');
    public $real_path = ('assets/file/');
    function file()
    {
        $file = $this->uri->segment(3, 0);
        $file = $this->file_path . $file;
        if (!file_exists($file)) {
            // echo 'f';
            $file = 'assets/no_image.png';
        }
        $ext = strtolower((substr(strrchr($file, '.'), 1)));
        switch ($ext) {
            case 'pdf':
                header('Content-Type: application/pdf');
                // Specify the file name for download
                header('Content-Disposition: attachment; filename="' . basename($file) . '"');
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
        header('Content-Type: ' . $ctype);
        readfile($file);
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
            $thisRef['type'] = start_with('http',$data->link) ? 'Link' : 'Content';
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
