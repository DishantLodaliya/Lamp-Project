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
            height: 400px;
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

                    <li><a href="subjects.php">Subjects</a></li><br>
                    <li><a href="tests.php">Topics</a></li><br>
                    <li><a href="questions.php">Questions</a></li><br>
                    <li><a href="results.php">Results</a></li><br>
                    <li><a href="users.php">Users</a></li><br>
                    <li><a href="signout.php">Log Out</a></li><br>

                </ul>
            </div>
        </div>
    </div>
</body>

</html>