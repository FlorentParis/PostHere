<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://meyerweb.com/eric/tools/css/reset/reset.css"> -->
    <title><?= $title;?> </title>
</head>
<body>
    <?php include 'Frontend/navbar.php'; ?>
    <?php if (\App\config\Utils\Flash::hasFlash('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= \App\config\Utils\Flash::getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <?php if (\App\config\Utils\Flash::hasFlash('alert')): ?>
        <div class="alert alert-danger" role="alert">
            <?= \App\config\Utils\Flash::getFlash('alert'); ?>
        </div>
    <?php endif; ?>
    <?= $content;?>
</html>