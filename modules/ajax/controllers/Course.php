<?php
class Course extends Ajax_Controller
{
    //for course
    function add()
    {
        $this->response(
            'html',
            'Course Added Successfully.'
        );
        $this->response(
            'status',
            $this->db->insert('course', $this->post())
        );
    }
    function edit()
    {
        $this->db->where('id', $this->post('id'))->update('course', [
            'course_name' => $this->post('course_name'),
            'fees' => $this->post('fees')
        ]);
        $this->response('html','Course Updated Successfully..');
        $this->response('status', true);
    }
    function edit_subject()
    {
        $this->db->where('id', $this->post('id'))->update('subjects', [
            'subject_code' => $this->post('subject_code'),
            'subject_name' => $this->post('subject_name')
        ]);
        $this->response('html','Subject Updated Successfully..');

        $this->response('status', true);
    }
    function edit_category()
    {
        // $this->response($this->post());
        $this->db->where('id', $this->post('id'))->update('course_category', [
            'title' => $this->post('title')
        ]);
        $this->response('html','Category Updated Successfully..');

        $this->response('status', true);
    }
    function delete($course_id)
    {
        if ($course_id) {
            $this->response(
                'status',
                $this->db->where('id', $course_id)->update('course', ['isDeleted' => 1])
            );
            $this->response('html', 'Data Delete successfully.');
        } else
            $this->response('html', 'Action id undefined');
    }
    function param_delete()
    {
        if ($this->post('course_id')) {
            $get = $this->db->where('course_id', $this->post('course_id'))->get('students');
            if ($get->num_rows()) {
                $this->response('error', 'There are ' . $get->num_rows() . ' students associated with this course, first delete them.');
            } else {
                $get = $this->db->where('course_id', $this->post('course_id'))->get('subjects');
                if ($get->num_rows()) {
                    $this->response('error', 'There are ' . $get->num_rows() . ' Subjects associated with this course, first delete them.');
                } else {
                    $this->response(
                        'status',
                        $this->db->where('id', $this->post('course_id'))->delete('course')
                    );
                    $this->response('error', 'Course Permanently Deleted successfully.');
                }
            }
        } else
            $this->response('error', 'Action id undefined');
    }
    function list()
    {
        $list = $this->db->
            select('c.*,c.id as course_id,cat.title as category')
            ->from('course as c')
            ->join('course_category as cat', 'cat.id = c.category_id', 'left')
            ->where('c.isDeleted', 0)
            ->get();
        $data = [];
        if ($list->num_rows())
            $data = $list->result();
        // if()
        $this->response('data', $data);
    }
    function delete_list()
    {
        $list = $this->db->
            select('c.*,c.id as course_id,cat.title as category')
            ->from('course as c')
            ->join('course_category as cat', 'cat.id = c.category_id', 'left')
            ->where('c.isDeleted', 1)
            ->get();
        $data = [];
        if ($list->num_rows())
            $data = $list->result();
        // if()
        $this->response('data', $data);
    }
    function setting_form()
    {
        if (CHECK_PERMISSION('SHOW_MULTIPLE_CERTIFICATES')) {
            $get = $this->db->where('id', $this->post('id'))->get('course');
            if ($get->num_rows()) {
                $this->response('status', true);
                $this->set_data($get->row_array());
                $this->response('html', $this->template('course-multi-certi-setting'));
            }
        } else {
            $this->response('error', 'You have no permission to view this page.');
        }
    }
    function update_multi_certi()
    {
        if (CHECK_PERMISSION('SHOW_MULTIPLE_CERTIFICATES')) {
            $this->db->where('id', $this->post('id'))->update('course', [
                'parent_id' => $this->post('parent_id')
            ]);
            $this->response('status', true);
            // $this->response('html', $this->db->last_query());
        $this->response('html','Updated Categories Successfully..');

        }
    }
    function add_subject()
    {
        $data = [
            'subject_name' => $this->post("subject_name"),
            'subject_code' => $this->post("subject_code"),
            'course_id' => $this->post("course_id"),
            'duration' => $this->post("duration"),
            'duration_type' => $this->post("duration_type"),
            'subject_type' => $this->post("subject_type")
        ];
        if (in_array($this->post('subject_type'), ['practical', 'both'])) {
            $data['practical_max_marks'] = $this->post("practical_max_marks");
            $data['practical_min_marks'] = $this->post("practical_min_marks");
        }
        if (in_array($this->post('subject_type'), ['theory', 'both'])) {
            $data['theory_max_marks'] = $this->post("theory_max_marks");
            $data['theory_min_marks'] = $this->post("theory_min_marks");
        }
        $this->response(
            'status',
            $this->db->insert('subjects', $data)
        );
    }
    function list_subjects()
    {
        $this->response('data', $this->student_model->system_subjects()->result());
    }
    function list_deleted_subjects(){
        $this->response('data',$this->student_model->system_subjects(1)->result());
    }
    function subject_delete()
    {
        $this->db->where('id', $this->post('id'))->update('subjects', ['isDeleted' => 1]);
        $this->response('status', true);
    }
    function parma_subject_delete()
    {
        $get = $this->db->where('subject_id', $this->post('id'))->get('marks_table');
        if ($get->num_rows()) {
            $this->response('error', 'There are ' . $get->num_rows() . ' Marksheets associated with this Subject, first delete them.');
        } else {
            $this->db->where('id', $this->post('id'))->delete('subjects');
            $this->response('status', true);
        }
    }
    /*
    function fetch_course_fees_form()
    {
        $this->response(
            'form',
            $this->parser->parse('course/fees-box', [
                'course_id' => $this->post('course_id')
            ], true)
        );
    }*/
    // for category
    function add_category()
    {
        if ($this->validation()) {
            $this->response(
                'status',
                $this->db->insert('course_category', $this->post())
            );
        }
    }
    function list_category()
    {
        $list = $this->db->get('course_category');
        $data = [];
        if ($list->num_rows())
            $data = $list->result();
        // if()
        $this->response('data', $data);
    }
    function delete_category($category_id = 0)
    {
        // $this->response($_GET);
        if ($category_id) {
            $get = $this->db->where('category_id', $category_id)->get('course');
            if ($get->num_rows()) {
                $this->response('html', 'This Category have ' . $get->num_rows() . ' Course(s), before their subjects delete then delete category');
            } else {
                $this->response(
                    'status',
                    $this->db->where('id', $category_id)->delete('course_category')
                );
                $this->response('html', 'Data Delete successfully.');
            }
        } else
            $this->response('html', 'Action id undefined');
        // $this->response('html',$category_id);
    }
    function list_subjects_html()
    {
        $where = ['course_id' => $this->post('id'), 'isDeleted' => 0];
        $subjects = $this->student_model->course_subject($where);
        if ($subjects->num_rows()) {

            $this->set_data('subjects', $subjects->result_array());
            $this->response('status', true);
            $this->response('html', $this->template('list-course-subjects'));
        } else {
            $this->response('html', alert('Subjects Not Found', 'danger'));
        }
    }
    function update_arrange_subject()
    {
        // $this->response($this->post());
        $data = [];
        if ($this->post('sortedIds')) {
            foreach ($this->post('sortedIds') as $i => $id) {
                $data[] = [
                    'id' => $id,
                    'seq' => ($i + 1)
                ];
            }
            $this->db->update_batch('subjects', $data, 'id');
            $this->response('status', true);
        }
    }
}
