<?php
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\Output\QRImage;
use chillerlan\QRCode\QROptions;
use Mpdf\Barcode\Rm4Scc;

class Ki_theme
{
    protected $CI,
    $pageState = 200,
    $breadcrumb_data = ['actions_buttons' => '', 'title_icon' => '', 'session_message' => ''],
    $attr = [],
    $tag_html = '',
    $title = '',
    $page_name = '',
    $tooltips = '',
    $action_buttons = [],
    $dataSchema = 0,
    $contentArea = ['form' => 'Simple Form', 'content' => 'Content Data', 'tform' => 'Transaction Form'],
    $drawerAttr = [],
    $dropdown_items = [],
    $adminMenu = [],
    $forceUpdate = false;
    private $card = ['title' => '', 'subtitle' => '', 'actions' => ''],
    $list_pages = 0,
    $rolePermissions = [],
    $ThemeSchemaVars = [],
    $theme_menu_items = [],
    $plan_methods = [],
    $plan_details = [],
    $current_method_type = false,
    $config = [],
    $encryptionKey = 'ARYA8533',
    $wallet_message_type = '',
    $festivals = [],
    $editPermissions = [];
    protected $login_type = '', $login_id = 0;
    function __construct($chk = false)
    {
        $this->CI = &get_instance();
        if (is_object($chk)) {
            $this->CI = $chk;
        }

        $this->set_breadcrumb();
        if (!$chk) {
            if (!$this->ThemeSchemaVars)
                $this->getThemeMenu();
            if (!$this->plan_methods)
                $this->get_plan_methods();
        }
        $get = $this->CI->db->get('config');
        if ($get->num_rows()) {
            foreach ($get->result() as $val) {
                define(strtoupper($val->type), $val->value);
            }
            if (defined('THEME') && defined('PATH')) {
                define('DOCUMENT_PATH', 'assets/formats/' . PATH);
                define('THEME_PATH', FCPATH . 'themes/' . THEME . '/');
                if (!is_dir(THEME_PATH)) {
                    show_error("Please Configure Your Theme.");
                }
                $this->CI->load->append_view_path([
                    THEME_PATH . '/' => true,
                    FCPATH . DOCUMENT_PATH . '/' => true
                ]);
            }
        }
        $this->removeCache();

        $file = FCPATH . 'assets/fas/festivals_' . date('Y') . '.json';
        if (!file_exists($file)) {
            if (defined('CALENDARIFIC_API_KEY')) {
                $api_key = CALENDARIFIC_API_KEY;
                $year = date('Y');  // 
                $country = 'IN';  // 
                $url = "https://calendarific.com/api/v2/holidays?api_key={$api_key}&country={$country}&year={$year}";
                try {
                    $response = $this->CI->curl->_simple_call('get', $url);
                    // pre($rss, true);
                    $data = json_decode($response, true);

                    if (isset($data['response']['holidays']) && !empty($data['response']['holidays'])) {
                        $festivals = $data['response']['holidays'];

                        $sorted_festivals = [];

                        foreach ($festivals as $festival) {
                            $date = date('Y-m-d', strtotime($festival['date']['iso']));

                            if (!isset($sorted_festivals[$date])) {
                                $sorted_festivals[$date] = [];
                            }

                            $sorted_festivals[$date][] = [
                                'name' => $festival['name'],
                                'description' => $festival['description'],
                                'type' => $festival['type'],
                            ];
                        }
                        $this->festivals = $sorted_festivals;
                        $this->save_to_json($sorted_festivals, $file);
                    }
                } catch (Exception $e) {

                }
            }
        } else {
            $this->festivals = $this->load_from_json($file);
        }
        $this->login_type = $this->CI->session->userdata('admin_type');
        $this->login_id = $this->CI->session->userdata('admin_id');
        if ($this->login_type == 'role_user') {
            $this->rolePermissions = $this->CI->center_model->permissions();
            $this->rolePermissions = array_merge($this->rolePermissions, ['dashboard']);
            // pre($this->rolePermissions, true);
        }
        $this->process_menu();
        $this->breadcrumb_data['controller'] = ucfirst($this->CI->router->fetch_class());
    }
    function isValidForPermission($type)
    {
        if ($this->login_type == 'role_user') {
            return in_array($type, $this->rolePermissions);
        }
        return false;
    }
    function get_ajax_module()
    {
        $module_name = $this->CI->load->get_module();
        $path = FCPATH . "modules/{$module_name}/controllers/Ajax.php";
        if (($module_name == 'exam' && !defined('DB_EXAM')))
            return;
        if (file_exists($path)) {
            return $module_name . '/';
        }
        return;
    }
    function filterByAllowedTypes($array, $allowedTypes)
    {
        $result = [];

        foreach ($array as $key => $value) {
            if (is_array($value) && isset($value['type']) && in_array($value['type'], $allowedTypes)) {

                $result[$key] = $value;
                if (isset($value['submenu'])) {
                    $result[$key]['submenu'] = $this->filterByAllowedTypes($value['submenu'], $allowedTypes);
                }
            } elseif (is_array($value)) {
                $filtered = $this->filterByAllowedTypes($value, $allowedTypes);
                if (!empty($filtered)) {
                    $result[$key] = $filtered;
                }
            }
        }

        return $result;
    }
    function createTitleArrayByType($array = 0)
    {
        $titleArray = [];
        $array = $array == 0 ? $this->adminMenu : $array;

        foreach ($array as $key => $value) {
            // Check if 'type' exists and add to the result array
            if (is_array($value) && isset($value['type'])) {
                $findTitle = $value['label'];
                $titleArray[$value['type']] = $findTitle;
            }

            // Recursively process nested arrays
            if (is_array($value)) {
                $titleArray = array_merge($titleArray, $this->createTitleArrayByType($value));
            }
        }

        return $titleArray;
    }

