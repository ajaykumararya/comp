<style>
    .userMain .userBlock {
        float: left;
        width: 100%;
        box-shadow: 0px 0px 23px -3px #ccc;
        padding-bottom: 12px;
        margin-bottom: 30px;
        overflow: hidden;
        background: #fff;


    }

    .userMain .userBlock .backgrounImg {
        float: left;
        overflow: hidden;
        height: 77px;
    }

    .userMain .userBlock .backgrounImg img {
        width: auto;
    }

    .userMain .userBlock .userImg {
        text-align: center;
    }

    .userMain .userBlock .userImg img {
        width: 80px;
        height: 80px;
        margin-top: -39px;
        border-radius: 100%;
        border: 5px solid #fff;

    }

    .userMain .userBlock .userDescription {
        text-align: center;
    }

    .userMain .userBlock .userDescription h5 {
        margin-bottom: 2px;
        font-weight: 600;
    }

    .userMain .userBlock .userDescription p {
        margin-bottom: 5px;
    }

    .userMain .userBlock .userDescription .btn {
        padding: 0px 23px 0px 23px;
        height: 22px;
        border-radius: 0;
        font-size: 12px;
        background: #0198dd;
        color: #fff;
    }

    .userMain .userBlock .userDescription .btn:hover {

        opacity: 0.7;
    }

    .userMain .userBlock .followrs {
        display: inline-flex;
        margin-right: 10px;
        border-right: 1px solid #ccc;
        padding-right: 10px;
    }

    .userMain .userBlock .followrs .number {
        font-size: 15px;
        font-weight: bold;
        margin-right: 5px;
        margin-top: -1px;
    }
</style>
<section class="small_pt gray-bg" data-aos="fade-right">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center animation animated fadeInUp" data-aos="fade-up" data-animation="fadeInUp"
                    data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                    <div class="heading_s1 text-center">
                        <h2 class="main-heading center-heading"><i class="fas fa-user-check"></i>  Franchise Verification</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 col-md-offset-3 mb-4 mt-4">
                <form action="" class="center-verification-form animation animated fadeInLeft">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label mt-2">Institute ID</label>
                                <input type="text" name="center_number" placeholder="Enter Institute ID"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="btn-wrapper btn-wrapper2">
                                <?= $this->ki_theme->set_class('btn btn-outline-success')->button('<span><i class="fa fa-search"></i> Verify</span>', 'submit') ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="show-center-details">
        </div>
    </div>
</section>