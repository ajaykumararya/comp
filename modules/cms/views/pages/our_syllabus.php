<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css"
    integrity="sha512-BMbq2It2D3J17/C7aRklzOODG1IQ3+MHw3ifzBHMBwGO/0yUqYmsStgBjI0z5EYlaDEFnvYV7gNYdD3vFLRKsA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<section class="sec_padd">
    <div class="container">
        <div class="text-center">
            <h1>
                <?= $this->SiteModel->get_setting('syllabus_page_title', 'Our Syllabus') ?>
            </h1>
        </div>
        <div class="row">
            <div class="col-md-12 p-0">

                <table class="table table-bordered" id="syllabus-table-front">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>File</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>