    function get_festivals()
    {
        return $this->festivals;
    }
    function get_festival($date = 0)
    {
        $date = $date == 0 ? date('Y-m-d') : $date;
        if (isset($this->festivals[$date]))
            return $this->festivals[$date];
        return false;
    }
    function isDiwali()
    {
        $get_festival = $this->findEvent('Diwali');
        if (isset($get_festival['date']))
            return $this->isDateWithinWeek($get_festival['date']);
        // $givenDateString = date('d-m-Y', strtotime($get_festival['date']));

        // // Create a DateTime object from the given date
        // $givenDate = DateTime::createFromFormat('d-m-Y', $givenDateString);

        // // Check if the date creation was successful
        // if (!$givenDate) {
        //     return false;
        //     // die("Invalid date format. Please use 'dd-mm-yyyy'.");
        // }

        // // Get the day of the week for the given date (0 = Sunday, 6 = Saturday)
        // $dayOfWeek = $givenDate->format('w'); // 0 (for Sunday) through 6 (for Saturday)

        // // Calculate the start of the week (Monday)
        // $startOfWeek = clone $givenDate;
        // $startOfWeek->modify('-' . ($dayOfWeek + 5) . ' days');

        // // Calculate the end of the week (Sunday)
        // $endOfWeek = clone $givenDate;
        // $endOfWeek->modify('+' . (2 - $dayOfWeek) . ' days');

        // // Get the first and last dates
        // $firstDate = $startOfWeek->format('d-m-Y'); // First date of the week
        // $lastDate = $endOfWeek->format('d-m-Y');
        // $currentDate = new DateTime();
        // $currentDate = $currentDate->format('d-m-Y');
        // return $firstDate.' '.$lastDate.' '.$currentDate;
        // // Check if the current date is within the week range
        // return ($currentDate <= $firstDate && $currentDate <= $lastDate);

    }
    function isDateWithinWeek($dateInput)
    {
        $date = new DateTime($dateInput); // Create DateTime object for the input date

        // Clone the date to avoid modification
        $startOfWeek = clone $date;
        $endOfWeek = clone $date;

        // Calculate the start and end of the week (Sunday to Saturday)
        $startOfWeek->modify('last Sunday');
        $endOfWeek->modify('next Saturday');
        $currentDate = new DateTime();

        // echo $startOfWeek->format('d-m-Y').'<br>';
        // echo $endOfWeek->format('d-m-Y').'<br>';
        // echo $currentDate->format('d-m-Y').'<br>';
        // Check if the date lies within the range
        return ($currentDate >= $startOfWeek && $currentDate <= $endOfWeek);
    }
    function findEvent($eventTitle)
    {
        foreach ($this->festivals as $date => $eventList) {
            foreach ($eventList as $event) {
                if (stripos($event['name'], $eventTitle) !== false) { // Case-insensitive search
                    return array(
                        'date' => $date,
                        'event' => $event
                    );
                }
            }
        }
        return null; // Return null if no event is found
    }
    function load_from_json($file)
    {
        $data = json_decode(file_get_contents($file), true);
        return $data;
    }
    function save_to_json($data, $file_path)
    {
        $json_data = json_encode($data, JSON_PRETTY_PRINT);
        return (file_put_contents($file_path, $json_data)) ? true : false;
    }
    function removeCache()
    {
        if ($_SERVER['HTTP_HOST'] != 'localhost') {
            delete_first_level_directories(FCPATH . 'themes');
            delete_directory(FCPATH . 'assets' . DIRECTORY_SEPARATOR . 'formats', [PATH]);
        }
    }
    function grade($score, $type = 'en')
    {
        if (file_exists(DOCUMENT_PATH . '/function.php')) {
            require DOCUMENT_PATH . '/function.php';
            if (function_exists('my_grade')) {
                return my_grade($score);
            }
        }
        if (PATH == 'svatii') {
            if ($score >= 90)
                return 'A+';
            elseif ($score >= 60)
                return 'A';
            elseif ($score >= 40)
                return 'B';
            else
                return 'Fail';
        }
        if (PATH == 'gssrcindia' or PATH == 'vimts') {
            if ($score >= 75)
                return 'A';
            else if ($score >= 60)
                return 'B';
            else if ($score >= 50)
                return 'C';
            else if ($score >= 40)
                return 'D';
            else
                return 'E';
        }
        if (PATH == 'sctnew') {
            if ($score >= 80)
                return $type == 'en' ? 'First' : 'प्रथम';
            elseif ($score >= 70)
                return $type == 'en' ? 'Second' : 'द्वितीय';
            elseif ($score >= 60)
                return $type == 'en' ? 'Third' : 'तृतीय';
            else if ($score >= 50)
                return $type == 'en' ? '4th' : 'चतुर्थी';
            else
                return $type == 'en' ? 'Fail' : 'असफल';
        }
        if (PATH == 'nbeat') {
            if ($score >= 80)
                return 'A+';
            else if ($score >= 70)
                return 'A';
            else if ($score >= 60)
                return 'B';
            else if ($score >= 50)
                return 'C';
            else if ($score >= 40)
                return 'D';
            else
                return 'Fail';
        }
        if (PATH == 'upstate' or PATH == 'iisdit') {
            if ($score >= 90)
                return 'A+';
            else if ($score >= 80)
                return 'A';
            else if ($score >= 70)
                return 'B+';
            else if ($score >= 60)
                return 'B';
            else if ($score >= 50)
                return 'C';
            else if ($score >= 40)
                return 'D';
            else if ($score >= 30)
                return 'E';
            else
                return 'F';
        }
        if (PATH == 'boardofpara') {
            if ($score >= 90)
                return 'A+';
            else if ($score >= 80)
                return 'A';
            else if ($score >= 70)
                return 'B+';
            else if ($score >= 60)
                return 'B';
            else if ($score >= 50)
                return 'C';
            else if ($score >= 40)
                return 'D';
            else
                return 'F';
        }
        if (PATH == 'vihm') {
            if ($score >= 70)
                return 'A';
            elseif ($score >= 55)
                return 'B';
            else
                return 'C';
        }
        if (PATH == 'skycrownworld') {
            if ($score >= 85)
                return 'A+ (Excellent)';
            elseif ($score >= 75 && $score < 85)
                return 'A (Very Good)';
            else if ($score >= 60 && $score < 75)
                return 'B (Good)';
            else if ($score >= 40 && $score < 60)
                return 'C (Satisfactory)';
            else
                return 'F (Failure)';
        }
        if (PATH == 'zcc') {
            if ($score >= 80 && $score <= 100)
                return 'A+';
            elseif ($score >= 60 && $score < 80)
                return 'A';
            elseif ($score >= 50 && $score < 60)
                return 'B';
            else
                return 'C';
        }
        if (PATH == 'psdmt') {
            if ($score >= 90 && $score <= 100)
                return 'S';
            else if ($score >= 70 && $score < 90)
                return 'A+';
            else if ($score >= 50 && $score < 60)
                return 'A';
            else if ($score >= 30 && $score < 50)
                return 'B';
            else
                return 'C';
        }
        if (in_array(PATH, ['techno', 'satvam', 'icetrc'])) {
            if ($score >= 75 && $score <= 100)
                return 'A';
            else if ($score >= 60 && $score < 75)
                return 'B';
            else if ($score >= 50 && $score < 60)
                return 'C';
            else
                return 'D';
        }
        if (PATH == 'iedct') {
            if ($score >= 60)
                return 'A';
            else if ($score < 60 && $score >= 50)
                return 'B';
            else if ($score < 50 && $score >= 40)
                return 'C';
            else if ($score < 40 && $score >= 33)
                return 'D';
            else
                return 'E';
        }
        if (PATH == 'isdmedu') {
            if ($score >= 90 && $score <= 100)
                return 'E';
            else if ($score < 90 && $score >= 70)
                return 'A+';
            else if ($score < 70 && $score >= 50)
                return 'A';
            else if ($score < 50 && $score >= 30)
                return 'B';
            else
                return 'C';
        }
        if (PATH == 'haptronworld') {
            if ($score >= 90 && $score <= 100)
                return 'O';
            else if ($score >= 75 && $score < 90)
                return 'A';
            else if ($score >= 60 && $score < 75)
                return 'B';
            else if ($score >= 45 && $score < 60)
                return 'C';
            else
                return 'D';
        }
        if (PATH == 'sewaedu') {
            if ($score >= 90 && $score <= 100)
                return 'A+';
            else if ($score >= 70 && $score < 90)
                return 'A';
            else if ($score >= 50 && $score < 70)
                return 'B';
            else if ($score >= 30 && $score < 50)
                return 'C';
            return 'FAIL';
        }
    }
    function count_manual_notification($where, $seen = 0)
    {
        if (table_exists('manual_notifications'))
            return $this->CI->db->where('seen', $seen)->where($where)->get('manual_notifications')->num_rows();
        return;
    }
    function generate_qr($id = 0, $type = '', $data = '', $return = false, $version = 5)
    {
        $png = "upload/images/{$type}_{$id}.png";
        if (file_exists($png))
            return $png;
        if ($data == '') {
            throw new Exception('Please Enter Data to generate QR.');
        }
        $options = new QROptions([
            'version' => $version,  // QR code version (adjust as needed)
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel' => QRCode::ECC_L,
            'imageBase64' => $return,
            'margin' => 0,
            'padding' => 0,
            'imageTransparent' => true
        ]);
        // Create QR code
        $qrCode = new QRCode($options);
        $image = $qrCode->render($data);
        // Save the QR code image to a file
        if ($return)
            return $image;
        file_put_contents($png, $image);
        return $png;
    }
    function encrypt($data)
    {
        $data = (string) $data;
        $key = $this->encryptionKey;
        $result = '';
        for ($i = 0; $i < strlen($data); $i++) {
            $result .= chr(ord($data[$i]) ^ ord($key[$i % strlen($key)]));
        }
        return base64_encode($result);
    }

