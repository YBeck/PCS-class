/*jshint -W104, -W119 */
(function () {
    'use strict';
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');
    const img = document.createElement('img');
    canvas.width = screen.width;
    canvas.height = screen.height;
    // function log(event) {
    //     console.log(event);
    // }

    class Snake{
        constructor() {
            this.x = 0;
            this.y = 0;
        }
        createSnake(src, imgWidth, imgHeight) {
            img.src = src;
            this.imgWidth = imgWidth;
            this.imgHeight = imgHeight;
            img.onload = function () { ctx.drawImage(img, this.x, this.y, imgWidth, imgHeight); };
        }
        move() {  
            //console.log(this.direction);
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
            } else if (this.x >= canvas.width){
                this.x = canvas.width - this.imgWidth; 
            }

            if (this.y < 0) {
                this.y = 0;
            } else if (this.y >= canvas.height) {
                this.y = canvas.height - this.imgHeight; 
            }
            ctx.drawImage(img, this.x, this.y);

        }
        listener() {
            document.addEventListener('keydown', (event) => {
                this.direction = event.code;
                // console.log(this.direction);
            });
        }
    }

    const snake = new Snake();
    snake.createSnake('images/snake.png', 64, 64);

    //canvas.addEventListener('keydown', log);
    snake.listener();
    setInterval(() => {
        ctx.clearRect(snake.x, snake.y, snake.imgWidth, snake.imgHeight);
        snake.move();
    }, 400);
    
    // document.addEventListener('keydown', (event) => {
    //     snake.move(event);
    // });

})();