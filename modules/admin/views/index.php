<style>
    .card {
        color: #fff;
        border-radius: 10px;
        border: none;
        position: relative;
        margin-bottom: 30px;
        border: 1px solid white;
        /* border-top:3px solid white; */
        box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
    }

    .card:hover .card-icon>i {
        transition: all .2s ease;
        font-size: 65px !important
    }

    .card:hover .card-icon {
        top: 20px !important;
        right: 30px !important
    }

    .l-bg-cherry {
        background: linear-gradient(to right, #493240, #f09) !important;
        color: #fff;
    }

    .l-bg-blue-dark {
        background: linear-gradient(to right, #373b44, #4286f4) !important;
        color: #fff;
    }

    .l-bg-green-dark {
        background: linear-gradient(to right, #0a504a, #38ef7d) !important;
        color: #fff;
    }

    .l-bg-orange-dark {
        background: linear-gradient(to right, #a86008, #ffba56) !important;
        color: #fff;
    }

    .card .card-statistic-3 .card-icon-large .fas,
    .card .card-statistic-3 .card-icon-large .far,
    .card .card-statistic-3 .card-icon-large .fab,
    .card .card-statistic-3 .card-icon-large .fal {
        font-size: 42px;
        transition: all .4s ease;
        color: white;
    }

    .card .card-statistic-3 .card-icon {
        text-align: center;
        line-height: 33px;
        margin-left: 15px;
        position: absolute;
        right: 24px;
        top: 39px;
        transition: all .4s ease;
        opacity: 0.5;
    }

    .l-bg-cyan {
        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
        color: #fff;
    }

    .l-bg-green {
        background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
        color: #fff;
    }

    .l-bg-orange {
        background: linear-gradient(to right, #f9900e, #ffba56) !important;
        color: #fff;
    }

    .l-bg-cyan {
        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
        color: #fff;
    }

    .card-action {
        padding: 4px !important;
        padding-left: 18px !important;
        color: white;
        background: rgba(0, 0, 0, .2);
        border-radius: 10px;
        text-align: left;
        transition: all 0.3s ease;
        border-top: 3px solid white;
    }

    .card-action i {
        color: white;
    }

    .card-action:hover {
        padding-left: 30% !important;
        transition: all 0.3s ease;
        background-color: rgb(0, 0, 0, .5);
    }

    @media only screen and (max-width: 768px) {
        .card .card-statistic-3 {
            height: 121px;
        }
    }
</style>
<?php
$loginId = $this->center_model->loginId();
$isCenter = ($this->center_model->isCenter());
$where = $isCenter ? ['center_id' => $loginId] : [];

if ($this->center_model->isAdminOrCenter()) {
    // echo 'yes';
    $this->db->from('course_category as coc');
    if ($isCenter) {
        $this->db->join('course as c', 'c.category_id = coc.id');
        $this->db->join('center_courses as cc', 'c.id = cc.course_id');
        $this->db->group_by('c.category_id');
    }
    $courseCategory = $this->db->get()->num_rows();
    $allStudents = $this->student_model->get_switch('all', [
        'without_admission_status' => true
    ])->num_rows();
    $approvedStudents = $this->student_model->get_switch('all', [
        'without_admission_status' => true,
        'admission_status' => 1
    ])->num_rows();
    $pendingStudents = $this->student_model->get_switch('all', [
        'without_admission_status' => true,
        'admission_status' => 0
    ])->num_rows();
    $cancelStudents = $this->student_model->get_switch('all', [
        'without_admission_status' => true,
        'admission_status' => 2
    ])->num_rows();
    $passoutStudent = $this->student_model->get_switch('passout')->num_rows();

    // $active_student = $this->student_model->get_switch('active_student')->num_rows();
// echo $active_student;

    $ttl_courses = $this->SiteModel->ttl_courses();
    $ttlAmitCards = $this->db->where($where)->get('admit_cards')->num_rows();
    $ttlResults = $this->db->where($where)->get('marksheets')->num_rows();
    $ttlIDCards = $approvedStudents;
    if ($this->center_model->isAdmin()) {
        $ttlCentres = $this->center_model->get_center(0, 'center', false)->num_rows();
        $ttlPendingCenters = $this->db->where([
            'isPending' => 1,
            'type' => 'center'
        ])->get('centers')->num_rows();
        $ttlCencelCenters = $this->center_model->get_center(0, 'center', 1)->num_rows();
        $ttlActiveCenters = $this->db->where([
            'status' => 1,
            'isDeleted' => 0,
            'isPending' => 0,
            'type' => 'center'
        ])->get('centers')->num_rows();
    }
    if ($isCenter)
        $this->db->where('center_id', $loginId);
    $ttlFees = $this->db->select('sum(payable_amount) as ttl_collection')->get('student_fee_transactions')->row('ttl_collection');
    ?>
    <div class="container">
        <div class="row ">
            <div class="col-xl-3 col-md-6 mb-4">
                <?= dash_box([
                    'color1' => '#000000',
                    'color2' => '#30026a',
                    'title' => 'Active Student(s)',
                    'count' => $approvedStudents - $passoutStudent,
                    'url' => 'student/approve-list',
                    'url_icon' => 'list',
                    'url_title' => 'View List',
                    'icon' => 'book'
                ]) ?>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <?= dash_box([
                    'color1' => '#112339',
                    'color2' => '#20c2e4',
                    'title' => 'Passout Student(S)',
                    'count' => $passoutStudent,
                    'url' => 'student/passout-student-list',
                    'url_icon' => 'list',
                    'url_title' => 'View List',
                    'icon' => 'users'
                ]) ?>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <?= dash_box([
                    'color1' => '#0a504a',
                    'color2' => '#38ef7d',
                    'title' => 'Course Category',
                    'count' => $courseCategory,
                    'url' => 'course/category',
                    'url_icon' => 'eye',
                    'url_title' => 'Manage Category',
                    'icon' => 'book'
                ]) ?>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <?= dash_box([
                    'color1' => '#493240',
                    'color2' => '#f09',
                    'title' => 'Course(S)',
                    'count' => $ttl_courses,
                    'url' => 'course/manage',
                    'url_icon' => 'eye',
                    'url_title' => 'Manage Course',
                    'icon' => 'book'
                ]) ?>
            </div>







            <div class="col-xl-3 col-md-6 mb-4">
                <?= dash_box([
                    'color1' => '#373b44',
                    'color2' => '#4286f4',
                    'title' => 'Admission(S)',
                    'count' => $allStudents,
                    'url' => 'student/search',
                    'url_icon' => 'search',
                    'url_title' => 'Search Student',
                    'icon' => 'users'
                ]) ?>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
                <?= dash_box([
                    'color1' => '#a86008',
                    'color2' => '#ffba56',
                    'title' => 'Approved Admission(S)',
                    'count' => $approvedStudents,
                    'url' => 'student/approve-list',
                    'url_icon' => 'eye',
                    'url_title' => 'View List',
                    'icon' => 'users'
                ]) ?>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
                <?= dash_box([
                    'color1' => '#f70c0c',
                    'color2' => '#e4a520',
                    'title' => 'Pending Admission(S)',
                    'count' => $pendingStudents,
                    'url' => 'student/pending-list',
                    'url_icon' => 'eye',
                    'url_title' => 'View List',
                    'icon' => 'users'
                ]) ?>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <?= dash_box([
                    'color1' => '#493240',
                    'color2' => '#e420e4',
                    'title' => 'Cancel Admission(S)',
                    'count' => $cancelStudents,
                    'url' => 'student/cencel-list',
                    'url_icon' => 'eye',
                    'url_title' => 'View List',
                    'icon' => 'users'
                ]) ?>
            </div>




            <div class="col-xl-3 col-md-6 mb-4">
                <?= dash_box([
                    'color1' => '#493240',
                    'color2' => '#e4205a',
                    'title' => 'Admit Card Generate',
                    'count' => $ttlAmitCards,
                    'url' => 'student/generate-admit-card',
                    'url_icon' => 'plus',
                    'url_title' => 'Generate Admit Card',
                    'icon' => 'table-o'
                ]) ?>
            </div>



            <div class="col-xl-3 col-md-6 mb-4">
                <?= dash_box([
                    'color1' => '#371d0c',
                    'color2' => '#a45017',
                    'title' => 'Result Generate',
                    'count' => $ttlResults,
                    'url' => 'student/create-marksheet',
                    'url_icon' => 'plus',
                    'url_title' => 'Create Marksheet',
                    'icon' => 'table'
                ]) ?>
            </div>



            <div class="col-xl-3 col-md-6 mb-4">
                <?= dash_box([
                    'color1' => '#46560e',
                    'color2' => '#9dc31a',
                    'title' => 'ID Card Generate',
                    'count' => $ttlIDCards,
                    'url' => 'student/get-id-card',
                    'url_icon' => 'eye',
                    'url_title' => 'Get ID Card',
                    'icon' => 'credit-card'
                ]) ?>
            </div>


            <?php
            if ($this->center_model->isAdmin()) {
                ?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <?= dash_box([
                        'color1' => '#0d0a37',
                        'color2' => '#646464',
                        'title' => 'Total Centre(S)',
                        'count' => $ttlCentres,
                        'url' => 'center/list',
                        'url_icon' => 'eye',
                        'url_title' => 'View',
                        'icon' => 'users'
                    ]) ?>
                </div>


                <div class="col-xl-3 col-md-6 mb-4">
                    <?= dash_box([
                        'color1' => '#313c12',
                        'color2' => '#20e4d8',
                        'title' => 'Total Pending Centre(S)',
                        'count' => $ttlPendingCenters,
                        'url' => 'center/pending-list',
                        'url_icon' => 'eye',
                        'url_title' => 'View',
                        'icon' => 'users'
                    ]) ?>
                </div>


                <div class="col-xl-3 col-md-6 mb-4">
                    <?= dash_box([
                        'color1' => '#650021',
                        'color2' => '#066146',
                        'title' => 'Total Approved Centre(S)',
                        'count' => $ttlActiveCenters,
                        'url' => 'center/list',
                        'url_icon' => 'eye',
                        'url_title' => 'View',
                        'icon' => 'users'
                    ]) ?>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <?= dash_box([
                        'color1' => '#ff1515',
                        'color2' => '#240d0d',
                        'title' => 'Total Deleted Centre(S)',
                        'count' => $ttlCencelCenters,
                        'url' => 'center/deleted-list',
                        'url_icon' => 'eye',
                        'url_title' => 'View',
                        'icon' => 'users'
                    ]) ?>
                </div>
                <?php
            }
            if($this->ki_theme->isValidMenu('fees_collection')){
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <?= dash_box([
                    'color1' => '#050746',
                    'color2' => '#2027e4',
                    'title' => 'Fee Collection(S)',
                    'count_icon' => true,
                    'count' => $ttlFees,
                    'url' => 'student/collect-student-fees',
                    'url_icon' => 'bank',
                    'url_title' => 'Collect Fee',
                    'icon' => 'bank'
                ]) ?>
            </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="card card-bordered">
        <div class="card-header">
            <h3 class="card-title">Student Record Chart</h3>
            <div class="card-toolbar">
                <select class="form-select fetch-record form-control-solid" data-placeholder="Select an option"
                    data-hide-search="true">
                    <?php
                    $year = 2020;
                    $current_year = date('Y');
                    while ($year <= $current_year) {
                        echo '<option value="' . $year . '" ' . ($year == $current_year ? 'selected' : '') . '>' . $year . '</option>';
                        $year++;
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="card-body">
            <div id="kt_apexcharts_3" style="height: 350px;"></div>
        </div>
    </div>
    <?php
} else {
    if ($this->center_model->isCoordinator()) {
        // echo $owner_id;
        $commision = $this->db->select("SUM(CASE WHEN status = 0 THEN commission ELSE 0 END) AS ttlPendingCommision, SUM(CASE WHEN status = 1 THEN commission ELSE 0 END) AS ttlCommision")->where([
            'user_id' => $owner_id,
            'user_type' => 'co_ordinator'
        ])->get('commissions');
        $totalCommision = $commision->row('ttlCommision');
        $totalPCommision = $commision->row('ttlPendingCommision');
        ?>
        <div class="container">
            <div class="row ">
                <div class="col-xl-3 col-md-6 mb-4">
                    <?= dash_box([
                        'color1' => '#000000',
                        'color2' => '#30026a',
                        'title' => 'Total Commision',
                        'count' => $totalCommision,
                        'url' => 'co-ordinate/list-commission',
                        'url_icon' => 'eye',
                        'url_title' => 'View List',
                        'icon' => 'rupee'
                    ]) ?>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <?= dash_box([
                        'color1' => '#ff1515',
                        'color2' => '#240d0d',
                        'title' => 'Total Pending Commission',
                        'count' => $totalPCommision,
                        'url' => 'co-ordinate/list-commission',
                        'url_icon' => 'eye',
                        'url_title' => 'View',
                        'icon' => 'rupee'
                    ]) ?>
                </div>
            </div>
        </div>
        <?php
    }
}
?>