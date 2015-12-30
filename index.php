<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                max-width: 100%;
                max-height: 100%;
                background-color: #edf4f5;
            }

            .logo {
                float: left;
                margin-top: 10%;
                margin-left: 15%;
            }

            .crest {
                margin-top: 30px;
                margin-left: 60%;   
            }

            .container {
                width: 450px;
                height: 200px;
                margin-left: 10%;
            }

            .container2 {
                width: 600px;
                height: 80px;
                margin-left: 8%;
                margin-bottom: 5%;
            }

            input[type=text] {
                width: 450px;
                height: 70px;
                background: #054950;
                font-family: "Adobe Devanagari";
                color: #ffffff;
                border-radius: 10px;
                font-size: 60px;
                text-align: center;
                float: left;
                margin-left: 10%;
            }

            input[type=password] {
                width: 450px;
                height: 70px;
                background: #054950;
                font-family: "Adobe Devanagari";
                color: #ffffff;
                border-radius: 10px;
                font-size: 60px;
                text-align: center;
                float: left;
                margin-top: 5%;
                margin-left: 10%;
            }

            .note {
                font-family: "Adobe Devanagari";
                width: 900px;
                float: center;
                color: #054950;
                font-size: 40px;
                font-weight: 400;
                line-height: 90%;
                margin-left: 15%;
            }

            button[name=go] {
                width: 220px;
                height: 80px;
                border-radius: 10px;
                background-color: #f78f1e;
                font-family: "Adobe Devanagari";
                color: #ffffff;
                font-size: 60px;
                font-weight: 400;
                text-align: center;
                margin-bottom: 2%;
                margin-left: 9%;
                float: left;
                cursor: pointer;
            }
        </style>
        <script>
            function checkInput(str) {

            }
        </script>
        <title>home</title>
        <link rel="icon" href="images/bowles_icon.png">
    </head>

    <body>
        <div class="logo"><img src="images/logo_big.png" alt="Laundry for Bowles" style="width:444px; height:136px;"></div>
        <div class="crest"><img src="images/bowlescrest.png" alt="Bowles Crest" style="width:334px; height:398px;"></div>
        <div class="container">
            <form>
                <input type="text" placeholder="enter username">
                <input type="password" placeholder="enter password">
            </form>
        </div>
        <div class="container">
            <div class="note">if signing up, please also:</div>
            <form><input type="text" placeholder="enter email"></form>
        </div>
        <div class="container2">
            <form>
                <button name="go" type="submit" formaction="dashboard.php">login</button>
                <button name="go" type="submit" formaction="dashboard.php">sign up</button>
            </form>
        </div>
    </body>
</html>
