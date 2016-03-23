<!DOCTYPE HTML> 
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>Kunnoi resturant<?= $title_for_layout ?></title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width">
      <?= css_asset('normalize.css', 'bukku'); ?>
      <?= css_asset('bootstrap.min.css', 'bootstrap'); ?>
      <?= css_asset('sass/app.css'); ?>
      <?= $this->layouts->print_includes(); ?> 
  </head>
  <body>
      <?php echo $content_for_layout; ?> 
      <?= js_asset('jquery-1.11.1.min.js', 'bukku'); ?>
      <?= js_asset('bootstrap.min.js', 'bootstrap'); ?> 
  </body>
</html>
