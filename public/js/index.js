$(document).ready(function () {
    $('#employees').DataTable({
        select: true,
        "ordering": true,
        "aoColumnDefs": [
            { 'bSortable': false, 'aTargets': [ 0, 5 ] }
        ]
    });
});