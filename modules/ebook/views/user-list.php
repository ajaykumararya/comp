<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List User(s)</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Projects</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $list = $this->db->get('ebook_users');
                            if($list->num_rows()){
                                $i = 1;
                                foreach($list->result() as $row){
                                    $listProject = $this->db->where('user_id',$row->id)
                                                        ->get('ebook_user_projects')->num_rows();
                                    echo '<tr>                                    
                                            <td>'.$i++.'.</td>
                                            <td>'.$row->name.'</td>
                                            <td>'.$row->mobile.'</td>
                                            <td>'.$row->email.'</td>
                                            <td>'.$row->address.'</td>
                                            <td>
                                                <a href="" class="btn btn-xs btn-sm btn-primary">
                                                   '.$listProject.' Project(s)
                                                </a>
                                            </td>        
                                            <td>
                                                <button data-id="'.$row->id.'" class="deleteEbbokUser btn btn-xs btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>                                            
                                            </td>        
                                        </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('#dataTable').DataTable();
$('.deleteEbbokUser').click(function(){
    var id = $(this).data('id');
    SwalWarning('Confirmation','Are you sure for delete it?',true,'Delete it').then((f) => {
        if(f.isConfirmed){
            alert(id)
        }
    });
})
</script>