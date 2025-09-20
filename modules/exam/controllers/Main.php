<?php
class Main extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('exam_model');
        $this->load->helper('exam');
    }
    function e_view($page)
    {
        $this->view("exam/main/$page");
    }
    function index()
    {
        $this->exam_model->check();
    }
    function course_setting()
    {
        $this->e_view('course-setting');
    }
    function manage_topics()
    {
        $this->e_view('manage-topics');
    }
    function manage_questions()
    {
        $this->ki_theme->breadcrumb_action_html(
            $this->ki_theme->set_class('btn btn-info btn-sm')->add_action('Import Questions', base_url('exam/main/import-questions'))
        );
        $this->e_view('manage-questions');
    }
    function import_questions()
    {
        if(file_exists(FCPATH.'assets/dammy-MCQ.csv')){
            $this->ki_theme->breadcrumb_action_html(
            $this->ki_theme->set_class('btn btn-info btn-sm')->set_attribute('download')->add_action('Download Dammy CSV File', base_url('assets/dammy-MCQ.csv'))
        );
        }
        // if ($this->input->post()) {
        //     if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
        //         $file = $_FILES['file']['tmp_name'];

        //         $handle = fopen($file, "r");
        //         $header = fgetcsv($handle);
        //         $expected = ['question', 'option_a', 'option_b', 'option_c', 'option_d', 'correct_ans'];
        //         if (count($header) != count($expected)) {
        //             fclose($handle);
        //             echo "❌ Invalid CSV Format: Column count mismatch.";
        //             return;
        //         }
        //         $header_normalized = array_map('strtolower', array_map('trim', $header));
        //         $expected_normalized = array_map('strtolower', $expected);

        //         if ($header_normalized !== $expected_normalized) {
        //             fclose($handle);
        //             echo "❌ Invalid CSV Format: Column names do not match expected headers.";
        //             return;
        //         }
        //         $data = [];
        //         while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
        //             $data[] = array(
        //                 'topic_id' => $this->input->post('topic_id'),
        //                 'question' => $row[0],
        //                 'correct_ans' => $row[5],
        //                 'answers' => [
        //                     'option_a' => $row[1],
        //                     'option_b' => $row[2],
        //                     'option_c' => $row[3],
        //                     'option_d' => $row[4]
        //                 ]
        //             );
        //         }
        //         pre($data);
        //         fclose($handle);
        //         echo "CSV Imported Successfully!";
        //     } else {
        //         echo "No file selected!";
        //     }
        // } else
            $this->access_method()->e_view('import-questions');
    }
    function manage_papers(){
        $this->e_view('manage-papers');
    }

}
?>