<?php
if ($isPrimary) {
    ?>
    <div class="vc_row-full-width vc_clearfix"></div>
    <div class="vc_row wpb_row vc_row-fluid vc_custom_1528900356612 vc_row-o-content-middle vc_row-flex">
        <div class="wpb_column vc_column_container vc_col-sm-6">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <div class="section-heading"> <span class="section-subtitle"><?= ES("{$type}_tag", 'Blogs') ?></span>
                        <h2 class="section-title"><?= ES("{$type}_title", 'Our Blogs') ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right wpb_column vc_column_container vc_col-sm-6 vc_hidden-sm vc_hidden-xs">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <?php
                    if ($btnTitle = ES("{$type}_btn_title", false)) {
                        echo '<a href="' . ES("{$type}_btn_link", '#') . '" class="btn btn-border lg "
                            title="' . $btnTitle . '">' . $btnTitle . '</a>';
                    }
                    // hello bhsi kys kst thsr hs i
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}
$limitRecetPost = 8;
if (isset($blog_id)) {
    ?>
    <div class="blog-archive has-sidebar sidebar-right">
        <div class="blog-main-loop">
            <div class="blog-loop-inner post-single">
                <article id="post-224"
                    class="post-224 post type-post status-publish format-standard has-post-thumbnail hentry category-academics category-school tag-course tag-theme tag-wordpress"
                    role="article">
                    <div class="post-inner">
                        <header class="entry-header">
                            <h1 class="entry-title">{field2}</h1>
                            <div class="post-meta date"><i
                                    class="material-icons">access_time</i><?= date('F d, Y', strtotime($field8)) ?></div>
                            <div class="post-meta author"> <i class="material-icons">perm_identity</i> Posted by {field6}
                            </div>
                            <div class="post-meta category">
                                <i class="material-icons">folder_open</i>
                                <a href="{base_url}blog/categories/{field3}" rel="category tag">Academics</a>
                            </div>
                        </header>
                        <div class="post-thumbnail">
                            <img src="{base_url}assets/file/{field1}" class="attachment-full size-full wp-post-image" alt=""
                                decoding="async" fetchpriority="high">
                        </div>
                        <div class="entry-content">
                            {field5}
                        </div>
                        <div class="entry-tag-share">
                            <!-- <div class="post-tags">
                                <span>Tags:</span>
                                <a href="https://esmetwp.com/studiare/tag/course/" rel="tag">course</a>
                                <a href="https://esmetwp.com/studiare/tag/theme/" rel="tag">theme</a>
                                <a href="https://esmetwp.com/studiare/tag/wordpress/" rel="tag">wordpress</a>
                            </div> -->
                        </div>
                    </div>
                </article>
            </div>

        </div> <!-- end .blog-main-loop -->
        <aside class="main-sidebar-holder">
            <div class="sidebar-widgets-wrapper">

                <div id="block-8" class="widget widget_block">
                    <h5 class="widget-title">Categories</h5>
                    <div class="wp-widget-group__inner-blocks">
                        <ul class="wp-block-categories-list wp-block-categories">
                            <?php
                            $list = $this->db->select('p.*')
                                ->from('content as c')
                                ->join('content as p', 'p.id = c.field3')
                                ->where('p.type', 'blog_category')
                                ->group_by('p.id')
                                ->get();
                            if ($list->num_rows()) {
                                foreach ($list->result() as $rw) {
                                    echo '<li class="cat-item cat-item-16"><a href="{base_url}blog/categories/' . $rw->id . '">' . $rw->field1 . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <?php
                $type = 'manage-blog';
                $this->db->select('
                    id as blog_id,
                    CONCAT("' . base_url('assets/file/') . '",field1) as img,
                    field2 as title,
                    field8 as date,
                    field6 as author,
                    field4 as excerpt,
                    field3 as cat_id,
                    CONCAT("' . base_url('blog/') . '",field7) as link
           ');
                if (isset($blog_id))
                    $this->db->where('id!=', $blog_id);
                $this->db->limit($limitRecetPost);
                $list = $this->SiteModel->get_contents($type);
                if ($list->num_rows()) {

                    ?>
                    <div id="block-8" class="widget widget_block">
                        <h5 class="widget-title">Recent Blogs</h5>
                        <div class="wp-widget-group__inner-blocks">
                            <ul class="wp-block-categories-list wp-block-categories recent">


                                <?php
                                foreach ($list->result() as $ro) {
                                    echo '<div class="recent-item">
                                            <img src="' . $ro->img . '" alt="">
                                            <div>
                                                <a href="' . $ro->link . '">' . $ro->title . '</a><br>
                                                <span>' . date('d-m-Y', strtotime($ro->date)) . '</span>
                                            </div>
                                            </div>';
                                }
                                ?>
                            </ul>
                            <a href="{base_url}blog" class="btn btn-primary">View All Blogs</a>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <!-- <div id="block-9" class="widget widget_block">
                    <h5 class="widget-title">Tags</h5>
                    <div class="wp-widget-group__inner-blocks">
                        <p class="wp-block-tag-cloud"><a href="https://esmetwp.com/studiare/tag/codebean/"
                                class="tag-cloud-link tag-link-23 tag-link-position-1" style="font-size: 8pt;"
                                aria-label="codebean (1 item)">codebean</a> <a
                                href="https://esmetwp.com/studiare/tag/course/"
                                class="tag-cloud-link tag-link-24 tag-link-position-2" style="font-size: 20.218181818182pt;"
                                aria-label="course (5 items)">course</a> <a href="https://esmetwp.com/studiare/tag/parents/"
                                class="tag-cloud-link tag-link-25 tag-link-position-3" style="font-size: 8pt;"
                                aria-label="parents (1 item)">parents</a> <a href="https://esmetwp.com/studiare/tag/school/"
                                class="tag-cloud-link tag-link-26 tag-link-position-4" style="font-size: 12.581818181818pt;"
                                aria-label="school (2 items)">school</a> <a
                                href="https://esmetwp.com/studiare/tag/students/"
                                class="tag-cloud-link tag-link-27 tag-link-position-5" style="font-size: 8pt;"
                                aria-label="students (1 item)">students</a> <a
                                href="https://esmetwp.com/studiare/tag/teacher/"
                                class="tag-cloud-link tag-link-28 tag-link-position-6" style="font-size: 12.581818181818pt;"
                                aria-label="teacher (2 items)">teacher</a> <a href="https://esmetwp.com/studiare/tag/theme/"
                                class="tag-cloud-link tag-link-29 tag-link-position-7" style="font-size: 20.218181818182pt;"
                                aria-label="theme (5 items)">theme</a> <a href="https://esmetwp.com/studiare/tag/wordpress/"
                                class="tag-cloud-link tag-link-30 tag-link-position-8" style="font-size: 22pt;"
                                aria-label="wordpress (6 items)">wordpress</a></p>
                    </div>
                </div> -->
            </div>
        </aside>
    </div>
    <style>
        .categories ul,
        .recent ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .categories li,
        .recent li {
            margin-bottom: 10px;
        }

        .categories a,
        .recent a {
            text-decoration: none;
            color: #333;
        }

        .recent img {
            width: 60px;
            height: 40px;
            object-fit: cover;
            border-radius: 6px;
            margin-right: 10px;
        }

        .recent-item {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }

        .recent-item span {
            font-size: 12px;
            color: #777;
        }
    </style>
    <?php
} else {
    ?>
    <style>
        #pagination {
            text-align: center;
            margin-top: 20px;
        }

        #pagination button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            margin: 0 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        #pagination button.disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        #pagination button.active {
            background-color: #0056b3;
        }
    </style>

    <div class="vc_row wpb_row vc_row-fluid vc_custom_1528900679139">
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <div class="blog-loop-inner blog-loop-view-grid four-columns" id="blog-list">

                    </div>
                    <center><div class="pagination" id="pagination"></div></center>
                </div>
            </div>
        </div>
    </div>


    <?php
    $type = 'manage-blog';
    $this->db->select('
                    id as blog_id,
                    CONCAT("' . base_url('assets/file/') . '",field1) as img,
                    field2 as title,
                    field8 as date,
                    field6 as author,
                    field4 as excerpt,
                    field3 as cat_id,
                    CONCAT("' . base_url('blog/') . '",field7) as link
           ');

    $list = $this->SiteModel->get_contents($type);

    ?>
    <script>
        // Example posts data
        function formatDateDMY(dateString) {
            // agar date dd-mm-yyyy format me aayi hai
            const [day, month, year] = dateString.split("-");
            const d = new Date(`${year}-${month}-${day}`); // JS ko yyyy-mm-dd chahiye

            const dd = String(d.getDate()).padStart(2, "0");
            const mm = String(d.getMonth() + 1).padStart(2, "0");
            const yyyy = d.getFullYear();

            return `${dd}-${mm}-${yyyy}`; // always dd-mm-yyyy
        }

        const cat_id = <?= isset($category_id) ? $category_id : 0 ?>;
        let posts = <?= json_encode($list->result_array()) ?>;
        const recent = posts;
        recent.sort((a, b) => b.id - a.id);
        const latest = recent.slice(0, <?= $limitRecetPost ?>);

        function parseDMY(dateString) {
            // "20-09-2025" => [20, 09, 2025]
            const [day, month, year] = dateString.split("-").map(Number);
            return new Date(year, month - 1, day); // JS Date(year, monthIndex, day)
        }

        // Sorting
        posts.sort((a, b) => parseDMY(b.date) - parseDMY(a.date));

        if (cat_id)
            posts = posts.filter(post => post.cat_id == cat_id);

        const perPage = 6;
        let currentPage = 1;
        const totalPages = Math.ceil(posts.length / perPage);

        function renderPosts() {
            const start = (currentPage - 1) * perPage;
            const end = start + perPage;
            const list = posts.slice(start, end);

            const container = document.getElementById("blog-list");
            container.innerHTML = "";
            if (!totalPages) {
                container.innerHTML = '<div class="alert alert-danger">Blog not found...</div>';
                return;
            }
            list.forEach(p => {

                container.innerHTML += `<div id="post-${p.blog_id}"
                            class="post-224 post type-post status-publish format-standard has-post-thumbnail hentry category-academics category-school tag-course tag-theme tag-wordpress">
                            <div class="post-inner">
                                <div class="post-thumbnail">
                                    <a href="${p.link}">
                                        <img decoding="async" style="height:240px" src="${p.img}"
                                            class="attachment-studiare-image-420x294-croped size-studiare-image-420x294-croped wp-post-image">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <div class="post-meta post-category">
                                      👤 ${p.author}
                                    </div>
                                    <h4 class="entry-title">
                                        <a href="${p.link}">${p.title}</a>
                                    </h4>
                                    <div class="post-meta date">
                                        <p>${p.excerpt}</p>
                                        <i class="material-icons">access_time</i> ${formatDateDMY(p.date)}
                                    </div>
                                </div>
                            </div>
                        </div>`;
            });

            renderPagination();
        }

        function renderPagination() {
            const pag = document.getElementById("pagination");
            pag.innerHTML = "";
            if (totalPages)
                pag.innerHTML += `<button ${currentPage === 1 ? 'disabled' : ''} onclick="goToPage(${currentPage - 1})">Prev</button>`;
            for (let i = 1; i <= totalPages; i++) {
                pag.innerHTML += `<button class="${i === currentPage ? 'active' : ''}" onclick="goToPage(${i})">${i}</button>`;
            }
            if (totalPages)
                pag.innerHTML += `<button ${currentPage === totalPages ? 'disabled' : ''} onclick="goToPage(${currentPage + 1})">Next</button>`;
        }

        function goToPage(p) {
            if (p < 1 || p > totalPages) return;
            currentPage = p;
            renderPosts();
        }
        function renderLatestPosts() {
            const recentPosts = document.getElementById('recentPosts');
            recentPosts.innerHTML = '';
            latest.forEach(r => {
                recentPosts.innerHTML += `<li>
                                                <a href="${r.link}">
                                                  <img src="${r.img}">
                                                  <div><div class="title">${r.title}</div><div class="date">${formatDateDMY(r.date)}</div></div>
                                              </a>
                                            </li>`;
            });
        }

        // init
        renderPosts();
        renderLatestPosts();
    </script>
    <br>
    <?php
}
?>