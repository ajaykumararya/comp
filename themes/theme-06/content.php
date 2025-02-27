<section class="page-content" <?=$isPrimary ? 'style="margin-top:0"' : ''?>>
    <div class="container" style="width:100%">
        <div class="row">
            <?php
            if (strlen($content)) {
                ?>

                <div class="col-lg-12">
                    <div class="new-box">
                        <?php
                        if (!$isPrimary):
                            ?>
                            <div class="page-main-heading">
                                <h2 class="heading"><span style="">{page_name}</span></h2>
                            </div>
                            <?php
                        endif;
                        ?>
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