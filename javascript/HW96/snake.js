/*jshint -W104, -W119 */
(function () {
    'use strict';
    const setScore = document.getElementById('score');
    let score = 0;
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');
    const img = document.createElement('img');
    const apple = document.createElement('img');
    resize();
    
    // function log(event) {
    //     console.log(event);
    // }
    function resize() {
        canvas.width = window.innerWidth * 0.85;
        canvas.height = window.innerHeight;
    }
    window.addEventListener('resize', resize);
    class Apple{
        constructor() {
            //apple.src = 'images/apple.png';
            this.placeApple();
        } placeApple() {
            const x = Apple.getRandomNumberBetween(0, (canvas.width)-64);
            const y = Apple.getRandomNumberBetween(0, (canvas.height)-64);
            this.appleX = x - (x % 64);
            this.appleY = y - (y % 64);
            apple.src = 'images/apple.png';
            apple.onload = () => { ctx.drawImage(apple, this.appleX, this.appleY); };
        } get x() {
            return this.appleX;
        } get y() {
            return this.appleY;
        } static getRandomNumberBetween(min, max) {
            return Math.floor(Math.random() * (max - min) + min);
        }
    }

    class Snake{
        constructor() {
            this.x = 0;
            this.y = 0;
            this.apple = new Apple();
        }
        createSnake(src, imgWidth, imgHeight) {
            img.src = src;
            this.imgWidth = imgWidth;
            this.imgHeight = imgHeight;
            img.onload = () =>{ ctx.drawImage(img, this.x, this.y, imgWidth, imgHeight); };
        }
        move() {  
            switch (this.direction) {
                case 'ArrowDown':
                    this.y += this.imgHeight;
                    this.x = this.x;
                    break;
                case 'ArrowLeft':
                    this.x -= this.imgWidth;
                    this.y = this.y;
                    break;
                case 'ArrowRight':
                    this.x += this.imgWidth;
                    this.y = this.y;
                    break;
                case 'ArrowUp':
                    this.y -= this.imgHeight;
                    this.x = this.x;
                    break;
            }
            if (this.x < 0) {
                this.x = 0;
                alert('You loose!');
                clearInterval(game);
            } else if (this.x >= canvas.width){
                this.x = canvas.width - this.imgWidth; 
                alert('You loose!');
                clearInterval(game);
            }

            if (this.y < 0) {
                this.y = 0;
                alert('You loose!');
                clearInterval(game);
            } else if (this.y >= canvas.height) {
                this.y = canvas.height - this.imgHeight; 
                alert('You loose!');
                clearInterval(game);
            }
            ctx.drawImage(img, this.x, this.y);
            if (this.x === this.apple.x && this.y === this.apple.y) {
                setScore.innerHTML = ++score;
                this.apple.placeApple();
            }
        }
        listener() {
            document.addEventListener('keydown', (event) => {
                this.direction = event.code;
            });
        }
    }

    const snake = new Snake();
    snake.createSnake('images/snake.png', 64, 64);

    //canvas.addEventListener('keydown', log);
    snake.listener();
    const game = setInterval(() => {
        ctx.clearRect(snake.x, snake.y, snake.imgWidth, snake.imgHeight);
        snake.move();
    }, 400);

})();