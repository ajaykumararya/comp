<?php
use Mpdf\Mpdf;
// use Mpdf\Config\ConfigVariables;
// use Mpdf\Config\FontVariables;

class Mypdf extends Mpdf
{
    function __construct()
    {
        $config = [
            'mode' => 'utf-8',
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 0,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
        ];
        if (isLocalhost()) {
            $config['tempDir'] = FCPATH . '/tmp';
        }
        parent::__construct($config);
        /*
        $defaultConfig = (new ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $config = [
            'mode' => 'utf-8',
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 0,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,

            'fontDir' => array_merge($fontDirs, [
                FCPATH . 'assets/fonts', 
            ]),
            'fontdata' => $fontData + [
                'specialelite' => [
                    'R' => 'SpecialElite-Regular.ttf', 
                ],
                'arial' => [
                    'R' => 'arial.ttf'
                ],
                'arial_bold' => [
                    'R' => 'arial-bold.ttf'
                ]
            ],
            'default_font' => 'arial', 
        ];
        parent::__construct($config);
        */
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