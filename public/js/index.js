$(document).ready(function () {
    let employeesTable = $('#employees').DataTable({
        dom: 'frtip',
        pageLength: 5,
        columnDefs: [ 
            {
                orderable: false,
                className: 'select-checkbox',
                targets:    0
            },
            {
                orderable: false,
                targets:   6
            } 
        ],
        select: {
            style:    'multi',
            selector: 'td'
        },
        order: [ 2, 'asc' ],
    });

    $('#selectAllEmployees').on('click', function(){
        if($(this).prop('checked')){
            $('#employees tbody tr').trigger('click')
            employeesTable.rows().select()
        }
        else 
            employeesTable.rows().deselect()
    })
    
    $('#employees tbody tr').on( 'click', function(){
        // get row ID
        let selectedRow = employeesTable.row(this, { select: true} ).id();
        selectedRow = selectedRow.replace('employee', '')

        // add / remove data if exists
        if(selectedRowData.includes(selectedRow))
            selectedRowData = $.grep(selectedRowData, function(n) {
                return n != selectedRow;
            });
        else
            selectedRowData.push(selectedRow)

        console.log(selectedRowData)
    });

    $('#multiDelete').click(function(){
        if(selectedRowData.length === 0)
            alert('Please select row(s) first.')
        else{
            $('#deleteEmployees').modal('show')
            $('#deleteIDMultiple').val( JSON.stringify( selectedRowData ) )
            $('#selectedRows').text('Employee ID(s): '+ selectedRowData)
        }
    })

});

let selectedRowData = [];

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
    $('#deleteID').val(id)
}