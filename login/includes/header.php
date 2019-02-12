
<?php
include 'db.php';
session_start();

$menuPages = "Sider";
$menuPosts = "Indlæg";
$menuUsers = "Brugere";
$adminPanel = "Admin Panel";
$activePage = basename($_SERVER['PHP_SELF'], ".php");
$loggedtime = time() - 60;

?>
<?php if(isset($_SESSION['admin']) || isset($_SESSION['user'])) {
        mysqli_query($conn,"UPDATE `brugere` SET `logged` = '".time()."' WHERE `username` = '".$_SESSION['username']."'") or die(mysqli_error());
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kisbye CMS | <?php echo $_SESSION['fullName']; ?></title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">

    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
</head>
<body>

<nav class="navbar text-secondary bg-primary">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand text-dark" style="color: white;">KISBYE CMS </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav" >
                <?php if(isset($_SESSION['admin'])) { ?>
                <li class="<?php if ($activePage == 'index') { echo 'active'; } ?> " ><a href="index.php" style="color: white;"><?php echo $adminPanel ?></a></li>
                <li class="<?php if ($activePage == 'users') { echo 'active'; } ?> "><a href="users.php" style="color: white;"><?php echo $menuUsers ?></a></li>
                <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="update.php" style="color: white;">Velkommen, <?php echo $_SESSION['fullName'];  ?></a></li>
                <li><a href="/logout.php"  style="color: white;">Log ud</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1></span> <?php echo $_SESSION['fullName'];  ?>'s <small>Brugerpanel</small></h1>
            </div>
            <div class="col-md-2">
                <?php if(isset($_SESSION['admin'])) { ?>
                <div class="dropdown create">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Tilføj
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a type="button" data-toggle="modal" data-target="#addUser">Ny Bruger</a></li>
                    </ul>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</header>
<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">

                    <div class="list-group">
                        <a href="index.php" class="list-group-item active primary-color-bg">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <?php echo "Menu"; ?>
                        </a>
                        <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $menuUsers ?> <span class="badge"><?php echo count(get_online()); ?></span></a>
                        <?php if(isset($_SESSION['admin'])) { ?>

                            <a href="tasks.php" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> <?php echo "Bogfør opgaver" ?> <span class="badge"></span></a>
                        <?php } ?>

                            <a href="deadlines.php" class="list-group-item"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Deadlines </a>
                            <a href="messages.php" class="list-group-item"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Beskeder </a>
                            <a href="chat.php" class="list-group-item"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Chat </a>
                            <a href="files.php" class="list-group-item"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Filer </a>

                    </div>
                <div class="well ">
                    <h4>Deadlines fuldført</h4>
                    <div class="progress">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%; background-color:#428bca;">
                            60%
                        </div>
                    </div>
                    <h4>Medarbejdere online </h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ceil(count(get_online())/count(get_user_info())*100); ?>%; background-color:#428bca;">
                            <?php echo ceil(count(get_online())/count(get_user_info())*100); ?>%
                        </div>
                    </div>
                </div>
            </div>

<?php } ?>