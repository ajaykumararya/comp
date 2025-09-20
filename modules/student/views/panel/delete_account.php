<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-body div"></div>
        </div>
    </div>
</div>




<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (sessionStorage.getItem("accountDeleted") === "true") {
            $('.div').html(`
                <h2 class="text-success fs-2">Account delete request submitted Successfully...</h2>
            `);
        }
        else {
            $('.div').html(`
                    <button class="btn btn-danger delete-account">
                        <i class="fa fa-trash"></i> Click to Delete
                    </button>        
        `).find('.delete-account').on('click', function () {
                SwalWarning('Confirmation!', 'Are You sure for delete your account..', true, 'Yes Delete it.').then((res) => {
                    if (res.isConfirmed) {
                        sessionStorage.setItem("accountDeleted", "true");
                        SwalSuccess('Success', 'Your request submitted Successfully...')
                        location.reload();
                    }
                })
            });
        }
    })
    // $('.div')
</script>