<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kunnoi resturant<?= $title_for_layout ?></title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,400' rel='stylesheet' type='text/css'>

    <?= css_asset('normalize.css', 'bukku'); ?>
    <?= css_asset('bootstrap.min.css', 'bootstrap'); ?>
    <?= css_asset('sass/app.css'); ?>

    <?= css_asset('demos.css', 'jsgrid'); ?>
    <?= css_asset('jsgrid.css', 'jsgrid'); ?>
    <?= css_asset('theme.css', 'jsgrid'); ?>

    <?= js_asset('jquery-1.11.1.min.js', 'bukku'); ?>
    <?= js_asset('bootstrap.min.js', 'bootstrap'); ?> 
    <?= js_asset('db.js', 'jsgrid'); ?>

    <?= js_asset('jsgrid.core.js', 'jsgrid'); ?>
    <?= js_asset('jsgrid.load-indicator.js', 'jsgrid'); ?>
    <?= js_asset('jsgrid.load-strategies.js', 'jsgrid'); ?>
    <?= js_asset('jsgrid.sort-strategies.js', 'jsgrid'); ?>
    <?= js_asset('jsgrid.field.js', 'jsgrid'); ?>
    <?= js_asset('fields/jsgrid.field.text.js', 'jsgrid'); ?>
    <?= js_asset('fields/jsgrid.field.number.js', 'jsgrid'); ?>
    <?= js_asset('fields/jsgrid.field.select.js', 'jsgrid'); ?>
    <?= js_asset('fields/jsgrid.field.checkbox.js', 'jsgrid'); ?>
    <?= js_asset('fields/jsgrid.field.control.js', 'jsgrid'); ?>
</head>
<body>
    <?php echo $content_for_layout; ?>
</body>
</html>
