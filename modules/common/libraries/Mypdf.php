<?php
use Mpdf\Mpdf;

class Mypdf extends Mpdf
{
    function __construct()
    {
        parent::__construct([
            'mode' => 'utf-8',
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 0,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
        ]);
    }
    public function setFormatAndOrientation($format, $orientation)
    {
        $this->SetPageFormat($format, $orientation);
    }
    function loadHtml($html)
    {
        $this->WriteHTML($html);
    }
}