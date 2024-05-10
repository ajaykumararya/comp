<style>
    .parent {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 10px;
}

.child {
  background-color: #fff;
}
</style>
<section class="sec_padd">
    <div class="container">
        <div class="row">
            <div class="buttons-usefull parent">

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
                        <a href="' . $value . '" class="btn btn-danger">' . $title . '</a>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
</section>