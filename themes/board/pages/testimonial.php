<!-- About & Testimonials -->
<div class="container">
    <div class="row g-3">
        <div class="col-md-12 particles-bg">
            <div class="p-2">
                <h4 class="m-0 p-0 nceb-heading-primary">{testimonial_title}</h4>
                <p class="m-0">{testimonial_sub_title}</p>
            </div>
            <hr>

            <div class="glider-contain">
                <div class="glider" id="testimonials">
                    <?php
                    $get = (content('testimonial'));
                    if ($get->num_rows()) {
                        $i = 1;
                        foreach ($get->result() as $row) {
                            // pre($row);
                            ?>
                            <div class="p-2">
                                <div class="d-flex justify-content-center">
                                    <div class="card bg-white shadow-lg border-0 w-75">
                                        <div class="card-body text-center">
                                            <img src="{base_url}upload/<?=$row->field3?>" data-src="{base_url}upload/<?=$row->field3?>"
                                                class="rounded-circle img-fluid w-50 d-inline" width="50px"
                                                alt="{title} centerhead testomonial <?=$i++?>"><br>
                                            <small><?=$row->field2?></small>
                                        </div>
                                        <div class="card-footer bg-secondary text-white text-center">
                                            <small><?=$row->field1?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>

                </div>
            </div>

        </div>
    </div>
</div>