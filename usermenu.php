<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>JSP Page</title>
    <style>
        .menu {
            width: 300px;
            height: 300px;
            float: left;

        }

        .menubar {
            width: 200px;
            height: 230px;
            background-color: #42d1f5;
            margin: 0px 45px 0 45px;
            border-radius: 10px;
        }
        .menubar ul {
            list-style: none;
            padding: 20px;
            margin: 5px;

        }

        .menubar ul li {
            margin: 8px;
            padding: 5px;
            width: 135px;
            background-color: #004d4d;
            border-radius: 8px;
            display: block;
            text-align: center;
        }

        .menubar ul li a {
            display: block;
            width: 135px;
            text-decoration: none;
            color: yellow;

        }
    </style>
</head>

<body>
    <div class="menu">
        <div class="menubar">
            <div class="menubar2">
                <ul>

                    <li><a href="subjectchoice.php">Give Exam</a></li><br>
                    <li><a href="viewresult.php">View Result</a></li><br>
                    <li><a href="userlogout.php">Logout</a></li><br>

                </ul>
            </div>
        </div>
    </div>
</body>

</html>