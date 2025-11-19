<?php
if($isPrimary){
?>

<style>
    .img-fullwidth{
        border-radius: 7px 7px 0 0;
    }
     .myy::before{
        content: '';
        position: absolute;
        top: 0;
        left:0;
        background:var(--secondary-color);
        height:100%;
        width:20%;
        z-index: -1
    }
</style>
<!-- Section: Courses -->
<section id="courses" class="bg-silver-deep">
    <div class="container pb-40">
        <div class="section-title">
            <div class="row">
                <div class="col-md-12">
                    <!-- about_us_page_title
                about_us_page_description -->
                    <h2 class="text-uppercase title">
                        <?= (ES('popular_course_page_title')) ?>
                    </h2>
                    <p class="text-uppercase mb-0"><?= ES('popular_course_page_description') ?></p>
                    <div class="double-line-bottom-theme-colored-2"></div>
                </div>
            </div>
        </div>
        <div class="row mtli-row-clearfix">
            <div class="owl-carousel-3col" data-nav="true">
                <?php
                $data = $this->SiteModel->get_contents($type);
                if ($data->num_rows()):
                    foreach ($data->result() as $row):
                        $title = $row->field2;
                        $description = strip_tags($row->field3);
                        $duration = $row->field4;
                        $el = $row->field5;
                        $link = $row->field9 == null 
                                                ? 'course-details/'.$this->token->encode(['prod_id' => $row->id])
                                                : 'course-details/'.$row->field9;

                echo '<div class="col-md-3 mb-20">
                            
                            <a href="{base_url}'.$link.'">
                            <div class="card" style="border:2px solid var(--primary-color)">
                                <img class="card-img-top img-responsive" src="{base_url}upload/' . $row->field1 . '"
                                    alt="' . $title . '" style="height:200px">
                                <div class="card-body text-center" style="padding:0;position: relative;padding-top: 15px;">
                                    <h5 class="card-title myy" style="background: var(--primary-color);margin: 0;color: white;padding: 9px;font-size: 15px;position: absolute;top: -21%;z-index: 9;width: 98%;border-radius: 0 2px 2px 0;">' . $title . '</h5>
                                    <div class="row" style="margin:10px 0;padding:0">
                                        <div class="col-md-12 col-xs-12">
                                            <p class="course-description mt-20">
                                                '.shortText($description,75).'
                                            </p>
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <b> <i class="fa fa-graduation-cap"></i> Eligibility</b>
                                            <div>'.$el.'</div>
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <b> <i class="fa fa-clock"></i> Duration</b>
                                            <div>'.$duration.'</div>
                                        </div>
                                      ';
                                        
                                        if ($row->field6) {
                                            echo '
                                                <div class="col-md-12 col-xs-12" style="margin-top:5px">
                                                    <a href="' . $link . '" class="btn btn-warning btn-sm pull-right" ><i class="fa fa-arrow-right"></i> Apply Now</a>
                                                </div> ';
                                        }
                                        echo '
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>';
                        ?>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<?php
}
else{
    ?>

  <style>

    .course-section {
      /*display: grid;*/
      /*grid-template-columns: 3fr 1fr;*/
      /*gap: 20px;*/
    }

    /* Filters box */
    .filters {
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .filters h4 {
      margin: 0 0 10px;
      border-left: 4px solid #8B0000;
      padding-left: 8px;
      font-size: 16px;
      color: #222;
    }

    .filters label {
      display: flex;
      align-items: center;
      margin: 8px 0;
      font-size: 14px;
    }

    .filters input {
      margin-right: 8px;
    }

    .filter-btn {
      display: block;
      width: 100%;
      margin-top: 15px;
      padding: 10px;
      background: #8B0000;
      color: #fff;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
    }

    /* Course cards */
    .course-list {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 20px;
    }

    .course-card {
      background: #fff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      transition: transform 0.2s;
    }

    .course-card:hover {
      transform: translateY(-5px);
    }

    .course-img {
      position: relative;
      height: 160px;
      overflow: hidden;
    }

    .course-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .badge {
      position: absolute;
      top: 10px;
      left: 10px;
      padding: 4px 8px;
      font-size: 12px;
      font-weight: bold;
      color: #fff;
      border-radius: 6px;
    }

    .badge.red { background: #B22222; }
    .badge.yellow { background: #FFA500; }

    .course-body {
      padding: 15px;
    }

    .instructor {
      display: flex;
      align-items: center;
      margin-bottom: 8px;
    }

    .instructor img {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      margin-right: 8px;
    }

    .course-body h3 {
      font-size: 16px;
      margin: 5px 0;
      font-weight: bold;
      color: #111;
    }

    .course-body a {
      font-size: 13px;
      color: #0066cc;
      text-decoration: none;
    }

    .rating {
      margin: 8px 0;
      font-size: 14px;
      color: #FFD700;
    }

    .rating span {
      background: #B22222;
      color: #fff;
      font-size: 12px;
      padding: 2px 6px;
      border-radius: 4px;
      margin-left: 6px;
    }

    .course-meta {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
      font-size: 13px;
      color: #444;
    }

    .course-price {
      margin-top: 10px;
      font-size: 15px;
      font-weight: bold;
      color: #B22222;
    }
    .pagination {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      padding: 10px 20px;
      background: #fff;
      border-radius: 50px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }
    
    .page-btn {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      border: 1px solid transparent;
      background: transparent;
      color: #555;
      font-size: 14px;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    
    /*.page-btn:hover {*/
    /*  background: #f3f3f3;*/
    /*}*/
    
    .page-btn.active,
    .page-btn:not(:disabled):hover,
    .page-btn:not(:disabled):hover{
      background: #b10000;   /* red filled circle */
      color: #fff;
      font-weight: bold;
    }
    
    .page-btn.prev,
    .page-btn.next {
      border: 1px solid #d8d8d8;
      background: #fff;
      color: #999;
    }
    
    .page-btn.prev:disabled,
    .page-btn.next:disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }
    .page-btn.next{
        border:1px solid #b10000;
    }
    #course-loader{
      width:100%;
      height:0;
      display:flex;
      align-items:center;
      justify-content:center;
      background-color:#f4f2ee;
      /*display:none;*/
    }
    .loading-bar1 {
      width: 130px;
      height: 5px;
      margin: 0 auto;
      border-radius: 2px;
      background-color: #fff;
      position: relative;
      overflow: hidden;
      z-index: 1;
      transform: rotateY(0);
      transition: transform .3s ease-in
    }
    .blue-bar1 {
      height: 100%;
      width: 68px;
      position: absolute;
      transform: translate(-34px);
      background-color: #0a66c2;
      border-radius: 2px;
      animation: initial-loading 1.5s ease infinite
    }
    @keyframes initial-loading {
      0% {
        transform: translate(-34px)
      }
    
      50% {
        transform: translate(96px)
      }
    
      to {
        transform: translate(-34px)
      }
    }
    @media (max-width: 768px) {
  .course-section {
    flex-direction: column;
  }

  .filters {
    order: 0; /* filters upar aa jayenge */
  }

  .pagination-wrapper {
    margin-top: 15px;
    order:0;
  }
}
.course-link{
    cursor: pointer;
}
  </style>

<div class="container" style="padding-top:30px;padding-bottom:30px">
    <div class="course-section print row">
        <div class="col-md-12">
             <div class="page-main-heading">
                <h2 class="heading"><span style=""><?= (ES('popular_course_page_title')) ?></span></h2>
            </div>
            <p><?= (ES('popular_course_page_description')) ?></p>
        </div>
       
      <!-- Left side: Courses -->
      <div class="course-list col-md-8">
          
      </div>
    
      <!-- Right side: Filters -->
      <div class="filters col-md-4">
         <?php
        $typeList = $this->SiteModel->get_contents('course_type');
        if($typeList->num_rows()){
            echo '<h4>Type</h4>';
            foreach($typeList->result() as $tl) 
                echo '<label><input type="checkbox" name="a[]" multiple="" class="type-input" value="'.$tl->id.'"> '.$tl->field1.'</label>';
        }
        $get = $this->db->get('course_category');
        if ($get->num_rows()) {
            echo '<h4>More options</h4>';
            foreach ($get->result() as $row) {
                echo '<label><input type="checkbox" name="b[]" multiple="" class="cat-input" value="'.$row->id.'"> '.$row->title.'</label>';
            }
        }
        ?>
      </div>
      <div class="pagination-wrapper col-md-12" style="display: flex;justify-content: center;"></div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var box = $('.course-section.print');
        var currentPage = 1;
        const loadCourses = (page = 1) => {
            currentPage = page;
            const type = box.find('.filters').find('.type-input:checked').map(function(){
                return $(this).val();
            }).get();
    
            const cat = box.find('.filters').find('.cat-input:checked').map(function(){
                return $(this).val();
            }).get();
            box.find('#course-loader').show();
            box.find('.course-list').html(`<div id="course-loader">
                              <div class="loading-bar1">
                                 <div class="blue-bar1"></div>
                              </div>
                            </div>`);
            if ($(window).width() < 992) {
                const target = $('.course-section.print');
                const offset = target.offset().top - 30; 
                $('html, body').animate({ scrollTop: offset }, 500);
            }
            $.post(`{base_url}ajax/website/pop_courses`,{
                type,cat,status : 'popular_course',page : currentPage
            },
            function(response){
                // response JSON hoga
                
                // box.find('#course-loader').hide();
                try {
                    let data = JSON.parse(response); 
                    console.log("Response JSON:", data);
                    box.find('.course-list').html(data.html).animate({ scrollTop: -30 }, 400); 
                    box.find('.course-list').find('.course-link').on('click',function(){
                                var link = $(this).data('href');
                                location.href = link;
                            })
                    if(data.total_pages){
                        let pagHtml = `<div class="pagination">`;
    
                        // prev button
                        pagHtml += `<button class="page-btn prev" data-page="${currentPage-1}" ${currentPage===1?'disabled':''}><i class="fa fa-angle-left""></i></button>`;
    
                        // page numbers
                        for(let i=1; i<=data.total_pages; i++){
                            pagHtml += `<button class="page-btn ${i===currentPage?'active':''}" data-page="${i}">${i}</button>`;
                        }
    
                        // next button
                        pagHtml += `<button class="page-btn next" data-page="${currentPage+1}" ${currentPage===data.total_pages?'disabled':''}><i class="fa fa-angle-right"></i></button>`;
    
                        pagHtml += `</div>`;
    
                        box.find('.pagination-wrapper').html(pagHtml);
                    }
                    else
                        box.find('.pagination-wrapper').html(``);
                } catch (e) {
                    console.error("Invalid JSON:", response);
                }
            })
            
        };
        box.on('click', '.pagination .page-btn', function(){
            const page = $(this).data('page');
            //  box.find('.filters').find('.type-input').first().focus()
            loadCourses(page);
        });
        loadCourses();
        box.find('.filters').find('.type-input,.cat-input').on('change',function(e){
            loadCourses(1);
        })
    })
</script>
    <?php
    
}
?>