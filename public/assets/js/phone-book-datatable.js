var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "PhoneBook/actionPhoneBookDatatable",
        table: "#phone_book_table",
        fields: [ {
            label: "Name:",
            name: "name"
        }, {
            label: "Phone Number:",
            name: "phone_number"
        }, {
            label: "Additional Notes:",
            name: "notes"
        }
        ]
    } );

    var table = $('#phone_book_table').DataTable( {
        dom: "Bfrtip",
        ajax: "PhoneBook/getPhoneBookDatatable",
        columns: [
            { data: "DT_RowId", "visible": false, "searchable": false },
            { data: "name" },
            { data: "phone_number" },
            { data: "date_created" },
            { data: "notes" }
        ],
        order: [ 3, 'desc' ],
        select: true,
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );

    editor.on('submitComplete', function (e, json, data){
        table.ajax.reload();
    } );

} );