<?php
if (!function_exists('alert')) {
    function alert($message = '', $class = 'success')
    {
        return "<div class='alert alert-$class'>$message</div>";
    }
}
function badge($message = '', $class = 'success')
{
    return '<label class="badge badge-' . $class . '">' . $message . '</label>';
}
function start_with($haystack, $needle)
{
    return substr($haystack, 0, strlen($needle)) === $needle;
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
if (!function_exists('humnize_duration_with_ordinal')) {
    function humnize_duration_with_ordinal($duration, $duration_type)
    {
        $duration_type = ($duration_type);
        return (ordinal_number($duration) . ' ' . ucfirst($duration_type));
    }
}
if (!function_exists('print_string')) {
    function print_string($string, $data = [])
    {
        $data['json'] = json_encode($data);
        return get_instance()->parser->parse_string($string, $data, true);
    }
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
function ordinal_number($i)
{
    $suffixes = ['st', 'nd', 'rd'];
    $suffix = ($i <= 3 && $i >= 1) ? $suffixes[$i - 1] : 'th';
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
    return $ci->session->userdata('admin_type') == 'admin';
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