/*global $ */
(function () {
    "use strict";
    var firstTime = true;

    var contactTable = $('#contactTable');
    var addButton = $('#addButton');
    var form = $('#form');
    var getContacts = $('#getContacts');
    addButton.hide();

    getContacts.click(function (event) {
        event.preventDefault();
        $.get("contacts.php", function (url) {
            console.log(url);
           url.forEach(function (element) {
               loadContact(element);
            });
        });
    });

    function loadContact(contact) {
        if (firstTime) {
            contactTable.empty();
            firstTime = false;
        }
        contactTable.append(
            '<tr><td>' + contact.first_name + '</td>' +
            '<td>' + contact.last_name + '</td>' +
            '<td>' + contact.email + '</td>' +
            '<td>' + contact.phone + '</td></tr>'
        );
    }


    function addContact() {
        if (firstTime) {
            contactTable.empty();
            firstTime = false;
        }

        var tdString = '';
        for (var i = 0; i < form[0].length - 1; i++) {
            tdString += '<td>' + form[0][i].value + '</td >';
        }
        contactTable.append('<tr>' + tdString + '</tr>');
        form[0].reset();

    }

    addButton.click(function (event) {
        addContact();
        event.preventDefault();
    });

    form.keypress(function () {
        if (form[0].value !== "") {
           addButton.show();
        } else {
            addButton.hide();
        }

    });

}());