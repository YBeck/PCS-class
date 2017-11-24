/*global $ */
(function () {
    "use strict";
    var firstTime = true;

    var contactTable = $('#contactTable');
    // var fname = get('fname');
    // var lname = get('lname');
    // var email = get('email');
    // var phone = get('phone');
    var contactString = '';
    var addButton = $('#addButton');
    var form = $('#form');
    var getContacts = $('#getContacts');
    addButton.hide();

    getContacts.click(function (event) {
        event.preventDefault();
        $.get("contacts.json", function (url) {
           url.forEach(function (element) {
               loadContact(element);
            });
        });
        console.log(contactString);
    });

    function loadContact(contact) {
        if (firstTime) {
            contactTable.empty();
            firstTime = false;
        }
        contactTable.append(
            '<tr><td>' + contact.firstName + '</td>' +
            '<td>' + contact.lastName + '</td>' +
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
        addContact( /*fname.value, lname.value, email.value, phone.value*/ );
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