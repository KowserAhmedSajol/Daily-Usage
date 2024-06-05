<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinosaur Game</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('https://wallpapers.com/images/hd/dinosaurs-pictures-jt2ryy8qhupe6uhd.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
        }

        .game-container {
            position: relative;
            width: 600px;
            height: 200px;
            border: 1px solid #ccc;
            overflow: hidden;
            background-color: #fff;
            margin-bottom: 20px;
        }

        .dino {
            position: absolute;
            bottom: 0;
            left: 50px;
            width: 120px;
            height: 90px;
            /* background-image: url('https://31.media.tumblr.com/356c07872c80bc9fada97ec246a66134/tumblr_nfdmiuXac51r5hy6xo1_400.gif'); */
            background-size: cover;
        }

        .dino.jump {
            animation: jump 0.7s;
        }

        @keyframes jump {
            0% { bottom: 0; }
            50% { bottom: 100px; }
            100% { bottom: 0; }
        }

        .obstacle {
            position: absolute;
            bottom: 0;
            right: -20px;
            width: 80px; /* Adjust the width to fit the cactus tree */
            height: auto; /* Adjust height to maintain aspect ratio */
            background-image: url('https://cdn.pixabay.com/animation/2023/11/22/12/32/12-32-48-452_512.gif');
            background-size: contain;
            background-repeat: no-repeat;
            animation: moveObstacle 2s linear infinite;
        }

        @keyframes moveObstacle {
            0% { right: -20px; }
            100% { right: 600px; }
        }

        .score {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 20px;
            color: #333;
        }

        #restart-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            display: none;
        }

        #restart-button.show {
            display: block;
        }

        .loader {
        width: fit-content;
        font-weight: bold;
        font-family: monospace;
        text-shadow:
            0 0 0 rgb(255 0 0),
            0 0 0 rgb(0 255 0),
            0 0 0 rgb(0 0 255);
        font-size: 30px;
        animation: l32 1s infinite cubic-bezier(0.5,-2000,0.5,2000);
        margin-bottom:10px;
        }
        .loader:before {
        content:"Game Over...";
        }

        @keyframes l32{
        25%,100% {
        text-shadow:
            0.03px -0.01px 0.01px rgb(255 0 0),
            0.02px  0.02px 0     rgb(0 255 0),
            -0.02px  0.02px 0     rgb(0 0 255);
        }
        }
    </style>
</head>
<body>
    <div class="loader" id="game-over-message" style="display: none; color: red; font-size: 24px;"></div>

    <div class="game-container">
        <div class="dino" id="dino"></div>
        <div class="obstacle" id="obstacle"></div>
        <div class="score" id="score">Score: 0</div>
    </div>
    <button id="restart-button" onclick="restartGame()">Restart</button>
    <script src="script.js"></script>
    <script>
        let score = 0;
        let gameInterval;
        let scoreInterval;

        document.addEventListener('keydown', function(event) {
            if (event.code === 'Space') {
                jump();
            }
        });

        function jump() {
            const dino = document.getElementById('dino');
            if (!dino.classList.contains('jump')) {
                dino.classList.add('jump');

                setTimeout(function() {
                    dino.classList.remove('jump');
                }, 500);
            }
        }

        function startGame() {
            const obstacle = document.getElementById('obstacle');
            obstacle.style.animation = 'moveObstacle 2s linear infinite';
            obstacle.addEventListener('animationiteration', setRandomObstacleHeight);

            score = 0;
            updateScore();
            gameInterval = setInterval(checkCollision, 10);
            scoreInterval = setInterval(updateScore, 300);
        }

        function setRandomObstacleHeight() {
            const obstacle = document.getElementById('obstacle');
            const minHeight = 20;
            const maxHeight = 50;
            const randomHeight = Math.floor(Math.random() * (maxHeight - minHeight + 1)) + minHeight;
            obstacle.style.height = randomHeight + 'px';
        }

        function updateScore() {
            score++;
            document.getElementById('score').innerText = `Score: ${score}`;
        }
        function setRandomObstacleHeight() {
    const obstacle = document.getElementById('obstacle');
    const minHeight = 20;
    const maxHeight = 50;
    const randomHeight = Math.floor(Math.random() * (maxHeight - minHeight + 1)) + minHeight;
    obstacle.style.height = randomHeight + 'px';

    const images = [
        'https://media0.giphy.com/media/KG4ST0tXOrt1yQRsv0/200w.gif',
        'https://cdn.pixabay.com/animation/2023/11/22/12/32/12-32-48-452_512.gif',
        'https://media1.giphy.com/media/fuJpMdkQhWr4tnz58N/200w_s.gif?cid=8d8c0358jg0v72tcs7z6r7tg5b0w7hrsj6o3l9pqts7oh5kd&ep=v1_gifs_search&rid=200w_s.gif&ct=g'
        // Add more image URLs as needed
    ];

    // Randomly choose an index from 0 to the length of the images array
    const randomIndex = Math.floor(Math.random() * images.length);
    obstacle.style.backgroundImage = `url('${images[randomIndex]}')`;
}

        function checkCollision() {
            const dino = document.getElementById('dino');
            const obstacle = document.getElementById('obstacle');

            const dinoBottom = parseInt(window.getComputedStyle(dino).getPropertyValue('bottom'));
            const obstacleLeft = parseInt(window.getComputedStyle(obstacle).getPropertyValue('left'));

            if (obstacleLeft < 90 && obstacleLeft > 50 && dinoBottom <= parseInt(obstacle.style.height)) {
                endGame();
            }
        }

        function endGame() {
            const obstacle = document.getElementById('obstacle');
            obstacle.style.animation = 'none';
            obstacle.style.display = 'none';

            clearInterval(gameInterval);
            clearInterval(scoreInterval);

            document.getElementById('restart-button').classList.add('show');
            document.getElementById('game-over-message').style.display = 'block';
        }


        function restartGame() {
            const obstacle = document.getElementById('obstacle');
            obstacle.style.display = 'block';
            obstacle.style.animation = 'moveObstacle 2s linear infinite';

            document.getElementById('restart-button').classList.remove('show');
            document.getElementById('score').innerText = 'Score: 0';

            document.getElementById('game-over-message').style.display = 'none';
            startGame();
        }

        startGame();
    </script>
    <style>
        .dino {
            background-image: url('{{ asset('storage/games/dino/dino.gif') }}');
        }
    </style>
</body>
</html>
