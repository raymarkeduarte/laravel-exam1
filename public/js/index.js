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

function editEmployee(id){
    let name = $('#'+id).find('.employeeName').text()
    let email = $('#'+id).find('.employeeEmail').text()
    let address = $('#'+id).find('.employeeAddress').text()
    let phone = $('#'+id).find('.employeePhone').text()
    phone = phone.replace('+', '')
    id = id.replace('employee', '')

    // populate input fields
    $('#editID').val(id)
    $('#editName').val(name)
    $('#editEmail').val(email)
    $('#editAddress').val(address)
    $('#editPhone').val(phone)
}

function deleteEmployee(id){
    let name = $('#'+id).find('.employeeName').text()
    id = id.replace('employee', '')
    $("#deleteEmployee .modal-title > span").html(': '+name)
}