var pcs = pcs || {};
pcs.tools = (function () {
    'use strict';
    var display;

    function get(id) {
        return document.getElementById(id);
    }

    function setCss(element, property, value) {
        element.style[property] = value;
    }

    return {
        wrap: function (id) {
            var element = get(id);
            return {
                get: function () {
                    return element;  
                },
                setCss: function (property, value) {
                    setCss(element, property, value);
                    return this;
                },
                pulsate: function () {
                    var fontSize = 32;
                    var i = 1;
                    var interval = setInterval(function () {
                        if (i <= 5 || i >= 15) {
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
                    display = element.style.display;
                    setCss(element, 'display', 'none'); 
                    return this;
                },
                show: function () {
                    setCss(element, 'display', display);
                    return this;
                }
            };
        }
    };    
})();