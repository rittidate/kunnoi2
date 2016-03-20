$(function() {

    $("#jsGrid").jsGrid({
        height: "100%",
        width: "100%",
        filtering: false,
        editing: false,
        inserting: false,
        sorting: true,
        paging: false,
        autoload: true,
        pageSize: 15,
        pageButtonCount: 5,
        deleteConfirm: "Do you really want to delete the client?",
        controller: db,
        rowClick: function(args) { 
            console.log(args);
        },
        fields: [
            { name: "Name", type: "text", width: 150 },
            { name: "Age", type: "number", width: 50 },
        ]
    });


});
