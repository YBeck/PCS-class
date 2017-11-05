(function () {
    "use strict";
    var firstTime = true;

    function get(id) {
        return document.getElementById(id);
    }

    var contactTable = get('contactTable');
    // var fname = get('fname');
    // var lname = get('lname');
    // var email = get('email');
    // var phone = get('phone');
    var addButton = get('addButton');
    var form = get('form');
    addButton.disabled = true;

    function addContact(/*fname, lname, email, phone*/) {
        if (firstTime) {
            contactTable.deleteRow(1);
            firstTime = false;
        }
        var row = contactTable.insertRow();
        for (var i = 0; i < form.length -1; i++){  //get value of all inputs besides the button
            row.insertCell().innerHTML = form[i].value;
        }
        form.reset();
        

        // var row = contactTable.insertRow();
        // var firstNameCell = row.insertCell();
        // var lastNameCell = row.insertCell();
        // var emailCell = row.insertCell();
        // var phoneCell = row.insertCell();

        // firstNameCell.innerHTML = fname;
        // lastNameCell.innerHTML = lname;
        // emailCell.innerHTML = email;
        // phoneCell.innerHTML = phone;

    }

    addButton.addEventListener('click', function (event) {
        addContact(/*fname.value, lname.value, email.value, phone.value*/);
        event.preventDefault();
    });

    form.addEventListener('input', function () {
        if (form[0].value !== "") {
            addButton.disabled = false;
        } else {
            addButton.disabled = true;
    }

    });

}());