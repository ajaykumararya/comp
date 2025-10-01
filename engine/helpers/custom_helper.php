<?php
function themeCard($class = 'main', $append = '')
{
    $ci = &get_instance();
    return $ci->ki_theme->panel($class, $append);
}
if (!function_exists('alert')) {
    function alert($message = '', $class = 'success')
    {
        return "<div class='alert alert-$class'>$message</div>";
    }
}
function shortText($text, $limit = 150)
{
    return strlen($text) > $limit ? substr($text, 0, $limit) . '...' : $text;
}
function badge($message = '', $class = 'success')
{
    return '<label class="badge badge-' . $class . '">' . $message . '</label>';
}
function start_with($haystack, $needle)
{
    return substr($haystack, 0, strlen($needle)) === $needle;
}
function append_items($config, $items)
{
    $ci = &get_instance();
    $custom_config = $ci->config->item($config) ?? [];
    $ci->config->set_item($config, array_merge($custom_config, $items));
}
function module_view_exists($module_name, $view_file)
{
    // Path to the module's views folder
    $view_path = APPPATH . 'modules/' . $module_name . '/views/' . $view_file . '.php';

    // Check if the file exists
    if (file_exists($view_path)) {
        return true;
    }
    return false;
}
function delete_first_level_directories($dir_path, $skip_items = ['acme', THEME])
{
    // Check if directory exists
    if (!is_dir($dir_path)) {
        return false;
    }

    // Get all files and directories within the directory
    $items = array_diff(scandir($dir_path), ['.', '..']);

    // Loop through each file or directory
    foreach ($items as $item) {
        // Build the full path
        $full_path = $dir_path . DIRECTORY_SEPARATOR . $item;
        if (in_array($item, $skip_items)) {
            continue; // Skip this folder and its contents
        }
        // If it's a directory (and not a file), delete it
        if (is_dir($full_path)) {
            delete_directory($full_path);
        }
    }

    return true;
}
function delete_directory($dir_path, $skip_items = [])
{
    if (!is_dir($dir_path)) {
        return false;
    }
    $files = array_diff(scandir($dir_path), ['.', '..']);
    // return $files;
    foreach ($files as $file) {
        $full_path = $dir_path . DIRECTORY_SEPARATOR . $file;
        if (in_array($file, $skip_items)) {
            continue;
        }
        if (is_dir($full_path)) {
            delete_directory($full_path, $skip_items);
        } else {
            @unlink($full_path);
        }
    }
    if (!in_array(basename($dir_path), $skip_items)) {
        return @rmdir($dir_path);
    }
    return true;
}
if (!function_exists('get_first_letter')) {
    function get_first_latter($string)
    {
        $string = trim($string);
        return strtoupper(substr($string, 0, 1));
    }
}
function get_status($status)
{
    if ($status)
        return label('Active');
    return label('In-Active', 'danger');
}
if (!function_exists('humnize_duration')) {
    function humnize_duration($duration, $duration_type, $flag = true)
    {
        $duration_type = ($duration_type . ($flag ? ($duration > 1 ? 's' : '') : ''));
        return ($duration . ' ' . ucfirst($duration_type));
    }
}
if (!function_exists('isJson')) {
    function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}
