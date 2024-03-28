<section id="courses_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="tabs">
                    <?php
                    $cats = $this->db->get('course_category');
                    $i = 0;
                    if ($cats->num_rows()) {
                        foreach ($cats->result() as $row) {
                            echo '<input type="radio" ' . (!$i ? 'checked' : '') . ' id="tab' . (++$i) . '" name="tab-control">';
                        }
                        $i = 0;
                        echo '<ul>';
                        foreach ($cats->result() as $row) {
                            echo '<li><label for="tab' . (++$i) . '" role="button"><span>' . $row->title . '</span></label></li>';
                        }

                        echo '</ul>
                    <div class="content">';
                        foreach ($cats->result() as $row) {
                            ?>
                            <section>
                                <!-- <h2>Courses We Offered</h2> -->
                                <div class="table-responsive">
                                    <table class="table table-bordered my-data-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Category</th>
                                                <th scope="col">Courses</th>
                                                <th scope="col">Duration</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $courses = $this->db->get_where('course', ['category_id' => $row->id]);
                                            if ($courses->num_rows()) {
                                                $i = 1;
                                                foreach ($courses->result() as $course):
                                                    echo '
                                                            <tr data-category_id="' . $row->id . '">
                                                                <td>' . $row->title . '</td>
                                                                <td>' . $course->course_name . '</td>
                                                                <td>' . $course->duration . ' ' . $course->duration_type . '</td>
                                                            </tr>
                                                        ';
                                                endforeach;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                            <?php
                        }

                        echo '</div>';
                    }
                    ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="login-box">
                    <h2>ENQUIRE NOW</h2>
                    <form id="submitGETINTOUCH">
                        <input type="hidden" name="type" value="get_in_touch">

                        <div class="user-box">
                            <input required="required" id="first-name" name="name" type="text">
                            <label for="">Enter Name</label>
                        </div>
                        <div class="user-box">
                            <input required="required" id="email" name="email" type="email">
                            <label for="">Enter Email</label>
                        </div>
                        <div class="user-box">
                            <input required="required" id="phone" name="mobile" type="tel">
                            <label for="">Mobile</label>
                        </div>
                        <div class="user-box">
                            <input required id="subject" name="subject" type="text">
                            <label for="">Subject</label>
                        </div>
                        <div class="user-box">
                            <textarea required="required" id="description" name="message" rows="3"></textarea>
                            <label for="">Message</label>
                        </div>
                        <div class="col-lg-12 btn-wrapper btn-wrapper2">
                            <button type="submit" title="Submit Your Message!" class="btn btn-default" id="submitButton"
                                name="submit" value="Submit">
                                <span>Submit</span>
                            </button>
                        </div>
                        <div class="col-lg-12 text-center">
                            <div id="alert-msg" class="alert-msg text-center"></div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</section>