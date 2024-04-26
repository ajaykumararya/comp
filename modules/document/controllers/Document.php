<?php
class Document extends MY_Controller
{
    private $id;
    function __construct()
    {
        parent::__construct();
        $this->load->library('common/mypdf');
        $this->id = $this->decode($this->uri->segment(2, '0'));        
    }
    function admit_card()
    {
        $get = $this->student_model->admit_card(['id' => $this->id]);
        if ($get->num_rows()) {
            $this->set_data($get->row_array());
            $this->set_data('date',date('d-m-Y',strtotime($get->row('exam_date'))));
            $this->set_data('time',date('h:i A',strtotime($get->row('exam_date'))));
            $pdfContent = $this->parse('admit-card');
            $this->pdf($pdfContent);
        } else {
            $this->not_found("Admit Card Not Found..");
        }
    }
    private function isMark($marks)
    {
        return $marks ? $marks : '00';
    }
    private function mark_total($first, $second)
    {
        $a = $first == '00' ? 0 : $first;
        $b = $second == '00' ? 0 : $second;
        return $a + $b;
    }
    private function calculateGrade($score)
    {
        return $this->ki_theme->grade($score);
    }
    function marksheet()
    {
        $get = $this->student_model->marksheet(['id' => $this->id]);
        if ($get->num_rows()) {
            pre($get->row(),true);
            $result_id = $get->row('result_id');
            $this->ki_theme->generate_qr($result_id, 'marksheet', current_url());
            $get_subect_numers = $this->student_model->marksheet_marks($result_id);
            // echo $get->row('result_id');
            // pre($get_subect_numers->result_array());
            $subject_marks = [];
            $per = $ttl = $ob_ttl = 0;
            $ttltminm =
                $ttltmaxm =
                $ttlpminm =
                $ttlpmaxm = 0;
            if ($ttl_subject = $get_subect_numers->num_rows()) {
                foreach ($get_subect_numers->result() as $mark) {
                    $tmm = $this->isMark($mark->theory_max_marks);
                    $pmm = $this->isMark($mark->practical_max_marks);
                    $tmim = $this->isMark($mark->theory_min_marks);
                    $pmim = $this->isMark($mark->practical_min_marks);
                    $ttl += $this->mark_total($tmm, $tmim) + $this->mark_total($pmm, $pmim);
                    $ttltminm += $tmim;
                    $ttltmaxm += $tmm;
                    $ttlpminm += $pmim;
                    $ttlpmaxm += $pmm;
                    $marks = [
                        'subject_name' => $mark->subject_name,
                        'theory_min_marks' => $tmim,
                        'theory_max_marks' => $tmm,
                        'practical_min_marks' => $pmim,
                        'practical_max_marks' => $pmm,
                        'theory_total' => $mark->theory_marks,
                        'practical_total' => $mark->practical,
                        'total' => $this->isMark($mark->ttl),
                    ];
                    $ob_ttl += $mark->ttl;
                    array_push($subject_marks, $marks);
                }
                $per = number_format((($ob_ttl / ( $ttltmaxm + $ttlpmaxm) ) * 100), 2);
            }
            $main = [
                'total' => $ttl,
                'obtain_total' => $ob_ttl,
                'marks' => $subject_marks,
                'percentage' => $per,
                'grade' => $this->calculateGrade($per),
                'total_max_theory' => $ttltmaxm,
                'total_min_theory' => $ttltminm,
                'total_max_practical' => $ttlpmaxm,
                'total_min_practical' => $ttlpminm,
                'division' => $per < 40 ? 'Fail' : 'Pass'
            ];
            // pre($main,true);
            $this->set_data($main);
            $pdfContent = $this->parse('marksheet', $get->row_array());
            $this->pdf($pdfContent);
        } else {
            $this->not_found("Marksheet Not Found..");
        }
    }
    function certificate()
    {
        $get = $this->student_model->student_certificates(['id' => $this->id]);
        if ($get->num_rows()) {
            $certificate = ($get->row_array());
            $admissionTime = strtotime( $certificate['admission_date']);
            $this->set_data('from_date',date('M Y',$admissionTime));
            $this->set_data('serial_no',date("Y",$admissionTime).str_pad($certificate['certiticate_id'],3,'0',STR_PAD_LEFT));
            $toDateString = strtotime( $certificate['createdOn']);
            $duration = $certificate['duration'];
            if($certificate['duration_type'] == 'month'){
                $toDateString = strtotime("+$duration months",$admissionTime);
            }
            else if($certificate['duration_type'] == 'year'){
                $toDateString = strtotime("+$duration years",$admissionTime);
            }
            $toDateString = strtotime('-1 month',$toDateString);
            $this->set_data('to_date',date('M Y',$toDateString));
            $this->set_data('exam_conduct_date','');
            if(isset($certificate['exam_conduct_date']))
                $this->set_data('exam_conduct_date',date('M Y',strtotime( $certificate['exam_conduct_date'])));
            // pre($certificate,true);
            $final_marksheet = $this->student_model->marksheet([
                'course_id' => $certificate['course_id'],
                'student_id' => $certificate['student_id'],
                'duration' => $certificate['duration'],
                'duration_type' => $certificate['duration_type'],
            ]);
            if ($final_marksheet->num_rows()) {
                // pre($final_marksheet->row(),true);
                $row = $final_marksheet->row();
                $this->set_data('enrollment_no', $row->enrollment_no);
                $subject_marks = [];
                $get_subect_numers = $this->student_model->marksheet_marks($final_marksheet->row("result_id"));
                $per = $ttl = $ob_ttl = 0;
                $ttltminm =
                    $ttltmaxm =
                    $ttlpminm =
                    $ttlpmaxm = 0;
                if ($ttl_subject = $get_subect_numers->num_rows()) {
                    foreach ($get_subect_numers->result() as $mark) {
                        $tmm = $this->isMark($mark->theory_max_marks);
                        $pmm = $this->isMark($mark->practical_max_marks);
                        $tmim = $this->isMark($mark->theory_min_marks);
                        $pmim = $this->isMark($mark->practical_min_marks);
                        $ttl += $this->mark_total($tmm, $tmim) + $this->mark_total($pmm, $pmim);
                        $ttltminm += $tmim;
                        $ttltmaxm += $tmm;
                        $ttlpminm += $pmim;
                        $ttlpmaxm += $pmm;
                        $marks = [
                            'subject_name' => $mark->subject_name,
                            'theory_min_marks' => $tmim,
                            'theory_max_marks' => $tmm,
                            'practical_min_marks' => $pmim,
                            'practical_max_marks' => $pmm,
                            'theory_total' => $mark->theory_marks,
                            'practical_total' => $mark->practical,
                            'total' => $this->isMark($mark->ttl),
                        ];
                        $ob_ttl += $mark->ttl;
                        array_push($subject_marks, $marks);
                    }
                    $per = number_format((($ob_ttl / ( $ttltmaxm + $ttlpmaxm)) * 100), 2);
                }
                $main = [
                    'total' => $ttl,
                    'obtain_total' => $ob_ttl,
                    'marks' => $subject_marks,
                    'percentage' => $per,
                    'grade' => $this->calculateGrade($per),
                    'total_max_theory' => $ttltmaxm,
                    'total_min_theory' => $ttltminm,
                    'total_max_practical' => $ttlpmaxm,
                    'total_min_practical' => $ttlpminm
                ];
                $this->set_data($main);
            }
            // pre($certificate,true);
            $this->ki_theme->generate_qr($this->id, 'student_certificate', current_url());
            // $getLastExam = $this->student_model->last_marksheet($certificate['course_id']);
            $this->set_data($certificate);
            // $fullData = $this->student_model->marksheet([
            //     ''
            // ]);
            // pre($certificate,true);
            $output = $this->parse('certificate', $certificate);
            $this->pdf($output);
        } else {
            $this->not_found("Certificate Not Found..");
        }
    }
    function franchise_certificate(){
        $get = $this->center_model->get_center($this->id);
        $this->set_data('certificate_id',$this->id);
        if ($get->num_rows()) {
            $data = $get->row_array();
            if($data['status'] && $data['isPending'] == 0 && $data['isDeleted'] == 0){
                if($data['valid_upto'] && $data['certificate_issue_date']){
                    $data['state'] = $this->SiteModel->state($data['state_id']);
                    $data['city'] = $this->SiteModel->city($data['city_id']);
                    $output = $this->parse('franchise_certificate', $data);                    
                    $this->pdf($output);
                }
                else
                    $this->not_found('This Certificate is incomplete..');
            }
            else
                $this->not_found("This Accoutn is not Active..");
        }
        else
            $this->not_found("Certificate Not Found..");
    }
    function pdf($pdfContent)
    {
        // $this->mypdf->load();
        // $this->mypdf->setPaper('A4', 'portrait');
        $this->mypdf->WriteHTML($pdfContent);
        $pdfData = $this->mypdf->Output();
        // Get the PDF content as a string
        // $pdfData = $this->mypdf->OutputFile('asd.pdf'); // 'S' option for return as string
        // Set the appropriate headers
        // header('Content-Type: application/pdf');
        // header('Content-Disposition: inline; filename="filename.pdf"'); // 'inline' option to display in browser
        // header('Content-Length: ' . strlen($pdfData));
        // // Send PDF content to the browser
        // echo $pdfData;
        // // header('Content-Type: application/pdf');
        // header('Content-Type: application/pdf');
        // header('Content-Length: ' . strlen($pdfData));
        // header('Content-Disposition: inline; filename="filename.pdf"'); // 'inline' option to display in browser
        // echo $pdfData;
    }
    function not_found($message = '')
    {
        echo '<script>
                alert("' . $message . '");
                window.close();
            </script>';
    }
}
