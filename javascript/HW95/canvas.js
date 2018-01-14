/*jshint -W104, -W119 */
(function () {
    'use strict';

    let initialAmountOfAnts = 1000;
    let form = document.getElementById('form');
    let amount = document.getElementById('more');
    let color = document.getElementById('color');
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        for (let i = 0; i < amount.value; i++) {
            ants.push(new Ants(color.value));
        }

    });

    let canvas = document.getElementById('canvas');
    let ctx = canvas.getContext('2d');
    canvas.width = screen.width;
    canvas.height = screen.height;
    let ants = [];

    function getRandomNumberBetween(min, max) {
        return Math.floor(Math.random() * (max - min) + (-2));
    }

    class Ants{
        constructor(color = "black") {
            this.x = canvas.width / 2;
            this.y = canvas.height / 2;
            this.color = color;
            this.index = 0;
        }
        move() {
            if (this.index++ === 0) {
                this.moveX = getRandomNumberBetween(-2, 2);
                this.moveY = getRandomNumberBetween(-2, 2);
                this.xRandon = Math.floor(Math.random() * 2 + 1); // which way to move
                this.yRandon = Math.floor(Math.random() * 2 + 1);
            }
            if (this.xRandon === 2 || this.x === 0) {
                this.x += this.moveX;
            } else if (this.xRandon === 1 || this.x === (window.innerWidth - 1)) {
                this.x -= this.moveX;
            }
            if (this.yRandon === 2 || this.y === 0) {
                this.y += this.moveY;
            } else if (this.yRandon === 1 || this.y === (window.innerHeight - 1)) {
                this.y -= this.moveY;
            }

            ctx.fillStyle = this.color;
            ctx.fillRect(this.x, this.y, 2, 2);
            if (this.index === this.random -1) {
                clearInterval(this.iterval);
                this.index = 0;
            }

        }
        antBrains() {
             this.random = 10;
            // this.random = Math.floor(Math.random() * 5 + 1);
            this.iterval = setInterval(() => {
                ctx.clearRect(this.x - 1, this.y - 1, 4, 4);
                this.move();
            }, 200);
        }
    }
    for (let i = 0; i < initialAmountOfAnts; i++) {
        ants.push(new Ants());
    }
    setInterval(() => {
        //ctx.clearRect(0, 0, canvas.width, canvas.height);
        ants.forEach((e) => e.antBrains());
    }, 900);
})();
