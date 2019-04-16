<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Meta tags Obrigatórias -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php
        if (!empty($this->Dados['seo'][0])) {
            extract($this->Dados['seo'][0]);

            echo "<title>{$titulo}</title>";
            echo "<meta name='robots' content='{$tipo_rob}'>";
            echo "<meta name='description' content='{$description}'>";
            echo "<meta name='author' content='{$author}'>";
            echo "<link rel='canonical' href='" . URL . "$endereco'>";
            echo "<meta name='keywords' content='{$keywords}'>";

            echo "<meta property='og:site_name' content='$og_site_name'>";
            echo "<meta property='og:locale' content='$og_locale'>";
            //https://pt.piliapp.com/facebook/id/
            echo "<meta property='fb:admins' content='$fb_admins'>";
            echo "<meta property='og:url' content='" . URL . "$endereco'>";
            echo "<meta property='og:title' content='$titulo>";
            echo "<meta property='og:description' content='$description'>";
            echo "<meta property='og:image' content='" . URL . "assets/imagens/$dir_img/$id/$imagem'>";
            //https://developers.facebook.com/tools/debug/

            echo "<meta name='twitter:site' content='$twitter_site'>";
            echo "<meta name='twitter:card' content='summary_large_image'>";
            echo "<meta name='twitter:title' content='$titulo'>";
            echo "<meta name='twitter:description' content='$description'>";
            echo "<meta name='twitter:image:src' content='" . URL . "assets/imagens/$dir_img/$id/$imagem'>";
            //https://cards-dev.twitter.com/validator

            echo "<meta itemprop='name' content='$titulo'>";
            echo "<meta itemprop='description' content='$description'>";
            echo "<meta itemprop='image' content='" . URL . "assets/imagens/$dir_img/$id/$imagem'>";
            echo "<meta itemprop='url' content='" . URL . "$endereco'>";
        }
        ?>


        <link rel="icon" href="<?php echo URL; ?>assets/imagens/icone/SM.png">
        <link rel="stylesheet" href="<?php echo CSS; ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo URL; ?>assets/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo URL; ?>assets/css/personalizado.css">
    </head>
    <body>
