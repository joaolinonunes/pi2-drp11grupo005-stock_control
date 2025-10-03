<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard | Projeto Integrador</title>

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
                                            <div class="subheader">Total de Produtos</div>
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
                                            <div class="subheader">Pouco Estoque</div>
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
                                            <div class="subheader">Validade Expirada</div>
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
                                            <div class="subheader">Validade Próxima</div>
                                        </div>
                                        <div class="d-flex align-items-baseline">
                                            <div class="h1 mb-0 me-2"><?= $qtdValidadeProxima ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="resultado-filtro" class="mt-4"></div>
        </div>
    </div>

    <!-- Tabler Core JS -->
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.1.1/dist/js/tabler.min.js"></script>

    <!-- Custom Script -->
    <script src="js/script.js"></script>

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