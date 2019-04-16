<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>


<main role="main">

    <div class="jumbotron blog">
        <div class="container">
            <h2 class="display-4 text-center" style="margin-bottom: 40px;">Vitrine</h2>
            <div class="row">
                <div class="col-md-8 blog-main">
                    <?php
                    if (empty($this->Dados['artigos'])) {
                        echo "<div class='alert alert-danger'>Erro: Nenhum artigo encontrado!</div>";
                    }
                    foreach ($this->Dados['artigos'] as $artigo) {
                        extract($artigo);
                        ?>
                        <div class="row featurette">
                            <div class="col-md-7 order-md-2 blog-text anime_right">
                                <a href="<?php echo URL . 'artigo/' . $slug; ?>">
                                    <h2 class="featurette-heading text-danger"><?php echo $titulo; ?></h2>
                                </a>
                                <p class="lead"><?php echo $descricao; ?><a href="<?php echo URL . 'artigo/' . $slug; ?>" class="text-danger">Continuar lendo</a></p>
                            </div>
                            <div class="col-md-5 order-md-1 anime_left">
                                <a href="<?php echo URL . 'artigo/' . $slug; ?>">
                                    <img class="featurette-image img-fluid mx-auto" src="<?php echo URL . 'assets/imagens/artigo/' . $id . '/' . $imagem; ?>" alt="<?php echo $titulo; ?>">
                                </a>
                            </div>
                        </div>
                        <hr class="featurette-divider">
                        <?php
                    }

                    echo $this->Dados['paginacao'];
                    ?>


                </div>
                <aside class="col-md-4 blog-sidebar">
                    <?php if (!empty($this->Dados['sobreAutor'][0])) { ?>
                        <div class="p-3 mb-3 bg-light rounded">
                            <?php
                            extract($this->Dados['sobreAutor'][0]);
                            ?>
                            <h4 class="font-italic"><?php echo $titulo; ?></h4>
                            <img src="<?php echo URL . 'assets/imagens/sobre_autor/' . $id . '/' . $imagem; ?>" class="img-fluid" alt="<?php echo $titulo; ?>">
                            <p class="mb-0"><?php echo $descricao; ?></p>
                        </div>
                    <?php } ?>

                    <div class="p-3">
                        <h4 class="font-italic">Recentes</h4>
                        <ol class="list-unstyled mb-0">
                            <?php
                            foreach ($this->Dados['artRecente'] as $artigoRec) {
                                extract($artigoRec);
                                echo "<li><a href='" . URL . "artigo/$slug'>$titulo</a></li>";
                            }
                            ?>
                        </ol>
                    </div>

                    <div class="p-3">
                        <h4 class="font-italic">Destaque</h4>
                        <ol class="list-unstyled">
                            <?php
                            foreach ($this->Dados['artDestaque'] as $artigoDest) {
                                extract($artigoDest);
                                echo "<li><a href='" . URL . "artigo/$slug'>$titulo</a></li>";
                            }
                            ?>
                        </ol>
                    </div>
                </aside>
            </div>
        </div>
    </div>					

</main>

