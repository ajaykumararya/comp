<?php
$catName = $note = "";
$formTitle = 'Create Role Category';
$button = $save_button;
if($this->uri->segment(3,0)){
    $rolePermissions = $this->db->where(['id'=> base64_decode($this->uri->segment(3))])->get('role_categories')->row_array();
    $catName = $rolePermissions['role_category_title'];
    $note = $rolePermissions['note'];
    $permissions = json_decode($rolePermissions['permissions'],true);
    // pre($permissions,true);
    $this->ki_theme->setPermissions($permissions);
    $formTitle = 'Edit Role Category'.form_hidden('id',$rolePermissions['id']);
    $button = $update_button;
}
?>
<div class="row">
    <div class="col-md-12">
        <form action="" class="manage-role-category">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title"><?=$formTitle?></h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-4">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="category_name" value="<?=$catName?>" name="title"
                            placeholder="Enter Category Name">
                    </div>
                    <?php
                    $html = '<div class="card mb-4 border-warning border">
                            <div class="card-header">
                                <h3 class="card-title text-warning">Permission(s)</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                ';
                    $adminMenu = $this->load->config('admin/menu', true);
                    
                    // $this->ki_theme->setPermissions();
                    foreach ($adminMenu as $menuType => $menus) {
                        // echo $menuType;
                        if (in_array($menuType, ['dashboard']))
                            continue;
                        if (isset($menus['condition'])) {
                            if (!$menus['condition']) {
                                continue;
                            }
                        }
                        if (isset($menus['title'])) {
                            $html .= '<!--begin:Menu item-->
                                    <div  class="menu-item" >
                                        <!--begin:Menu content-->
                                        <div  class="menu-content" >
                                            <span class="menu-heading fw-bold text-uppercase fs-4 text-dark">' . $menus['title'] . '</span>
                                        </div>
                                        <!--end:Menu content-->
                                    </div>';
                        }
                        $html .= '<div style="padding-left:43px">';
                        $html .= $this->ki_theme->generate_permission($menus['menu'], 'menu', $menuType) . '</div>';
                    }
                    echo $html . '</div></div>
                            </div>';

                    ?>
                    <div class="form-group mb-4">
                        <label for="note" class="form-label">Note</label>
                        <textarea name="note" placeholder="Note" id="note" class="form-control"><?=$note?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <?=$button?>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Role Category(s)</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="role_category_table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Methods</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>