<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-info">
        <div class="container">
            <a class="navbar-brand" href="<?php echo URL; ?>">SM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <?php
                    foreach ($this->Dados['menu'] as $menu) {
                        extract($menu);
                        ?>

                        <li class="nav-item menu">
                            <a class="nav-link" href="<?php echo URL . $endereco; ?>"><?php echo $nome_pagina; ?> </a>
                        </li>

                        <?php
                    }
                    ?>

                    <!--<li class="nav-item menu">
                        <a class="nav-link" href="<?php echo URL; ?>">Home </a>
                    </li>
                    <li class="nav-item menu">
                        <a class="nav-link" href="<?php echo URL . 'sobre_empresa'; ?>">Sobre a Empresa</a>
                    </li>
                    <li class="nav-item menu">
                        <a class="nav-link" href="<?php echo URL . 'blog'; ?>">Blog </a>
                    </li>
                    <li class="nav-item menu">
                        <a class="nav-link" href="<?php echo URL . 'contato'; ?>">Contato</a>
                    </li>-->
                </ul>
            </div>
        </div>
    </nav>
</header>