<head>
    <title>Produtos | Projeto Integrador</title>
</head>

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

                                <td><span class="text-muted"><?= $produto->data_cadastro ? $produto->data_cadastro->format('d/m/Y, H:i') : 'sem data' ?></span></td>
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
                                <label class="form-label">Qtd. Estoque</label>
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