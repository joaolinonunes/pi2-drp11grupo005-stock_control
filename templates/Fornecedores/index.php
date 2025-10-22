<head>
    <title>Fornecedores | Projeto Integrador</title>
</head>

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
                                    <!-- Botões para telas maiores -->
                                    <div class="d-none d-lg-inline-flex">
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
                                    </div>
                                        
                                    <!-- Dropdown para telas menores -->
                                    <div class="dropdown d-lg-none">
                                        <button class="btn btn-icon btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <?= $this->Html->link(
                                                    '<i class="bi bi-pencil me-2"></i>Editar', 
                                                    ['action' => 'edit', $fornecedor->id_fornecedor], 
                                                    ['class' => 'dropdown-item', 'escape' => false]
                                                ) ?>
                                            </li>
                                            <li>
                                                <?= $this->Form->postLink(
                                                    '<i class="bi bi-trash me-2"></i>Excluir', 
                                                    ['action' => 'delete', $fornecedor->id_fornecedor], 
                                                    ['confirm' => 'Tem certeza que deseja excluir?', 'class' => 'dropdown-item text-danger', 'escape' => false]
                                                ) ?>
                                            </li>
                                        </ul>
                                    </div>
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

<!-- Modal de adicionar fornecedor -->
    <div class="modal modal-blur fade" id="add-supplier-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
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
                                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do fornecedor">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">CNPJ</label>
                                    <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="CNPJ">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Fantasia</label>
                                    <input type="text" class="form-control" name="nome_fan" id="nome_fan" placeholder="Nome fantasia">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Descrição</label>
                                    <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição do fornecedor">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Cep</label>
                                    <input type="text" class="form-control" name="cep" id="cep" placeholder="Cep">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Municipio</label>
                                    <input type="text" class="form-control" name="municipio" id="municipio" placeholder="Municipio">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label class="form-label">UF</label>
                                    <input type="text" class="form-control" name="uf" id="uf" placeholder="UF">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Bairro</label>
                                    <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Logradouro</label>
                                    <input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Logradouro">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label class="form-label">Numero</label>
                                    <input type="text" class="form-control" name="numero" id="numero" placeholder="Numero">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Contato</label>
                                    <input type="text" class="form-control" name="contato" id="contato" placeholder="(00) 00000-0000">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Categoria</label>
                                    <select class="form-select" name="categoria">
                                        <option value="Outros">Outros</option>
                                        <option value="Carnes">Carnes</option>
                                        <option value="Massas">Massas</option>
                                        <option value="Bebidas">Bebidas</option>
                                        <option value="Temperos">Temperos</option>
                                        <option value="Cereais">Cereais</option>
                                        <option value="Verduras e Legumes">Verduras e Legumes</option>
                                        <option value="Frutas">Frutas</option>                                       
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

    <!-- Bootstrap Bundle (inclui Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Função para formatar CNPJ
            function formatCNPJ(value) {
                return value
                    .replace(/\D/g, '')
                    .replace(/^(\d{2})(\d)/, '$1.$2')
                    .replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3')
                    .replace(/\.(\d{3})(\d)/, '.$1/$2')
                    .replace(/(\d{4})(\d)/, '$1-$2')
                    .slice(0, 18);
            }
        
            // Aplicar máscara ao digitar
            $("#cnpj").on("input", function () {
                $(this).val(formatCNPJ($(this).val()));
            });
        
            // Consultar API ao sair do campo
            $("#cnpj").on("blur", function () {
                let cnpj = $(this).val().replace(/\D/g, '');
                console.log("=== DEBUG CNPJ ===");
                console.log("CNPJ digitado:", cnpj);
            
                if (cnpj.length === 14) {
                    // Mostra loading
                    $("#nome").val("Consultando...");

                    // Monta a URL
                    let url = "<?= $this->Url->build(['controller' => 'Fornecedores', 'action' => 'consulta_cnpj', '_placeholder_']) ?>".replace('_placeholder_', cnpj);
                    console.log("URL que será chamada:", url);

                    $.ajax({
                        url: url,
                        method: "GET",
                        dataType: "json",
                        success: function (data) {
                            console.log("✅ Sucesso! Resposta da API:", data);
                        
                            if (data.error) {
                                alert("Erro: " + data.error);
                                $("#nome").val("");
                                return;
                            }
                        
                            if (data.razao_social) {
                                // Preenche os campos com os dados retornados
                                $("#nome").val(data.razao_social || "");

                                $("#nome_fan").val(data.nome_fantasia || "");

                                $("#descricao").val(data.cnae_fiscal_descricao || "");

                                // Formata telefone (se existir)
                                let telefone = data.ddd_telefone_1 || "";
                                if (telefone) {
                                    telefone = telefone.replace(/\D/g, '');
                                    if (telefone.length === 10) {
                                        telefone = telefone.replace(/^(\d{2})(\d{4})(\d{4})$/, "($1) $2-$3");
                                    } else if (telefone.length === 11) {
                                        telefone = telefone.replace(/^(\d{2})(\d{5})(\d{4})$/, "($1) $2-$3");
                                    }
                                }
                                $("#contato").val(telefone);

                                // Formata CEP
                                let cep = (data.cep || "").replace(/\D/g, '');
                                if (cep.length === 8) {
                                    cep = cep.replace(/^(\d{5})(\d{3})$/, "$1-$2");
                                }
                                $("#cep").val(cep);

                                $("#bairro").val(data.bairro || "");

                                $("#numero").val(data.numero || "");

                                $("#logradouro").val(data.logradouro || "");

                                $("#municipio").val(data.municipio || "");

                                $("#uf").val(data.uf || "");

                                console.log("✅ Campos preenchidos com sucesso!");
                            } else {
                                alert("CNPJ não encontrado na base de dados!");
                                $("#nome").val("");
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("❌ ERRO na requisição AJAX");
                            console.error("Status HTTP:", xhr.status);
                            console.error("Status Text:", xhr.statusText);
                            console.error("Erro:", error);
                            console.error("Resposta completa:", xhr.responseText);

                            let mensagemErro = "Erro ao consultar o CNPJ.";

                            if (xhr.status === 404) {
                                mensagemErro = "Rota não encontrada (404). Verifique o Controller e as rotas.";
                            } else if (xhr.status === 500) {
                                mensagemErro = "Erro no servidor (500). Verifique os logs do CakePHP.";
                            } else if (xhr.status === 0) {
                                mensagemErro = "Não foi possível conectar. Verifique a URL e CORS.";
                            }

                            alert(mensagemErro + "\n\nDetalhes no console (F12)");
                            $("#nome").val("");
                        }
                    });
                } else if (cnpj.length > 0) {
                    alert("CNPJ deve ter 14 dígitos!");
                }
            });
        });
    </script>
    <script>
