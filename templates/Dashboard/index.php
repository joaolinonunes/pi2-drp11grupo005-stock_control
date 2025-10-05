<head>
    <title>Dashboard | Projeto Integrador</title>
</head>

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Dashboard
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <!-- Resumo de estatísticas -->
        <div class="col">
            <div class="row g-4">
                <div class="col-md-3">
                    <a href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'produtos', '?' => ['tipo' => 'total']]) ?>" style="text-decoration: none; cursor: pointer;">
                        <div class="card card-sm card-hover">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader lh-lg">Total de Produtos</div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-0 me-2"><?= $total?></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Produtos com Pouco Estoque -->
                <div class="col-md-3">
                    <a href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'produtos', '?' => ['tipo' => 'pouco_estoque']]) ?>" style="text-decoration: none; cursor: pointer;">
                        <div class="card card-sm card-hover">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader lh-lg">Pouco Estoque</div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-0 me-2"><?= $qtdPoucoEstoque ?></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Produtos com Validade Expirada -->
                <div class="col-md-3">
                    <a href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'produtos', '?' => ['tipo' => 'validade_expirada']]) ?>" style="text-decoration: none; cursor: pointer;">
                        <div class="card card-sm card-hover">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader lh-lg">Validade Expirada</div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-0 me-2"><?= $qtdValidadeExpirada ?></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Produtos com Validade Próxima -->
                <div class="col-md-3">
                    <a href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'produtos', '?' => ['tipo' => 'validade_proxima']]) ?>" style="text-decoration: none; cursor: pointer;">
                        <div class="card card-sm card-hover">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader lh-lg">Validade Próxima</div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-0 me-2"><?= $qtdValidadeProxima ?></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="resultado-filtro" class="mt-4"></div>

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