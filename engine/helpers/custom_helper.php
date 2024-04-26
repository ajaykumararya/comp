<?php
if (!function_exists('alert')) {
    function alert($message = '', $class = 'success')
    {
        return "<div class='alert alert-$class'>$message</div>";
    }
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

function logo(){
    $ci = &get_instance();
    return base_url('upload/'.$ci->SiteModel->get_setting('logo'));
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
function inconPickerInput($inputName = '')
{
    return '
                
                <div class="symbol symbol-50px border border-primary">
                    <div class="symbol-label fs-2 fw-semibold text-success"><i style="font-size:30px" id="IconPreview"></i></div>
                </div>
                <button type="button" class="arya-icon-picker btn btn-primary btn-rounded btn-sm" id="GetIconPicker" data-iconpicker-input="input#IconInput" data-iconpicker-preview="i#IconPreview">Select Icon</button>
            <input id="IconInput" name="' . $inputName . '" type="hidden">';
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
?>