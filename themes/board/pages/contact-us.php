<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-2">
            <h1 class="text-center nceb-heading-primary m-0 p-0">We are just a phone call away !</h1>
        </div>
    </div>
</div>
<div class="container bg-white">
    <br>
    <br>
    <div class="row align-items-center">
        <div class="col-md-6 order-lg-1 d-flex flex-fill">
            <div class="vr d-none d-lg-block"></div>
            <div class="card border-0">
                <div class="card-body bg-white">
                    <table class="table table-borderless align-middle">
                        <tbody>
                            <tr>
                                <td>
                                    <h2 class="card-title text-secondary"><i class="nxr-phone"></i></h2>
                                </td>
                                <td>
                                    <a class="h3 text-decoration-none" href="tel:<?=add_91($number)?>">
                                    <?=board_text(remove_91($number))?>            
                                </a> 
                                <small class="fw-bold text-danger"><?=ES('header_open_timing')?></small>
                                <!-- <small
                                        class="fw-bold text-danger">(11:00am to 6:00pm IST)</small> -->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="card-title"><i class="nxr-envelope"></i></h2>
                                </td>
                                <td>
                                    <h3 class="nceb-heading-primary">{email}</h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="card-title text-success"><i class="nxr-whatsapp"></i></h2>
                                </td>
                                <td>
                                    <a class="h3 text-decoration-none"
                                        href="https://api.whatsapp.com/send?phone=<?=add_only_91($whatsapp_number)?>&amp;text=Hi%20"><?=add_only_91($whatsapp_number)?></a> 
                                        
                                        <small class="fw-bold text-danger"><?=ES('header_open_timing')?></small>
                                        <!-- <small
                                        class="fw-bold text-danger">(11:00am to 6:00pm IST)</small> -->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="card-title"><i class="nxr-geo-alt"></i></h2>
                                </td>
                                <td>
                                    <h3 class="nceb-heading-primary">{address}</h3>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


        <div class="col-md-6">
            <hr class="border border-primary border-1 opacity-50 d-block d-lg-none">
            <div class="card border-0 bg-white">
                <div class="card-body">
                    <form id="submitGETINTOUCH" class="px-4">
                        <h4>Write to us</h4>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="name" placeholder="name"
                                required="">
                            <label for="name">Enter your fullname</label>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="email"
                                        required="">
                                    <label for="email">Enter your email</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="mobile" id="phone" placeholder="phone"
                                        pattern="\d*" maxlength="10" required="">
                                    <label for="phone">Enter your phone no.</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating my-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="message"
                                name="message" required="" style="height:100px;"></textarea>
                            <label for="message">Please enter your message</label>
                        </div>


                        <div id="contactMsg"></div>

                        <button type="submit" class="btn btn-primary btn-lg col-12"
                            >Submit</button><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
</div>
<div class="container-fluid p-0 m-0">
    <iframe
        src="{google_map_url}"
        width="100%" height="450" frameborder="0" allowfullscreen=""></iframe>
</div>