function isDemo()
{
    return defined('isDemo') ? isDemo : false;
}
function dash_box($array)
{
    $array['count_icon'] = isset($array['count_icon']) ? 'data-kt-countup-prefix=" <span class=&quot;&quot;>₹</span> "' : '';
    $array['base_url'] = base_url();
    return get_instance()->parser->parse_string('<div class="card" style="background: linear-gradient(to right, {color1}, {color2}) !important;">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-{icon}"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">{title}</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-12">
                            <h2 class="d-flex align-items-center mb-0 text-white">
                                <span class="fw-semibold w-100 fs-3x text-white lh-1 ls-n2" data-kt-countup="true"
                                    data-kt-countup-value="{count}" {count_icon}>
                                    0
                                </span>
                            </h2>
                        </div>
                    </div>
                </div>

                <a href="{base_url}{url}" class="card-action"><i class="fa fa-{url_icon}"></i> {url_title}</a>
            </div>', $array, true);
}
if (!function_exists('humnize_duration_with_ordinal')) {
    function humnize_duration_with_ordinal($duration, $duration_type)
    {
        $duration_type = removeLastS($duration_type);
        return (ordinal_number($duration) . ' ' . ucfirst($duration_type));
    }
}
function removeLastS($string)
{
    // Check if the last character is 's' or 'S'
    if (substr($string, -1) === 's' || substr($string, -1) === 'S') {
        // Remove the last character
        return substr($string, 0, -1);
    }
    return $string; // Return the original string if no 's' is found
}
function humnize($number, $string)
{
    return $number > 1 ? plural($string) : singular($string);
}
if (!function_exists('print_string')) {
    function print_string($string, $data = [])
    {
        $data['json'] = json_encode($data);
        return get_instance()->parser->parse_string($string, $data, true);
    }
}
function getLightBack()
{
    if (file_exists(DOCUMENT_PATH . '/light-back.jpg'))
        return base_url(DOCUMENT_PATH . '/light-back.jpg');
    return base_url('assets/media/auth/bg10.jpg');
}
function getDarkBack()
{
    // if(file_exists(DOCUMENT_PATH .'/dark-back.jpg'))
    //     return base_url(DOCUMENT_PATH .'/dark-back.jpg');
    return base_url('assets/media/auth/bg10-dark.jpg');
}
if (!function_exists('theme_url')) {
    function theme_url()
    {
        return base_url('themes/' . THEME . '/');
    }
}
if (!function_exists('duration_in_month')) {
    function duration_in_month($duration, $duration_type = 'month')
    {
        return $duration * ($duration_type == 'month' ? 1 : ($duration_type == 'semester' ? 6 : 12));
    }
}
function getHindiMonthFromDate($date)
{
    $months = [
        1 => 'जनवरी',
        2 => 'फ़रवरी',
        3 => 'मार्च',
        4 => 'अप्रैल',
        5 => 'मई',
        6 => 'जून',
        7 => 'जुलाई',
        8 => 'अगस्त',
        9 => 'सितंबर',
        10 => 'अक्टूबर',
        11 => 'नवंबर',
        12 => 'दिसंबर'
    ];

    $monthNumber = date('n', strtotime($date)); // 1 to 12
    return $months[$monthNumber];
}
function ordinal_number($i)
{
    $j = $i % 10;
    $k = $i % 100;

    if ($k >= 11 && $k <= 13) {
        $suffix = 'th';
    } elseif ($j == 1) {
        $suffix = 'st';
    } elseif ($j == 2) {
        $suffix = 'nd';
    } elseif ($j == 3) {
        $suffix = 'rd';
    } else {
        $suffix = 'th';
    }

    return $i . $suffix;
}

if (!function_exists('starts_with')) {
    function starts_with($haystack, $needle)
    {
        return substr($haystack, 0, strlen($needle)) === $needle;
    }
}
if (!function_exists('recursiveArraySearch')) {
    function recursiveArraySearch($needle, $haystack)
    {
        foreach ($haystack as $key => $value) {
            if ($value === $needle) {
                return true; // Value found in the array
            } elseif (is_array($value) && recursiveArraySearch($needle, $value)) {
                return true; // Value found in a sub-array
            }
        }
        return false; // Value not found in the array
    }

}
function label($msg, $class = 'info')
{
    return '<label class="badge badge-' . $class . '">' . $msg . '</label>';
}

function sidebar_toggle($true, $false = '')
{
    return isset($_COOKIE["sidebar_minimize_state"]) && $_COOKIE["sidebar_minimize_state"] === "on" ? $true : $false;
}

function OnlyForAdmin()
{
    $ci = &get_instance();
    $userType = $ci->session->userdata('admin_type');
    return $userType == 'admin' && $userType != 'student';
}
function OnlyForCentre()
{
    $ci = &get_instance();
    return $ci->session->userdata('admin_type') == 'center';
}
function pre($array = [], $flg = false)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    if ($flg)
        exit;
}


