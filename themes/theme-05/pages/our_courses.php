<div class="container margin-tp-10 mb-30 our__courses">
    <div class="row">
        <div class="col-md-12">
            <div class="headline clearfix"><span class="slider-tb"><strong><?= ES('course_page_title') ?></strong></span></div>
        </div>
        <?php
        // echo $type;
        $data = $this->SiteModel->content_courses();
        if ($data->num_rows()):
            $index = 1;
            foreach ($data->result() as $row):
                $title = $row->title;
                
                echo '<div class="col-md-3 mb-20">
                            <div class="card">
                                <img class="card-img-top img-responsive" src="{base_url}upload/'.$row->image.'"
                                    alt="'.$title.'" style="height:200px">
                                <div class="card-body text-center">
                                    <h5 class="card-title">'.$title.'</h5>
                                    <br>
                                    <a href="'.$row->button_link.'" class="btn btn-primary btn-sm">'.$row->button_text.'</a>
                                </div>
                            </div>
                        </div>';
            endforeach;
        endif;
        ?>      
    </div>
</div>