<section class="page-content">
    <div class="container">
        <div class="row">
            <?php
            if (strlen($content)) {
                ?>

                <div class="col-lg-12">
                    <div class="new-box">
                        <div class="page-main-heading">
                            <h2 class="heading"><span style="">{page_name}</span></h2>
                        </div>
                        <div class="box">
                            {content}
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
    </div>
    </div>
</section>