<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?php if(isset($title)){echo $title;}else{echo $site->title();} ?></title>

    <meta name="description" content="<?= $site->description() ?>">
    <meta name="author" content="<?= $site->author() ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Stylesheets can be included using the `css()` helper. Kirby also provides the `js()` helper to include script file. 
        More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers -->

    <?= css(['assets/css/main.css', '@auto']) ?>

    <!-- jQuery -->
    <?= js('assets/vendor/jquery/dist/jquery.min.js') ?>

    <!-- Lazysizes (https://github.com/aFarkas/lazysizes) -->
    <?= js('assets/vendor/lazysizes/lazysizes.min.js') ?>

    <!-- Klaro (cookie consent manager; https://klaro.kiprotect.com) -->
    <?= js('assets/js/klaro.config.js') ?>
    <?= js('assets/js/klaro/klaro-no-css.js') ?>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= asset('assets/images/favicon.ico')->url() ?>" type="image/x-icon">
    <link rel="icon" href="<?= asset('assets/images/favicon.ico')->url() ?>" type="image/x-icon">


  </head>

    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->