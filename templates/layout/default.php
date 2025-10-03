<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';

// ATRIBUIÇÃO CORRIGIDA: Armazena $this em uma variável local
$view = $this;

// Armazena o nome do controller atual
$currentController = $view->request->getParam('controller');

// Função auxiliar corrigida para usar $view em vez de $this diretamente no 'use'
$isActive = function (string $controller, ?string $action = null) use ($currentController, $view) {
    // Verifica se o Controller é o atual
    $isController = ($currentController === $controller);
    
    // Se uma Action for especificada, verifica também a Action
    if ($action !== null) {
        // Usa $view para acessar o request
        return $isController && ($view->request->getParam('action') === $action);
    }
    
    return $isController;
};
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard | Projeto Integrador</title> <!-- Aqui muda o titulo só -->

    <!-- Tabler Core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.1.1/dist/css/tabler.min.css" crossorigin="anonymous">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-qHuVd85flbcIw6Nh8yy/7PP9V2L2gTwF4t2QzEfsPDi7gC7PRflT+kP8N1ijDgkV" crossorigin="anonymous">

    <!-- linke para funcionar os icones -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
        
    <!-- CSS Custom -->
    <link rel="stylesheet" href="webroot/css/style.css">
</head>

<body>
    <div class="page">
        <header class="navbar navbar-expand-md navbar-light">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <span class="fw-bold">Projeto Integrador</span>
                </h1>
                <!-- Botoes para modificar a fonte -->
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item d-none d-md-flex me-3">
                        <div class="btn-list">
                        <button id="aumenta-fonte" class="btn btn-outline-secondary" title="Aumentar a Fonte da Página" aria-label="Aumentar Fonte">
                            A+
                        </button>
                        <button id="diminui-fonte" class="btn btn-outline-secondary" title="Diminuir a Fonte da Página" aria-label="Diminuir Fonte">
                            A-
                        </button>
                    </div>
                </div>
                <!-- Dropdown Notificação -->
                <div class="nav-item dropdown d-none d-md-flex me-3">
                    <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                        aria-label="Mostrar notificações">
                        <!-- Bell icon -->
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-bell"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>

                        <span class="status-dot status-dot-animated bg-red"
                            style="position: absolute; right: 0; top: 0;"></span>
                    </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Notificações</h3>
                                </div>
                                <?php if (!empty($notificacoes)): ?>
                                <div class="list-group list-group-flush list-group-hoverable">
                                    <?php foreach ($notificacoes as $n): ?>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="status-dot status-dot-animated <?= h($n['cor']) ?> d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">
                                                        <?= strtoupper(str_replace('_', ' ', $n['tipo'])) ?>
                                                    </a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">
                                                        <?= h($n['mensagem']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Botão Sair -->
                    <div class="nav-item">
                    <?= $this->Html->link(
                        '<span class="d-inline-flex align-items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-logout">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                            <path d="M9 12h12l-3 -3" />
                            <path d="M18 15l3 -3" />
                            </svg>
                            Sair
                        </span>',
                        ['controller' => 'Users', 'action' => 'logout'],
                        ['escape' => false, 'class' => 'btn btn-outline-danger', 'aria-label' => 'Sair']
                    ) ?>
                    </div>
                </div>
            </div>
        </header>

        <div class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar navbar-light">
                <div class="container-xl">
                    <ul class="navbar-nav">
                        
                        <li class="nav-item <?= $isActive('Dashboard') ? 'active' : '' ?>">
                        <?= $this->Html->link(
                            '<span class="nav-link-icon d-md-none d-lg-inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-home">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <div class="nav-link-title">Dashboard</div>',
                                ['controller' => 'Dashboard', 'action' => 'index'],
                                ['class' => 'nav-link', 'escape' => false]
                            ) ?>
                        </li>
                        
                        <li class="nav-item <?= $isActive('Produtos') ? 'active' : '' ?>">
                            <?= $view->Html->link(
                                '<span class="nav-link-icon d-md-none d-lg-inline-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-package"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
                                </span>
                                <div class="nav-link-title">Produtos</div>',
                                ['controller' => 'Produtos', 'action' => 'index'],
                                ['escape' => false, 'class' => 'nav-link']
                            ) ?>
                        </li>
                        
                        <li class="nav-item <?= $isActive('Fornecedores') ? 'active' : '' ?>">
                            <?= $view->Html->link(
                                '<span class="nav-link-icon d-md-none d-lg-inline-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-truck-delivery"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" /><path d="M3 9l4 0" /></svg>
                                </span>
                                <div class="nav-link-title">Fornecedores</div>',
                                ['controller' => 'Fornecedores', 'action' => 'index'],
                                ['escape' => false, 'class' => 'nav-link']
                            ) ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

        <!-- Unica parte que muda -->
        <div class="page-wrapper">
            <?= $this->fetch('content') ?>
        </div>

        <footer class="footer footer-transparent d-print-none">
            <div class="container-xl">
                <div class="row text-center align-items-center flex-row-reverse">
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                        Projeto Integrador 2
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Tabler Core JS -->
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.1.1/dist/js/tabler.min.js"></script>

    <!-- Custom Script -->
    <script src="js/script.js"></script>

    <!--Função para alteração do tamanho da fonte, deixei aqui so pra teste-->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const increaseFontButton = document.getElementById('aumenta-fonte');
        const decreaseFontButton = document.getElementById('diminui-fonte');

        // Seleciona elementos apenas dentro das áreas de conteúdo principal e da barra de navegação
        const textElements = document.querySelectorAll(
            '.navbar, .page-wrapper h1, .page-wrapper h2, .page-wrapper h3, .page-wrapper p, .page-wrapper a, .page-wrapper div, .page-wrapper span, .page-wrapper li, .page-wrapper td, .page-wrapper th, .page-wrapper label, .page-wrapper input, .page-wrapper button, .page-wrapper select, .btn, .nav-link-icon svg'
        );

        const MIN_FONT_SIZE_PX = 10;
        const MAX_FONT_SIZE_PX = 32;
        const FONT_SIZE_STEP_PX = 2;

        function adjustFontSize(step) {
            textElements.forEach(element => {
                // if (element.tagName === 'svg') return;

                const computedStyle = window.getComputedStyle(element);
                const tamanhoAtual = parseFloat(computedStyle.fontSize);
                
                if (tamanhoAtual < 1) return;

                let novoTamanho = tamanhoAtual + step;

                if (novoTamanho < MIN_FONT_SIZE_PX) novoTamanho = MIN_FONT_SIZE_PX;
                if (novoTamanho > MAX_FONT_SIZE_PX) novoTamanho = MAX_FONT_SIZE_PX;

                element.style.fontSize = `${novoTamanho}px`;
            });
        }

        increaseFontButton.addEventListener('click', function() {
            adjustFontSize(FONT_SIZE_STEP_PX);
        });

        decreaseFontButton.addEventListener('click', function() {
            adjustFontSize(-FONT_SIZE_STEP_PX);
        });
    });
    </script>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const cards = document.querySelectorAll("[data-tipo]");

        cards.forEach(card => {
            card.addEventListener("click", function () {
                const tipo = this.getAttribute("data-tipo");

                // Aqui você faz a chamada para exibir os produtos do tipo clicado
                fetch(`/dashboard/produtos?tipo=${tipo}`)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById("produtos-lista").innerHTML = data;
                    })
                    .catch(error => {
                        console.error("Erro ao carregar produtos:", error);
                    });
            });
        });
    });
    </script>
</body>

</html>
