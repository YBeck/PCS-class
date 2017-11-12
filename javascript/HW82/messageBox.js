var messageBox = messageBox || {};

messageBox = function (button) {
    "use strict";
    var tbDiv = createElement('div');
    var textInput = createElement('textarea');
    var submit = createElement('button');
    var checkboxDiv = createElement('div');
    var checkboxLabel = createElement('label');
    var modalDiv = createElement('div');
    var checkbox = createElement('input');
    var incrementLeft = 3;
    var incrementZindex = 20001;

    modalDiv.className = "modal";
    
    checkbox.className = "checkbox";
    checkbox.type = "checkbox";

    textInput.className = "textBox";
    tbDiv.className = "tbDiv";

    submit.innerText = "Submit";

    tbDiv.appendChild(textInput);
    tbDiv.appendChild(submit);

    checkboxDiv.appendChild(checkboxLabel);
    checkboxDiv.appendChild(checkbox);

    checkboxLabel.innerText = "Modal";

    
    document.body.appendChild(tbDiv);
    document.body.appendChild(checkboxDiv);
    document.body.appendChild(modalDiv);

    function createDialog() {
        var mbDiv = createElement('div');
        var mbspan = createElement('span');
        var okButton = createElement('button');
        var buttonDiv = createElement('div');
        var btnLeft = 3;
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        mbDiv.className = "mbDiv";
        mbDiv.style.backgroundColor = "rgb(" + r + "," + g + "," + b + ")"; 
        mbspan.className = "span";
        mbspan.innerText = textInput.value; 
        mbDiv.appendChild(mbspan);

        okButton.innerText = "OK";
        okButton.className = "button";
        buttonDiv.className = 'btnDiv';
        buttonDiv.appendChild(okButton);

        if (Array.isArray(button)) {
            button.forEach(function (element) {
                buttonDiv.appendChild(element);
                element.style.left = mbDiv.offsetLeft + btnLeft;
            });
        }
 
        mbDiv.appendChild(buttonDiv);
        document.body.appendChild(mbDiv);

        buttonDiv.addEventListener('click', function (event) {
            switch (event.target.innerHTML) {
                case 'OK':
                    document.body.removeChild(mbDiv);
                    modalDiv.style.display = "none";
                    break;
                case 'btn1':
                    console.log("btn1 was clicked"); 
                    break;
                case 'btn2':
                    console.log("btn2 was clicked"); 
                    break;
                case 'btn3':
                    console.log("btn3 was clicked");    
            }
            event.stopPropagation();

        });
     
        mbDiv.style.left = (mbDiv.offsetLeft + incrementLeft) -150 + "px";
        incrementLeft += 35;

        mbDiv.addEventListener('click', function () {
            mbDiv.style.zIndex = ++incrementZindex;
        });
    }

    submit.addEventListener('click', function () {
        createDialog();
        if (checkbox.checked) {
            modalDiv.style.display = "inline-block";
        }
    });

    function createElement(type) {
        return document.createElement(type);
    } 

    return createDialog;
};