<?php
if (strlen($content)) {
    ?>
    <div class="container margin-tp-15">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <article class="blog-post format-blockquote WhiteSkin mosaic1">

                    <div class="post-content clearfix">

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h1 class="post-title">
                                    <a href="#" class="black"><strong>{page_name}</strong></a>
                                </h1>
                            </div>

                        </div>
                        <hr>
                        <div class="margin-tp-20">
                            {content}
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
    <?php
}
?>