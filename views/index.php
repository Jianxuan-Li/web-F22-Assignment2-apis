<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="/statics/base.css">
</head>

<body>
    <main>
        <?php foreach ($data as $api => $route) { ?>
            <h1><?= $api ?></h1>
            <ul>
                <?php foreach ($route as $name => $router) { ?>
                    <li><code><?= $router['method'] ?></code> <code><?= $router['url'] ?></code> <span><?= $router['description'] ?></span></li>
                <?php } ?>
            </ul>
        <?php } ?>
        <!-- API of product -->

    </main>
</body>

</html>