function CHECK_PERMISSION($type)
{
    return defined($type) ? constant($type) === 'yes' : false;
}
function generateCourseShortName($courseName)
{
    $ignoreWords = ['IN', 'OF', 'FOR', 'AND', 'THE', 'AT', 'ON', 'WITH', 'BY'];

    $courseName = strtoupper($courseName);

    $courseName = preg_replace('/[^A-Z0-9 ]/', '', $courseName);

    $words = explode(' ', $courseName);

    $shortName = '';
    foreach ($words as $word) {
        if (!in_array($word, $ignoreWords)) { // Ignore small words
            $shortName .= substr($word, 0, 1);
        }
    }

    return strtoupper(substr($shortName, 0, 6));
}
function meta_keywords()
{
    $keywords = '';
    $keyword_data = ES('meta_keywords', 0);
    if ($keyword_data) {
        $data = json_decode($keyword_data, true);
        if (is_array($data)) {
            // pre($data);
            foreach ($data as $keyword)
                $keywords .= $keyword['value'] . ',';
            $keywords = rtrim($keywords, ',');
        }
    }
    return $keywords;
}
function search_file($folder_path, $file_name)
{

    $folder_path = rtrim($folder_path, '/') . '/';

    $files = scandir($folder_path);

    $found_files = array_filter($files, function ($file) use ($file_name) {
        return strpos($file, $file_name) !== false;
    });

    if (!empty($found_files)) {
        return $found_files;
        // foreach ($found_files as $file) {
        //     echo "File found: " . $file . "<br>";
        // }
    } else {
        return false;
        // echo "No file found matching the criteria.";
    }
}
function numberToFullOrdinal($number)
{
    $ordinals = [
        1 => "First",
        2 => "Second",
        3 => "Third",
        4 => "Fourth"
    ];

    return isset($ordinals[$number]) ? $ordinals[$number] : ordinal_number($number);
}
function numberToWords($number)
{
    $words = [
        0 => '',
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine',
        10 => 'Ten',
        11 => 'Eleven',
        12 => 'Twelve',
        13 => 'Thirteen',
        14 => 'Fourteen',
        15 => 'Fifteen',
        16 => 'Sixteen',
        17 => 'Seventeen',
        18 => 'Eighteen',
        19 => 'Nineteen',
        20 => 'Twenty',
        30 => 'Thirty',
        40 => 'Forty',
        50 => 'Fifty',
        60 => 'Sixty',
        70 => 'Seventy',
        80 => 'Eighty',
        90 => 'Ninety'
    ];

    $suffixes = ['', 'Thousand', 'Million', 'Billion', 'Trillion'];

    if ($number == 0) {
        return 'Zero';
    }

    $result = '';
    $suffixIndex = 0;

    while ($number > 0) {
        $hundreds = $number % 1000;
        if ($hundreds != 0) {
            $result = convertThreeDigits($hundreds, $words) . ' ' . $suffixes[$suffixIndex] . ' ' . $result;
        }
        $number = (int) ($number / 1000);
        $suffixIndex++;
    }

    return trim($result);
}

