/*jshint -W104, -W119 */
(function () {
    'use strict';
    const canvas = document.getElementById('canvas');
    var ctx = canvas.getContext('2d');
    let ball;

    function resize() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }

    resize();

    // void ctx.arc(x, y, radius, startAngle, endAngle [, anticlockwise]);
    class Ball{
        constructor() {
            this.x = 75;
            this.y = 75;
            this.directionY = 'down';
            this.directionX = 'right';
            this.angleY = Ball.getRandomNumberBetween(0, 40);
            this.angleX = Ball.getRandomNumberBetween(0, 30);
            ctx.beginPath();
            ctx.arc(this.x, this.y, 50, 0, 2 * Math.PI);
            ctx.fillStyle = "red";
            ctx.fill();
        } 
        move() {
            ctx.clearRect(this.x - 50, this.y -50, 100, 100);
          
            if (this.directionY === 'down') {
                this.y += this.angleY;
            } else if (this.directionY === 'up') {
                this.y -= this.angleY;
            }
            
            if (this.directionX === 'right') {
                this.x += this.angleX;
            } else if (this.directionX === 'left') {
                this.x -= this.angleX;
            }

            ctx.beginPath();
            ctx.arc(this.x, this.y, 50, 0, 2 * Math.PI);
            ctx.fillStyle = "red";
            ctx.fill(); 
            if (this.y +50 >= canvas.height) {
                this.angleY = Ball.getRandomNumberBetween(0, 40);
                this.directionY = 'up';
            } else if (this.y -50 <= 0) {
                this.angleY = Ball.getRandomNumberBetween(0, 40);
                this.directionY = 'down';
            }

            if (this.x +50 >= canvas.width) {
                this.angleX = Ball.getRandomNumberBetween(0, 30);
                this.directionX = 'left';
            } else if (this.x -50 <= 0) {
                this.angleX = Ball.getRandomNumberBetween(0, 30);
                this.directionX = 'right';
            }
        }
        static getRandomNumberBetween(min, max) {
            return Math.floor(Math.random() * (max - min) + min);
        }
    }
    ball = new Ball();
    setInterval(() => {
        ball.move();
    }, 100);

   // setInterval(ball.move, 200);
    

    
})();