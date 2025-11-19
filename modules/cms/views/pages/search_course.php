<style>
    .select {
        position: relative;
        display: flex;
        width: 100%;
        height: 3em;
        line-height: 3;
        background: white;
        overflow: hidden;
        border-radius: .25em;
        border: 1px solid #2c4b90;
    }

    .form-control {
        background-color: transparent;
        border-radius: 0;
        box-shadow: none;
        color: #323232;
        padding-left: 20px;
        padding-right: 20px;
        padding-top: 6px;
        padding-bottom: 6px;
        font-size: 16px;
        line-height: 30px;
        font-weight: 400;
        border: 1px solid #d6d6d6;
    }

    .select::after {
        content: '\25BC';
        position: absolute;
        top: 0;
        right: 0;
        padding: 0 1em;
        background: rgba(255, 146, 47,1);
        cursor: pointer;
        pointer-events: none;
        -webkit-transition: .25s all ease;
        -o-transition: .25s all ease;
        transition: .25s all ease;
        color: white
    }

    .content_line {
        margin-top: 12px;
        width: 400px;
        height: 5px;
        margin-bottom: 12px;
        transform: scale(1, 1);
        visibility: visible;
        background-color: rgba(255, 146, 47,1) !important;
    }

    .course_finder p {
        color: white;
    }

    .course_finder h2 {
        color: rgba(255, 146, 47,1);
        font-size: 34px;
        font-weight: 900;
    }
    .course_finder .btn-outline-success{
        background:rgba(255, 146, 47,1);
        border-color:rgba(255, 146, 47,1);
    }
    .course_finder .btn-outline-success:hover{
        background: ;
    }
</style>
<?php
$enrtyCourseType = $this->SiteModel->get_contents('course_type');
?>
<section class="course_finder" style="background-color: #173885;">
    <div class="container">
        <div class="col-md-12 text-center">

            <h2><?= ES('search_course_page_title', 'You Can Choose Where To Get Education') ?></h2>
            <p><?= ES('search_course_page_description', 'Whatever You Are, Be A Good One') ?></p>
            <center>
                <div class="content_line"></div>
            </center>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="select">
                        <select class="form-control ng-pristine ng-untouched ng-valid ng-empty category-select">
                            <option value="" style="color: black; background: white;" class="" selected="selected">
                                --Select Category--</option>
                            <?php
                            $get = $this->db->get('course_category');
                            if ($get->num_rows()) {
                                foreach ($get->result() as $row) {
                                    echo '<option value="' . $row->id . '"  label="' . $row->title . '">' . $row->title . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="select">
                        <select class="form-control ng-pristine ng-untouched ng-valid ng-empty course-type-select">
                            <option value="" style="color: black; background: white;" class="" selected="selected">
                                --Course Type--</option>
                            <?php
                            foreach ($enrtyCourseType->result() as $rr) {
                                echo '<option value="' . $rr->id . '">' . $rr->field1 . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="select">
                        <select class="form-control ng-pristine ng-untouched ng-valid ng-empty course-select">
                            <option value="">--Select Courses--</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-1 text-center">
                    <center>
                        <div class="btn-wrapper btn-wrapper2">
                            <button class="btn btn-outline-success search-my-course" type="submit"><span><i
                                        class="fa fa-search"></i>
                                    Go</span></button>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <br/>
</section>
<script>
    $('.category-select,.course-type-select').on('change', function () {

        var type_id = $('.course-type-select').val();
        var cat_id = $('.category-select').val();
        if (type_id == '') {
            SwalWarning('Please Course Type');
            return;
        }
        if (cat_id == '') {
            SwalWarning('Please Course Category');
            return;
        }
        $('.course-select').html('<option value="">--Select Courses--</option>');
        $.AryaAjax({
            url: 'website/sct_ebook_method',
            data: { type_id: type_id, cat_id: cat_id, type: 'fetch-course' },
            loading_message: 'Fetching Course type..'
        }).then((res) => {
            log(res)
            $('.course-select').html(res.html);
        });
    })
    $('.search-my-course').on('click', function (e) {
        e.preventDefault();
        var id = $('.course-select').val();
        var type_id = $('.course-type-select').val();
        var cat_id = $('.category-select').val();
        if (type_id == '') {
            SwalWarning('Please Course Type');
            return;
        }
        if (cat_id == '') {
            SwalWarning('Please Course Category');
            return;
        }
        if (id == '') {
            SwalWarning('Please Select Course');
            return;
        }
        if (id) {
            window.open(`course-details/${id}`, '_blank');
        }

    })
</script>