<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>

<main role="main">

    <div class="jumbotron blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <?php
                    if (!empty($this->Dados['sts_artigos'][0])) {
                        extract($this->Dados['sts_artigos'][0])
                        ?>
                        <div class="blog-post">	
                            <h2 class="blog-post-title"><?php echo $titulo; ?></h2>
                            <img src="<?php echo URL . 'assets/imagens/artigo/' . $id . '/' . $imagem; ?>" class="img-fluid" alt="<?php echo $titulo; ?>" style="margin-bottom: 20px;">
                            <?php echo $conteudo; ?>

                        </div>
                        <nav class="blog-pagination">
                            <?php
                            if (!empty($this->Dados['artAnterior'][0])) {
                                extract($this->Dados['artAnterior'][0]);
                                echo "<a class='btn btn-outline-primary' href='".URL."artigo/$slug'>Anterior</a>";
                            } else {
                                echo "<a class='btn btn-outline-secondary disabled' href='#'>Anterior</a>";
                            }
                            if (!empty($this->Dados['artProximo'][0])) {
                                extract($this->Dados['artProximo'][0]);
                                echo "<a class='btn btn-outline-primary' href='".URL."artigo/$slug'>Próximo</a>";
                            } else {
                                echo "<a class='btn btn-outline-secondary disabled' href='#'>Próximo</a>";
                            }
                            ?>

                        </nav>
                        <?php
                    } else {
                        echo "<div class='alert alert-danger'>Erro: Artigo não encontrado!</div>";
                    }
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