function convertThreeDigits($number, $words)
{
    $result = '';

    if ($number >= 100) {
        $result .= $words[(int) ($number / 100)] . ' Hundred ';
        $number %= 100;
    }

    if ($number >= 20) {
        $result .= $words[(int) ($number / 10) * 10] . ' ';
        $number %= 10;
    }

    if ($number > 0) {
        $result .= $words[$number] . ' ';
    }

    return trim($result);
}
function dayToOrdinal($day)
{
    $ordinals = [
        1 => "First",
        2 => "Second",
        3 => "Third",
        4 => "Fourth",
        5 => "Fifth",
        6 => "Sixth",
        7 => "Seventh",
        8 => "Eighth",
        9 => "Ninth",
        10 => "Tenth",
        11 => "Eleventh",
        12 => "Twelfth",
        13 => "Thirteenth",
        14 => "Fourteenth",
        15 => "Fifteenth",
        16 => "Sixteenth",
        17 => "Seventeenth",
        18 => "Eighteenth",
        19 => "Nineteenth",
        20 => "Twentieth",
        21 => "Twenty First",
        22 => "Twenty Second",
        23 => "Twenty Third",
        24 => "Twenty Fourth",
        25 => "Twenty Fifth",
        26 => "Twenty Sixth",
        27 => "Twenty Seventh",
        28 => "Twenty Eighth",
        29 => "Twenty Ninth",
        30 => "Thirtieth",
        31 => "Thirty First"
    ];
    return $ordinals[intval($day)];
}

function dateToWords($dateStr)
{
    $timestamp = strtotime($dateStr);
    $day = date("j", $timestamp);
    $month = date("F", $timestamp);
    $year = date("Y", $timestamp);

    return dayToOrdinal($day) . " " . $month . " " . numberToWords($year);
}
function getRadomNumber($n = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

function get_month($monthNumber, $dateIndex = 'F')
{
    return date($dateIndex, mktime(0, 0, 0, $monthNumber, 1));
}
function answer_id_append($key, $ans_id, $data, $i, $newdata)
{
    if (isset($data[$i])) {
        if (isset($data[$i][$key]))
            $newdata = array_merge($newdata, [$key => $ans_id]);
        else
            $newdata[$key] = $ans_id;
    } else {
        $newdata[$key] = $ans_id;
    }
    return $newdata;
}
function ES($type, $defaultTExt = null)
{
    $ci = &get_instance();
    if ($defaultTExt != null)
        return $ci->SiteModel->get_setting($type, $defaultTExt);
    return $ci->SiteModel->get_setting($type);
}

function logo()
{
    $ci = &get_instance();
    return base_url('upload/' . $ci->SiteModel->get_setting('logo'));
}

function cms_content_form($type)
{
    return form_open_multipart('', [
        'class' => 'type-setting-form',
        'data-type' => $type
    ]);
}
function content($type)
{
    $ci = &get_instance();
    return $ci->SiteModel->get_contents($type);
}
function symbol($image, $class = '50px', $attr = [])
{
    $attr['src'] = UPLOAD . $image;
    return '<div class="symbol symbol-' . $class . '">
                ' . img($attr) . '
            </div>';
}
function notice_board()
{
    $ci = &get_instance();

    return $ci->parser->parse('pages/notice-board-page', [], true);
}
function inconPickerInput($inputName = '', $value = '')
{
    return '
                
                <div class="symbol symbol-50px border border-primary">
                    <div class="symbol-label fs-2 fw-semibold text-success"><i class="' . $value . '" style="font-size:30px" id="IconPreview_' . $inputName . '"></i></div>
                </div>
                <button type="button" class="arya-icon-picker btn btn-primary btn-rounded btn-sm" id="GetIconPicker" data-iconpicker-input="input#IconInput_' . $inputName . '" data-iconpicker-preview="i#IconPreview_' . $inputName . '">Select Icon</button>
            <input id="IconInput_' . $inputName . '" name="' . $inputName . '" type="hidden" value="' . $value . '">';
}
function sortEmptyLast($array)
{
    usort($array, function ($a, $b) {
        // Check if $a is empty and $b is not
        if (empty($a) && !empty($b)) {
            return 1; // Move $a after $b
        }
        // Check if $b is empty and $a is not
        if (!empty($a) && empty($b)) {
            return -1; // Move $a before $b
        }
        return 0; // Keep the same order if both are empty or both are not empty
    });
    return $array;
}
function get_month_number($date)
{
    return date('n', strtotime($date));
}
function generateCouponCode($length = 8)
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $charLength = strlen($characters);

    $couponCode = '';

    for ($i = 0; $i < $length; $i++) {
        $randomChar = $characters[rand(0, $charLength - 1)];
        $couponCode .= $randomChar;
    }

    return $couponCode;
}
function generate_otp()
{
    $secret = '8533'; // replace with a secret key
    $time = time(); // get the current time
    $otp = generate_hotp($secret, $time, 6); // generate a 6-digit HOTP
    return $otp;
}
function generateNumericString($length = 10)
{
    $numericString = '';
    for ($i = 0; $i < $length; $i++) {
        $numericString .= rand(0, 9);
    }
    return $numericString;
}
function generate_hotp($secret, $time, $digits)
{
    $hash = hash_hmac('sha1', $time, $secret, true); // generate a HMAC-SHA1 hash
    $hash = substr($hash, -8); // take the last 8 characters of the hash
    $otp = str_pad(substr($hash, 0, $digits), $digits, '0', STR_PAD_LEFT); // pad the OTP with zeros
    return $otp;
}
function sup($i)
{
    $i = ($i == 1) ? 'st' :
        (($i == 2) ? 'nd' :
            (($i == 3) ? 'rd' : 'th'));
    return '<sup>' . $i . '</sup>';
}
function table_exists($table)
{
    return get_instance()->db->table_exists($table);
}
function checkField($table, $field)
{
    $ci = &get_instance();
    return $ci->build_db->field_exists($table, $field);
}
function get_route($id, $table)
{
    $CI = &get_instance();
    if ($table == 'city') {
        return $CI->db->get_where('district', ['DISTRICT_ID' => $id])->row('DISTRICT_NAME');
    } else {
        return $CI->db->get_where('state', ['STATE_ID' => $id])->row('STATE_NAME');
    }
}
function convert_to_div($string)
{
    $html = '';
    for ($i = 0; $i < strlen($string); $i++) {
        // Output a <div> element for each character
        $html .= "<div>" . $string[$i] . "</div>";
    }
    return $html;
}

