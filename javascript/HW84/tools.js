var pcs = pcs || {};
pcs.tools = (function () {
    'use strict';

    function get(id) {
        return document.getElementById(id);
    }

    function setCss(element, property, value) {
        element.style[property] = value;
    }

    return {
        wrap: function (id) {
            var element = get(id);
            var currentDisplay;
            var fontSize;
            var theData;
            return {
                get: function () {
                    return element;  
                },
                css: function (property, value) {
                    if (value) {
                        setCss(element, property, value);
                        return this;
                    } else {
                        return getComputedStyle(element).getPropertyValue(property);
                    }     
                },
                pulsate: function () {
                    fontSize = parseInt(this.css('font-size'));
                    console.log(fontSize);
                    var i = 1;
                    var interval = setInterval(function () {
                        if (i <= 5 || i > 15) {
                            fontSize += 5;
                        } else {
                            fontSize -= 5;
                        }
                        setCss(element, 'fontSize', fontSize + 'px');
                        if (i++ === 20) {
                            clearInterval(interval);
                        }
                    }, 100);
                    return this;
                },
                click: function (callback) {
                    element.addEventListener('click', callback);
                    return this;
                },
                hide: function () {
                    currentDisplay = getComputedStyle(element).getPropertyValue('display');
                    this.css('display', 'none'); 
                    return this;
                },
                show: function () {
                    this.css('display', currentDisplay);
                    return this;
                },
                setInnerHTML: function (html) {
                    element.innerHTML = html;
                    return this;
                },
                setData: function (data) {
                    theData = data;
                    return this;
                },
                getData: function () {
                    return theData;
                }
            };
        }
    };    
})();