<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kunnoi resturant<?= $title_for_layout ?></title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,400' rel='stylesheet' type='text/css'>
    <?= css_asset('normalize.css', 'bukku'); ?>
    <?= css_asset('bootstrap.min.css', 'bootstrap'); ?>

    <?= css_asset('sass/bill.css'); ?>
    <?= js_asset('jquery-1.11.1.min.js', 'bukku'); ?>
    <?= js_asset('jQuery.print.js'); ?>
</head>
<body>
    <?php echo $content_for_layout; ?>
</body>
</html>
