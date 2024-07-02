<style>
    .parent {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 10px;
    }

    .child {
        background-color: #fff;
    }

    @media (max-width: 600px) {
        .parent {
            grid-template-columns: repeat(auto-fit, minmax(100%, 1fr));
            width: 100%;
            padding: 10px
        }

        .child,.child a {
            width: 100%;
        }
    }
</style>
<section class="sec_padd">
    <div class="">
        <div class="row" style="flex-direction:column">
            <div class="buttons-usefull parent" align="center">

                <?php
                $our_counters = [
                    'first_usefull_button' => 'First Button',
                    'second_usefull_button' => 'Second Button',
                    'third_usefull_button' => 'Third Button',
                    'forth_usefull_button' => 'Forth Button',
                    'fifth_usefull_button' => 'Fifth Button',
                ];
                foreach ($our_counters as $index => $counter) {
                    $title = $this->SiteModel->get_setting($index . '_text', $counter);
                    $value = $this->SiteModel->get_setting($index . '_value');
                    if (empty($value)) {
                        continue;
                    }
                    echo '<div class="child">
                        <a href="' . $value . '" class="btn theme-btn theme-back"><i class="fa fa-arrow-up"></i> &nbsp;' . $title . '</a>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
</section>