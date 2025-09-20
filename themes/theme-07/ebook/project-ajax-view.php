<?php
$catSlug = $this->ebook_model->get_category_slug($category_id);
?>

<div class="panel box-project mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <div style="padding:10px">
                <img class="project-image" class="wow zoomIn" data-wow-duration="1.5s" data-wow-offset="10"
                    src="{base_url}upload/{image}" style="height: 166px;border-radius: 10px;">

            </div>
        </div>
        <div class="col-md-8">
            <div class="panel-body">
                <a href="{CURRENT_URL}?cat=<?= $catSlug ?>&project={slug}">
                    <h5 class="card-title text-primary">{project_name} {id}</h5>
                </a>
                <p class="card-text project-value"><small class="text-muted">{project_value}</small>
                </p>
                <p class="card-text description">{description}</p>
                <!-- <a href="#" class="text-primary">View Details</a> -->
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="fw-bold price">Rs. {price} /-</h3>

                    </div>
                    <div class="col-md-6">
                        <?php
                        if ($this->ebook_cart->item_exists($id)):
                            echo '                            
                                <button class="btn btn btn-outline-success" data-slug="project-name" disabled="">
                                    <span><i class="fa fa-shopping-cart"></i>Added</span>
                                </button>';
                        else:
                            echo '
                            <button class="btn btn btn-outline-success btn-addtocart hvr-wobble-top" data-slug="{slug}">
                                <span><i class="fa fa-shopping-cart"></i> Add To Cart</span>
                            </button>';
                        endif;
                        ?>
                        <a href="{CURRENT_URL}?cat=<?= $catSlug ?>&project={slug}" class="btn btn-project-view">
                            <i class="fa fa-eye"></i> View
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>