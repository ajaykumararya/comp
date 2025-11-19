<?php
    
        foreach ($items as $row):
            $title = $row['field2'];
            $description = $row['field3'];
            $duration = $row['field4'];
            $el = $row['field5'];
            $link = $row['field9'] == null 
                                    ? 'course-details/'.$this->token->encode(['prod_id' => $row['id']])
                                    : 'course-details/'.$row['field9'];
            $category = $this->db->where('id',$row['field7'])->get('course_category')->row('title') ?? '';
            $category =  !empty($category) ? 'in '.$category : '';
            $rating = $row['field10'] == null ? 3 : $row['field10'];
            ?>
            <!-- Card 1 -->
            <!--<a >-->
                <div class="course-card course-link" data-href="<?=$link?>">
                  <div class="course-img">
                    <img src="<?=base_url('assets/file/')?><?=$row['field1'] ?>" alt="Course" style="height:250px">
                    <!--<span class="badge red">Text course</span>-->
                  </div>
                  <div class="course-body">
                    
                    <h3><?=$title?></h3>
                    <a href="#"><?=$category?></a>
                    <div class="rating">
                      <?=str_repeat('★',$rating)?> <span><?=$rating?>.00</span>
                    </div>
                    <div class="course-meta">
                      <span><i class="fa-regular fa-clock"></i> <?=$duration?></span>
                      <span><i class="fa-regular fas fa-graduation-cap"></i> <?=$el?></span>
                    </div>
                    <div class="course-price">₹<?=$row['field6']?></div>
                  </div>
                </div>
            <!--</a>-->
            <?php
        endforeach;


      ?>