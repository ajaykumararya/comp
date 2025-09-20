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
      // console.log($(this).serialize());
      $.AryaAjax({
        url: 'add_role_category',
        data: new FormData(this),
        success_message: 'Category Added Successfully',
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
        targets : 2,
        render: function (data, type, row, meta) {
          return `<button class="btn btn-sm btn-warning view-permssions" data-name="${row.role_category_title}" data-id="${row.role_category_id}" data-permissions='${data}'><i class="fa fa-eye"></i></button>`;
        }
      },
      {
        targets: -1,
        render: function (data, type, row, meta) {
          return deleteBtnRender(1, row.id);
        }
      }
    ]
  }).on('draw', function () {
    handleDeleteRows('delete-role-cat').then((e) => {
      log(e)
    });
    $('.view-permssions').on('click',function(){
      var permissions = $(this).attr('data-permissions');
      var role_category_id = $(this).data('id');
      var name = $(this).data('name');
      $.AryaAjax({
        url : 'view-permissions',
        data : {permissions,role_category_id}
      }).then( (html) => {
        var box = mydrawer(`${name} Permissions`);
        box.find('.card-body').html(html.html);
      });
    })
  });
});