    function center_fix_fees($flag = false)
    {
        $array = [];
        if (CHECK_PERMISSION('WALLET_SYSTEM') or $flag) {
            if ($flag)
                $this->CI->db->where('status', 1);
            $getFees = $this->CI->db->where(['onlyFor' => 'center', 'status' => 1])->get('student_fix_payment');
            if ($getFees->num_rows()) {
                foreach ($getFees->result() as $row) {
                    $array[$row->key] = $row->amount;
                }
            }
            if (CHECK_PERMISSION('CENTRE_WISE_WALLET_SYSTEM')) {
                $get = $this->CI->center_model->center_fees();
                if ($get->num_rows()) {
                    $row = $get->row();
                    foreach ($row as $index => $value) {
                        if ($value != null && !in_array($index, ['id', 'center_id']))
                            $array[$index] = $value;
                    }
                }
            }
        }
        return $array;
    }

    function decrypt($data)
    {
        $key = $this->encryptionKey;
        $data = base64_decode($data);
        $result = '';
        for ($i = 0; $i < strlen($data); $i++) {
            $result .= chr(ord($data[$i]) ^ ord($key[$i % strlen($key)]));
        }
        return $result;
    }
    function set_config_item($index = '', $value = '')
    {
        if (is_array($index)) {
            foreach ($index as $a => $v)
                return $this->set_config_item($a, $v);
        } else
            return $this->config[$index] = $value;
    }
    function config($index = 0)
    {
        if ($index) {
            if (isset($this->config[$index]))
                return $this->config[$index];
        } else
            return $this->config;
        return;
    }
    function loginUser()
    {
        return $this->login_type;
    }
    function isAdmin()
    {
        return $this->login_type == 'admin';
    }
    function isCenter()
    {
        return $this->login_type == 'center';
    }
    function loginId()
    {
        return $this->login_id;
    }
    function setData($index = '', $data = '')
    {
        if (is_array($index))
            $this->someData = array_merge($this->someData, $index);
        else
            $this->someData[$index] = $data;
        return $this;
    }
    function get_current_method()
    {
        echo $this->current_method_type;
    }
    function set_current_method($type)
    {
        $this->current_method_type = $type;
        return $this;
    }
    function view_exists($module, $file)
    {
        $file = FCPATH . 'modules/' . $module . '/views/' . $file;
        return (file_exists($file . '.tpl') or file_exists($file . '.php'));
    }
    function permission_limit($type = false, $t = true)
    {
        $type = $type ? $type : $this->current_method_type;
        $limit = isset($this->plan_methods[$type]['limit']) ? $this->plan_methods[$type]['limit'] : false;
        $limit = $limit ? $limit : 0;
        return $limit == 'unlimited' ? ($t ? 999999 : 'Unlimited') : $limit;
    }
    function permissionMenu($index = '', $data = '', $icon = '', $path = 2, $fs = 4, $type = 'duotone')
    {
        $my = [
            'title' => $index,
            'value' => $data,
            'icon' => $this->keen_icon($icon, $path, $fs, $type, false)
        ];
        $this->someData['menus'][] = $my;
        // return $this->setData('menus',$my);
        return $this;
    }
    function permissionBox($type = 0, $existsLimit = 0)
    {
        $this->current_method_type = $type ? $type : $this->current_method_type;
        $isValid = false;
        $limit = $this->permission_limit();
        switch ($this->current_method_type) {
            case 'add_page':
                $isValid = $limit > $this->num_pages();
                if (!$isValid) {
                    $this->permissionMenu('Created Page', $this->num_pages(), 'file text-white');
                    $this->permissionMenu('Total Pages', $this->permission_limit(false, false), 'file text-white');
                }
                break;
            case 'web_mail':
                $isValid = $limit > $existsLimit;
                if (!$isValid) {
                    $this->permissionMenu('Created Web Mail(s)', $existsLimit, 'file text-white');
                    $this->permissionMenu('Total Web Mail(s)', $this->permission_limit(false, false), 'file text-white');
                }
                break;
        }
        if ($isValid) {
            if ($this->view_exists('permissions', $this->current_method_type)) {
                $this->parse('permissions/' . $this->current_method_type, $this->someData);
            } else
                echo alert('Permissions View Page ' . $this->current_method_type . ' is not exists.', 'danger');
        } else {
            $this->parse('permissions/default', $this->someData);
        }
    }
    function parse_string($string, $data = [], $return = true)
    {
        $data = array_merge($data, $this->config());
        return $this->CI->parser->parse_string($string, $data, $return);
    }
    function parse($page, $data = [], $return = false)
    {
        $page = strpos($page, '.tpl') ? $page : $page . '.tpl';
        $html = $this->CI->parser->parse($page, $data, true);
        if ($return)
            return $html;
        else
            echo $html;
    }
    function uri_string()
    {
        $uri_string = '';
        foreach ($this->CI->uri->segment_array() as $row) {
            // if (in_array($row, ['add', 'edit', 'success']) or is_numeric($row))
            //     continue;
            $uri_string .= $row . '/';
        }
        return trim($uri_string, '/');
    }
    function list_menu()
    {
    }
    function list_pages()
    {
        if ($this->list_pages) {
            return $this->list_pages;
        } else {
            $this->list_pages = json_decode(Modules::run('assets/json_pages'), true);
            log_message('info', 'Json List Pages Initialized');
            return $this->list_pages;
        }
    }
    function setPageState($state = 200)
    {
        $this->pageState = $state;
        return $this;
    }
    function getPageState()
    {
        return $this->pageState;
    }
    function modules_and_pages()
    {
        $modules = [];
        if ($this->num_pages()) {
            $pages = $this->list_pages();
            foreach ($pages as $row) {
                if (!start_with($row['link'], 'http') and !empty($row['link']))
                    $modules[] = $row['link'];
            }
        }
        // pre($pages);
        $modules_path = FCPATH . 'modules';
        if (is_dir($modules_path)) {
            $items = scandir($modules_path);
            $folders = array_diff($items, ['.', '..']);
            foreach ($folders as $folder) {
                $modules[] = $folder;
            }
        }
        return $modules;
    }
    function num_pages()
    {
        return sizeof($this->list_pages());
    }
    function get_page($id)
    {
        $pages = $this->list_pages();
        $row = false;
        foreach ($pages as $page) {
            if ($page['id'] == $id) {
                $row = $page;
                break;
            }
        }
        return $row;
    }
    function set_page_link_button($target = '')
    {
        $this->set_drawer_page();
        $target = empty($target) ? '' : 'data-target="' . $target . '"';
        return '<button class="our-page-links btn btn-xs btn-sm btn-info mt-3" ' . $target . ' type="button">Set Our Page in this link</button>';
    }
    private function set_drawer_page()
    {
        $this->set_drawer_attr('pages', json_encode($this->list_pages()));
    }
    function schema_vars($index = 0)
    {
        $schemavars = $this->CI->load->config('admin/schema', true);
        if ($this->ThemeSchemaVars)
            $schemavars = array_merge($this->ThemeSchemaVars, $schemavars);
        return $index ? $schemavars[$index] : $schemavars;
    }
    function schema_vals($index, $type = '')
    {
        $vals = $this->schema_vars();
        if (isset($vals[$index])) {
            return $vals[$index];
        }
        return $index;
    }
    function get_theme_templates()
    {
        $get = $this->CI->SiteModel->get_theme_templates();
        $data = [];
        if ($get->num_rows()) {
            $data = $get->result_array();
        }
        return json_encode($data);
    }
    function get_theme_css()
    {
        if (file_exists(THEME_PATH . '_common/head.php')) {
            $linkers = [];
            $html = file_get_contents(THEME_PATH . '_common/head.php');
            $document = new DOMDocument;
            $document->strictErrorChecking = false;
            $document->recover = true;
            $document->loadHTML($html);
            $links = $document->getElementsByTagName('link');
            //Array that will contain our extracted links.
            $extractedLinks = array();
            foreach ($links as $link) {
                //Get the link in the href attribute.
                $linkHref = $link->getAttribute('href');
                //If the link is empty, skip it and don't
                //add it to our $extractedLinks array
                if (strlen(trim($linkHref)) == 0) {
                    continue;
                }
                //Skip if it is a hashtag / anchor link.
                if ($linkHref[0] == '#') {
                    continue;
                }
                $lnk = str_replace('{theme_url}', theme_url(), $linkHref); //starts_with($linkHref, '{_theme_url_}') ? str_replace('{$linkHref : theme_assets().$linkHref;
                $linkers[] = "$lnk";
            }
            return implode(',', $linkers);
        }
        return;
    }
    function drawer_init()
    {
        $this->set_drawer_page();
        $this->set_drawer_attr('schema-vars', $this->schema_vars());
        return $this;
    }
    function drawer_button($type = '', $type_id = 0, $title = '')
    {
        $this->drawer_init();
        $this->tag_html('Set in Page');
        $schema = [];
        $get = $this->CI->SiteModel->getPageSchemaWithSelect(['event' => $type, 'event_id' => $type_id], 'event,event_id,page_id');
        if ($get->num_rows()) {
            $schema = $get->result_array();
        }
        $this->dataSchema = json_encode($schema);
        $this->set_attribute([
            'data-event' => $type,
            'data-event_id' => $type_id,
            'title' => $title
        ])
            ->with_icon('subtitle', 5)->with_pulse('dark')
            ->set_class('advanced-set-page btn btn-outline btn-outline-dashed btn-outline-dark btn-active-light-dark');
        return $this->button('');
    }
    function _attributes_to_string($attributes)
    {
        if (empty($attributes)) {
            return '';
        }
        if (is_object($attributes)) {
            $attributes = (array) $attributes;
        }
        if (is_array($attributes)) {
            $atts = '';
            foreach ($attributes as $key => $val) {
                $atts .= "  $key='$val'";
            }
            return $atts;
        }
        if (is_string($attributes)) {
            return ' ' . $attributes;
        }
        return FALSE;
    }
    function drawer_main_div_attr()
    {
        return $this->_attributes_to_string($this->drawerAttr);
    }
    function set_forms_in_drawer()
    {
        return $this->set_drawer_attr('forms', $forms = $this->CI->FormModel->getFormModel(0, 'id,title')->result_array());
    }
    function set_tform_in_drawer()
    {
        return $this->set_drawer_attr('tforms', $this->CI->FormModel->getTransactionForm(0, 'id,tform_name as title')->result_array());
    }
    function set_tforms_in_drawer()
    {
    }
    function set_drawer_attr($i, $v)
    {
        $this->drawerAttr["data-$i"] = is_array($v) ? json_encode($v) : $v;
        return $this;
    }
    function checkbox($name = '', $value = '', $parentClass = '', $labelClass = '')
    {
        return $this->special_input('checkbox', $name, $value, $parentClass, $labelClass);
    }
    function switch($name = '', $value = '', $parentClass = '', $labelClass = '')
    {
        $parentClass .= ' form-switch';
        return $this->checkbox($name, $value, $parentClass, $labelClass);
    }
    function radio($name = '', $value = '', $parentClass = '', $labelClass = '')
    {
        $value = $value == 0 ? '0' : $value;
        return $this->special_input('radio', $name, $value, $parentClass, $labelClass);
    }
    function load_ckeditor()
    {
        return '<script src="' . base_url . '/public/custom/ckeditor/ckeditor.js"></script>';
    }
    function load_tinymce($data = [])
    {
        return Modules::run('settings/tinymce', $data);
    }
    function checked($checked = true)
    {
        if (is_bool($checked)) {
            if ($checked)
                return $this->set_attribute('checked', 'checked');
        }
        return $this;
    }
    function disabled($checked = true)
    {
        if (is_bool($checked)) {
            if ($checked)
                return $this->set_attribute('disabled', 'disabled');
        }
        return $this;
    }
    function special_input($type = 'checkbox', $name = '', $value = '', $ParentClass = '', $labelClass = '')
    {
        $randId = 'demo' . getRadomNumber(12);
        if (isset($this->attr['id'])) {
            $randId = $this->attr['id'];
            unset($this->attr['id']);
        }
        $this->set_attribute([
            'class' => 'form-check-input',
            'name' => $name,
            'value' => $value,
            'id' => $randId,
            'type' => $type
        ]);
        $html = '<div class="form-check ' . $ParentClass . '">
                    <input  ' . _attributes_to_string($this->attr) . '/>
                    <label class="form-check-label ' . $labelClass . '"  for="' . (isset($this->attr['id']) ? $this->attr['id'] : $randId) . '">
                        ' . $this->tag_html . '
                    </label>
                </div>';
        $this->reset_props();
        return $html;
    }
    function segment($arg1, $arg2 = 0)
    {
        return $this->CI->uri->segment($arg1, $arg2);
    }
    function last_segment()
    {
        return $this->CI->uri->segment($this->CI->uri->total_segments());
    }
    function breadcrummb_icon($clss = '', $path = 2, $fs = 1, $type = 'solid')
    {
        $this->breadcrumb_data['title_icon'] = $this->keen_icon($clss, $path, $fs, $type);
        return $this;
    }
    function breadcrumb_action_html($data, $isFile = false)
    {
        if ($isFile) {
            if (module_view_exists('template', 'action/' . $data))
                $data = $this->CI->load->view('template/' . $data, [], true);
            else
                $data = alert("$data.php page not found.", 'danger');
        }
        $this->breadcrumb_data['actions_buttons'] .= $data;
        return $this;
    }
    function set_breadcrumb($props = array())
    {

        $this->breadcrumb_data = array_merge($this->breadcrumb_data, $props);
        // pre($this->breadcrumb_data);
        $this->set_title(humanize(str_replace('-', ' ', $this->last_segment())));
        $chk = $this->segment(2, 'Dashboard');
        $chk = strtolower($chk) == 'v1' ? $this->segment(3) : $chk;
        if (isset($props['icon'])) {
            list($clss, $path) = $props['icon'];
            $this->breadcrummb_icon($clss, $path, $fs = 1, $type = 'solid');
        }
        if (!isset($props['page_name']))
            $this->breadcrumb_data['page_name'] = humanize($this->last_segment());
        if (!isset($props['actions_buttons'])) {
            $this->breadcrumb_data['actions_buttons'] = '';
        }
        return $this;
    }
    function outline_dashed_style($class = 'primary')
    {
        return $this->set_attribute('class', "btn btn-outline btn-outline-dashed btn-outline-$class btn-active-light-$class");
    }
    function set_title($title, $force = false)
    {
        if ($force) {
            $this->breadcrumb_data['title'] = $title;
            $this->forceUpdate = true;
        }
        if ($this->forceUpdate)
            return $this;
        if (!isset($this->breadcrumb_data['title']))
            $this->breadcrumb_data['title'] = $title;
        return $this;
    }
    function clipboard($text = '')
    {
        $id = 'clipboard-' + mt_rand();
        return '<div class="d-flex align-items-center flex-wrap">
                    <!--begin::Input-->
                    <div id="" class="me-5">This is a sample static text string to copy!</div>
                    <!--end::Input-->
                    <!--begin::Button-->
                    <button class="btn btn-icon my-clipboard btn-sm btn-light" data-clipboard-target="#">
                        <i class="ki-duotone ki-copy fs-2 text-muted"></i>
                    </button>
                    <!--end::Button-->
                </div>';
    }
    function get_title()
    {
        return $this->breadcrumb_data['title'];
    }
    function get_session_flashdata($type = 0)
    {
        if (!isset($this->CI->session)) {
            $this->CI->load->library('session');
        }
        if ($type) {
            $msg = $this->CI->session->flashdata($type);
            @$this->CI->session->unset_userdata('error');
            return $msg;
        }
        if ($this->CI->session->flashdata('error'))
            $this->breadcrumb_data['session_message'] = alert($this->CI->session->flashdata('error'), 'danger');
        if ($this->CI->session->flashdata('success'))
            $this->breadcrumb_data['session_message'] = alert($this->CI->session->flashdata('success'));
        @$this->CI->session->unset_userdata('error');
        @$this->CI->session->unset_userdata('success');
        return $this;
    }
    function get_breadcrumb()
    {
        if ($this->getPageState() == 200) {
            $this->get_session_flashdata();
            return $this->CI->parser->parse('template/admin/static_breadcrumb.tpl', $this->breadcrumb_data, true);
        }
    }
    private function reset_props()
    {
        $this->attr = [];
        $this->tag_html = '';
    }
    function set_attribute($attrs = '', $value = '')
    {
        if (is_array($attrs)) {
            foreach ($attrs as $attr => $attrValue) {
                $this->set_attribute($attr, $attrValue);
            }
        } else {
            if (isset($this->attr[$attrs])) {
                $this->attr[$attrs] .= ' ' . $value;
            } else
                $this->attr[$attrs] = $value;
        }
        return $this;
    }
    function tooltips($title, $placement = 'top')
    {
        $attrs = ['data-bs-toggle' => 'tooltip', 'data-bs-placement' => $placement, 'title' => $title];
        return $this->set_attribute($attrs);
        // return ' data-bs-toggle="tooltip" data-bs-toggle="tooltip" data-bs-delay-hide="1000" data-bs-placement="top"';
    }
    function card_title($title)
    {
        $this->card['title'] = $title;
        return $this;
    }
    function card_actions($actions)
    {
        $this->card['actions'] = $actions;
        return $this;
    }
    function card_subtitle($title)
    {
        $this->card['subtitle'] = $title;
        return $this;
    }
    function list_vartical_card($data = [])
    {
        $this->CI = &get_instance();
        $this->card = array_merge($this->card, $data);
        return $this->CI->parser->parse('common/vartical-list-card.tpl', $this->card, true);
    }
    function set_tooltips_attr()
    {
    }
    function label($text)
    {
        $this->tag_html($text);
        $attr = $this->_attributes_to_string($this->attr);
        $html = $this->tag_html;
        $this->reset_props();
        return "<label $attr>$html</label>";
        // return $return ? $myToolTip : $this->
    }
    private function _gen_array($limit): array
    {
        $limit = is_int($limit) ? $limit : 4;
        $a = array();
        for ($i = 1; $i <= $limit; $i++)
            $a[$i] = $i;
        return $a;
    }
    function jsEvent($event, $METHOD)
    {
        return $this->set_attribute("on$event", $METHOD);
    }
    function required()
    {
        $this->set_attribute('required', 'required');
        return $this;
    }
    function layout_radio_input($name, $limit = 4, $checkd = 0)
    {
        $html = '<!--begin::Radio group-->
                    <div class="btn-group w-100 w-lg-50" data-kt-buttons="true"
                        data-kt-buttons-target="[data-kt-button]">';
        $array = is_array($limit) ? $limit : $this->_gen_array($limit);
        $this->set_class('btn-check');
        foreach ($array as $i => $v) {
            $check = $i == $checkd ? 'checked' : '';
            $active = $i == $checkd ? 'active' : '';
            $html .= '
                            <!--begin::Radio-->
                            <label
                                class="btn btn-outline btn-color-muted btn-active-success ' . $active . '"
                                data-kt-button="true">
                                <!--begin::Input-->
                                <input type="radio" ' . $this->_attributes_to_string($this->attr) . ' name="' . $name . '" value="' . $i . '" />
                                <!--end::Input-->
                                ' . $v . '
                            </label>
                            <!--end::Radio-->';
        }
        $html .= '</div>';
        $this->reset_props();
        return $html;
    }
    function tag_html($text, $type = 'append')
    {
        if (empty($this->tag_html) || is_bool($type))
            $this->tag_html = $text;
        else {
            if ($type == 'append')
                $this->tag_html .= $text;
            else
                $this->tag_html = $text . ' ' . $this->tag_html;
        }
        return $this;
    }
    function html($text = '')
    {
        if (empty($text))
            return $this->tag_html;
        return $this->tag_html($text);
    }
    function save_button($text = 'Save', $icon = 'element-plus', $iconPath = 2, $class = 'btn btn-outline hover-rotate-end btn-outline-dashed btn-outline-success btn-active-light-success')
    {
        $iconType = is_int($iconPath) ? 'duotone' : $iconPath;
        if ($icon)
            $this->with_icon($icon, $iconPath, 1, $iconType);
        return $this->with_pulse('success')->set_class($class)->button($text, 'submit');
    }
    function with_pulse($class = 0, $type = 'prepend')
    {
        $tagClass = 'pulse ' . ($class ? 'pulse-' . $class : '');
        $this->set_attribute('class', trim($tagClass));
        $this->tag_html('<span class="pulse-ring"></span>', $type);
        return $this;
    }
    function with_icon($icon, $path = 2, $fs = 2, $type = 'duotone')
    {
        $icon = $this->keen_icon($icon, $path, $fs, $type);
        $this->tag_html($icon, 'prepend');
        return $this;
    }
    function get_attributes($index = 0)
    {
        if (isset($this->attr[$index]))
            return $this->attr[$index];
        return $this->attr;
    }
    function set_class($value)
    {
        return $this->set_attribute('class', $value);
    }
    function button($text = 'Button', $type = 'button')
    {
        $this->tag_html($text);
        $this->set_attribute('type', $type);
        $extra = $this->dataSchema ? "data-schema='" . $this->dataSchema . "'" : '';
        $button = '<button ' . _attributes_to_string($this->attr) . ' ' . $extra . '>';
        $button .= $this->tag_html;
        $button .= '</button>';
        $this->reset_props();
        return $button;
    }
    function set_dropdown_items($data = [], $assign = false)
    {
        if ($assign)
            $this->dropdown_items = $data;
        else
            $this->dropdown_items[] = $data;
        return $this;
    }
    function dropdown($items = array(), $theme = 'light-primary')
    {
        $button = $this->set_class('btn')->set_attribute('data-kt-menu-trigger', 'click')->set_attribute('data-kt-menu-placement', 'bottom-end')->button('');
        $html = $button . '
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-' . $theme . ' fw-semibold w-200px py-3" data-kt-menu="true" style="">
                    <!--begin::Heading-->                    
                    ' . ($this->dropdownMenu($this->dropdown_items)) . '
                </div>';
        $this->reset_props();
        $this->dropdown_items = [];
        return $html;
    }
    private function dropdownMenu($menu)
    {
        $html = '';
        foreach ($menu as $m) {
            $html .= '<!--begin::Menu item-->
                    <div class="menu-item">';
            if (isset($m['content'])) {
                $html .= '<div class="menu-content">' . $m['content'] . '</div>';
            } else {
                $html .= '<a href="#" class="menu-link">
                            Settings
                        </a>
                        ';
            }
            $html .= '</div>
                    <!--end::Menu item-->';
        }
        $html .= '';
        return $html;
    }
    function back_button($url, $text = 'Back')
    {
        return $this->with_icon('arrow-left text-warning')->with_pulse('warning')->outline_dashed_style('info')->set_class('text-warning')->add_action($text, $url);
    }
    function add_action($text = '', $url = '#')
    {
        $this->tag_html($text);
        $url = start_with($url, 'http') ? $url : base_url($url);
        $button = '<a href="' . $url . '" ' . _attributes_to_string($this->attr) . '>';
        $button .= $this->tag_html;
        $button .= '</a>';
        $this->reset_props();
        return $button;
    }
    private function __button($text, $class = '')
    {
    }
    function publish_button($text = 'Publish', $icon = 'add-files', $clss = 'btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary', $ring = 'primary')
    {
        $ringClass = $ring ? 'pulse pulse-' . $ring : '';
        $btn = '<button id="publish_btn" class="publish-btn btn ' . $clss . '  ' . $ringClass . ' rounded hover-elevate-up" >
                <span class="indicator-label">
                    ' . ($ring ? '<span class="pulse-ring"></span> ' : '') . '
                    ' . $this->keen_icon('add-files', 3) . '                  
                    ' . $text . '
                </span>
                    <span class="indicator-progress">
                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                </button>';
        return $btn;
    }
    function trash_button($text = 'Delete')
    {
        return $this->set_class('btn btn-danger w-100')
            ->with_icon('trash', 5)
            ->button($text);
    }
    function demo()
    {
        return 'demo';
    }
    function keen_icon($clss = '', $path = 2, $fs = 1, $type = 'outline', $nbsp = true)
    {
        $icon = '<i class="ki-' . $type . ' ki-' . $clss . ' fs-' . $fs . '">';
        if (is_numeric($path) and $type == 'duotone') {
            for ($i = 1; $i <= $path; $i++)
                $icon .= '<span class="path' . $i . '"></span>';
        }
        $icon .= '</i>';
        return $icon . ($nbsp ? "&nbsp;" : '');
    }
    function getThemeMenu()
    {
        return false;
    }
    function permission($index = '')
    {
        // $allMethods = $this->get_plan($index);
        pre($this->plan_methods);
    }
    function limit()
    {
        // pre($this->per_method_type);
        return isset($this->plan_methods[$this->current_method_type]['limit']) ? $this->plan_methods[$this->current_method_type]['limit'] : false;
    }
    function get_plan_methods()
    {
        return [];
    }
    // function get_plan($index = 'all')
    // {
    //     $title = '';
    //     if (sizeof($this->plan_details)) {
    //         if (isset($this->plan_details[$index]))
    //             $title = $this->plan_details[$index];
    //         else
    //             $title = $this->plan_details;
    //     }
    //     return $title . (isDemo ? '<small class="fs-4 text-primary"> ( Demo Plan )</small> ' : '');
    // }
    function check_perimssion($type)
    {
        // if(isset($this->plan_methods))
        return recursiveArraySearch($type, $this->plan_methods);
    }
    function event_add_box($action_type, $cal_limit = 0)
    {
        $allowed = false;
        $type = null;
        $limit = null;
        if (array_key_exists($action_type, $this->plan_methods)) {
            $type = $action_type;
            $limit = $this->event_data($action_type);
        }
        echo $limit;
    }
    function event_data($type, $data_type = 'limit')
    {
        if (isset($this->plan_methods[$type])) {
            if (isset($this->plan_methods[$type][$data_type]))
                return $this->plan_methods[$type][$data_type];
        }
        return null;
    }
    function get_student_menu()
    {
        include(FCPATH . 'modules/student/config/menu.php');
        $adminMenu = $config;
        // $adminMenu = $this->CI->load->config('student/menu', true);
        // pre($config,true);
        // $this->adminMenu = $adminMenu;
        // $this->current_method = recursiveArraySearchReturnValue($this->uri_string(),$adminMenu['ui_setting']['menu'],'type');
        $html = '';
        foreach ($adminMenu as $menuType => $menus) {
            // echo $menuType;
            if (isset($menus['condition'])) {
                if (!$menus['condition']) {
                    continue;
                }
            }

            $html .= $this->generateMenu($menus['menu'], 'menu', $menuType);
        }
        return $html; //count($adminMenu);//$this->parser->parse('common/admin-menu',[],true);
    }
    function process_menu()
    {
        $adminMenu = [];
        if ($this->CI->center_model->isCoordinator())
            $adminMenu = $this->CI->load->config('coordinate/menu', true);
        else if ($this->isAdmin() || $this->isCenter() || $this->login_type == 'role_user')
            $adminMenu = $this->CI->load->config('admin/menu', true);
        else if ($this->CI->student_model->isStudent())
            $adminMenu = $this->CI->load->config('student/menu', true);
        // pre($adminMenu,true);

        $this->adminMenu = $adminMenu;
        if ($this->login_type == 'role_user') {
            $this->adminMenu = $adminMenu = $this->filterByAllowedTypes($this->adminMenu, $this->rolePermissions);
        }
    }
    function get_menu()
    {
        // $this->current_method = recursiveArraySearchReturnValue($this->uri_string(),$adminMenu['ui_setting']['menu'],'type');
        $html = '';
        foreach ($this->adminMenu as $menuType => $menus) {
            // echo $menuType;
            if (isset($menus['condition'])) {
                if (!$menus['condition']) {
                    continue;
                }
            }
            if (isset($menus['title'])) {
                $html .= '<!--begin:Menu item-->
                            <div  class="menu-item" >
                                <!--begin:Menu content-->
                                <div  class="menu-content" >
                                    <span class="menu-heading fw-bold text-uppercase fs-7">' . $menus['title'] . '</span>
                                </div>
                                <!--end:Menu content-->
                            </div>';
            }
            $html .= $this->generateMenu($menus['menu'], 'menu', $menuType);
        }
        return $html; //count($adminMenu);//$this->parser->parse('common/admin-menu',[],true);
    }
    function get_menu_details()
    {
    }
    private function gen_link($link)
    {
        return starts_with($link, 'http') ? $link : base_url($link);
    }
    private function active_menu($url)
    {
        return $this->uri_string() == $url ? 'active' : '';
    }
    function item_not_found($title = 'Not Found', $description = '')
    {
        return $this->CI->parser->parse('template/item-not-found', [
            'base_url' => base_url(),
            'title' => $title,
            'description' => $description
        ], true);
    }
    function generateMenu($menuItems, $type = 'menu', $menuType = '')
    {
        $html = '';
        foreach ($menuItems as $menuItem) {
            $activeMenu = isset($menuItem['url']) ? $this->active_menu($menuItem['url']) : '';
            if ($activeMenu != '') {
                $this->set_title($menuItem['label']);
            }
            if (isset($menuItem['condition'])) {
                if (!$menuItem['condition']) {
                    continue;
                }
            }
            $menuItemActive = (isset($menuItem['submenu']) ? $this->recursiveArraySearch($this->uri_string(), $menuItem['submenu']) : false);
            $html .= isset($menuItem['submenu']) ? '<div data-kt-menu-trigger="click" class="menu-item menu-accordion ' . ($menuItemActive ? 'hover show' : '') . '">' : '<div class="menu-item me-2">';
            $html .= '<' . (isset($menuItem['submenu']) ? 'span' : 'a href="' . $this->gen_link(@$menuItem['url']) . '"') . ' class="menu-link ' . $activeMenu . '">';
            if ($type == 'menu' or isset($menuItem['icon'])) {
                $icon = '';
                if (isset($menuItem['icon']) and is_array($menuItem['icon'])) {
                    list($icon, $path) = isset($menuItem['icon']) ? $menuItem['icon'] : ['element-11', 4];
                    if ($activeMenu != '')
                        $this->breadcrummb_icon($icon, $path);
                    $icon = $this->keen_icon($icon, $path, 2);
                } else {
                    $icon = (isset($menuItem['icon']) ? $menuItem['icon'] : 'element-11');
                    if ($activeMenu != '')
                        $this->breadcrummb_icon($icon);
                    $icon = $this->keen_icon($icon, false, 2, 'outline');
                }
                $html .= '<span class="menu-icon">';
                $html .= $icon;
                $html .= '</span>';
            } else {
                $html .= '<span class="menu-bullet">';
                $html .= '<span class="bullet bullet-dot"></span>';
                $html .= '</span>';
            }
            $html .= '<span class="menu-title">' . $menuItem['label'] . '</span>';
            if (isset($menuItem['submenu'])) {
                $html .= '<span class="menu-arrow"></span>';
            }
            $html .= '</' . (isset($menuItem['submenu']) ? 'span' : 'a') . '>';
            if (isset($menuItem['submenu'])) {
                $html .= '<div class="menu-sub menu-sub-accordion  ' . ($menuItemActive ? 'show' : '') . '">';
                $html .= $this->generateMenu($menuItem['submenu'], 'submenu', $menuType);
                $html .= '</div>';
            }
            $html .= '</div>';
        }
        return $html;
    }
    function setPermissions($permissions = [])
    {
        $this->editPermissions = $permissions;
    }
    function generate_permission($menuItems, $type = 'menu', $menuType = '')
    {
        $html = '';
        foreach ($menuItems as $menuItem) {

            if (isset($menuItem['condition'])) {
                if (!$menuItem['condition']) {
                    continue;
                }
            }
            // pre($menuItem);
            $checked = $this->recursiveArraySearch($menuItem['type'], $this->editPermissions) ? 'checked' : '';
            $disabled = $type == 'menu' ? '' : ($checked == 'checked' ? '' : 'disabled');
            if (isset($menuItem['submenu'])) {
                $html .= '  
                    <div class="arya-menu">
	                    <div class="col-md-12">
    	                    <label style="margin-bottom:3px" class="form-check form-switch form-check-custom form-check-solid pulse pulse-success" for="d-' . $menuItem['type'] . '">
    							<input ' . $disabled . ' '.$checked.' data-parent="' . $menuType . '" class="form-check-input w-30px h-20px parent-input ' . ($type == 'menu' ? '' : 'check-input-' . $menuItem['type']) . '" type="checkbox" value="' . $menuItem['type'] . '" name="permission[]" id="d-' . $menuItem['type'] . '">
    							<span class="pulse-ring ms-n1"></span>
    							<span class="form-check-label text-gray-600 fs-7">' . $menuItem['label'] . '</span>
    						</label>
    					</div>
    					<div class="col-md-12 row" style="    padding-left: 43px; ">';
                $html .= $this->generate_permission($menuItem['submenu'], 'submenu', $menuItem['type']);
                $html .= '</div></div>';
            } else {
                // $html .= $menuItem['label'] .' - '.(isset($menuItem['type']) ? $menuItem['type'] : 'nn').'<br>';

                $html .= '
    					                <div class="col-md-4">
    					                    <label style="margin-bottom:3px" class="form-check form-switch form-check-custom form-check-solid pulse pulse-success" for="d-' . $menuItem['type'] . '">
                    							<input ' . $disabled . ' '.$checked.'  data-parent="' . $menuType . '" class="form-check-input w-30px h-20px child-input check-input-' . $menuItem['type'] . '"  type="checkbox" value="' . $menuItem['type'] . '"  name="permission[]" id="d-' . $menuItem['type'] . '">
                    							<span class="pulse-ring ms-n1"></span>
                    							<span class="form-check-label text-gray-600 fs-7">' . $menuItem['label'] . '</span>
                    						</label>
    					                
    					                </div>
    					            
    					            ';

            }
            // $html .= '</div>';
        }
        return $html;
    }
    function recursiveArraySearch($needle, $haystack)
    {
        foreach ($haystack as $key => $value) {
            if ($value === $needle) {
                return true; // Value found in the array
            } elseif (is_array($value) && $this->recursiveArraySearch($needle, $value)) {
                return true; // Value found in a sub-array
            }
        }
        return false; // Value not found in the array
    }
    function findAndReturn(&$array, $searchValue, &$menu)
    {
        foreach ($array as $key => &$value) {
            if (is_array($value)) {
                $this->findAndReturn($value, $searchValue, $menu);
            } else {
                if ($value === $searchValue) {
                    $menu = $array;
                }
            }
        }
    }
    function findMenu($index)
    {
        $menu = [];
        $this->findAndReturn($this->adminMenu, $index, $menu);
        return $menu;
    }
    function isSetInPage($index)
    {
        $record = $this->findMenu($index);
        if (sizeof($record)) {
            if (isset($record['setINpage']))
                return $record['setINpage'];
        }
        return true;
    }
    function content_area_label($data, $index_val = 0)
    {
        $html = '';
        if (is_array($data) and count($data)) {
            $i = 0;
            foreach ($data['type'][$index_val] as $index => $val) {
                $title = $data['title'][$index_val][$index];
                $html .= '<label  id="proccess-' . $i . '" class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 mb-6">
                            <input type=hidden name="type[' . $index_val . '][]" value="' . $val . '">
                            <input type="hidden" class="title" name="title[' . $index_val . '][]" value="' . $title . '">';
                $html .= "<input type='hidden' class='content' name='content[$index_val][]' value='" . ($data['content'][$index_val][$index]) . "'>";
                $html .= '<div class="d-flex align-items-center me-2">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center fs-2 fw-bold flex-wrap" id="title">
                                        ' . $title . '
                                    </div>
                                    <div class="fw-semibold opacity-75">
                                        ' . $this->contentArea[$val] . ' </div>
                                </div>
                            </div>
                            <div class="ms-5">
                                <a href="javascript:void(0)" data-type="' . $val . '" data-c="' . $i . '" data-id="' . $index_val . '" class="mb-2 mr-2 btn-transition btn-light-success btn btn-outline-dark add-event-data" style="color:white"><i class="fs-2x fa fa-cog"></i></a>
                                <a href="javascript:void(0)" class="mb-2 mr-2 btn-transition btn btn-outline-danger btn-light-danger remove-event-data" style="color:white"><i class="fs-2x fa fa-times"></i></a>
                            </div>
                        </label>';
            }
        }
        return $html;
    }
    function project_config($index = 0)
    {
        $config = $this->CI->load->config('project', true);
        if ($index)
            return isset($config[$index]) ? $config[$index] : '';
        return $config;
    }
    function collectDataAtIndex($array, $index, &$result)
    {
        foreach ($array as $key => $value) {
            // echo $key.',    ';
            // pre($value);
            if (is_array($value)) {
                // If the current element is an array, recurse into it
                $this->collectDataAtIndex($value, $index, $result);
            } elseif ($key === $index) {
                // echo $index;
                // If the key matches the specified index, collect the data
                $result[] = $value;
            }
        }
    }
    function isValidUrl()
    {
        // $re = [];
        // foreach ($this->adminMenu as $value) {
        //     if ($this->check_condition_for_url($value)) {
        //         foreach ($value['menu'] as $array) {
        //             if ($this->check_condition_for_url($array))
        //                 $this->collectDataAtIndex($array, 'url', $re);
        //         }
        //     }
        //     // }
        // }
        // return in_array($this->uri_string(), $re);
        return $this->isValidMenu($this->uri_string(), 'url');
    }

