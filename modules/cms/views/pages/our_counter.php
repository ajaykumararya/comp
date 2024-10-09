<div class="container cms-counter" style="padding-top:10px;padding-bottom:20px">
    <div class="row">
        <?php
        $our_counters = [
            'first_counter' => 'Certified Students',
            'secound_counter' => 'Courses',
            'third_counter' => 'Study Centers',
            'forth_counter' => 'Awarded Centers'
        ];
        $color = ['','blue','pink','puple'];
        $i = 0;
        foreach ($our_counters as $index => $counter) {
            $title = $this->SiteModel->get_setting($index . '_text', $counter);
            $value = $this->SiteModel->get_setting($index . '_value');
            $icon = $this->SiteModel->get_setting($index . '_icon');
            echo '
            <div class="col-md-3 col-sm-6">
                    <div class="counter '.$color[$i++].'">
                        <div class="counter-icon">
                            <i class="'.$icon.'"></i>
                        </div>
                        <span class="counter-value">'.$value.'</span>
                        <h3>'.$title.'</h3>
                    </div>
                </div>
            
            ';
        }
        ?>
    </div>
</div>
<style>
    .cms-counter .counter {
        color: #f27f21;
        text-align: center;
        height: 190px;
        width: 190px;
        padding: 30px 25px 25px;
        margin: 0 auto;
        border: 3px solid #f27f21;
        border-radius: 20px 20px;
        position: relative;
        z-index: 1;
    }

    .cms-counter .counter:before,
    .cms-counter .counter:after {
        content: "";
        background: #f3f3f3;
        border-radius: 20px;
        box-shadow: 4px 4px 2px rgba(0, 0, 0, 0.2);
        position: absolute;
        left: 15px;
        top: 15px;
        bottom: 15px;
        right: 15px;
        z-index: -1;
    }

    .cms-counter .counter:after {
        background: transparent;
        width: 100px;
        height: 100px;
        border: 15px solid #f27f21;
        border-top: none;
        border-right: none;
        border-radius: 0 0 0 20px;
        box-shadow: none;
        top: auto;
        left: -10px;
        bottom: -10px;
        right: auto;
    }

    .cms-counter .counter .counter-icon {
        font-size: 35px;
        line-height: 35px;
        margin: 0 0 15px;
        transition: all 0.3s ease 0s;
    }

    .cms-counter .counter:hover .counter-icon {
        transform: rotateY(360deg);
    }

    .cms-counter .counter .counter-value {
        color: #555;
        font-size: 30px;
        font-weight: 600;
        line-height: 20px;
        margin: 0 0 20px;
        display: block;
        transition: all 0.3s ease 0s;
    }

    .cms-counter .counter:hover .counter-value {
        text-shadow: 2px 2px 0 #d1d8e0;
    }

    .cms-counter .counter h3 {
        font-size: 17px;
        font-weight: 700;
        text-transform: uppercase;
        margin: 0 0 15px;
        line-height: 1;
    }

    .cms-counter .counter.blue {
        color: #4accdb;
        border-color: #4accdb;
    }

    .cms-counter .counter.blue:after {
        border-bottom-color: #4accdb;
        border-left-color: #4accdb;
    }

    .cms-counter .counter.pink {
        color: #EE436D;
        border-color: #EE436D;
    }

    .cms-counter .counter.pink:after {
        border-bottom-color: #EE436D;
        border-left-color: #EE436D;
    }

    .cms-counter .counter.purple {
        color: #9C52A1;
        border-color: #9C52A1;
    }

    .counter.purple:after {
        border-bottom-color: #9C52A1;
        border-left-color: #9C52A1;
    }

    @media screen and (max-width:990px) {
        .cms-counter .counter {
            margin-bottom: 40px;
        }
    }
</style>
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script> -->
<script>
    $(document).ready(function () {
        $('.cms-counter .counter-value').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 3500,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    });
</script>