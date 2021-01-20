<?php

session_start();
// Atsijungimo logika

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
            <h4>LogOut</h4>
        </a>
    </header>


    <h3>Manage Pages</h3>


    <div class="adminEdit">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once "../bootstrap.php";
                $pages = $entityManager->getRepository('Article')->findAll();
                foreach ($pages as $p) {

                    print '<tr>';
                    print  '<td>' . $p->getName() . '</td>';

                    if ($p->getName() == "Home") {
                        print "<td><a href=\"update.php?id={$p->getId()}\">UPDATE</a></td>";
                    } else {
                        print   "<td><a href=\"update.php?id={$p->getId()}\">UPDATE</a>
                             <a href=\"?delete={$p->getId()}\">DELETE</a></td>";
                    }

                    print '</tr>';
                }
                ?>
            </tbody>
        </table>


        <a href="./addpage.php"><button type="button" class="btn btn-outline-primary">Create New Page</button></a>

    </div>






    <?php

    // Deletinimas page

    if (isset($_GET['delete'])) {
        $page = $entityManager->find('Article', $_GET['delete']);
        $entityManager->remove($page);
        $entityManager->flush();

        header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
    }

    ?>



</body>

</html>