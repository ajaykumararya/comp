document.addEventListener('DOMContentLoaded', async function () {
  const table = $('#role_users_table');
  $('.add-role-user').on('submit', function (e) {
    e.preventDefault();
    $.AryaAjax({
      url: 'add_role_user',
      data: new FormData(this),
      success_message: 'Role User Added Successfully',
      page_reload: true
    }).then((r) => {
      if (!r.status) {
        showResponseError(r);
      }
    });
  })
  log(table.length)
  table.DataTable({
    ajax: {
      url: ajax_url + 'list_role_users',
      error: function (xhr, error, thrown) {
        log(xhr, error, thrown);
      }
    },
    'columns': [
      // Specify your column configurations
      { 'data': null },
      { 'data': 'name' },
      { 'data': 'email' },
      { 'data': 'role_category_title' },
      { 'data': null },
      // Add more columns as needed
    ],
    'columnDefs': [
      {
        targets: 0,
        render: function (data, type, row, meta) {
          return `${meta.row + 1}.`;
        }
      },
      {
        targets: 3,
        render: function (data, type, row) {
          return `${badge(data)} <button class="btn btn-sm btn-warning view-permssions" data-name="${row.role_category_title}" data-id="${row.role_id}" data-permissions='${row.permissions}'><i class="fa fa-eye"></i></button>`;
        }
      },
      {
        targets: -1,
        render: function (data, type, row, meta) {
          return `
              <div class="btn-group">
                <button class="btn btn-info btn-xs btn-sm update-pass-record">
                  <i class="ki-duotone ki-password-check">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                    <span class="path5"></span>
                  </i>
                </button>
                <buttons class="btn btn-primary btn-xs btn-sm edit-record"><i class="ki-outline ki-pencil"></i> Edit</buttons>
                ${deleteBtnRender(1, row.id)}
              </div>
            
            `;
        }
      }
    ]
  }).on('draw', function () {
    $(document).find('.update-pass-record').off('click').on('click', function () {
      var data = table.DataTable().row($(this).parents('tr')).data();
      // var box = mydrawer('Update Password for '+data.name);
      $.AryaAjax({
        url: 'update-role-user-password-form',
        data: { id: data.id }
      }).then((html) => {
        // box.find('.card-body').html(html.html);
        myModel('Update Password for ' + data.name, html.html, 'update-role-user-password').then((r) => {
           if(r.status)
           {
              table.DataTable().ajax.reload();
              ki_modal.modal('hide');
           }
        });
      });
    });
    EditForm(table, 'update_role_user', 'Edit User Role');
    handleDeleteRows('delete-role-user').then((e) => {
      log(e)
    });
    $('.view-permssions').on('click', function () {
      var permissions = $(this).attr('data-permissions');
      var role_category_id = $(this).data('id');
      var name = $(this).data('name');
      $.AryaAjax({
        url: 'view-permissions',
        data: { permissions, role_category_id }
      }).then((html) => {
        var box = mydrawer(`${name} Permissions`);
        box.find('.card-body').html(html.html);
      });
    })
  });

});