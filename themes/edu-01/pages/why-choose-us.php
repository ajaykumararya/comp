<section class="why-choose padding-lg">
    <div class="container">
        <h2>
            <span><?= ES($type . '_description') ?></span>
            <?= ES($type . '_title') ?>
        </h2>
        <ul class="our-strength">
            <?php
            $our_counters = [
                'first_counter' => 'Certified Students',
                'secound_counter' => 'Courses',
                'third_counter' => 'Study Centers',
                'forth_counter' => 'Awarded Centers'
            ];
            foreach ($our_counters as $index => $counter) {
                $title = $this->SiteModel->get_setting($index . '_text', $counter);
                $value = $this->SiteModel->get_setting($index . '_value');
                $icon = $this->SiteModel->get_setting($index . '_icon');
                ?>
                <li>
                    <div class="icon"><span class="<?= $icon ?>"> </span></div>
                    <span class="counter"><?= $value ?></span>
                    <div class="title"><?= $title ?></div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</section>