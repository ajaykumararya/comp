<style>
    .myy::before{
        content: '';
        position: absolute;
        top: 0;
        left:0;
        background:var(--primary-color);
        height:100%;
        width:20%;
        z-index: -1
    }
    .heading{
        font-weight: 900;
        margin-bottom: 8px;
    }
</style>
<div class="container margin-tp-10 mb-30 our__courses">
    <div class="row">
        <div class="col-md-12">
            <div class="page-main-heading">
                <h2 class="heading"><span style=""><?= ES('course_page_title') ?></span></h2>
            </div>
        </div>
        <?php
        // echo $type;
        $data = $this->SiteModel->content_courses();
        if ($data->num_rows()):
            $index = 1;
            foreach ($data->result() as $row):
                $title = $row->title;

                echo '<div class="col-md-3 mb-20">
                            <div class="card" style="border:2px solid var(--secondary-color)">
                                <img class="card-img-top img-responsive" src="{base_url}upload/' . $row->image . '"
                                    alt="' . $title . '" style="height:200px">
                                <div class="card-body text-center" style="padding:0;position: relative;padding-top: 42px;">
                                    <h5 class="card-title myy" style="background: var(--secondary-color);margin: 0;color: white;padding: 9px;font-size: 15px;position: absolute;top: -21%;z-index: 9;width: 98%;border-radius: 0 2px 2px 0;">' . $title . '</h5>
                                    <div class="row" style="margin:10px 0;padding:0">
                                        <div class="col-md-6 col-xs-6">
                                            <b> <i class="fa fa-graduation-cap"></i> Eligibility</b>
                                            <div>'.$row->description.'</div>
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <b> <i class="fa fa-clock"></i> Duration</b>
                                            <div>'.$row->duration.'</div>
                                        </div>
                                        <div class="col-md-12 col-xs-12" style="margin-top:5px">
                                                <a href="' . $row->button_link . '" class="btn btn-success btn-sm pull-right"><i class="fa fa-arrow-right"></i> ' . $row->button_text . '</a>
                                        </div>                                    
                                    </div>
                                </div>
                            </div>
                        </div>';
            endforeach;
        endif;
        ?>
    </div>
</div>