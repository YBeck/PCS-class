 window.onload = function () {
     'use strict';

     function Vehicle(color) {
         this.color = color;
     }
     Vehicle.prototype.go = function (speed) {
         this.speed = speed;
         console.log('Now going at speed ' + speed);
     };

     Vehicle.prototype.print = function () {
         console.log('color: ' + this.color, ' speed: ' + this.speed);
     };

     function Plane(color) {
         Vehicle.call(this, color);
     }
     Plane.prototype = Object.create(Vehicle.prototype);
     Plane.prototype.go = function (speed) {
         this.speed = speed;
         console.log('Now FLYING at speed ' + speed);
     };
     var p = new Plane('green');
     var v = new Vehicle('blue');
     p.go('33');
     v.go('44');
     p.print();
     v.print();
 };