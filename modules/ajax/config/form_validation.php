<?php
$config = array(
    'student/add' => array(
        array(
            'field' => 'email_id',
            'label' => 'Email',
            'rules' => 'is_unique[students.email]',
            'errors' => [
                'is_unique' => 'This %s is already exists.'
            ]
        ),
        array(
            'field' => 'contact_number',
            'label' => 'Contact Number',
            'rules' => 'is_unique[students.contact_number]',
            'errors' => [
                'is_unique' => 'This %s is already exists.'
            ]
        ),
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'is_unique[students.username]',
            'errors' => [
                'is_unique' => 'This %s is already exists.'
            ]
        ),
        array(
            'field' => 'roll_no',
            'label' => 'Roll No',
            'rules' => 'required|is_unique[students.roll_no]',
            'errors' => [
                'is_unique' => 'This %s is already exists.'
            ]
        ),

    ),
    'add_center' => array(
        array(
            'field' => 'email_id',
            'label' => 'Email',
            'rules' => 'is_unique[centers.email]',
            'errors' => [
                'is_unique' => 'This %s is already exists.'
            ]
        ),
        array(
            'field' => 'contact_number',
            'label' => 'Contact Number',
            'rules' => 'is_unique[centers.contact_number]',
            'errors' => [
                'is_unique' => 'This %s is already exists.'
            ]
        ),
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'is_unique[centers.username]',
            'errors' => [
                'is_unique' => 'This %s is already exists.'
            ]
        )
    ),
    'academic/add_batch' => array(
        array(
            'field' => 'batch_name',
            'label' => 'Batch Name',
            'rules' => 'is_unique[batch.batch_name]',
            'errors' => [
                'is_unique' => 'This %s is already exists.'
            ]
        )
    ),
    'academic/add_session' => array(
        array(
            'field' => 'title',
            'label' => 'Session Title',
            'rules' => 'is_unique[session.title]',
            'errors' => [
                'is_unique' => 'This %s is already exists.'
            ]
        )
    ),
    'academic/add_occupation' => array(
        array(
            'field' => 'title',
            'label' => 'Occupation',
            'rules' => 'is_unique[occupation.title]',
            'errors' => [
                'is_unique' => 'This %s is already exists.'
            ]
        )
    ),
    'course/add_category' => array(
        array(
            'field' => 'title',
            'label' => 'Category Title',
            'rules' => 'is_unique[course_category.title]',
            'errors' => [
                'is_unique' => 'This %s is already exists.'
            ]
        )
    ),
    'website_student_verification' => array(
        array(
            'label' => 'Roll Number',
            'field' => 'roll_no',
            'rules' => 'required'
        ),
        array(
            'label' => 'Date of Birth',
            'field' => 'dob',
            'rules' => 'required'
        )
    ),
    'student_admission' => array(
        array(
            'label' => 'Student Name',
            'field' => 'name',
            'rules' => 'required'
        ),
        array(
            'label' => 'Gender',
            'field' => 'gender',
            'rules' => 'required'
        ),
        array(
            'label' => 'Date of Birth',
            'field' => 'dob',
            'rules' => 'required'
        ),
        array(
            'label' => 'Center',
            'field' => 'center_id',
            'rules' => 'required'
        ),
        array(
            'label' => 'Roll Number',
            'field' => 'roll_no',
            'rules' => 'required|is_unique[students.roll_no]',
            'errors' => [
                'is_unique' => 'Sorry, Your Admission failed, Please contact our Administrator.'
            ]
        ),
        array(
            'label' => 'Course',
            'field' => 'course_id',
            'rules' => 'required'
        ),
        array(
            'label' => 'Time table',
            'field' => 'batch_id',
            'rules' => 'required'
        ),
        array(
            'label' => 'Whatsapp Number',
            'field' => 'contact_number',
            'rules' => 'required'
        ),
        array(
            'label' => 'Email',
            'field' => 'email',
            'rules' => 'required|is_unique[students.email]',
            'errors' => [
                'is_unique' => 'This %s is already exists.'
            ]
        ),
        array(
            'label' => 'Father Name',
            'field' => 'father_name',
            'rules' => 'required'
        ),
        array(
            'label' => 'Mother Name',
            'field' => 'mother_name',
            'rules' => 'required'
        ),
        array(
            'label' => 'Address',
            'field' => 'address',
            'rules' => 'required'
        ),
        array(
            'label' => 'State',
            'field' => 'state_id',
            'rules' => 'required'
        ),
        array(
            'label' => 'City',
            'field' => 'city_id',
            'rules' => 'required'
        ),
        array(
            'label' => 'Pincode',
            'field' => 'pincode',
            'rules' => 'required'
        )

    ),
    'update_center_roll_no' => array(
        array(
            'label' => 'Roll No Prefix',
            'field' => 'rollno_prefix',
            'rules' => 'required'
        )
    ),
    'update_center' => array(
        array(
            'label' => 'Name',
            'field' => 'name',
            'rules' => 'required'
        ),
        array(
            'label' => 'Institute Name',
            'field' => 'institute_name',
            'rules' => 'required'
        ),
        array(
            'label' => 'Qualification of center head',
            'field' => 'qualification_of_center_head',
            'rules' => 'required'
        ),
        array(
            'label' => 'Date of Birth',
            'field' => 'dob',
            'rules' => 'required'
        ),
        array(
            'label' => 'Pan Number',
            'field' => 'pan_number',
            'rules' => 'trim|required|regex_match[/^[A-Z]{5}[0-9]{4}[A-Z]$/]',
            'errors' => [
                'regex_match' => 'The %s field must be in a valid PAN card format..'
            ]
        ),
        array(
            'label' => 'Aadhar Number',
            'field' => 'aadhar_number',
            'rules' => 'trim|required|exact_length[12]|numeric',
            'errors' => [
                'exact_length' => 'The %s field must be exactly 12 digits long',
                'numeric' => 'The %s field must contain only numeric characters.'
            ]
        ),
        array(
            'label' => 'Center Full Address',
            'field' => 'center_full_address',
            'rules' => 'required'
        ),
        array(
            'label' => 'Pincode',
            'field' => 'pincode',
            'rules' => 'trim|required|exact_length[6]|numeric',
            'errors' => [
                'exact_length' => 'The %s field must be exactly 6 digits long',
                'numeric' => 'The %s field must contain only numeric characters.'
            ]
        ),
        array(
            'label' => 'State',
            'field' => 'state_id',
            'rules' => 'required'
        ),
        array(
            'label' => 'City',
            'field' => 'city_id',
            'rules' => 'required'
        ),
        array(
            'label' => 'No of Computer Operator',
            'field' => 'no_of_computer_operator',
            'rules' => 'required'
        ),
        array(
            'label' => 'No of Class Room',
            'field' => 'no_of_class_room',
            'rules' => 'required'
        ),
        array(
            'label' => 'Total Computer',
            'field' => 'total_computer',
            'rules' => 'required'
        ),
        array(
            'label' => 'Space of Computer Center',
            'field' => 'space_of_computer_center',
            'rules' => 'required'
        ),
        array(
            'label' => 'Whatsapp Number',
            'field' => 'whatsapp_number',
            'rules' => 'required|numeric'
        ),
        array(
            'label' => 'Contact Number',
            'field' => 'contact_number',
            'rules' => 'required|numeric'
        ),
        array(
            'label' => 'Email',
            'field' => 'email',
            'rules' => 'required|valid_email'
        ),
        array(
            'label' => 'Valid UpTo',
            'field' => 'valid_upto',
            'rules' => 'required'
        ),
    ),
    'student_login_form' => array(
        array(
            'field' => 'roll_no',
            'label' => 'Roll No',
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
        )
    ),
    'change_password' => array(
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[8]|regex_match[/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/]',
            'errors' => array(
                'regex_match' => 'The %s must contain at least one letter, one number, and one special character.'
            )
        ),
        array(
            'field' => 'confirm_password',
            'label' => 'Confirm Password',
            'rules' => 'required|matches[password]'
        )
    ),
    'roll_no' => array(
        array(
            'field' => 'roll_no',
            'label' => 'Roll No.',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Enter Roll Number..'
            )
        )
    ),
    'question_add' => array(
        array(
            'field' => 'question',
            'label' => 'Question',
            'rules' => 'required',//|is_unique[exam_questions.question]',
            'errors' => array(
                'is_unique' => 'This Question is already Exists.'
            )
        ),
        array(
            'field' => 'ans[]',
            'label' => 'Answers',
            'rules' => 'required'
        ),

        array(
            'field' => 'is_right[]',
            'label' => 'Right Answer',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Please Choose %s'
            )
        )
    ),
    'check_center_dates' => array(
        array(
            'field' => 'valid_upto',
            'label' => 'Valid Upto',
            'rules' => 'required'
        ),
        array(
            'field' => 'certificate_issue_date',
            'label' => 'Issue Date',
            'rules' => 'required'
        )
    )
);