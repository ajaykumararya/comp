<?php
$this->load->model("ebook/ebook_model");
if ($this->input->get('project') && $this->input->get('cat')) {
    $this->load->library("ebook/ebook_cart");

    $get = $this->ebook_model->get_project([
        'slug' => $this->input->get('project')
    ]);
    if ($get->num_rows() > 0) {
        $row = $get->row();
        ?>
        <style>
            .ProjectReport_block__rerWI {
                background-color: #fff;
                padding: 20px;
                box-shadow: 0 0 13px 0 black;
                border-radius: 5px;
                margin-bottom: 10px;
            }
        </style>
        <div class="row">
            <div class="col-md-12">
                <div class="ProjectReport_block__rerWI mb-4 shadow-lg">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{base_url}upload/<?= $row->image ?>" alt="<?= $row->project_name ?>"
                                class="img-fluid w-100 border rounded-3">
                        </div>
                        <div class="col-md-9">
                            <h3 style="font-weight:900" class=""><?= $row->project_name ?></h3>
                            <span class=" text-secondary mt-1"><span class="text-dark">Project
                                    Value:</span> Rs. <?= $row->project_value ?></span>
                            <div class="row mt-md-5 mt-3 align-items-center">
                                <div class="col-md-8">
                                    <h3 class="price"><span>₹</span><?= $row->price ?></h3>
                                </div>
                                <div class="ProjectReport_block_end__bzHvg col-md-4">
                                    <?php
                                    if ($this->ebook_cart->item_exists($row->id)):
                                        echo '                            
                                        <button class="btn btn btn-outline-success" data-slug="project-name" disabled="">
                                            <span><i class="fa fa-shopping-cart"></i>Added</span>
                                        </button>';
                                    else:
                                        echo '<button class="btn btn btn-outline-success btn-addtocart hvr-wobble-top" data-slug="<?=$row->slug?>">
                                                <span><i class="fa fa-shopping-cart"></i> Add To Cart</span>
                                            </button>';
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <h2 class="fw-bold">Project Overview</h2>
                        <p class="text-justify">
                            <?= $row->description ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('html, body').animate({
                    scrollTop: $('.ProjectReport_block__rerWI').offset().top - 100
                }, 4000);
                return;
            });
        </script>
        <?php
    } else {
        echo $this->parser->parse('default_error_404', ['page_name' => 'Project Not Found.', 'title' => 'Project Not Found..'], true);
    }
} else {
    ?>

    <style>
        .box-project {
            box-shadow: 0 0 24px 0 lightgray;
            border-radius: 10px;
            transition: .3s
        }

        .box-project:hover {
            box-shadow: 0 0 24px 0 gray;
            transition: .3s
        }

        .box-project .card-title {
            font-weight: 900;
            font-size: 28px;
        }

        .box-project .project-value {}

        .box-project .description {
            line-height: 1;
        }

        .btn-addtocart {
            margin-right: 9px;
        }

        .btn-project-view {
            border: 2px dotted black;
            transition: .3s;
            color: black;
            background-color: white;
        }

        .btn-project-view:hover {
            background-color: black;
            color: white;
            transition: .3s;
        }

        .price {
            margin-top: 9px !important;
            font-weight: 900 !important;
        }

        @media (min-width: 992px) {
            .counter-result {
                line-height: 6.5;
                font-size: 15px;
            }
        }

        .project-image {
            width: 100%;
            height: 240px !important;
        }
    </style>
    <div class="row" id="ebook-section">
        <!-- Sidebar -->
        <div class="col-md-3 bg-light p-3">
            <div class="panel panel-theme">
                <div class="panel-heading">
                    <h3 class="panel-title text-white">See All Project Reports</h3>
                </div>
                <div class="panel-body">
                    <div class="list-group list-project-category">
                        <?php
                        $get = $this->ebook_model->category();
                        if ($get->num_rows() > 0) {
                            foreach ($get->result() as $row) {
                                $class = '';
                                if (isset($_GET['cat'])) {
                                    $class = $_GET['cat'] == $row->slug ? 'active' : '';
                                }
                                echo '<a href="" class="list-group-item list-group-item-action action-cat ' . $class . '" data-slug="' . $row->slug . '">' . $row->category_name . '</a>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center p-3">
                <div class="col-md-3">
                    <span class="counter-result">Total <span class="project-count">0</span> records found</span>

                </div>
                <div class="col-md-9">
                    <form id="search-project-form" class="newsletter-form mb-10" novalidate="true">
                        <label for="mce-EMAIL"></label>
                        <div class="input-group">
                            <input type="text" project-property class="form-control input-lg" placeholder="Search"
                                name="search" style="height: 45px;border:1px solid black">
                            <span class="input-group-btn">
                                <button type="submit" project-property class="btn btn-colored btn-dark btn-lg m-0"
                                    data-height="45px" style="height: 45px;"><i class="fa fa-search"></i> Search</button>
                            </span>
                        </div>
                    </form>
                </div>

            </div>

            <!-- Project Cards -->
            <div class="row">
                <div class="preloader-fountainTextG loader" style="display: none;">
                    <div id="fountainTextG_1" class="fountainTextG">L</div>
                    <div id="fountainTextG_2" class="fountainTextG">o</div>
                    <div id="fountainTextG_3" class="fountainTextG">a</div>
                    <div id="fountainTextG_4" class="fountainTextG">d</div>
                    <div id="fountainTextG_5" class="fountainTextG">i</div>
                    <div id="fountainTextG_6" class="fountainTextG">n</div>
                    <div id="fountainTextG_7" class="fountainTextG">g</div>
                </div>
                <div class="col-md-12" id="print-projects">

                </div>
                <div class="col-md-12">
                    <nav>
                        <ul class="pagination theme-colored" id="ebook-pagination">
                            <!-- Ebook- buttons will be added dynamically -->
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>
    <?php
}
?>