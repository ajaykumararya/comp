<section class="section__center">
    <div class="container">
        <div class="row">
            <?php
            for ($i = 1; $i <= 3; $i++):
                $theme = ES('button_'.$i.'_theme');
                ?>
                <div class="col-lg-4">
                    <a href="<?=ES('button_'.$i.'_link')?>" class="grid__center_col <?=$theme?>">
                        <div class="center_icon">
                            <i class="<?=ES('button_'.$i.'_icon')?>"></i>
                        </div>
                        <div class="center_contet">
                            <h4><?=ES('button_'.$i.'_title')?></h4>
                        </div>
                    </a>
                </div>
                <?php
            endfor;
            ?>
        </div>
    </div>
</section>