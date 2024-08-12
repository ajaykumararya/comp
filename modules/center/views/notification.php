<div class="col-md-12 mt-4">
        <div class="{card_class} card-image">
            <div class="card-header">
                <h3 class="card-title"> <?= $this->ki_theme->keen_icon('notification') ?> List Notification(s)</h3>

            </div>
            <div class="card-body">
                <?php
                
                $this->db->where('receiver_id', $id);
                $this->db->where('receiver_user', 'center');
                $get = $this->db->order_by('id', 'DESC')->get('manual_notifications');
                if ($get->num_rows()) {
                    ?>
                    <style>
                        .unseen.primary {
                            background-color: #3e97ff82;
                        }

                        .unseen.success {
                            background-color: #2e7f5375;
                        }

                        .unseen.warning {
                            background-color: #836a1191;
                        }

                        .unseen.danger {
                            background-color: #8d243da3;
                        }
                    </style>
                    <div class="table-responsive">
                        <table class="table-bordered table" id="notification-table">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $isAdmin = $this->student_model->isAdmin();
                                foreach ($get->result() as $row) {
                                    echo '<tr data-id="' . $row->id . '" class="' . ($row->seen ? 'seen' : 'unseen') . ' ' . $row->notify_type . '">
                                            <td>
                                                <div class="d-flex flex-stack flex-wrap gap-2 py-5 ps-8 pe-5">
                                                    <div class="d-flex align-items-center me-3">
                                                        ' . date('d-m-Y h:i A', $row->send_time) . '
                                                    </div>
                                                    <div class="d-flex align-items-center me-3">
                                                        ' .
                                                        ($isAdmin ?
                                                            ($row->seen ? label($row->seen . ' Times Seen', 'primary') : label('Unseen', 'danger'))
                                                            : ''
                                                        ) . '

                                                    </div>
                                                </div>
                                            </td>
                                            <td>' . $row->title . '<br>' . label(ucfirst($row->notify_type), $row->notify_type) . '</td>
                                            <td>
                                            <div class="btn-group">
                                        <button class="btn btn-sm btn-xs btn-primary view-notification" data-user="center" data-type="' . $row->notify_type . '"><i class="fa fa-eye"></i></button>';
                                    if ($isAdmin) {
                                        echo '<button class="btn btn-xs btn-sm btn-danger"><i class="fa fa-trash"></i></button>';
                                    }
                                    echo '</div></td>
                                         </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                } else {
                    echo alert('Notification Not Found..', 'danger');
                }
                ?>
            </div>
        </div>
    </div>