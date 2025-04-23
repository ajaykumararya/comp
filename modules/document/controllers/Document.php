<?php
class Document extends MY_Controller
{
    private $id;
    private $return = false;
    function __construct()
    {
        parent::__construct();
        $this->load->library('common/mypdf');
        $this->id = $this->decode($this->uri->segment(2, '0'));
    }
    function percentage($ob_ttl, $ttl)
    {
        $percentage = (($ob_ttl / $ttl) * 100);
        if (is_float($percentage) && $percentage != floor($percentage)) {
            return number_format($percentage, 2);
        } else {
            return (int) $percentage;
        }
    }
    function id($id, $return = true)
    {
        $this->id = $id;
        $this->return = $return;
        return $this;
    }
    function registration_form()
    {
        $this->db->select('category,marital_status,adhar_card_no');
        $get = $this->student_model->get_switch('all', [
            'id' => $this->id,
            'without_admission_status' => true
        ]);
        $this->set_data($get->row_array());
        $pdfContent = $this->parse('registration-form');
        // echo 'yes';
        $this->pdf($pdfContent, $get->row('student_name') . '-' . $get->row('roll_no') . '-Registration-form.pdf');
    }

    function registration_certificate()
    {
        // echo $this->id;
        $registration_no = '';
        $get = $this->db->where("id", $this->id)->where('status', 1)->get('students_registeration_data');
        if ($get->num_rows()) {
            $row = $get->row();
            $registration_no = $row->registration_no;

            $this->set_data('registration_no', $registration_no);
            $this->set_data($get->row_array());
            $this->set_data('serial_no', $row->id);
            $this->set_data('studentEncodeId', $this->encode($row->id));
            $pdfContent = $this->parse('registration-certificate');
            $this->pdf($pdfContent, $get->row('name') . '- Registation Certificate.pdf');
        } else {
            // $this->not_found("Registration Certificate Not Found..");
        }
    }
    private function get_multi_path($course_id, $file, $page = 'P')
    {
        if (CHECK_PERMISSION('SHOW_MULTIPLE_CERTIFICATES')) {
            $courseData = $this->db->get_where('course', [
                'id' => $course_id
            ]);
            // pre($courseData->row(),true);
            if ($courseData->num_rows()) {
                $courseRow = $courseData->row();
                if (isset($courseRow->parent_id)) {

                    if ($courseRow->parent_id != 0) {
                        $file = $courseRow->parent_id . '/' . $file;
                        $this->mypdf->addPage($page);
                    } else {
                        if (PATH == 'iedct') {
                            $this->mypdf->addPage('L');
                        }
                    }
                }

            }
        } else {
            if (PATH == 'iedct') {
                $this->mypdf->addPage('L');
            }
        }
        return $file;
    }
    function admit_card()
    {
        $get = $this->student_model->admit_card(['id' => $this->id]);
        if ($get->num_rows()) {
            // pre($get->row(),true);
            $dob = strtotime($get->row('dob'));
            $this->set_data($get->row_array());
            $this->set_data('dob_day', date('d', $dob));
            $this->set_data('dob_month', date('m', $dob));
            $this->set_data('dob_year', date('Y', $dob));
            $this->set_data('date', date('d-m-Y', strtotime($get->row('exam_date'))));
            $this->set_data('time', date('h:i A', strtotime($get->row('exam_date'))));
            $pdfContent = $this->parse('admit-card');
            // $this->mypdf->setTitle('Hii');
            if ($this->ki_theme->config('admit_card_full') or in_array(PATH, ['iedct', 'softworldedu']))
                $this->mypdf->addPage('L');
            $this->pdf($pdfContent, $get->row('student_name') . '-' . $get->row('roll_no') . '-Admit Card.pdf');
        } else {
            $this->not_found("Admit Card Not Found..");
        }
    }
    function id_card()
    {
        // echo $this->id;
        $get = $this->student_model->id_card($this->id);
        if ($get->num_rows()) {
            // pre($get->row(), true);
            $this->set_data($get->row_array());

            $row = $get->row();
            // pre($row,true);
            if (PATH == 'techno') {
                $admissionTime = strtotime($row->admission_date);
                $duration = $row->duration;
                if ($row->duration_type == 'month') {
                    $toDateString = strtotime("+$duration months", $admissionTime);
                } else if ($row->duration_type == 'year') {
                    $toDateString = strtotime("+$duration years", $admissionTime);
                }
                $toDateString = strtotime('-1 month', $toDateString);
                $this->set_data('session', date('Y', $admissionTime) . '-' . date('Y', $toDateString));
            }
            $this->ki_theme->generate_qr($get->row('student_id'), 'id_card', current_url());
            $pdfContent = $this->parse('id-card');
            if (in_array(PATH, ['beautyguru', 'skycrownworld'])) {
                // $certificate['serial_no'] = (50000 + $this->id);
                $this->mypdf->addPage('L');
            }
            $this->pdf($pdfContent, $row->student_name . '-' . $row->roll_no . '-Id Card.pdf');
        } else {
            $this->not_found("ID Card Not Found..");
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
        $file = 'marksheet';
        $get = $this->student_model->marksheet(['id' => $this->id]);
        if ($get->num_rows()) {
            $row = $get->row();
            $course_id = $row->course_id;
            // pre($get->row(),true);
            $result_id = $row->result_id;
            if (!$this->return) {
                if (CHECK_PERMISSION('FRONT_MARKSHEET_QR')) {
                    $this->ki_theme->generate_qr($result_id, 'front_marksheet', base_url('marksheet-verification/' . $this->token->encode([
                        'id' => $result_id
                    ])), false, 10);
                } else
                    $this->ki_theme->generate_qr($result_id, 'marksheet', current_url());
            }
            $get_subect_numers = $this->student_model->marksheet_marks($result_id);

            if (PATH == 'isdmedu' or PATH == 'iisdit') {
                $certificate = $get->row_array();
                // pre($certificate,true);
                $admissionTime = strtotime($certificate['admission_date']);
                $this->set_data('from_date', date('M Y', $admissionTime));
                $toDateString = strtotime($certificate['issue_date']);
                $duration = $certificate['duration'];
                if ($certificate['duration_type'] == 'month') {
                    $toDateString = strtotime("+$duration months", $admissionTime);
                } else if ($certificate['duration_type'] == 'year') {
                    $toDateString = strtotime("+$duration years", $admissionTime);
                }
                $toDateString = strtotime('-1 month', $toDateString);
                $this->set_data('to_date', date('M Y', $toDateString));
            }

            if (in_array(PATH, ['gssrcindia', 'iedct', 'techno', 'softworldedu', 'ncvetskill', 'iisdit'])):
                $admissionTime = strtotime($get->row('admission_date'));
                // $this->set_data('from_date', date('M Y', $admissionTime));
                $this->set_data('serial_no', date("Y", $admissionTime) . str_pad(PATH == 'techno' ? $row->student_id : $this->id, 3, '0', STR_PAD_LEFT));
            elseif (in_array(PATH, ['haptronworld'])):
                $this->set_data('serial_no', 'IN' . (100 + $result_id));
            elseif (in_array(PATH, ['upstate', 'sctnew'])):
                $this->set_data('serial_no', '100' . date('Y', strtotime($row->issue_date)) . $this->id);
            endif;
            // echo $get->row('result_id');
            // pre($get_subect_numers->result_array(),true);
            $subject_marks = [];
            $per = $ttl = $ob_ttl = 0;
            $ttltminm =
                $ttltmaxm =
                $ttlpminm =
                $ttlpmaxm = 0;
            $theorySubjects = $practicalSubjects = [];
            $tIndedx = $pIndex = 0;
            if ($ttl_subject = $get_subect_numers->num_rows()) {
                foreach ($get_subect_numers->result() as $mark) {
                    // pre($mark,true);
                    $tmm = $this->isMark($mark->theory_max_marks);
                    $pmm = $this->isMark($mark->practical_max_marks);
                    $tmim = $this->isMark($mark->theory_min_marks);
                    $pmim = $this->isMark($mark->practical_min_marks);
                    $ttl += $this->mark_total($tmm, 0) + $this->mark_total($pmm, 0);
                    $ttltminm += $tmim;
                    $ttltmaxm += $tmm;
                    $ttlpminm += $pmim;
                    $ttlpmaxm += $pmm;
                    if (PATH == 'iedct') {

                        if (in_array($mark->subject_type, ['both', 'theory'])) {
                            $theorySubjects[$tIndedx++] = [
                                'subject_name' => $mark->subject_name,
                                'theory_max_marks' => $tmm,
                                'theory_total' => $mark->theory_marks
                            ];
                        }
                        if (in_array($mark->subject_type, ['both', 'practical'])) {
                            $practicalSubjects[$pIndex++] = [
                                'subject_name' => $mark->subject_name,
                                'practical_max_marks' => $pmm,
                                'practical_total' => $mark->practical
                            ];
                        }
                    }
                    $marks = [
                        'subject_name' => $mark->subject_name,
                        'subject_code' => $mark->subject_code,
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
                $per = $this->percentage($ob_ttl, ($ttltmaxm + $ttlpmaxm));
            }
            if (PATH == 'iedct') {
                $this->set_data('theorySubject', $theorySubjects);
                $this->set_data('practicalSubjects', $practicalSubjects);
                // $this->mypdf->addPage('L');                
            }
            $main = [
                'total' => $ttl,
                'max_total' => ($ttltmaxm + $ttlpmaxm),
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
            $file = $this->get_multi_path($course_id, $file);
            if ($this->return)
                return $main;
            // pre($get->row(),true);
            $this->set_data($main);
            $rowArray = $get->row_array();
            $rowArray['duration_type'] = (humnize($rowArray['marksheet_duration'], $rowArray['duration_type']));
            // $rowArray['marksheet_duration_type'] = $rowArray['duration_type'];
            $pdfContent = $this->parse($file, $rowArray);
            // echo $pdfContent;
            $this->pdf($pdfContent, $rowArray['student_name'] . '-' . $rowArray['roll_no'] . '-' . humnize_duration_with_ordinal($rowArray['marksheet_duration'], $rowArray['duration_type']) . ' Result.pdf');
        } else {
            $this->not_found("Marksheet Not Found..");
        }
    }

    private function reverse_array($originalArray)
    {
        // $reversedArray = array_reverse($originalArray, true);
        // $reversedKeysArray = array_reverse(array_keys($reversedArray));
        // return array_combine($reversedKeysArray, $reversedArray);
    }
    private function calculateCertificate($data)
    {
        extract($data);
        $where = [];
        if ($duration_type == 'year') {
            $i = 1;
            do {
                $where[] = [
                    'student_id' => $student_id,
                    'duration' => $i,
                    'duration_type' => $duration_type,
                    'course_id' => $course_id
                ];
                $i++;
            } while ($duration >= $i);
        } else
            $where[] = $data;
        // pre($where,true);
        if (sizeof($where)) {
            $per = $ttl = $ob_ttl = 0;
            $ttltminm =
                $ttltmaxm =
                $ttlpminm =
                $ttlpmaxm = 0;
            $subjects = [];
            $subject_marks = [];
            foreach ($where as $whereData) {
                $final_marksheet = $this->student_model->marksheet($whereData);
                if ($final_marksheet->num_rows()) {
                    // pre($final_marksheet->row(),true);
                    $row = $final_marksheet->row();
                    $this->set_data('enrollment_no', $row->enrollment_no);
                    $subject_marks = [];
                    $get_subect_numers = $this->student_model->marksheet_marks($final_marksheet->row("result_id"));

                    if ($ttl_subject = $get_subect_numers->num_rows()) {
                        foreach ($get_subect_numers->result() as $mark) {
                            $subjects[] = $mark->subject_name;
                            $tmm = $this->isMark($mark->theory_max_marks);
                            $pmm = $this->isMark($mark->practical_max_marks);
                            $tmim = $this->isMark($mark->theory_min_marks);
                            $pmim = $this->isMark($mark->practical_min_marks);
                            $ttl += $this->mark_total($tmm, 0) + $this->mark_total($pmm, 0);
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
                    }
                }
            }
            try {
                if ($ob_ttl) {
                    $percentage = ($ob_ttl / ($ttltmaxm + $ttlpmaxm));
                    $per = number_format(($percentage * 100), 2);
                } else
                    throw new Exception(100);
            } catch (Exception $e) {
                $per = 100;
            }

            $main = [
                'subjects' => $subjects,
                'subject_html' => implode(',', $subjects),
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
    }
    function certificate()
    {
        if (checkField('student_certificates', 'cert_session'))
            $this->db->select('sc.cert_session');
        if (PATH == 'sctnew')
            $this->db->select('sc.hindi_name,sc.hindi_mother_name,sc.hindi_father_name');
        $get = $this->student_model->student_certificates(['id' => $this->id]);
        if ($get->num_rows()) {
            $certificate = ($get->row_array());
            $admissionTime = strtotime($certificate['admission_date']);
            $this->set_data('from_date', date('M Y', $admissionTime));
            $this->set_data('serial_no', date("Y", $admissionTime) . str_pad($certificate['student_id'], 3, '0', STR_PAD_LEFT));
            $toDateString = strtotime($certificate['createdOn']);
            $duration = $certificate['duration'];
            if ($certificate['duration_type'] == 'month') {
                $toDateString = strtotime("+$duration months", $admissionTime);
            } else if ($certificate['duration_type'] == 'year') {
                $toDateString = strtotime("+$duration years", $admissionTime);
            }
            $toDateString = strtotime('-1 month', $toDateString);
            $this->set_data('to_date', date('M Y', $toDateString));
            $this->set_data('exam_conduct_date', '');
            if (isset($certificate['exam_conduct_date']))
                $this->set_data('exam_conduct_date', date('M Y', strtotime($certificate['exam_conduct_date'])));
            // pre($certificate,true);
            $this->calculateCertificate([
                'course_id' => $certificate['course_id'],
                'student_id' => $certificate['student_id'],
                'duration' => $certificate['duration'],
                'duration_type' => $certificate['duration_type'],
            ]);
            if (CHECK_PERMISSION('FRONT_CERTIFICATE_QR'))
                $this->ki_theme->generate_qr($this->id, 'front_student_certificate', base_url('en-verification/' . $this->token->encode(['id' => $this->id])), false, 10);
            else
                $this->ki_theme->generate_qr($this->id, 'student_certificate', current_url());
            if (in_array(PATH, ['haptronworld', 'sewaedu', 'beautyguru', 'pces', 'ncvetskill', 'sct'])) {
                $certificate['serial_no'] = (50000 + $this->id);
                $this->mypdf->addPage('L');
            } elseif (in_array(PATH, ['upstate'])) {
                $this->set_data('serial_no', '1' . date('Y', strtotime($certificate['createdOn'])) . '00' . $certificate['student_id']);
            }
            // $getLastExam = $this->student_model->last_marksheet($certificate['course_id']);
            $this->set_data($certificate);

            $output = $this->parse($this->get_multi_path($certificate['course_id'], 'certificate'), $certificate);
            // $this->mypdf->setTitle('certificate');
            // pre($certificate,true);
            $this->pdf($output, $certificate['student_name'] . ' ' . $certificate['roll_no'] . '-Certificate.pdf');
        } else {
            $this->not_found("Certificate Not Found..");
        }
    }
    function franchise_certificate()
    {
        $get = $this->center_model->get_center($this->id);
        $this->set_data('certificate_id', $this->id);
        if ($get->num_rows()) {
            $data = $get->row_array();
            // pre($data,true);
            if ($data['status'] && $data['isPending'] == 0 && $data['isDeleted'] == 0) {
                if ($data['valid_upto'] && $data['certificate_issue_date']) {
                    // pre($data,true);
                    $data['valid_upto'] = date('d-m-Y', strtotime($data['valid_upto']));
                    $year = date('Y', strtotime($data['certificate_issue_date']));
                    $data['serial_no'] = $year . str_pad($data['id'], 3, 0, STR_PAD_LEFT);
                    $data['state'] = $this->SiteModel->state($data['state_id']);
                    $data['city'] = $this->SiteModel->city($data['city_id']);
                    if (in_array(PATH, ['skycrownworld'])) {
                        $data['certificate_issue_date'] = date('d M Y', strtotime($data['certificate_issue_date']));
                        $data['valid_upto'] = date('d M Y', strtotime($data['valid_upto']));
                    }
                    $output = $this->parse('franchise_certificate', $data);

                    if (in_array(PATH, ['gssrcindia', 'ncvetskill', 'techno', 'haptronworld', 'beautyguru', 'sewaedu', 'softworldedu', 'nbeat', 'sct', 'iisdit'])) {
                        $this->mypdf->addPage('L');
                    }
                    $this->pdf($output);
                } else
                    $this->not_found('This Certificate is incomplete..');
            } else
                $this->not_found("This Account is not Active..");
        } else
            $this->not_found("Certificate Not Found..");
    }
    function pdf($pdfContent, $filename = 'my-pdf.pdf')
    {
        header('Content-Type: text/html; charset=utf-8');

        // $this->mypdf->SetFont('Noto Sans Devanagari');
        // // pre($this->mypdf,true);
        // $this->mypdf->SetFontSize(50,true);
        // $this->mypdf->autoScriptToLang = true;
        // $this->mypdf->autoLangToFont = true;
        // pre($this->mypdf,true);
        $this->mypdf->WriteHTML($pdfContent);
        $filename = str_replace('.pdf', '', $filename);
        $pdfData = $this->mypdf->Output("{$filename}.pdf", 'I');


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
    function test()
    {
        echo "*<br>";
        echo "&nbsp;*";
    }
    private function get_other_doc($id, $table)
    {
        $data = $this->db->select('s.admission_date,s.name,s.roll_no,s.father_name,table.*,c.course_name,s.image,
                ce.institute_name,
                cc.title as course_category,
                c.duration,
                c.duration_type
            ')
            ->from('students as s')
            ->join($table . ' as table', 'table.student_id = s.id')
            ->join('course as c', 'c.id = s.course_id')
            ->join('centers as ce', 'ce.id = s.center_id', 'left')
            ->join('course_category as cc', 'cc.id = c.category_id', 'left')
            ->where('table.id', $id)
            ->get();
        return $data;
    }
    function provisional_certificate()
    {
        $get = $this->get_other_doc($this->id, __FUNCTION__);
        if ($get->num_rows()) {
            // pre($get->row());?
            $this->set_data($get->row_array());
            $output = $this->parse(__FUNCTION__);
            $this->mypdf->addPage('L');
            $this->pdf($output);
        } else
            $this->not_found();
    }
    function no_objection_certificate()
    {
        $get = $this->get_other_doc($this->id, __FUNCTION__);
        if ($get->num_rows()) {
            // pre($get->row(),true);
            $this->set_data($get->row_array());
            $output = $this->parse(__FUNCTION__);
            // $this->mypdf->addPage('L');
            $this->pdf($output);
        } else
            $this->not_found();
    }
    function migration_certificate()
    {
        $get = $this->get_other_doc($this->id, __FUNCTION__);
        if ($get->num_rows()) {
            // pre($get->row(),true);
            $this->set_data($get->row_array());
            $output = $this->parse(__FUNCTION__);
            // $this->mypdf->addPage('L');
            $this->pdf($output);
        } else
            $this->not_found();
    }
    function typing_certificate()
    {
        try {
            $token = $this->uri->segment(2, 0);
            if (!$token)
                throw new Exception('invalid token');
            $id = base64_decode(base64_decode($token));
            $list = $this->student_model->typing_certificate($id);
            if ($list->num_rows()) {
                // pre($list->row());
                $output = $this->parse('typing-certificate', $list->row_array());
                $this->pdf($output);
            } else
                throw new Exception('Data not found...');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}


