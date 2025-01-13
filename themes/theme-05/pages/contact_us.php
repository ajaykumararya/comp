<div class="container margin-tp-15">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

            <article class="blog-post format-blockquote WhiteSkin mosaic1">

                <div class="post-content clearfix">

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h1 class="post-title">
                                <a href="#" class="black"><strong>{page_name}</strong></a>
                            </h1>
                            <div class="alternative-meta">
                                <span>
                                    <strong>[{title}]</strong> </span>
                            </div>

                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <iframe
                                src="{google_map_url}"
                                width="100%" height="300" style="border:10px solid #efefef;" frameborder="0"
                                allowfullscreen=""></iframe>
                        </div>
                    </div>


                    <div class="margin-tp-20">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th colspan="10" class="blue">
                                            <div class="font-15 text-weight">
                                                <strong><?= ES('contact_us_section_title') ?></strong></div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th width="25%"><strong>Phone No</strong></th>
                                        <td colspan="8"> {number}
                                        </td>
                                    </tr>
                                    <!--  <tr>
        <th ><strong>Online Courses Enquiry </strong></th>
        <td  colspan="8"><a href="#" data-toggle="modal" data-target="#Enquiry"  class="btn btn-success btn-xs" >Click Here</a></td>
      </tr> -->
                                    <tr>
                                        <th><strong>Email</strong></th>
                                        <td colspan="8"><a href="mailto:{email}">{email}</a></td>
                                    </tr>
                                    <tr>
                                        <th><strong>Address</strong></th>
                                        <td colspan="8">{address}</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>
            </article>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <!-- #include file="menu.asp" -->
        </div>
    </div>


</div>