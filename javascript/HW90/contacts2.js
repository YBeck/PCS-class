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
        $.get("contacts.php", {load: true}, function (url) {
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
        $(
            '<tr id = "' + contact.id + '"><td>' + contact.first_name + '</td>' +
            '<td>' + contact.last_name + '</td>' +
            '<td>' + contact.email + '</td>' +
            '<td>' + contact.phone + '</td>' +
            '<td><button type="button" class="btn btn-info btn-sm"' +
            'data-toggle="modal" data-target="#myModal">Update </button></td > ' +
            '<td><button id="delete" class="btn btn-danger btn-sm">Delete</button></td></tr>'
        ).appendTo(contactTable).find('#delete').click(function () {
            $.post('contacts.php', {
                id: contact.id,
                delete: true
            });
        });
        $('#updateForm').on('submit', function () {
            var update = {
                updateId: contact.id,
                update: true,
                first_name: $('#f_name').val() ? $('#f_name').val() : contact.first_name,
                last_name: $('#l_name').val() ? $('#l_name').val() : contact.last_name,
                email: $('#emailUpdate').val() ? $('#emailUpdate').val() : contact.email,
                phone: $('#phoneUpdate').val() ? $('#phoneUpdate').val() : contact.phone
            };
            $.post('contacts.php', update);
        });
    }


    function addContact() {
        var createContact = {
            first_name: $('#fname'),
            last_name: $('#lname'),
            email: $('#email'),
            phone: $('#phone'),
            add: true
        };
        $.post('contacts.php', createContact);
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