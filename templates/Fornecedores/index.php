<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Fornecedores | Projeto Integrador</title>

    <!-- Tabler Core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.1.1/dist/css/tabler.min.css" crossorigin="anonymous">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-qHuVd85flbcIw6Nh8yy/7PP9V2L2gTwF4t2QzEfsPDi7gC7PRflT+kP8N1ijDgkV" crossorigin="anonymous">
    <!-- linke para funcionar os icones -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- CSS Custom -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="page">

        <div class="page-wrapper">
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title fs-1">
                                Fornecedores
                            </h2>
                        </div>
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <a href="#" class="btn btn-primary d-none d-sm-flex" data-bs-toggle="modal"
                                    data-bs-target="#add-supplier-modal">
                                    <!-- Plus Icon -->
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                    Adicionar Fornecedor
                                </a>

                                <!-- Adicionar Mobile -->
                                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                    data-bs-target="#add-supplier-modal" aria-label="Novo Fornecedor">
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
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>Contato</th>
                                        <th>Categoria</th>
                                        <th>Cadastrado em</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($fornecedores as $fornecedor): ?>
                                        <tr>
                                            <td><span class="text-muted"><?= h($fornecedor->id_fornecedor) ?></span></td>
                                            <td><?= h($fornecedor->nome) ?></td>
                                            <td><?= h($fornecedor->contato) ?></td>
                                            <td><?= h($fornecedor->categoria) ?></td>
                                            <td><span class="text-muted"><?= $fornecedor->data_cadastro ? h($fornecedor->data_cadastro->format('d \d\e F \d\e Y, H:i')) : 'Não informado' ?>
                                            <td class="table-actions">
                                                    <?= $this->Html->link(
                                                        '<i class="bi bi-pencil"></i>', 
                                                        ['action' => 'edit', $fornecedor->id_fornecedor], 
                                                        ['class' => 'btn btn-icon btn-outline-primary', 'escape' => false, 'data-bs-toggle' => 'tooltip', 'title' => 'Editar fornecedor']
                                                    ) ?>
                                                    <?= $this->Form->postLink(
                                                        '<i class="bi bi-trash"></i>', 
                                                        ['action' => 'delete', $fornecedor->id_fornecedor], 
                                                        ['confirm' => 'Tem certeza que deseja excluir?', 'class' => 'btn btn-icon btn-outline-danger ms-1', 'escape' => false, 'data-bs-toggle' => 'tooltip', 'title' => 'Excluir fornecedor']
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
                                fornecedores</p>
                            <ul class="pagination m-0 ms-auto">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <!-- Chevron Left Icon -->
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
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
        </div>
    </div>

     <!-- Modal de adicionar fornecedor -->
    <div class="modal modal-blur fade" id="add-supplier-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!-- Formulário de adição de fornecedor -->
                <form action="<?= $this->Url->build(['controller' => 'Fornecedores', 'action' => 'add']) ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Adicionar Novo Fornecedor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Nome</label>
                                    <input type="text" class="form-control" name="nome" placeholder="Nome do fornecedor">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">CNPJ</label>
                                    <input type="text" class="form-control" name="cnpj" placeholder="CNPJ">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Contato</label>
                                    <input type="text" class="form-control" name="contato" placeholder="(00) 00000-0000">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Categoria</label>
                                    <select class="form-select" name="categoria">
                                        <option value="Carnes">Carnes</option>
                                        <option value="Massas">Massas</option>
                                        <option value="Bebidas">Bebidas</option>
                                        <option value="Temperos">Temperos</option>
                                        <option value="Cereais">Cereais</option>
                                        <option value="Verduras e Legumes">Verduras e Legumes</option>
                                        <option value="Frutas">Frutas</option>
                                        <option value="Outros">Outros</option>
                                    </select>
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
                            Adicionar Fornecedor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Tabler Core JS -->
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.1.1/dist/js/tabler.min.js"></script>
</body>

</html>