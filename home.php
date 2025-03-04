<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

</head>

<body>

    <?php session_start();
        if (!$_SESSION['logado']) {
            header("Location: login.html");
        }
    ?>
    <div class="row g-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom border-200 px-10">
                    <div class="d-lg-flex justify-content-between">
                        <div class="row flex-between-center gy-2 px-x1">
                            <div class="col d-flex align-items-center">
                                <a href="home.html">
                                    <h6 class="mb-0 ms-2">Carros</h6>
                                </a>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#modalVeiculos">
                                    <h6 class="mb-0 ms-2">Cadastrar veículos</h6>
                                </a>
                            </div>
                        </div>
                        <div class="border-bottom border-200 my-3"></div>
                        <div class="d-flex align-items-center justify-content-between justify-content-lg-end px-x1"
                            style="gap: 10px;">

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card  w-75 mx-auto">
            <div class="card-header ">
                <div class="d-lg-flex justify-content-between">
                    <div class="row flex-between-center ">
                        <div class=" d-flex align-items-center">
                            <h5 class="mb-0 ms-2"> Listagem de veículos</h5>
                        </div>
                    </div>
                    <div class="border-bottom border-200 my-3"></div>
                    <div class="d-flex align-items-center justify-content-between justify-content-lg-end px-x1"
                        style="gap: 10px;">
                        <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#modalVeiculos" data-boundary="viewport" aria-haspopup="true"
                            aria-expanded="false">
                            <span class="d-none d-sm-inline-block d-xxl-inline-block ms-1">Novo veículo</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive scrollbar h-100">
                    <table class="table table-sm mb-0 fs--1 w-100">
                        <thead class="text-800 bg-light">
                            <tr>
                                <th class="sort text-start align-middle">Modelo</th>
                                <th class="sort text-start align-middle">Fabricante</th>
                                <th class="sort text-start align-middle">Tipo de veículo</th>
                                <th class="sort text-start align-middle">Ano</th>
                                <th class="no-sort text-end align-middle"></th>
                                <!-- <option value="BMW" >  BMW   </option> -->
                            </tr>
                        </thead>
                        <tbody id="listagem">
                            <!-- <tr>
                                <td class="py-2 text-start align-middle fs--1">Teste</td>
                                <td class="py-2 text-start align-middle fs--1">Teste</td>
                                <td class="py-2 text-start align-middle fs--1">Teste</td>
                                <td class="py-2 text-start align-middle fs--1">Teste</td>
                                <td class="py-2 text-start align-middle">
                                    <div class="dropdown font-sans-serif ms-2 text-end">
                                        <button class="btn btn-sm bg-200 hover-bg-300" type="button"
                                            data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                            aria-expanded="false">
                                            <span class="fas fa-ellipsis-h fs--1"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end py-2">
                                            <a class="dropdown-item cursor-pointer">Editar</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item cursor-pointer text-danger">Excluir</a>
                                        </div>
                                    </div>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




    </div>

    <div class="modal fade" id="modalVeiculos" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content position-relative">
                <form onsubmit="cadastroVeiculo(this)">
                    <div class="modal-body p-0">
                        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                            <h4 class="mb-1" id="">Cadastrar novo veículo</h4>
                        </div>
                        <div class="p-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex">
                                        <span class="fa-stack ms-n1 me-3">
                                            <i class="fas fa-circle fa-stack-2x text-200"></i>
                                            <i class="fa-inverse fa-stack-1x text-primary fa-solid fa-users"
                                                data-fa-transform="shrink-2"></i>
                                        </span>
                                        <div class="flex-1">
                                            <h5 class="mb-2 fs-0">Informações do Veículo</h5>
                                            <div class="col-lg-12 px-1">
                                                <div class="row g-3">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label fw-normal fs--1 text-700">Modelo
                                                                *</label>
                                                            <input class="form-control" id="modelo" type="text"
                                                                required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label
                                                                class="form-label fw-normal fs--1 text-700">Fabricante
                                                                *</label>
                                                            <input class="form-control" id="fabricante" type="text"
                                                                required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label fw-normal fs--1 text-700">Tipo do
                                                                veículo *</label>
                                                            <input class="form-control" id="tipo" type="text"
                                                                required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label fw-normal fs--1 text-700">Ano
                                                                *</label>
                                                            <input class="form-control" id="ano" type="text" required />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end align-items-center bg-light border-0">
                        <button class="btn btn-outline-secondary px-4" data-bs-dismiss="modal" aria-label="Close"
                            type="reset">Descartar</button>
                        <button class="btn btn-primary px-4" type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalVeiculosEditar" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content position-relative">
            <form onsubmit="salvarVeiculo(this)">
                <div class="modal-body p-0">
                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                        <h4 class="mb-1" id="">Editar veículo</h4>
                    </div>
                    <div class="p-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex">
                                    <span class="fa-stack ms-n1 me-3">
                                        <i class="fas fa-circle fa-stack-2x text-200"></i>
                                        <i class="fa-inverse fa-stack-1x text-primary fa-solid fa-users"
                                            data-fa-transform="shrink-2"></i>
                                    </span>
                                    <div class="flex-1">
                                        <h5 class="mb-2 fs-0">Informações do Veículo</h5>
                                        <div class="col-lg-12 px-1">
                                            <div class="row g-3">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input class="form-control" id="idEdit" type="hidden"
                                                         />
                                                        <label class="form-label fw-normal fs--1 text-700">Modelo
                                                            *</label>
                                                        <input class="form-control" id="modeloEdit" type="text"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label
                                                            class="form-label fw-normal fs--1 text-700">Fabricante
                                                            *</label>
                                                        <input class="form-control" id="fabricanteEdit" type="text"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label fw-normal fs--1 text-700">Tipo do
                                                            veículo *</label>
                                                        <input class="form-control" id="tipoEdit" type="text"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label fw-normal fs--1 text-700">Ano
                                                            *</label>
                                                        <input class="form-control" id="anoEdit" type="text" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end align-items-center bg-light border-0">
                    <button class="btn btn-outline-secondary px-4" data-bs-dismiss="modal" aria-label="Close"
                        type="reset">Descartar</button>
                    <button class="btn btn-primary px-4" type="submit">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="frontCadastroCarros.js"></script>
    <script src="frontBuscaCarros.js"></script>
    <script src="frontDeletarCarros.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>