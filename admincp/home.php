<?php
ob_start();
session_start();
if(!isset($_SESSION['userRole'])){
    header('Location: index.php');
}
$adminRole = $_SESSION['userRole'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ADMIN </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/main.css" />
    <style>
        /* Simple dashboard grid CSS */
        /* Assign grid instructions to our parent grid container */
        .grid-container {
        display: grid;
        grid-template-columns: 240px 1fr;
        grid-template-rows: 50px 1fr 50px;
        grid-template-areas:
            "sidenav header"
            "sidenav main"
            "sidenav footer";
        height: 100vh;
        }

        /* Give every child element its grid name */
        .header, .footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 16px;
        background-color: #648ca6;
        }

        .sidenav {
            display: flex; /* Will be hidden on mobile */
            flex-direction: column;
            grid-area: sidenav;
            background-color: #394263;
        }

        .sidenav__list {
            padding: 0;
            margin-top: 85px;
            list-style-type: none;
        }

        .sidenav__list-item {
            padding: 20px 20px 20px 40px;
            color: #ddd;
        }

        .sidenav__list-item:hover {
            background-color: rgba(255, 255, 255, 0.2);
            cursor: pointer;
        }
        

        .main-header {
            display: flex;
            justify-content: space-between;
            margin: 20px;
            padding: 20px;
            height: 150px; /* Force our height since we don't have actual content yet */
            background-color: #e3e4e6;
            color: slategray;
        }
        .main-overview {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(265px, 1fr)); /* Where the magic happens */
            grid-auto-rows: 94px;
            grid-gap: 20px;
            margin: 20px;
        }
  
        .overviewcard {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            background-color: #d3d3;
        }


        .footer {
        grid-area: footer;
        background-color: #648ca6;
        }
    </style>
</head>
<body>
    <div class="grid-container">

        <header class="header">
            <div class="header__search">Search...</div>
            <div class="header__avatar">Your face</div>
        </header>
        <aside class="sidenav">
        <ul class="sidenav__list">
            <li class="sidenav__list-item">Item One</li>
            <li class="sidenav__list-item">Item Two</li>
            <li class="sidenav__list-item">Item Three</li>
            <li class="sidenav__list-item">Item Four</li>
            <li class="sidenav__list-item">Item Five</li>
        </ul>
        </aside>
        <div class="main-header">
            <div class="main-header__heading">Hello User</div>
            <div class="main-header__updates">Recent Items</div>
        </div>
        

        <footer class="footer">
            <div class="footer__copyright">&copy; 2018 MTH</div>
            <div class="footer__signature">Made with love by pure genius</div>
        </footer>
        
    </div>
</body>
</html>