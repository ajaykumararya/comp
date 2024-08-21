<section class="small_pb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="text-center animation animated fadeInUp" data-animation="fadeInUp"
                    data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                    <div class="heading_s1 text-center">
                        <h2 class="main-heading center-heading">{institute_course_list_title}</h2>
                    </div>

                    <div class="small_divider"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="box_shadow1 radius_all_10">
                    <div class="row no-gutters">
                        <div class="col-md-12 animation animated fadeInLeft" data-animation="fadeInLeft"
                            data-animation-delay="0.02s" style="animation-delay: 0.02s; opacity: 1;">
                            <div class="padding_third_all" style="padding:20px">
                                <?php
                                $cats = $this->db->get('course_category');
                                if ($cats->num_rows()) {
                                    ?>
                                    <center>

                                        <div class="form-group mb-3 col-md-4">
                                            <label for="" class="form-label">Filter With Category</label>
                                            <select data-control="select2" id="filter-with-cats" class="form-control">
                                                <option value="0">All</option>
                                                <?php
                                                foreach ($cats->result() as $cat):
                                                    echo '<option value="' . $cat->id . '">' . $cat->title . '</option>';
                                                endforeach;

                                                ?>
                                                <!-- <option value="22">DEmo</option> -->
                                            </select>
                                        </div>
                                    </center>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped w-100">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Category</th>
                                                    <th>Course Name</th>
                                                    <th>Duration</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($cats->result() as $cat):
                                                    $courses = $this->db->get_where('course', ['category_id' => $cat->id]);
                                                    if ($courses->num_rows()) {
                                                        $i = 1;
                                                        foreach ($courses->result() as $course):
                                                            echo '
                                                            <tr data-category_id="' . $cat->id . '">
                                                                <td>' . $i++ . '.</td>
                                                                <td>' . $cat->title . '</td>
                                                                <td>' . $course->course_name . '</td>
                                                                <td>' . $course->duration . ' ' . $course->duration_type . '</td>
                                                            </tr>
                                                        ';
                                                        endforeach;
                                                    }
                                                endforeach;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('#filter-with-cats').on('change', function () {
        var id = $(this).val();

        $('[data-category_id]').show();
        if (id != '0') {
            $('[data-category_id]').hide();
            $('[data-category_id="' + id + '"]').show(500);
        }
    })
</script>