<?php

// pre($this->ki_theme->list_pages());

?>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow border-primary">
            <div class="card-header">
                <h1 class="card-title">List Pages</h1>
            </div>
            <div class="card-body p-3 table-card fade">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="list-pages">
                        <thead>
                            <th>#</th>
                            <th>Page Name</th>
                            <th>Page Type</th>
                            <th>Primary Page</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $index = 1;
                            foreach ($this->ki_theme->list_pages() as $id => $page) {
                                $page['index'] = $index++;
                                echo print_string('<tr>
                                                        <td>{index}.</td>      
                                                        <td>{title}</td>      
                                                        <td>{type}</td>      
                                                        <td>{isPrimary}</td>      
                                                        <td>{json}</td>        
                                                    </tr>', $page);
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>