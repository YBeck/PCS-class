/*jshint -W104, -W119 */
(function () {
    'use strict';
    const setScore = document.getElementById('score');
    const canvas = document.getElementById('canvas');
    const music = document.getElementById('background');
    const crunch = document.getElementById('crunch');
    const crash = document.getElementById('crash');
    const mute = document.getElementById('mute');
    const ctx = canvas.getContext('2d');
    const img = document.createElement('img');
    const apple = document.createElement('img');
    let snake;
    let score = 0;
    resize();
    
    // function log(event) {
    //     console.log(event);
    // }
    function resize() {
        const WIDTH = window.innerWidth * 0.90;
        const HEIGHT = window.innerHeight;
        canvas.width = WIDTH - (WIDTH % 64);
        canvas.height = HEIGHT - (HEIGHT % 64);
        if (snake) {
            snake.apple.placeApple();
        }    
    }

    function audio(element) {
        element.currentTime = 0;
        element.play();
    }
    window.addEventListener('resize', resize);
    class Apple{
        constructor() {
            this.placeApple();
        } placeApple(snakeCoords = []) {
            let x;
            let y;
            let check = false;
            apple.src = 'images/apple.png';
            console.log(check);
             while (!check) {
                x = Apple.getRandomNumberBetween(0, (canvas.width) - 64);
                y = Apple.getRandomNumberBetween(0, (canvas.height) - 64);
                x = x - (x % 64);
                y = y - (y % 64);
                    check = snakeCoords.every((element) => {
                        return element.x !== x && element.y !== y;
                 });
                  console.log(check, ' inside loop');
             }
            this.appleX = x;
            this.appleY = y;
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
            this.coordinates = [{x: 0, y: 0}];
            this.apple = new Apple();
            this.direction = 'ArrowRight';
        }
        createSnake(src, imgWidth, imgHeight) {
            img.src = src;
            this.imgWidth = imgWidth;
            this.imgHeight = imgHeight;
            img.onload = () => {
                ctx.drawImage(img, this.coordinates[0].x, this.coordinates[0].y, imgWidth, imgHeight);
            };
        }
        move() { 
            let grew = false;
            let head = this.coordinates[0];
            let tail = this.coordinates.pop();
            let x = head.x;
            let y = head.y;
            //ctx.clearRect(x, y, this.imgWidth, this.imgHeight);
            switch (this.direction) {
                case 'ArrowDown':
                    if (this.direction !== 'ArrowUp') {
                        y += this.imgHeight;
                    }    
                    break;
                case 'ArrowLeft':
                     x -= this.imgWidth;
                    break;
                case 'ArrowRight':
                     x += this.imgWidth;
                    break;
                case 'ArrowUp':
                     y -= this.imgHeight;
                    break;
            }
            this.coordinates.unshift({x: x, y: y});

            if (this.coordinates[0].x < 0 || this.coordinates[0].x >= canvas.width || this.coordinates[0].y < 0 || this.coordinates[0].y >= canvas.height) {
                audio(crash);
                clearInterval(game);
                alert('Game over!');
                return;
            }
            if (this.coordinates[0].x === this.apple.x && this.coordinates[0].y === this.apple.y) {
                audio(crunch);
                setScore.innerHTML = ++score;
                grew = true;
                this.coordinates.push({ x: tail.x, y: tail.y });
                this.apple.placeApple(this.coordinates);
            }
            ctx.drawImage(img, this.coordinates[0].x, this.coordinates[0].y);
            ctx.fillStyle = "green";
            ctx.fillRect(head.x, head.y, this.imgWidth, this.imgHeight);
            if (!grew) {
                ctx.clearRect(tail.x, tail.y, this.imgWidth, this.imgHeight);
            }
        }
        listener() {
            document.addEventListener('keydown', (event) => {
                this.direction = event.code;
            });
        } 
    }

    snake = new Snake();
    snake.createSnake('images/snake.png', 64, 64);

    //canvas.addEventListener('keydown', log);
    snake.listener();
    const game = setInterval(() => {
        // ctx.clearRect(snake.coordinates[0].x, snake.coordinates[0].y, snake.imgWidth, snake.imgHeight);
        snake.move();
    }, 400);

    mute.addEventListener('click', () => {
        if (!music.muted) {
            music.muted = true;
            mute.innerHTML = 'Sound';
        } else {
            music.muted = false;
            mute.innerHTML = 'Mute';
    }    
    });

})();