<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main_lib {
    
    function __construct()
    {
        $this->CI =& get_instance();
        //отладка и оптимизация
        //$this->CI->output->enable_profiler(TRUE);
    }
    
    


    function get_users($url, $table){
        $result =  $this->CI->db->select('*')->where('username', $url)->get($table)->row_array();
        return $result;
    }
    
    function insert($table, $data){
        $this->db->insert($table, $data);
    }
    
    //выборка одной строки 
    function get_row($where,$post,$table){
        $result = $this->CI->db->select('*')->where($where, $post)->get($table)->row_array();
        return $result;
    }
    
    public $add_rules = array(
        array(
                'field' => 'title',
                'label' => 'Имя страницы',
                'rules' => 'required|min_length[3]|max_length[50]|trim',
                'errors' => array(
                        'required' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s не может быть пустое.</span></div>',
                        'min_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s должно быть более чем %s символа.</span></div>',
                        'max_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s слишком длинное - допустимо %s символов.</span></div>',
                ),
        ),
        array(
                'field' => 'text',
                'label' => 'Содержание',
                'rules' => 'required',
                'errors' => array(
                        'required' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s не может быть пустое.</span></div>',
                ),
        ),
        array(
                'field' => 'uri',
                'label' => 'url',
                'rules' => 'required|min_length[3]|max_length[50]|trim',
                'errors' => array(
                        'required' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s не может быть пустое.</span></div>',
                ),
        ),
    );

    
    public $add_rules_user = array(
        array(
                'field' => 'username',
                'label' => 'Имя пользователя',
                'rules' => 'required|min_length[3]|max_length[15]|regex_match[/^[a-zA-Z]+$/]|trim',
                'errors' => array(
                        'required' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s не может быть пустое.</span></div>',
                        'min_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s должно быть более чем %s символа.</span></div>',
                        'max_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s слишком длинное - допустимо %s символов.</span></div>',
                        'regex_match' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s должно состоять из латынских букв.</span></div>',
                ),
        ),
        array(
                'field' => 'email',
                'label' => 'Почта',
                'rules' => 'required|valid_email',
                'errors' => array(
                        'required' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s не может быть пустое.</span></div>',
                        'min_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s должно быть более чем %s символа.</span></div>',
                        'max_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s слишком длинное - допустимо %s символов.</span></div>',
                ),
        ),
        array(
                'field' => 'surname',
                'label' => 'Фамилия',
                'rules' => 'required|min_length[3]|max_length[15]|trim',
                'errors' => array(
                        'required' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s не может быть пустое.</span></div>',
                        'min_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s должно быть более чем %s символа.</span></div>',
                        'max_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s слишком длинное - допустимо %s символов.</span></div>',
                ),
        ),
        array(
                'field' => 'password',
                'label' => 'Пароль',
                'rules' => 'required|min_length[3]|max_length[15]|regex_match[/^[a-zA-Z0-9]+$/]|trim',
                'errors' => array(
                        'required' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s не может быть пустое.</span></div>',
                        'min_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s должно быть более чем %s символа.</span></div>',
                        'max_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s слишком длинное - допустимо %s символов.</span></div>',
                        'regex_match' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s должен состоять из латынских букв или цыфр.</span></div>',
                ),
        ),
        array(
                'field' => 'name',
                'label' => 'Имя',
                'rules' => 'required|min_length[3]|max_length[15]|trim',
                'errors' => array(
                        'required' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s не может быть пустое.</span></div>',
                        'min_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s должно быть более чем %s символа.</span></div>',
                        'max_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s слишком длинное - допустимо %s символов.</span></div>',
                ),
        )
    );
    
    
    public $edit_rules_user = array(
        array(
                'field' => 'username',
                'label' => 'Имя пользователя',
                'rules' => 'required|min_length[3]|max_length[15]|regex_match[/^[a-zA-Z]+$/]|trim',
                'errors' => array(
                        'required' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s не может быть пустое.</span></div>',
                        'min_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s должно быть более чем %s символа.</span></div>',
                        'max_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s слишком длинное - допустимо %s символов.</span></div>',
                        'regex_match' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s должно состоять из латынских букв.</span></div>',
                ),
        ),
        array(
                'field' => 'email',
                'label' => 'Почта',
                'rules' => 'required|valid_email',
                'errors' => array(
                        'required' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s не может быть пустое.</span></div>',
                        'min_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s должно быть более чем %s символа.</span></div>',
                        'max_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s слишком длинное - допустимо %s символов.</span></div>',
                ),
        ),
        array(
                'field' => 'surname',
                'label' => 'Фамилия',
                'rules' => 'required|min_length[3]|max_length[15]|trim',
                'errors' => array(
                        'required' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s не может быть пустое.</span></div>',
                        'min_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s должно быть более чем %s символа.</span></div>',
                        'max_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s слишком длинное - допустимо %s символов.</span></div>',
                ),
        ),
        array(
                'field' => 'password',
                'label' => 'Пароль',
                'rules' => 'regex_match[/^[a-zA-Z0-9]+$/]|trim',
                'errors' => array(
                        'required' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s не может быть пустое.</span></div>',
                        'min_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s должно быть более чем %s символа.</span></div>',
                        'max_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s слишком длинное - допустимо %s символов.</span></div>',
                        'regex_match' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s должен состоять из латынских букв или цыфр.</span></div>',
                ),
        ),
        array(
                'field' => 'name',
                'label' => 'Имя',
                'rules' => 'required|min_length[3]|max_length[15]|trim',
                'errors' => array(
                        'required' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s не может быть пустое.</span></div>',
                        'min_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s должно быть более чем %s символа.</span></div>',
                        'max_length' => '<div style="height: 35px;line-height: 35px;padding-left: 10px;" class="bg-red-active color-palette"><span>%s слишком длинное - допустимо %s символов.</span></div>',
                ),
        )
    );

//function get_tablearray($table){
//        $settings = $this->CI->db->get($table)->result_array();
//        $data = array();
//        foreach ($settings as $data)
//        {
//            $data[$data['name']] = $data['username'];
//        }
//        return $data;   
//}


}