function maskMobileNumber($number)
{
    // Ensure the mobile number is at least 12 characters long

    // Display the first 7 digits and replace the rest with 'xxxxx'
    return substr($number, 0, 7) . 'XXXXX';
}

function maskEmail($email)
{
    $emailParts = explode('@', $email);
    $username = $emailParts[0];
    $domain = $emailParts[1];

    // Mask the username part except the last 3 characters
    $maskedUsername = str_repeat('x', max(strlen($username) - 4, 0)) . substr($username, -4);

    return $maskedUsername . '@' . $domain;
}
function fixConifFee($index)
{
    $CI =& get_instance();
    if ($CI->center_model->isCenter()) {
        $index = $index == 'admission_fees' ? 'student_admission_fees' : $index;
        $fees = $CI->ki_theme->center_fix_fees(true);
        if (isset($fees[$index]))
            return $fees[$index];
    } else {
        $get = $CI->db->where(['key' => $index, 'onlyFor' => 'student', 'status' => 1])->get('student_fix_payment');
        if ($get->num_rows())
            return $get->row('amount');
    }
    return null;
}

function timeAgo($time)
{
    // Get the current time and calculate the difference
    $timeDifference = time() - strtotime($time); // if $time is a timestamp, directly pass it instead of using strtotime

    // Define time periods in seconds
    $seconds = $timeDifference;
    $minutes = round($timeDifference / 60);
    $hours = round($timeDifference / 3600);
    $days = round($timeDifference / 86400);
    $weeks = round($timeDifference / 604800);
    $months = round($timeDifference / 2600640); // (30.44 * 24 * 60 * 60)
    $years = round($timeDifference / 31207680); // (365.25 * 24 * 60 * 60)

    // Determine how to express the time ago
    if ($seconds <= 60) {
        return "just now";
    } elseif ($minutes <= 60) {
        return $minutes == 1 ? "1 minute ago" : "$minutes minutes ago";
    } elseif ($hours <= 24) {
        return $hours == 1 ? "1 hour ago" : "$hours hours ago";
    } elseif ($days <= 7) {
        return $days == 1 ? "yesterday" : "$days days ago";
    } elseif ($weeks <= 4) {
        return $weeks == 1 ? "1 week ago" : "$weeks weeks ago";
    } elseif ($months <= 12) {
        return $months == 1 ? "1 month ago" : "$months months ago";
    } else {
        return $years == 1 ? "1 year ago" : "$years years ago";
    }
}
function board_text($text)
{
    if (empty($text))
        return;
    $words = explode(' ', strtolower($text));

    $formattedWords = array_map(function ($word) {
        return "<span class='text-primary'>" . ucfirst($word[0]) . "</span>" . substr($word, 1);
        // return "<span class='text-primary'>" . ucfirst($word) . "</span>";
    }, $words);

    return implode(' ', $formattedWords);
}
function remove_91($phoneNumber)
{
    $cleanedNumber = str_replace("+91", "", $phoneNumber);

    return trim($cleanedNumber);
}

