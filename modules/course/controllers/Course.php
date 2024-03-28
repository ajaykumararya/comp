<?php
class Course extends MY_Controller
{
    function test()
    {
        // echo 'gudiya';
        pre($this->ki_theme->course_duration());
    }
    function category()
    {
        $this->view('category');
    }
    function manage()
    {
        $this->view('manage');
    }
    function manage_fees()
    {
        $this->view('manage-fees');
    }
    function manage_subjects()
    {
        $this->view('manage-subjects');
    }
    function arrange_subjects(){
        $this->view('arrange-subjects');

    }
}
