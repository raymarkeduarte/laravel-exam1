$(document).ready(function () {
    let employeesTable = $('#employees').DataTable({
        columnDefs: [ 
            {
                orderable: false,
                className: 'select-checkbox',
                targets:    0
            },
            {
                orderable: false,
                targets:   5
            } 
        ],
        // searching: false,
        select: {
            style:    'multi',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
    });

    $('#selectAllEmployees').on('click', function(){
        if($(this).prop('checked'))
            employeesTable.rows().select()
        else 
            employeesTable.rows().deselect()
    })
});