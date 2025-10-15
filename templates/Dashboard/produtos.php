<!-- Tem que remover esse arquivo, transferir tudo para o endpoint Produtos -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Produtos | Projeto Integrador</title>

    <!-- Tabler Core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.1.1/dist/css/tabler.min.css" crossorigin="anonymous">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-qHuVd85flbcIw6Nh8yy/7PP9V2L2gTwF4t2QzEfsPDi7gC7PRflT+kP8N1ijDgkV" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
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
                <div class="navbar-nav flex-row order-md-last">
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
                            <li class="nav-item">
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
                            <li class="nav-item active">
                                <a href="products.html" class="nav-link">
                                    <span class="nav-link-icon d-md-none d-lg-inline-flex">
                                        <!-- Package Icon -->
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-package"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
                                    </span>
                                    <div class="nav-link-title">Produtos</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <?= $this->Html->link(
                                    '<span class="nav-link-icon d-md-none d-lg-inline-flex">
                                        <!-- Truck-Delivery Icon -->
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

        <div class="page-wrapper">
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title fs-1">
                                Produtos
                            </h2>
                        </div>
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <a href="#" class="btn btn-primary d-none d-sm-flex" data-bs-toggle="modal"
                                    data-bs-target="#add-product-modal">
                                    <!-- Plus Icon -->
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                    Adicionar Produto
                                </a>
                                <!-- Adicionar Mobile -->
                                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                    data-bs-target="#add-product-modal" aria-label="Create new product">
                                    <!-- Plus Icon -->
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                </a>                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-body">
                <div class="container-xl">
                    <div class="card">
                        <!-- Cabeçalho -->
                        <div class="card-header"></div>

                        <!-- Tabela responsiva -->
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id Prod.</th>
                                        <th>Id Fornecedor</th>
                                        <th>Nome</th>
                                        <th>Qtd. Estoque</th>
                                        <th>Tipo Und.</th>
                                        <th>Condição</th>
                                        <th>Adicionado em</th>
                                        <th>Validade</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($produtos as $produto): ?>
                                        <tr>
                                            <td><span class="text-muted"><?= h($produto->id_produto) ?></span></td>
                                            <td><span class="text-muted"><?= h($produto->id_fornecedor) ?></span></td>
                                            <td><?= h($produto->nome) ?></td>
                                            <td><?= h($produto->qtd_estoque) ?></td>
                                            <td><?= h($produto->tipo_unidade) ?></td>
                                            <td>
                                                <?php
                                                    $hoje = new \Cake\I18n\FrozenDate();
                                                    $statusClass = 'status-green';
                                                    $statusText = 'Em estoque';

                                                    if ($produto->qtd_estoque <= 0) {
                                                            $statusClass = 'status-red';
                                                            $statusText = 'Sem estoque';
                                                    } elseif ($produto->qtd_estoque <= 2) {
                                                            $statusClass = 'status-orange';
                                                            $statusText = 'Pouco estoque';
                                                    }

                                                    if ($produto->validade !== null) {
                                                        if ($produto->validade < $hoje) {
                                                            $statusClass = 'status-red';
                                                            $statusText .= ' / Vencido';
                                                        } elseif ($produto->validade <= $hoje->addDays(3)) {
                                                            $statusClass = 'status-orange';
                                                            $statusText .= ' / Validade próxima';
                                                        }
                                                    }
                                                ?>
                                                    <span class="status-dot <?= $statusClass ?> me-1"></span> <?= $statusText ?>
                                            </td>
                                            <td><span class="text-muted"><?= $produto->data_cadastro->format('d/m/Y, H:i') ?></span></td>
                                            <td><span class="text-muted"><?= $produto->validade ? $produto->validade->format('d/m/Y') : '-' ?></span></td>
                                            <td class="table-actions">
                                                <?= $this->Html->link(
                                                '<i class="bi bi-pencil"></i>',
                                                    ['action' => 'edit', $produto->id_produto],
                                                    ['escape' => false, 'class' => 'btn btn-icon btn-outline-primary', 'title' => 'Editar produto']
                                                ) ?>
                                                <?= $this->Html->link(
                                                '<i class="bi bi-info-circle"></i>',
                                                    ['action' => 'view', $produto->id_produto],
                                                    ['escape' => false, 'class' => 'btn btn-icon btn-outline-info ms-1', 'title' => 'Ver detalhes']
                                                ) ?>
                                                <?= $this->Form->postLink(
                                                '<i class="bi bi-trash"></i>',
                                                    ['action' => 'delete', $produto->id_produto],
                                                         [
                                                            'escape' => false,
                                                            'class' => 'btn btn-icon btn-outline-danger ms-1',
                                                            'confirm' => 'Tem certeza que deseja excluir este produto?',
                                                            'title' => 'Excluir produto'
                                                        ]
                                                ) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Rodapé -->
                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-muted">Mostrando de <span>1</span> a <span>2</span> de <span>60</span>
                                produtos</p>
                            <ul class="pagination m-0 ms-auto">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <!-- Chevron Left Icon -->
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <!-- Chevron Right Icon -->
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            Projeto Integrador - DRP11 - Grupo 005 &copy; 2025
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Modal de adicionar produto -->
    <div class="modal modal-blur fade" id="add-product-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!-- Formulário de adição de produto -->
                <form action="<?= $this->Url->build(['controller' => 'Produtos', 'action' => 'add']) ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Adicionar Novo Produto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Produto</label>
                            <input type="text" class="form-control" name="nome" placeholder="Nome do produto">
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Fornecedor</label>
                                    <select name="id_fornecedor" class="form-select">
                                    <option value="">Selecione</option>
                                        <?php foreach ($fornecedores as $id => $nome): ?>
                                        <option value="<?= h($id) ?>"><?= h($nome) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Quantidade Estoque</label>
                                    <input type="number" min="0" class="form-control" name="qtd_estoque" placeholder="0">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Tipo de Unidade</label>
                                    <select class="form-select" name="tipo_unidade">
                                        <option value="kg">Kg</option>
                                        <option value="pct">Pct</option>
                                        <option value="un">Unidade</option>
                                        <option value="l">Litro</option>
                                        <option value="g">Grama</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!--<div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Condição</label>
                                    <select class="form-select" name="status">
                                        <option value="1">Em estoque</option>
                                        <option value="2">Sem estoque</option>
                                        <option value="3">Pouco estoque</option>
                                    </select>
                                </div>
                            </div>-->
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Data de Validade</label>
                                    <input type="date" class="form-control" name="validade">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary ms-auto">
                            <!-- Plus Icon -->
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                            Adicionar Produto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de detalhes do produto -->
    <div class="modal modal-blur fade" id="product-details-modal-01" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalhes do Produto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-6">
                            <h3 class="product-title mb-3">Contra Filé Bovino</h3>
                            <span class="badge bg-green text-light me-1">Em estoque</span>
                        </div>
                        <div class="col-6 text-end">
                            <p class="text-muted mb-0">ID Produto: <strong>01</strong></p>
                            <p class="text-muted">ID Fornecedor: <strong>F01</strong></p>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                                    <div class="text-end text-green">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-cash">
                                        </svg>
                                    </div>
                                    <div class="h1 m-0">R$ 49,90</div>
                                    <div class="text-muted mb-3">Preço de Venda</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                                    <div class="text-end text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                                        </svg>
                                    </div>
                                    <div class="h1 m-0">R$ 32,50</div>
                                    <div class="text-muted mb-3">Preço de Compra</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                                    <div class="text-end text-cyan">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-package">
                                        </svg>
                                    </div>
                                    <div class="h1 m-0">10 Kg</div>
                                    <div class="text-muted mb-3">Estoque Atual</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Informações do produto</h4>
                            <div class="table-responsive">
                                <table class="table table-vcenter">
                                    <tbody>
                                        <tr>
                                            <td class="text-muted">Nome</td>
                                            <td>Contra Filé Bovino</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Unidade de Medida</td>
                                            <td>Kg</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Informações de controle</h4>
                            <div class="table-responsive">
                                <table class="table table-vcenter">
                                    <tbody>
                                        <tr>
                                            <td class="text-muted">Data de Entrada</td>
                                            <td>02 de Fevereiro de 2025</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Data de Validade</td>
                                            <td>10 de Abril de 2025</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Fornecedor</td>
                                            <td>Frigorífico Brasil (F01)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-outline-primary">
                        <!-- Printer Icon -->
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-printer"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" /></svg>
                        Imprimir Relatório
                    </a>
                    <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal">
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- Tabler Core JS -->
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.1.1/dist/js/tabler.min.js"></script>

    <!-- Custom Script -->
    <script src="js/script.js"></script>
    
</body>

</html>