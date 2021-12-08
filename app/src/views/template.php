<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://meyerweb.com/eric/tools/css/reset/reset.css">
    <title><?= $title;?> </title>
</head>
<body>
    <?php include 'Frontend/navbar.php'; ?>
    <?= $content;?>
    <?php if($_SESSION['user_actual']) {
        echo $_SESSION['user_actual']['created_at'];
    }
    ?>
</html>