// Script para envio do formulário via AJAX
$(document).ready(function () {
    // Prevenir envio padrão do formulário e enviar via AJAX
    $("#add-supplier-modal form").on("submit", function (e) {
        e.preventDefault(); // Impede o comportamento padrão
        
        let form = $(this);
        let formData = form.serialize(); // Serializa os dados do formulário
        let submitBtn = form.find('button[type="submit"]');
        
        // Desabilita o botão durante o envio
        submitBtn.prop('disabled', true).html(
            '<span class="spinner-border spinner-border-sm me-2" role="status"></span>Salvando...'
        );
        
        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                console.log("✅ Fornecedor salvo com sucesso!", response);
                
                // Fecha o modal
                $('#add-supplier-modal').modal('hide');
                
                // Limpa o formulário
                form[0].reset();
                
                // Mostra mensagem de sucesso
                alert('Fornecedor cadastrado com sucesso!');
                
                // Recarrega a página para mostrar o novo fornecedor
                location.reload();
            },
            error: function (xhr, status, error) {
                console.error("❌ Erro ao salvar fornecedor");
                console.error("Status HTTP:", xhr.status);
                console.error("Status Text:", xhr.statusText);
                console.error("Erro:", error);
                console.error("Resposta completa:", xhr.responseText);
                
                // Tenta parsear a resposta JSON
                let errorMsg = 'Erro ao salvar fornecedor. Verifique os dados e tente novamente.';
                try {
                    let response = JSON.parse(xhr.responseText);
                    if (response.message) {
                        errorMsg = response.message;
                    }
                    if (response.errors) {
                        console.error("Erros de validação:", response.errors);
                        errorMsg += "\n\nErros: " + JSON.stringify(response.errors, null, 2);
                    }
                } catch (e) {
                    // Se não for JSON, mostra o texto da resposta
                    if (xhr.responseText) {
                        console.error("Resposta (não-JSON):", xhr.responseText);
                    }
                }
                
                alert(errorMsg);
                
                // Reabilita o botão
                submitBtn.prop('disabled', false).html(
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg> Adicionar Fornecedor'
                );
            }
        });
    });
    
    // Limpa o formulário quando o modal é fechado
    $('#add-supplier-modal').on('hidden.bs.modal', function () {
        $(this).find('form')[0].reset();
        $(this).find('button[type="submit"]').prop('disabled', false).html(
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg> Adicionar Fornecedor'
        );
    });
});
</script>

</body>