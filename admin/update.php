<?php

session_start();

// logout
if (isset($_GET['action']) and $_GET['action'] == 'logout') {
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['logged_in']);
}
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("location: login.php");
    exit;
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../includes/Style/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin zone</title>
</head>

<body>

    <div class="logo">
        <a href="./"><img src="../includes/Style/cms.svg" alt=""></a>
        <a href="./">
            <h3> MINI CMS Admin </h3>
        </a>
    </div>


    <header id="headeris">
        <a href="./">
            <h4>Admin</h4>
        </a>
        <a href="../" target="_blank">
            <h4>Check Website</h4>
        </a>
        <a href="?action=logout">
            <h4>Log Out</h4>
        </a>
    </header>






    <div class="articleContent">
        <h3 class="pageInf">Edit Page</h3>
        <?php



    
        include_once "../bootstrap.php";


        $articleContent = $entityManager->find('Article', $_GET['id']);
        $articleName = $articleContent->getName();


        print("<form  id=updateForm  method=post>");
        print("<label for=usr>Title:</label>");
        print("<input class=form-control id=usr type=text required name=title value='$articleName'></input>");
        print("<label for=usr>Content:</label>");
        print("<textarea required class=form-control rows=5 id=comment name=content >");
        print $articleContent->getContent();
        print("</textarea>");
        print("<input name=updateBtn class='btn btn-outline-primary' type=\"submit\" value=\"Update\">");
        print("</form>");


        if (isset($_POST['content']) and isset($_POST['title'])) {
            $page = $entityManager->find('Article', $_GET['id']);
            $page->setContent($_POST['content']);
            $page->setTitle($_POST['title']);
            $entityManager->flush();
            header("Refresh:0 ; url=./");
        }
        ?>
    </div>








</body>

</html>