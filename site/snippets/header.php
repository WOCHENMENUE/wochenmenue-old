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
    <link rel="apple-touch-icon" sizes="57x57" href="<?= asset('assets/images/favicon/apple-icon-57x57.png')->url() ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= asset('assets/images/favicon/apple-icon-60x60.png')->url() ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= asset('assets/images/favicon/apple-icon-72x72.png')->url() ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= asset('assets/images/favicon/apple-icon-76x76.png')->url() ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= asset('assets/images/favicon/apple-icon-114x114.png')->url() ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= asset('assets/images/favicon/apple-icon-120x120.png')->url() ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= asset('assets/images/favicon/apple-icon-144x144.png')->url() ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= asset('assets/images/favicon/apple-icon-152x152.png')->url() ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/images/favicon/apple-icon-180x180.png')->url() ?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= asset('assets/images/favicon/android-icon-192x192.png')->url() ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/images/favicon/favicon-32x32.png')->url() ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= asset('assets/images/favicon/favicon-96x96.png')->url() ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= asset('assets/images/favicon/favicon-16x16.png')->url() ?>">
    <meta name="msapplication-TileImage" content="<?= asset('assets/images/favicon/ms-icon-144x144.png')->url() ?>">


  </head>

    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->