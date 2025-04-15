<section class="ebook-cart">
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">

                    <?php
                    $this->load->library("ebook/ebook_cart");
                    if ($this->ebook_cart->count()) {
                        ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered tbl-shopping-cart">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Photo</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $this->load->model('ebook/ebook_model');
                                    $items = $this->ebook_cart->get_cart();
                                    $totalPrice = 0;
                                    foreach ($items as $item) {
                                        // pre($item);
                                        $catSlug = $this->ebook_model->get_category_slug_via_project($item['id']);
                                        $totalPrice += $item['price'];
                                        $link = current_url() . '?cat=' . $catSlug . '&project=' . $item['slug'];
                                        // echo $link;
                                        ?>
                                        <tr class="cart_item" data-slug="<?= $item['slug'] ?>">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove remove-cart-item" href="#"
                                                    style="font-size: 28px;color: red;">×</a>
                                            </td>
                                            <td class="product-thumbnail">
                                                <a href="<?= $link ?>">
                                                    <img alt="member" src="{base_url}upload/<?= $item['image'] ?>">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="<?= $link ?>"><?= $item['name'] ?></a>
                                                <ul class="variation">
                                                    <li class="variation-size">Project Value:
                                                        <span><?= $item['project_value'] ?></span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="product-price"><span class="amount"><i class="fa fa-inr"></i>
                                                    <?= $item['price'] ?></span></td>
                                            <td class="product-quantity">
                                                1 X <i class="fa fa-inr"></i> <?= $item['price'] ?>
                                            </td>
                                            <td class="product-subtotal"><span class="amount"><i class="fa fa-inr"></i>
                                                    <?= $item['price'] ?></span></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td>Total : <i class="fa fa-inr"></i> <?= $totalPrice ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <?php
                    } else {
                        echo alert('Cart is Empty', 'danger');
                    }

                    ?>

                </div>
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <?php
                    if ($this->ebook_cart->count()) {
                        ?>
                        <button class="btn btn-outline-success paynow" style="width:100%">
                            <span>
                                <i class=""></i> Pay Now
                            </span>
                        </button>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>