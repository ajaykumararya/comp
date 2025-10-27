document.addEventListener('DOMContentLoaded', async function () {
  $(".parent-input").click(function () {
    var menuId = $(this).val();
    const isChecked = $(this).is(':checked');
    $(`[data-parent="${menuId}"]`).prop('disabled', !isChecked);
    if (!isChecked) {
      $(`[data-parent="${menuId}"]`).prop('checked', false);
      uncheckAndDisableSubmenus(menuId);
    }
  });
  function uncheckAndDisableSubmenus(parentId) {

    const submenus = $(`[data-parent="${parentId}"]`);
    submenus.each(function () {
      const submenuId = $(this).val();
      $(this).prop('checked', false).prop('disabled', true);
      uncheckAndDisableSubmenus(submenuId);
    });
  }
  $('.manage-role-category').on('submit', function (e) {
    e.preventDefault();
    var length = $('input[name="permission[]"]:checked').length;
    if (length) {
      var message = $('[name="id"]').length ? 'Category Updated Successfully' : 'Category Added Successfully';
      // console.log($(this).serialize());
      $.AryaAjax({
        url: 'add_role_category',
        data: new FormData(this),
        success_message: message,
        page_reload: true
      }).then((r) => {
        if (!r.status) {
          showResponseError(r);
        }
      });
    }
    else
      toastr.error('Please Select Methods..');
  })

  $('#role_category_table').DataTable({
    ajax: {
      url: ajax_url + 'list_role_categories'
    },
    'columns': [
      // Specify your column configurations
      { 'data': null },
      { 'data': 'role_category_title' },
      { 'data': 'permissions' },
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
        targets: 2,
        render: function (data, type, row, meta) {
          return `<button class="btn btn-sm btn-warning view-permssions" data-name="${row.role_category_title}" data-id="${row.role_category_id}" data-permissions='${data}'><i class="fa fa-eye"></i></button>`;
        }
      },
      {
        targets: -1,
        render: function (data, type, row, meta) {
          return `
            <div class="btn-group" role="group" aria-label="Basic example">
              <a href="${base_url}admin/manage-role-category/${btoa(row.id)}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
              <button class="btn btn-sm btn-danger delete-role-cat" data-id="${row.id}" title="Delete"><i class="fa fa-trash"></i></button>
            </div>
          `;
        }
      }
    ]
  }).on('draw', function () {
    $(document).find('.delete-role-cat').off('click').on('click', function () {
      var id = $(this).data('id');
      SwalWarning('Confirmation!', 'Are you sure you want to delete it.', true, 'delete it').then((r) => {
        if (r.isConfirmed) {
          $.AryaAjax({
            url: 'delete-role-category',
            data: { id },
            success_message: 'Role Category Deleted Successfully',
            page_reload: true
          }).then((res) => {
            showResponseError(res);
          });
        }
      });
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