<div class="row">
    <div class="col-md-12 mb-4">
        <form action="" id="project-add">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Add Project</h3>
                </div>
                <div class="card-body row">
                    <div class="form-group mb-4 col-md-4">
                        <label for="" class="form-label required">Category</label>
                        <select class="form-select" name="category_id" data-control="select2"
                            data-placeholder="Select category">
                            <option></option>
                            <?php
                            $get = $this->db->get('ebook_category');
                            if ($get->num_rows() > 0) {
                                foreach ($get->result() as $row) {
                                    echo '<option value="' . $row->id . '">' . $row->category_name . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="" class="form-label">Project Name</label>
                        <input type="text" name="project_name" placeholder="Enter Project Name" class="form-control">
                        <input type="hidden" name="slug">
                    </div>
                    <div class="form-group mb-4 col-md-4">
                        <label for="" class="form-label required">Project Value</label>
                        <input type="text" name="project_value" placeholder="Enter Project Value" class="form-control">
                    </div>

                    <div class="form-group mb-4 col-md-6">
                        <label for="" class="form-label required">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="" class="form-label required">Price</label>
                        <input type="number" name="price" class="form-control" placeholder="Enter Price">
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4 ">
                            <label class="form-label required">File Type</label>
                            <select class="form-select" name="file_type" data-control="select2"
                                data-placeholder="Select a File Type">
                                <option value="file">PDF File</option>
                                <option value="link"> Link</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group mb-4 file">
                            <label for="file" class="form-label required">File</label>
                            <input type="file" class="form-control" id="file" accept="application/pdf">
                        </div>
                        <div class="form-group mb-4 link d-none">
                            <label for="" class="form-label required"> Link</label>
                            <input type="text" class="form-control" placeholder="Enter File Link" name="link">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="" class="form-label required">Description</label>
                        <textarea name="description" id="" class="form-control"
                            placeholder="Enter Description"></textarea>
                    </div>


                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-12">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Project(s)</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>#.</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Project Name</th>
                            <th>Project Value</th>
                            <th>Project Price</th>
                            <th>File</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>