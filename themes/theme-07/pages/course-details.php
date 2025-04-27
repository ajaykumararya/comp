<style>
    .eduvibe-widget-details .widget-content ul li {
        display: flex;
        justify-content: space-between;
    }

    .eduvibe-widget-details .widget-content ul li span {
        font-weight: 600;
        font-size: 16px;
        line-height: 26px;
        display: inline-block;
    }

    .eduvibe-widget-details .widget-content ul li span {
        font-weight: 600;
        font-size: 16px;
        line-height: 26px;
        display: inline-block;
    }
</style>
<div class="container mt-30 mb-30 pt-30 pb-30">
    <div class="row">
        <div class="col-md-8">
            <div class="single-service">
                <img src="{base_url}upload/{field1}" alt="">
                <h3 class="text-uppercase mt-30 mb-10">{field2}</h3>
                <div class="double-line-bottom-theme-colored-2 mt-10"></div>
                <p>{field3}</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="sidebar sidebar-left mt-sm-30 ml-30 ml-sm-0">
                <div class="widget border-1px bg-silver-deep p-15">
                    <div class="categories">
                        <div class="eduvibe-widget-details mt--35">
                            <div class="widget-content">
                                <ul>
                                    <li><span><i class="icon-time-line"></i> Course Duration</span><span>{field4}</span>
                                    </li>

                                    <li><span><i class="icon-user-2"></i> Eligibility</span><span>{field5}</span></li>

                                    <!-- <li><span><i class="icon-draft-line"></i> Fee Type </span><span>One Time</span></li> -->



                                    <li><span><i class="icon-award-line"></i> Certificate</span><span>Yes</span></li>

                                </ul>

                                <div>
                                    <a class="btn btn-xl btn-theme-colored2 mt-30 pr-40 pl-40"
                                        href="<?= ES('popular_course_page_btn_url', '#') ?>">
                                        Price : {inr} {field6}
                                    </a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>