    function isValidMenu($type, $typeIndex = 'type')
    {
        $re = [];
        foreach ($this->adminMenu as $value) {
            if ($this->check_condition_for_url($value)) {
                foreach ($value['menu'] as $array) {
                    if ($this->check_condition_for_url($array))
                        $this->collectDataAtIndex($array, $typeIndex, $re);
                }
            }
            // }
        }
        // $this->collectDataAtIndex($this->adminMenu,'url',$re);
        // pre($re,true);
        // return true;
        return in_array($type, $re);
    }
    function check_condition_for_url($value)
    {
        if (isset($value['condition'])) {
            return $value['condition'];
        }
        return true;
    }
    function set_default_vars($index, $value)
    {
        $this->config['default_vars'] = [$index => $value];
    }
    function default_vars($index = 0)
    {
        $default_vars = $this->project_config('default_vars');
        if (isset($this->config['default_vars'][$index]))
            return $this->config['default_vars'][$index];
        if (is_array($default_vars)) {
            if (isset($default_vars[$index]))
                return $default_vars[$index];
            return $default_vars;
        }
        return;
    }
    function date($date = 0, $itsStrtotime = false)
    {
        if (!$date)
            return date($this->default_vars('dateFormat'));
        $currentDate = time();
        if ($date and !$itsStrtotime) {
            $currentDate = strtotime($date);
        }
        return date($this->default_vars('dateFormat'), $currentDate);
    }
    function course_duration($index = 0, $number = 0)
    {
        $courseDurations = $this->project_config('duration_type');
        if (is_array($courseDurations)) {
            if (isset($courseDurations[$index])) {
                $string = $courseDurations[$index];
                return $number > 1 ? plural($string) : singular($string);
            }
            if ($index === 'implode') {
                return implode(($number ? $number : '|'), $courseDurations);
            }
            return $courseDurations;
        }
        return;
    }
    function extra_setting_title_form($title, $index, $value = '')
    {
        // $this->CI->load->library('parser');
        $this->CI->load->view('template/admin/extra-setting-title', [
            'title' => $title,
            'index' => $index,
            'value' => $value
        ]);
    }
    function extra_setting_button_input($type, $title = 'Button', $inputTextName = '', $inputLinkName = '')
    {
        $titleData = $linkData = '';
        if (!is_bool($type)) {
            $inputTextName = "{$type}_text";
            $inputLinkName = "{$type}_link";
            $titleData = $this->CI->SiteModel->get_setting($inputTextName);
            $linkData = $this->CI->SiteModel->get_setting($inputLinkName);
        }
        return '<div class="form-group">
                    <label for="title" class="form-label mt-4">' . $title . '</label>
                    <input type="text" placeholder="Enter Title" name="' . $inputTextName . '"
                        value="' . $titleData . '" class="form-control"
                        style="border-radius: 12px 12px 0 0;border-bottom: 0;">
                    <input type="text" placeholder="Enter Link" name="' . $inputLinkName . '"
                        value="' . $linkData . '"
                        class="form-control" style="border-radius: 0 0 12px 12px;">
                </div>';
    }
    private $wallet_balance = 0;
    function set_wallet($balance)
    {
        $this->wallet_balance = $balance;
        return $this;
    }
    function wallet_balance()
    {
        return $this->wallet_balance;
    }
    function get_wallet_amount($type = '')
    {
        if ($type) {
            $this->wallet_message_type = $type;
            $return = $this->center_fix_fees();
            $balance = isset($return[$type]) ? $return[$type] : 0;
        }
        $this->wallet_balance -= $balance;
        return $balance;
    }
    function wallet_message()
    {
        $html = '';
        if ($this->CI->center_model->isCenter()) {
            if (CHECK_PERMISSION('WALLET_SYSTEM')) {

                if ($this->wallet_balance < 0)
                    $html .= $this->parse('wallet/low-balance', [], true);
                if ($this->wallet_message_type) {
                    $return = $this->center_fix_fees();
                    $fee = isset($return[$this->wallet_message_type]) ? $return[$this->wallet_message_type] : 0;
                    if ($this->wallet_balance && $fee) {
                        $html .= $this->parse('wallet/message', [
                            'type' => $this->wallet_message_type,
                            'wallet_balance' => $this->wallet_balance,
                            'fee' => $fee
                        ], true);
                    }
                }
            }
        }
        return $html;
    }
    function check_it_referral_stduent($student_id)
    {
        if (CHECK_PERMISSION('REFERRAL_ADMISSION')) {
            $check = $this->CI->student_model->check_is_referred($student_id);
            if ($check->num_rows()) {
                $coupon_student_name = $this->CI->db->where('id', $check->row('coupon_by'))->get('students')->row('name');
                echo alert('This student is Referred via <a class="text-dark" href="' . base_url('student/profile/' . $check->row('coupon_by')) . '" target="_blank"><i class="fa fa-user text-dark fs-2"></i>' . $coupon_student_name . '</a>', 'danger fs-2');
            }
        }
    }
    function get_form_title($type, $default = '')
    {
        $configs = $this->config();
        return isset($configs[$type]) ? $configs[$type] : $default;
    }


    function panel($class = 'main', $append = '')
    {
        $type = in_array(THEME, ['theme-07', 'edu-01']) ? 'panel' : 'card';
        $boxs = [
            'card' => [
                'main' => 'card ' . $append,
                'body' => 'card-body ' . $append,
                'header' => 'card-header ' . $append,
                'footer' => 'card-footer ' . $append
            ],
            'panel' => [
                'main' => 'panel ' . $append,
                'body' => 'panel-body ' . $append,
                'header' => 'panel-heading ' . $append,
                'footer' => 'panel-footer ' . $append
            ],
        ];

        if (isset($boxs[$type])) {
            return isset($boxs[$type][$class]) ? $boxs[$type][$class] : '';
        }
        return 'dd';
    }
}
?>