function add_91($phoneNumber)
{
    if (strpos($phoneNumber, "+91") !== 0) {
        $phoneNumber = "+91" . $phoneNumber;
    }

    return trim($phoneNumber);
}
function add_only_91($whatsappNumber)
{
    $cleanedNumber = preg_replace('/^\+91\s*/', '', $whatsappNumber);

    // Step 2: Ensure the number starts with '91'
    if (strpos($cleanedNumber, "91") !== 0) {
        $cleanedNumber = "91" . $cleanedNumber;
    }

    // Step 3: Remove any extra spaces
    return preg_replace('/\s+/', '', $cleanedNumber);
}
function isLocalhost()
{
    $host = $_SERVER['HTTP_HOST'];
    return (strpos($host, 'localhost') !== false || strpos($host, '127.0.0.1') !== false);
}
function getYouTubeId($url)
{
    // Regular expression for YouTube URL
    $regex = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';

    // Match the URL against the regex
    if (preg_match($regex, $url, $matches)) {
        // Return the YouTube video ID
        return $matches[1];
    } else {
        return false; // Not a valid YouTube URL
    }
}
function getYouTubeThumbnail($videoID, $quality = 'maxresdefault')
{
    // YouTube thumbnail base URL
    $baseUrl = "https://img.youtube.com/vi/";

    // Thumbnail URL
    $thumbnailUrl = $baseUrl . $videoID . "/" . $quality . ".jpg";
    // return $thumbnailUrl;
    // Check if the thumbnail exists
    // $headers = get_headers($thumbnailUrl, 1);

    // // Return thumbnail URL if valid
    if (file_exists($thumbnailUrl)) {
        return $thumbnailUrl;
    } else {
        // Fallback to a lower resolution if maxresdefault is not available
        return $baseUrl . $videoID . "/hqdefault.jpg";
    }
}
function detect_course_type($course_id, $duration)
{
    $ci = &get_instance();

    $ci->db->from('subjects');
    $ci->db->where('course_id', $course_id);
    $ci->db->where('duration', $duration);
    $query = $ci->db->get();

    $isTheory = false;
    $isPractical = false;
    if ($query->num_rows()) {
        foreach ($query->result() as $row) {
            if ($row->subject_type == 'theory' && !$isTheory)
                $isTheory = true;
            if ($row->subject_type == 'practical' && !$isPractical)
                $isPractical = true;
            if ($row->subject_type == 'both') {
                $isTheory = $isPractical = true;
                break;
            }
        }
    }


    return ($isTheory && $isPractical) ? 'Theory & Practical' : ($isTheory ? 'Theory' : 'Practical');
}

function isPremiumExamPortal()
{
    if (defined('EXAM_DB')) {

    }
    return false;
}