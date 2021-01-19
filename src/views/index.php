<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/Style/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>CMS PROJECT</title>
</head>

<body>

    <div class="logo">
        <a href="./"><img src="includes/Style/cms.svg" alt=""></a>
        <a href="./">
            <h3> MINI CMS </h3>
        </a>
    </div>


    <header>
        <?php
        //article spaudinimas traukiant is duombazes
        include_once "bootstrap.php";
        $articles = $entityManager->getRepository('Article')->findAll();
        foreach ($articles as $a) {

            print
                '<a href="?p=' . $a->getId() . '"  ><h3>' . $a->getName() . '</h3></a>';
        }
        ?>
    </header>




    <div class="articleContent">
        <?php
        // artcile content spausdinimas
        if (isset($_GET['p'])) {
            $articleContent = $entityManager->find('Article', $_GET['p']);
            $articleName = $articleContent->getName();

            print("<h3>$articleName</h3>");
            print("<article>");
            print $articleContent->getContent();
            print("</article>");
        } else {
            $articleContent = $entityManager->find('Article', 1);
            $articleName = $articleContent->getName();

            print("<h3>$articleName</h3>");
            print("<article>");
            print $articleContent->getContent();
            print("<article>");
        }
        ?>
    </div>




</body>

</html>