<!DOCTYPE html>
<html>
    <head>
        <title>Battle of Pirates</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">

    </head>


    <body>

        <div class="menu">
            <span class="logout" title="logout">x</span>
            <div class="hud-profile"><b></b></div>
            <div class="menu-wrapper">

                <h1 class="logo">Pirates Boom</h1>

                <span class="loading">Loading</span>

                <div class="menu-box menu-login">

                    <form class="login">
                        <p>
                            <label for="username">Username</label>
                            <input type="text" class="username" id="username" placeholder="Username*" required />
                        </p>
                        <p><input type="submit" class="btn play" value="Login" /></p>
                    </form>

                </div>

                <div class="menu-box menu-game">

                    <form class="join">
                        <p><input type="text" class="gameid" placeholder="GameID(if join)" /></p>
                        <p><input type="submit" class="btn" value="Join Game" /></p>
                    </form>

                    <span class="btn createGame">Create Game</span>
                </div>

            </div>

        </div>

        <div class="game-lobby">
            <div class="game-box">
                <h2>Ingame Players :</h2>
                <ul class="players">
                </ul>
                <span class="btn startGame">Start game</span>
            </div>
        </div>

        <div class="game-container">

            <div class="game-ui game-ui-box left">
                <span class="timer" time="20">20</span>
                <ul class="players">
                </ul>      
            </div>
            <div class="game-ui game-ui-box right">
            </div>
            <div class="game-ui game-ui-box bottom">
                <span class="energy">6</span>
                <ul class="skills">
                    <li class="skill-move" id="1" title="Move"><i>1</i></li>
                    <li class="skill-view" id="2" title="View"><i>2</i></li>
                    <li class="skill-shot" id="3" title="Shot"><i>3</i></li>
                </ul>
            </div>




            <div class="game grabbable">

                <div class="map">
                    <div class="grid-floor"><span class="under-floor"></span></div>
                    <div class="grid">
                    </div>
                </div>

            </div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="script/velocity.min.js"></script>
        <script type="text/javascript" src="script/game.js"></script>
    </body>
</html>