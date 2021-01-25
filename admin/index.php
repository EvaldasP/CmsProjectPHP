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

    <div class="adminEdit">
        <h3 class="pageInf">Manage Pages</h3>

        <?php


        // Adding page

        include_once "../bootstrap.php";

        if (isset($_POST["confirmAdd"])) {
            $article = new Article();
            $article->setTitle($_POST['newTitle']);
            $article->setContent($_POST['newContent']);
            $entityManager->persist($article);
            $entityManager->flush();
            echo '<div id="addSuccesfully">';
            echo '<h5>Page  Added Succesfully !</h5>';
            echo '</div>';
            header("Refresh: 1.5; URL=./");
        }
        // Deleting page

        if (isset($_GET['delete'])) {
            $page = $entityManager->find('Article', $_GET['delete']);
            $entityManager->remove($page);
            $entityManager->flush();

            echo '<div id="delSuccesfully">';
            echo '<h5>Page  Deleted Succesfully !</h5>';
            echo '</div>';
            header("Refresh: 1.5; URL=./");
        }

        ?>



        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                // Printing existing pages

                include_once "../bootstrap.php";
                $pages = $entityManager->getRepository('Article')->findAll();
                foreach ($pages as $p) {
                    $dataCount++;
                    print '<tr>';
                    print  '<td>' . $p->getName() . '</td>';

                    if ($p->getName() == "Home") {
                        print "<td><a href=\"update.php?id={$p->getId()}\">UPDATE</a></td>";
                    } else {
                        print   "<td><a href=\"update.php?id={$p->getId()}\">UPDATE</a>
                             <a class=deletebtn href=\"?delete={$p->getId()}\">DELETE</a></td>";
                    }

                    print '</tr>';
                }
                ?>



            </tbody>
        </table>

        <a id="addBtn" href="./addpage.php"><button type="button" class="btn btn-outline-primary">Create New Page</button></a>
    </div>


</body>

</html>