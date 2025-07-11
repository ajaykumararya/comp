<!-- Verification, News & Stats Section-->
<br>
<div class="container ">
    <div class="row g-3">
        <div class="col-md-4 ">
            <div class="card bg-white shadow-sm border-0 rounded-0 w-100">
                <div class="card-body p-4">
                    <form method="GET" action="" class="center-board-verification">
                        <h6 class="nceb-heading-primary">CENTER VERIFICATION</h6>
                        <div class="input-group">
                            <input name="center_id" type="text" class="form-control" placeholder="Enter Center ID"
                                aria-label="Enter Center ID" aria-describedby="cv-button">
                            <button class="btn btn-primary" type="submit" id="cv-button">SUBMIT</button>
                        </div>
                        <strong class="text-danger message"></strong>
                    </form>
                </div>
            </div>

            <div class="card bg-white shadow-sm border-0 rounded-0 w-100">
                <div class="card-body p-4">
                    <form method="GET" action="" class="student-board-verification">
                        <h6 class="nceb-heading-primary">STUDENT VERIFICATION</h6>
                        <div class="input-group">
                            <input name="roll_no" type="text" class="form-control"
                                placeholder="Enter Student {rollno_text}" aria-label="Enter Student ID"
                                aria-describedby="sv-button">

                            <button class="btn btn-primary" type="submit" id="sv-button">SUBMIT</button>
                        </div>
                        <strong class="text-danger message"></strong>
                    </form>
                </div>
            </div>

            <div class="card bg-white shadow-sm border-0 rounded-0 w-100">
                <div class="card-body p-4">
                    <form method="GET" action="" class="certification-board-verification">
                        <h6 class="nceb-heading-primary">CERTIFICATE VERIFICATION</h6>
                        <div class="input-group">
                            <input name="roll_no" type="text" class="form-control"
                                placeholder="Enter Student {rollno_text}" aria-label="Enter Student ID"
                                aria-describedby="sv-button">

                            <button class="btn btn-primary" type="submit" id="sv-button">SUBMIT</button>
                        </div>
                        <strong class="text-danger message"></strong>
                    </form>
                </div>
            </div>




        </div>

        <div class="col-md-4 d-flex flex-fill">
            <div class="card bg-white shadow-sm border-0 rounded-0 w-100 overflow-hidden" id="news-card">
                <div class="card-header bg-secondary text-white rounded-0 p-3">
                    <h6 class="nceb-heading-warning m-0 p-0"><?= ES('latest_news_section_title') ?></h6>
                </div>
                <div class="card-body">
                    <ul id="news-container" class="list-unstyled overflow-hidden">
                        <?php
                        $data = $this->SiteModel->get_contents('verification-and-news-and-stats-section');
                        if ($data->num_rows()):
                            $index = 1;
                            foreach ($data->result() as $row) {
                                echo '<li>' . $row->field1 . '</li>';
                            }
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4 d-flex flex-fill" id="counter">
            <div class="card bg-white shadow-sm border-0 rounded-0 w-100">
                <div class="card-body">
                    <?php
                    $our_counters = [
                        'first_counter' => 'Certified Students',
                        'secound_counter' => 'Courses',
                        'third_counter' => 'Study Centers',
                        // 'forth_counter' => 'Awarded Centers'
                    ];
                    $color = ['', 'blue', 'pink', 'puple'];
                    $i = 0;
                    foreach ($our_counters as $index => $counter) {
                        $title = $this->SiteModel->get_setting($index . '_text', $counter);
                        $value = $this->SiteModel->get_setting($index . '_value', 0);
                        $icon = $this->SiteModel->get_setting($index . '_icon');
                        preg_match_all('/\d+/', $value, $matches);

                        $numbers = $matches[0];
                        $counter = '';
                        $plus_sign = $value;
                        if ($numbers) {
                            $counter = $numbers[0];
                            $plus_sign = str_replace($counter, '', $plus_sign);
                        }
                        ?>
                        <div class="d-flex justify-content-between">
                            <div class="stat-icon py-2 px-3">
                                <span class="display-3 m-0 p-0"><i class="<?= $icon ?>"></i></span>
                            </div>
                            <div class="stat-data text-center p-2">
                                <h6 class="nceb-heading-primary"><?= $title ?></h6>
                                <h2><span class="counter-value" data-target="<?= $counter ?>"
                                        data-speed="300">0</span><?= $plus_sign ?></h2>
                            </div>
                        </div>
                        <?php
                        $i++;
                        if (sizeof($our_counters) > $i) {
                            echo '<hr class="opacity-25">';
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.center-board-verification').on('submit', function (r) {
        r.preventDefault();
        var form = $(this);
        var btn = form.find('button');
        var btnHtml = btn.html();
        var message = form.find('.message');
        btn.html('Please Wait...').prop('disabled', true);
        message.html('');
        $.AryaAjax({
            loading_message: false,
            url: 'website/center-board-verification',
            data: new FormData(this)
        }).then((res) => {
            if (res.status) {
                form[0].reset();
                message.html('');
                window.open(res.link, '_blank');
            }
            else
                message.html(res.html);
            btn.html(btnHtml).prop('disabled', false)
        });
    })
    $('.certification-board-verification').on('submit', function (r) {
        r.preventDefault();
        var form = $(this);
        var btn = form.find('button');
        var btnHtml = btn.html();
        var message = form.find('.message');
        btn.html('Please Wait...').prop('disabled', true);
        $.AryaAjax({
            loading_message: false,
            url: 'website/certificate',
            data: new FormData(this)
        }).then((res) => {
            if (res.status) {
                form[0].reset();
                message.html('');
                window.open(res.url, '_blank');
            } else {
                message.html(res.error);
            }
            btn.html(btnHtml).prop('disabled', false)
        });
    })
    $('.student-board-verification').on('submit', function (r) {
        r.preventDefault();
        var form = $(this);
        var btn = form.find('button');
        var btnHtml = btn.html();
        var message = form.find('.message');
        btn.html('Please Wait...').prop('disabled', true);
        message.html('');
        $.AryaAjax({
            loading_message: false,
            url: 'website/student-board-verification',
            data: new FormData(this)
        }).then((res) => {
            if (res.status) {
                form[0].reset();
                message.html('');
                const modalHtml = `
                            <div class="modal fade" id="myTempModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">Student Vertification</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    ${res.html}
                                    </div>
                                </div>
                                </div>
                            </div>
                            `;

                // Remove if already exists
                $('#myTempModal').remove();

                // Append to body and show
                $('body').append(modalHtml);
                const modal = new bootstrap.Modal(document.getElementById('myTempModal'));
                modal.show();
            }
            else
                message.html(res.html);
            btn.html(btnHtml).prop('disabled', false)
        });
    })

</script>
<br>
<br>