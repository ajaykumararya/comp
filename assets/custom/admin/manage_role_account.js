document.addEventListener('DOMContentLoaded', async function () {

    $('.add-role-user').on('submit',function(e){
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

    $('#role_users_table').DataTable({
      ajax: {
        url: ajax_url + 'list_role_users'
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
          targets : 3,
          render : function(data,type,row){
          return `${badge(data)} <button class="btn btn-sm btn-warning view-permssions" data-name="${row.role_category_title}" data-id="${row.role_category_id}" data-permissions='${row.permissions}'><i class="fa fa-eye"></i></button>`;
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
      handleDeleteRows('delete-role-user').then((e) => {
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