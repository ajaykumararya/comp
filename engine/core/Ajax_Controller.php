<?php
// if(!IS_AJAX)  exit('No direct script access allowed');
class Ajax_Controller extends MY_Controller
{
    public $stop = false;
    public $response = ['status' => false, 'html' => 'No Message Found.'];
    function __construct()
    {
        parent::__construct();
        if (
                !$this->center_model->isLogin() and 
                $this->router->fetch_method() != 'admin_login' and 
                $this->router->fetch_class() != 'website' and
                $this->uri->segment(1,0) != 'api' and
                $this->uri->segment(1,0) != 'site'
            ) {
            $this->response('html', 'Invalid Security Token , Please Re-login Now.');
            $this->response('login_expired', true);
            exit;
        }
        if (!count($this->post()))
            $this->response('html', 'Form Data is Empty.');
    }
    function isDemo(){
        if(isDemo()){
            $html = 'This is a demo panel, you can not update some function in it .';
            $this->response('html',$html);
            $this->response('error',$html);
            $this->response('errors',['isDemo'=>$html]);
            return true;
        }
        return false;
    }
    function validation($index = '')
    {
        if ($this->form_validation->run($index) === FALSE) {
            $this->response('html', $this->errors());
            $this->response('error', $this->errors());
            $this->response('errors', $this->form_validation->error_array());
            return false;
        }
        return true;
    }
    protected function post($index = 0, $default = '')
    {
        $post = $this->input->post();
        return $index ? (isset ($post[$index]) ? $this->input->post($index, true) : $default) : $post;
    }

    protected function errors()
    {
        return validation_errors('<div class="alert alert-danger">', '</div>');
    }

    function response($index = 0, $value = 0)
    {
        if (is_array($index)) {
            $this->response = array_merge($this->response, $index);
            return $this;
        }
        if ($index and $value) {
            $this->response[$index] = $value;
            return $this;
        } else
            return $this->response;
    }
    function datatable_response($response)
    {
        $this->response['data'] = $response;
    }

    function json_response($data = [])
    {
        $this->output->set_content_type('application/json')

            ->set_output(json_encode($data ? $data : $this->response()));
        echo $this->output->get_output();
        die();
        // echo ();
    }
    function __destruct()
    {
        $this->json_response();
    }



    //Datatable methods
    public function arraySearch($array, $keyword)
    {
        return array_filter($array, function ($a) use ($keyword) {
            return (boolean) preg_grep("/$keyword/i", (array) $a);
        });
    }

    public function filterArray($array, $allowed = [])
    {
        return array_filter(
            $array,
            function ($val, $key) use ($allowed) { // N.b. $val, $key not $key, $val
                return isset ($allowed[$key]) && ($allowed[$key] === true || $allowed[$key] === $val);
            },
            ARRAY_FILTER_USE_BOTH
        );
    }

    public function filterKeyword($data, $search, $field = '')
    {
        $filter = '';
        if (isset ($search['value'])) {
            $filter = $search['value'];
        }
        if (!empty ($filter)) {
            if (!empty ($field)) {
                if (strpos(strtolower($field), 'date') !== false) {
                    // filter by date range
                    $data = $this->filterByDateRange($data, $filter, $field);
                } else {
                    // filter by column
                    $data = array_filter($data, function ($a) use ($field, $filter) {
                        return (boolean) preg_match("/$filter/i", $a[$field]);
                    });
                }

            } else {
                // general filter
                $data = array_filter($data, function ($a) use ($filter) {
                    return (boolean) preg_grep("/$filter/i", (array) $a);
                });
            }
        }

        return $data;
    }

    public function filterByDateRange($data, $filter, $field)
    {
        // filter by range
        if (!empty ($range = array_filter(explode('|', $filter)))) {
            $filter = $range;
        }

        if (is_array($filter)) {
            foreach ($filter as &$date) {
                // hardcoded date format
                $date = date_create_from_format('m/d/Y', stripcslashes($date));
            }
            // filter by date range
            $data = array_filter($data, function ($a) use ($field, $filter) {
                // hardcoded date format
                $current = date_create_from_format('m/d/Y', $a[$field]);
                $from = $filter[0];
                $to = $filter[1];
                if ($from <= $current && $to >= $current) {
                    return true;
                }

                return false;
            });
        }

        return $data;
    }
}
?>