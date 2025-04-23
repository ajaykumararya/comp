<div class="row">
    <div class="col-md-12">
        <div class="<?= themeCard('main', 'panel-theme') ?>">
            <div class="<?= themeCard('header') ?>">
                <h3 class="panel-title text-white">Project(s)</h3>
            </div>
            <div class="<?= themeCard('body') ?>">
                <?php
                $userId = $this->session->userdata('ebook_user');

                $get = $this->db->select('eup.*,ep  .project_name,ep.file,ep.file_type')
                    ->from('ebook_user_projects as eup')
                    ->join('ebook_users as us', 'us.id = eup.user_id and us.id = ' . $userId)
                    ->join('ebook_project as ep', 'ep.id = eup.project_id')
                    ->group_by('eup.id')
                    ->get();
                if ($get->num_rows()) {
                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Project</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($get->result() as $index => $project) {
                                    echo '<tr>
                                            <td>' . $i++ . '.</td>
                                            <td>' . date('d M Y', strtotime($project->created_at)) . '</td>
                                            <td>
                                                ' . $project->project_name . '
                                            </td>
                                            <td>';
                                    $file = $project->file;
                                    if ($project->file_type != 'link')
                                        $file = base_url('upload/' . $file);

                                    echo ' <a href="'.$file.'" target="_blank" class="btn btn-success btn-xs btn-sm">
                                               <i class="fa fa-eye"></i>
                                               </a>
                                            </td>
                                    </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                } else
                    echo alert('Project not found', 'danger');
                ?>
            </div>
        </div>
    </div>
</div>