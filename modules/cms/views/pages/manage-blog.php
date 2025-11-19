<?php
$limitRecetPost = 4;
if (isset($blog_id)) {
    ?>
    <style>
        .course-hero {
            position: relative;
            background-size: cover;
            background-position: center;
            color: #fff;
            padding: 80px 50px;
            margin-top: 120px;;
        }

        .course-hero .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #ffb209;
            z-index: 1;
        }

        .course-hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            max-width: 1080px;
            margin: 0 auto;
        }

        /* Flex helpers */
        .d-flex {
            display: flex;
        }

        .flex-column {
            flex-direction: column;
        }

        .flex-sm-row {
            flex-direction: row;
        }

        .align-items-center {
            align-items: center;
        }

        .align-sm-items-start {
            align-items: flex-start;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        /* Spacing */
        .mt-10 {
            margin-top: 10px;
        }

        .mt-md-20 {
            margin-top: 20px;
        }

        /* Font */
        .font-16 {
            font-size: 16px;
        }

        .font-weight-500 {
            font-weight: 500;
        }

        /* Colors */
        .text-white {
            color: #fff;
        }

        .text-decoration-underline {
            text-decoration: underline;
        }

        /* Icon Box */
        .icon-box {
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            width: 36px;
            height: 36px;
        }

        .icon-box svg {
            stroke: #fff;
        }

        /* Share container */
        .js-share-blog {
            gap: 6px;
            transition: all 0.3s ease;
        }

        .js-share-blog:hover {
            opacity: 0.8;
        }

        /* Margin left for text */
        .ml-5 {
            margin-left: 5px;
        }

        /* Responsive fixes */
        @media (max-width: 576px) {
            .flex-sm-row {
                flex-direction: column;
            }

            .align-sm-items-start {
                align-items: center;
            }
        }
    </style>
    <div class="course-hero" style="background:yellow">
        <div class="overlay"></div>
        <div class="course-hero-content">
            <!-- Left -->
            <div class="col-12 col-md-12 col-lg-12">
                <h1 class="font-30 text-white font-weight-bold" style="font-weight:900">{field2}</h1>

                <div class="d-flex flex-column flex-sm-row align-items-center align-sm-items-start justify-content-between">

                    <?php
                    if (!empty($field6) && $field6 != null)
                        echo '<span class="mt-10 mt-md-20 font-16 font-weight-500 text-white">Created by
                                                                    <span class="text-white text-decoration-underline">' . $field6 . '</span>
                                                        </span>';
                    $cat = $this->db->where('id', $field3)->where('type', 'blog_category')->get('content');
                    if ($cat->num_rows()) {
                        echo '<span class="mt-10 mt-md-20 font-16 font-weight-500 text-white">in
                            <a href="{base_url}blog/categories/{field3}" class="text-white text-decoration-underline">' . $cat->row('field1') . '</a>
                                </span>';
                    }
                    ?>



                    <span
                        class="mt-10 mt-md-20 font-16 font-weight-500 text-white"><?= date('d-m-Y', strtotime($field8)) ?></span>

                    <div class="js-share-blog d-flex align-items-center cursor-pointer mt-10 mt-md-20 share-url" data-url="<?=urldecode(current_url())?>">
                        <div class="icon-box ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-share-2 text-white">
                                <circle cx="18" cy="5" r="3"></circle>
                                <circle cx="6" cy="12" r="3"></circle>
                                <circle cx="18" cy="19" r="3"></circle>
                                <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                            </svg>
                        </div>
                        <div class="ml-5 font-16 font-weight-500 text-white">Share</div>
                    </div>
                </div>

            </div>

            <!-- Right -->
            <!--<div class="course-video">-->
            <!--  <img src="{base_url}upload/{field1}" alt="thumbnail">-->
            <!--</div>-->
        </div>
    </div>


    <style>
        .mmcontainer {
            display: flex;
            max-width: 1200px;
            margin: 30px auto;
            gap: 30px;
        }

        /* Left Content */
        .b-content {
            flex: 2;
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .b-content img {
            width: 100%;
            border-radius: 12px;
        }

        /*.content p {*/
        /*  color: #666;*/
        /*  line-height: 1.6;*/
        /*}*/
        /*.content h2 {*/
        /*  margin-top: 20px;*/
        /*}*/
        /* Sidebar */
        .sidebar {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .author-card {
            text-align: center;
        }

        .author-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .author-card h3 {
            margin: 10px 0 5px;
            color: #ff9800;
        }

        .author-card p {
            color: #777;
            margin: 0 0 10px;
        }

        .btn {
            display: inline-block;
            background: #8b0000;
            color: #fff;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn:hover {
            background: #a00000;
        }

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
    <div class="mmcontainer">
        <!-- Left Content -->
        <div class="b-content">
            <img src="{base_url}assets/file/{field1}" alt="Family">
            <br />
            {field5}
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Author -->
            <!--<div class="card author-card">-->
            <!--  <img src="author.jpg" alt="Author">-->
            <!--  <h3>George Hamilton</h3>-->
            <!--  <p>Author</p>-->
            <!--  <a href="#" class="btn">Author Posts</a>-->
            <!--</div>-->
            <!-- Categories -->
            <div class="card categories">
                <h4>Categories</h4>
                <ul>
                    <?php
                    $list = $this->db->select('p.*')
                        ->from('content as c')
                        ->join('content as p', 'p.id = c.field3')
                        ->where('p.type', 'blog_category')
                        ->group_by('p.id')
                        ->get();
                    if ($list->num_rows()) {
                        foreach ($list->result() as $rw) {
                            echo '<li><a href="{base_url}blog/categories/' . $rw->id . '">' . $rw->field1 . '</a></li>';
                        }
                    }
                    ?>
                </ul>
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
                <!-- Recent Posts -->
                <div class="card recent">
                    <h4>Recent Posts</h4>
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
                    <a href="{base_url}blog" class="btn btn-primary">View All Blogs</a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>










    <?php
} else {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <style>
                    .mcontainer {
                        display: grid;
                        grid-template-columns: 2fr 1fr;
                        gap: 20px;
                        margin-top: 148px;
                    }

                    .card {
                        background: #fff;
                        border-radius: 10px;
                        overflow: hidden;
                        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                        margin-bottom: 20px
                    }

                    .card img {
                        width: 100%;
                        display: block;
                        height: 200px
                    }

                    .card-content {
                        padding: 15px
                    }

                    .date-tag {
                        position: absolute;
                        bottom: -11px;
                        right: 10px;
                        background: #d11b1b;
                        color: #fff;
                        font-size: 12px;
                        padding: 5px 10px;
                        border-radius: 20px
                    }

                    .card-title {
                        font-weight: bold;
                        font-size: 18px;
                        margin: 10px 0;
                        color: #1e293b
                    }

                    .card-excerpt {
                        font-size: 14px;
                        color: #475569;
                        line-height: 1.5
                    }

                    .card-footer {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin-top: 10px;
                        font-size: 13px;
                        color: #64748b
                    }

                    .sidebar {
                        display: flex;
                        flex-direction: column;
                        gap: 20px
                    }

                    .widget {
                        background: #fff;
                        padding: 15px;
                        border-radius: 10px;
                        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1)
                    }

                    .widget h3 {
                        font-size: 16px;
                        margin-bottom: 10px;
                        color: #0f172a;
                        border-bottom: 2px solid #d11b1b;
                        display: inline-block;
                        padding-bottom: 2px
                    }

                    .categories ul,
                    .popular ul {
                        list-style: none;
                        margin: 0;
                        padding: 0
                    }

                    .categories li {
                        margin-bottom: 8px;
                        color: #334155;
                        font-size: 14px;
                        cursor: pointer
                    }

                    .popular li a {
                        display: flex;
                        gap: 10px;
                        margin-bottom: 12px;
                        font-size: 14px;
                        align-items: center
                    }

                    .popular img {
                        width: 50px;
                        height: 40px;
                        border-radius: 4px;
                        object-fit: cover
                    }

                    .popular .title {
                        font-size: 13px;
                        font-weight: 500;
                        color: #0f172a
                    }

                    .popular .date {
                        font-size: 11px;
                        color: #64748b
                    }

                    .btn {
                        display: block;
                        background: #dc2626;
                        color: #fff;
                        text-align: center;
                        padding: 10px;
                        border-radius: 6px;
                        text-decoration: none;
                        font-weight: 600;
                        transition: .3s
                    }

                    .btn:hover {
                        background: #b91c1c
                    }

                    .pagination {
                        display: flex;
                        gap: 10px;
                        justify-content: center;
                        margin-top: 20px
                    }

                    .pagination button {
                        padding: 6px 12px;
                        border: none;
                        border-radius: 4px;
                        background: #e2e8f0;
                        cursor: pointer
                    }

                    .pagination button.active {
                        background: #dc2626;
                        color: #fff
                    }

                    .pagination button:disabled {
                        opacity: .5;
                        cursor: not-allowed
                    }

                    @media(max-width:900px) {
                        .mcontainer {
                            grid-template-columns: 1fr
                        }
                    }
                </style>



                <div class="mcontainer">
                    <!-- Blog List -->
                    <div>
                        <div id="blog-list" class="row"></div>
                        <div class="pagination" id="pagination"></div>
                    </div>

                    <!-- Sidebar -->
                    <div class="sidebar">
                        <div class="widget categories">
                            <h3>Categories</h3>
                            <ul>
                                <?php
                                $list = $this->db->select('p.*')
                                    ->from('content as c')
                                    ->join('content as p', 'p.id = c.field3')
                                    ->where('p.type', 'blog_category')
                                    ->group_by('p.id')
                                    ->get();
                                if ($list->num_rows()) {
                                    foreach ($list->result() as $rw) {
                                        echo '<li><a href="{base_url}blog/categories/' . $rw->id . '">' . $rw->field1 . '</a></li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>

                        <div class="widget popular">
                            <h3>Recent Blogs</h3>
                            <ul id="recentPosts">

                            </ul>
                            <a href="{base_url}blog" class="btn">View All Posts</a>
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

                            container.innerHTML += `
              <div class="col-md-4">
                <div class="card">
                  <div style="position:relative;">
                    <a href="${p.link}"><img src="${p.img}" alt=""></a>
                    <span class="date-tag">${formatDateDMY(p.date)}</span>
                  </div>
                  <div class="card-content">
                    <a href="${p.link}" class="card-title">${p.title}</a>
                    <div class="card-excerpt">${p.excerpt || ''}</div>
                  </div>
                  <div class="card-footer">
                    <span>👤 ${p.author}</span>
                  </div>
                </div>
                </a
                </div>
              `;
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
            </div>
        </div>
    </div><br>
    <?php
}
?>