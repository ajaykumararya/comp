<?php
class Academic extends Ajax_Controller
{
    function add_batch()
    {
        if ($this->validation()) {
            $this->response(
                'status',
                $this->db->insert('batch', $this->post())
            );
             $this->response(
                'html',
                'Btach added Successfully..'
            );
        }
    }
    function edit_batch()
    {
        $this->db->where('id', $this->post('id'))->update('batch', [
            'batch_name' => $this->post('batch_name'),
        ]);
        $this->response('status', true);
    }
    function edit_session()
    {
        $this->db->where('id', $this->post('id'))->update('session', [
            'title' => $this->post('title'),
        ]);
        $this->response('status', true);
    }
    function update_session_status()
    {
        $this->db->where('id', $this->post('id'))->update('session', [
            'status' => $this->post('status'),
        ]);
        $this->response('status', true);
    }
    function edit_occupation()
    {
        $this->db->where('id', $this->post('id'))->update('occupation', [
            'title' => $this->post('title'),
        ]);
        $this->response('status', true);
    }
    function list_batch()
    {
        $list = $this->db->get('batch');
        $data = [];
        if ($list->num_rows())
            $data = $list->result();
        // if()
        $this->response('data', $data);
    }
    function delete_batch($batch_id = 0)
    {
        // $this->response($_GET);
        if ($batch_id) {
            $this->response(
                'status',
                $this->db->where('id', $batch_id)->delete('batch')
            );
            $this->response('html', 'Data Delete successfully.');
        } else
            $this->response('html', 'Action id undefined');
        // $this->response('html',$batch_id);
    }


    //session part
    function add_session()
    {
        if ($this->validation()) {
            $this->response(
                'status',
                $this->db->insert('session', $this->post())
            );
            $this->response('html','Session Added Successfully..');
        }
    }
    function list_session()
    {
        $list = $this->db->get('session');
        $data = [];
        if ($list->num_rows())
            $data = $list->result();
        $this->response('data', $data);
    }
    function delete_session($session_id = 0)
    {
        // $this->response($_GET);
        if ($session_id) {
            $this->response(
                'status',
                $this->db->where('id', $session_id)->delete('session')
            );
            $this->response('html', 'Data Delete successfully.');
        } else
            $this->response('html', 'Action id undefined');
        // $this->response('html',$batch_id);
    }

    //Occupation part
    function add_occupation()
    {
        if ($this->validation()) {
            $this->response(
                'status',
                $this->db->insert('occupation', $this->post())
            );
        }
    }
    function list_occupation()
    {
        $list = $this->db->get('occupation');
        $data = [];
        if ($list->num_rows())
            $data = $list->result();
        $this->response('data', $data);
    }
    function delete_occupation($occupation_id = 0)
    {
        // $this->response($_GET);
        if ($occupation_id) {
            $this->response(
                'status',
                $this->db->where('id', $occupation_id)->delete('occupation')
            );
            $this->response('html', 'Data Delete successfully.');
        } else
            $this->response('html', 'Action id undefined');
        // $this->response('html',$batch_id);
    }
    function get_course_session_schedule_form()
    {
        $get = $this->db->where($this->post())->get('admit_cards_with_session');
        $subjectsArray = [];
        $admit_card_with_session_id = 0;
        if ($get->num_rows()) {
            $row = $get->row();
            $admit_card_with_session_id = $row->id;
            $savedTimes = $this->db->where('admit_session_id', $admit_card_with_session_id)
                ->get('admit_cards_subjects');
            if ($savedTimes->num_rows()) {
                foreach ($savedTimes->result() as $row) {
                    $subjectsArray[$row->subject_id] = (array) $row;
                }
            }
        }

        $subjects = $this->db->where([
            'course_id' => $this->post('course_id'),
            'duration' => $this->post('duration'),
            'duration_type' => $this->post('duration_type'),
        ])->get('subjects');
        // $this->response('data', $subjects->result());
        if ($subjects->num_rows()) {
            $this->response('status', true);
            $html = '<table class="table table-striped table-bordered">
            
                        <thead>
                            <tr>
                                <th>Subject Name</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>';
            foreach ($subjects->result() as $row) {
                $rr = isset($subjectsArray[$row->id]) ? $subjectsArray[$row->id] : [
                    'date' => date('d-m-Y'),
                    'time' => '10:00'
                ];
                extract($rr);
                $html .= '<tr>
                        <td>' . $row->subject_name . '  ' . label(humnize_duration_with_ordinal($row->duration, $row->duration_type)) . '</td>
                        <td>
                            <input type="text" value="' . $date . '" required name="date[' . $row->id . ']" class="future-date form-control">
                        </td>
                        <td>
                            <input type="text" value="' . $time . '" required name="time[' . $row->id . ']" class="timer form-control">
                        </td>
                    
                    </tr>';
            }
            $html .= '</tbody>
            
            </table>';
            $this->response('button', $this->ki_theme->publish_button());
            $this->response('html', $html);
        }
    }
    function save_session_schedule()
    {
        // $this->response('data', $this->post());
        $mdata = [
            'center_id' => $this->post('center_id'),
            'course_id' => $this->post('course_id'),
            'duration' => $this->post('duration'),
            'duration_type' => $this->post('duration_type'),
            'session_id' => $this->post("session_id"),
            'exam_centre_id' => $this->post('exam_centre_id')
        ];
        $get = $this->db->where([
            'center_id' => $mdata['center_id'],
            'course_id' => $mdata['course_id'],
            'duration' => $mdata['duration'],
            'duration_type' => $mdata['duration_type']
        ])->get('admit_cards_with_session');
        $subjectsArray = [];
        $admit_card_with_session_id = 0;
        if ($get->num_rows()) {
            $row = $get->row();
            $this->db->where('id', $row->id)->update('admit_cards_with_session', $mdata);
            $admit_card_with_session_id = $row->id;
        } else {
            $this->db->insert('admit_cards_with_session', $mdata);
            $admit_card_with_session_id = $this->db->insert_id();
        }

        foreach ($_POST['date'] as $subject_id => $date) {
            $time = $_POST['time'][$subject_id];
            $get = $this->db->where('subject_id', $subject_id)->get('admit_cards_subjects');
            $data = [
                'date' => $date,
                'admit_session_id' => $admit_card_with_session_id,
                'time' => $time,
                'subject_id' => $subject_id
            ];
            if ($get->num_rows())
                $this->db->update('admit_cards_subjects', $data, ['id' => $get->row('id')]);
            else
                $this->db->insert('admit_cards_subjects', $data);
        }
        $this->response('status', true);
    }
}
?>