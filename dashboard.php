<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style>
            body {
                max-width: 100%;
                max-height: 100%;
                background-color: #EDF4F5;
                overflow-x: hidden;
            }

            .header {
                margin: 0;
                width: 100%;
                height: 100px;
                background-color: #f78f1e;
            }

            input[type=submit] {
                width: 220px;
                height: 55px;
                border-radius: 10px;
                background-color: #789a9f;
                font-family: "Adobe Devanagari";
                color: #ffffff;
                font-size: 45px;
                font-weight: 400;
                text-align: center;
                float: left;
                margin-top: 25px;
                margin-left: 30px;
                cursor: pointer;
            }

            .logo {
                float: right;
                margin-right: 30px;
            }

            .crest {
                margin-top: 10px;
                float: right;
            }

            .note {
                font-family: "Adobe Devanagari";
                width: 900px;
                float: center;
                color: #054950;
                font-size: 40px;
                font-weight: 400;
                text-align: center;
                margin-top: 35px;
                line-height: 90%;
                margin-left: 233px;
            }

            .queue {
                margin-top: 20px;
                margin-left: 60px;
            }

            .w1 {
                width: 300px;
                height: 450px;
                border-radius: 10px;
                background-color: #f2c189;
                float: left;
                overflow: auto;
            }

            .w2 {
                width: 300px;
                height: 450px;
                border-radius: 10px;
                background-color: #f2c189;
                margin-left: 15px;
                float: left;
                overflow: auto;
            }

            .d1 {
                width: 300px;
                height: 450px;
                border-radius: 10px;
                background-color: #f2c189;
                margin-left: 16px;
                float: left;
                overflow: auto;
            }

            .d2 {
                width: 300px;
                height: 450px;
                border-radius: 10px;
                background-color: #f2c189;
                margin-left: 15px;
                float: left;
                overflow: auto;
            }

            .heading {
                font-family: "Adobe Devanagari";
                color: #ffffff;
                font-size: 60px;
                font-weight: 400;
                text-align: center;
                margin-top: 10px;
            }

            .list {
                width: 280px;
                height: 300px;
                font-family: "Adobe Devanagari";
                font-size: 28px;
                color: #789A9F;
                text-align: center;
            }

            button[name=queue] {
                width: 175px;
                height: 45px;
                border-radius: 10px;
                background-color: #789a9f;
                font-family: "Adobe Devanagari";
                color: #ffffff;
                font-size: 35px;
                font-weight: 400;
                text-align: center;
            margin-top: 300px;
            margin-left: 60px;
            margin-bottom: 10px;
            cursor: pointer;
            }

            .footer {
                width: 100%;
                height: 20px;
                background-color: #054950;
                margin-top: 550px;
                font-family: "Adobe Devanagari";
                text-align: center;
                color: #ffffff;
            }
        </style>
        <title>dashboard</title>
        <link rel="icon" href="images/bowles_icon.png">
    </head>

    <body>
        <div class="header">
            <input type="submit" value="logout">
            <div class="logo"><img src="images/logo.png" alt="Laundry for Bowles"></div>
            <div class="crest"><img src="images/bowlescrest.png" alt="Bowles Crest" style="width: 65px; height:80px;"></div>
        </div>

        <div class="note">
            note: if you are first in the queue for more than 15 minutes,
    you will be dropped to the end.
        </div>

        <div class="queue">
            <div class="w1">
                <div class="heading">L washer</div>
                <div class="list"><em>name</em></div>
                <form><button name="queue" type="submit">join queue</button></form>
            </div>
            <div class="w2">
                <div class="heading">R washer</div>
                <div class="list"><em>name</em></div>
                <form><button name="queue" type="submit">join queue</button></form>
            </div>
            <div class="d1">
                <div class="heading">L dryer</div>
                <div class="list"><em>name</em></div>
                <form><button name="queue" type="submit">join queue</button></form>
            </div>
            <div class="d2">
                <div class="heading">R dryer</div>
                <div class="list"><em>name</em></div>
                <form><button name="queue" type="submit">join queue</button></form>
            </div>
        </div>

        <div class="footer">
            Copyright © 2015 by Katya Stukalova, Sijing Xie. All Rights Reserved.
        </div>
    </body>
</html>
