import "./bootstrap";

var Turbolinks = require("turbolinks");
Turbolinks.start();

document.addEventListener("turbolinks:load", function () {
    var dataTableElement = $(".datatable-init");
    if ($.fn.DataTable.isDataTable(dataTableElement)) {
        dataTableElement.DataTable().destroy();
    }
    dataTableElement.DataTable({
        responsive: false,
        // Opsi datatable Anda di sini
    });
});

// Jika Anda menggunakan Livewire
Livewire.on("contentChanged", () => {
    var dataTableElement = $(".datatable-init");
    if ($.fn.DataTable.isDataTable(dataTableElement)) {
        dataTableElement.DataTable().destroy();
    }
    dataTableElement.DataTable({
        responsive: false,
        // Opsi datatable Anda di sini
    });
});
