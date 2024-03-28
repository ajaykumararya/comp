<?php
class Academic extends MY_Controller
{
    function batch()
    {
        $this->view('batch');
    }

    function session()
    {
        $this->view('session');
    }

    function occupation()
    {
        $this->view('occupation');
    }

}
?>