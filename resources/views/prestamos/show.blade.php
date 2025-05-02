<!doctype html>
<html lang="en">
<!--begin::Head-->

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- jQuery (asegúrate que esté cargado antes de DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edoiaza | Prestamos</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE v4 | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta
        name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
    <meta
        name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
        crossorigin="anonymous" />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="../../dist/css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
        crossorigin="anonymous" />
    <!-- jsvectormap -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
        integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
        crossorigin="anonymous" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>

                </ul>
                <!--end::Start Navbar Links-->
                <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto">
                    <!--begin::Navbar Search-->

                    <!--end::Navbar Search-->
                    <!--begin::Messages Dropdown Menu-->

                    <!--end::Messages Dropdown Menu-->
                    <!--begin::Notifications Dropdown Menu-->

                    <!--end::Notifications Dropdown Menu-->
                    <!--begin::Fullscreen Toggle-->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                        </a>
                    </li>
                    <!--end::Fullscreen Toggle-->
                    <!--begin::User Menu Dropdown-->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">

                            <span class="d-none d-md-inline">
                                <strong>{{ auth()->user()->name }}</strong>
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">


                            <!-- <a href="{{ route('profile.edit') }}" class="btn btn-default btn-flat">Profile</a> -->
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-default btn-flat float-end">Sign out</button>
                            </form>

                            <!--end::Menu Footer-->
                        </ul>
                    </li>
                    <!--end::User Menu Dropdown-->
                </ul>
                <!--end::End Navbar Links-->
            </div>
            <!--end::Container-->
        </nav>
        <!--end::Header-->
        <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
      <!--begin::Sidebar Brand-->
      <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{ route('dashboard') }}" class="brand-link">
          <!--begin::Brand Image-->
          <img
            src="../../dist/assets/img/AdminLTELogo.png"
            alt="AdminLTE Logo"
            class="brand-image opacity-75 shadow" />
          <!--end::Brand Image-->
          <!--begin::Brand Text-->
          <span class="brand-text fw-light">Edoiaza</span>
          <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
      </div>
      <!--end::Sidebar Brand-->
      <!--begin::Sidebar Wrapper-->
      <div class="sidebar-wrapper">
        <nav class="mt-2">
          <!--begin::Sidebar Menu-->
          <ul
            class="nav sidebar-menu flex-column"
            data-lte-toggle="treeview"
            role="menu"
            data-accordion="false">

            <li class="nav-header">TAREAS</li>

            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon bi bi-speedometer"></i>
                <p>
                  Clientes
                  <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('clientes.create') }}" class="nav-link active">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Nuevo cliente</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('clientes.index') }}" class="nav-link active">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Ver clientes</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>
                  Prestamos
                  <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('prestamos.create') }}" class="nav-link active">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Nuevo prestamo</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('prestamos.index') }}" class="nav-link active">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Ver prestamos</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-table"></i>
                <p>
                  Tables
                  <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./tables/simple.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Simple Tables</p>
                  </a>
                </li>
              </ul>
            </li> -->
          </ul>
          <!--end::Sidebar Menu-->
        </nav>
      </div>
      <!--end::Sidebar Wrapper-->
    </aside>
        <!--end::Sidebar-->
        <!--begin::App Main-->
        <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Detalle del Préstamo</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                            </ol>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content Header-->
            <!--begin::App Content-->
            <div class="app-content">
                <!--begin::Container-->


                <div class="container">


                    <div class="card mt-3">
                        <div class="card-body">
                            @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if ($prestamo->estado === 'pagado')
                            <div class="alert alert-success">
                                Este préstamo ha sido <strong>liquidado completamente</strong>.
                            </div>
                            @endif

                            <p><strong>Cliente:</strong> {{ $prestamo->cliente->nombre }}</p>
                            <p><strong>Monto Original:</strong> ${{ number_format($prestamo->monto_original) }}</p>
                            <p><strong>Monto Actualizado:</strong> ${{ number_format($prestamo->monto) }}</p>
                            <p><strong>Interés:</strong> {{ $prestamo->interes }}%</p>
                            <p><strong>Interés semanal a pagar:</strong> ${{ number_format($prestamo->monto * ($prestamo->interes / 100)) }}</p>
                            <p><strong>Estado:</strong> {{ ucfirst($prestamo->estado) }}</p>
                            <p><strong>Notas:</strong> {{ $prestamo->notas }}</p>

                            <a href="{{ route('prestamos.vistaPreviaPDF', $prestamo->id) }}" class="btn btn-primary" target="_blank">
                                Ver contrato en PDF
                            </a>

                            <hr>

                            @php
                            $interesTotal = $prestamo->monto * ($prestamo->interes / 100);
                            @endphp

                            <p><strong>Interés semanal a pagar:</strong> ${{ number_format($interesTotal) }}</p>

                            <!-- Botón para abrir el modal o mostrar pago completado -->
                            <button
                                class="btn mt-3 {{ $prestamo->estado === 'pagado' ? 'btn-success' : 'btn-primary' }}"
                                {{ $prestamo->estado === 'pagado' ? 'disabled' : 'data-bs-toggle=modal data-bs-target=#pagoModal' }}>
                                {{ $prestamo->estado === 'pagado' ? 'Pago Completado' : 'Registrar Pago' }}
                            </button>

                            <a href="javascript:history.back()" class="btn btn-secondary mt-3">Volver</a>
                        </div>
                    </div>

                    <!-- Modal de Pago -->
                    <div class="modal fade" id="pagoModal" tabindex="-1" aria-labelledby="pagoModalLabel" aria-hidden="true">
                        <div class="modal-dialog">

                            <form method="POST" action="{{ route('pagos.store') }}">
                                @csrf
                                <input type="hidden" name="prestamo_id" value="{{ $prestamo->id }}">
                                <input type="hidden" name="cliente_id" value="{{ $prestamo->cliente->id }}">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="pagoModalLabel">Registrar Pago</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>

                                    <div class="modal-body">
                                        @php
                                        $montoMaximo = $prestamo->monto;
                                        $interesSugerido = number_format($interesTotal, 2, '.', '');
                                        @endphp

                                        <div class="btn-group mb-2" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked />
                                            <label class="btn btn-outline-primary" for="btnradio1">Interés</label>
                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" />
                                            <label class="btn btn-outline-primary" for="btnradio2">Abono</label>
                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" />
                                            <label class="btn btn-outline-primary" for="btnradio3">Liquidar</label>
                                        </div>

                                        <div class="mb-3">
                                            <label for="monto" class="form-label">Monto del Pago</label>

                                            <!-- Campo de Interés (visible por defecto) -->
                                            <div class="input-group mb-3" id="interes-group">
                                                <span class="input-group-text">$</span>
                                                <input type="number"
                                                    name="interes"
                                                    step="0.01"
                                                    class="form-control"
                                                    required
                                                    max="{{ $montoMaximo }}"
                                                    placeholder="${{ number_format($interesTotal, 0) }}"
                                                    value="">
                                            </div>

                                            <!-- Campo de Abono (oculto por defecto) -->
                                            <div class="input-group mb-3" id="abono-group" style="display: none;">
                                                <span class="input-group-text">$</span>
                                                <input type="number"
                                                    name="abono"
                                                    step="0.01"
                                                    class="form-control"
                                                    required
                                                    max="{{ $montoMaximo }}"
                                                    placeholder="${{ number_format($prestamo->monto) }}"
                                                    value="">
                                            </div>

                                            <!-- Campo de Liquidar (oculto por defecto) -->
                                            <div class="input-group mb-3" id="liquidar-group" style="display: none;">
                                                <span class="input-group-text">$</span>
                                                <input type="number"
                                                    name="liquidar"
                                                    step="0.01"
                                                    class="form-control"
                                                    required
                                                    max="{{ $montoMaximo }}"
                                                    placeholder="${{ number_format($prestamo->monto) }}"
                                                    value="">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="fecha_pago" class="form-label">Fecha de Pago</label>
                                            <input type="date" name="fecha_pago" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Registrar Pago</button>
                                    </div>
                                </div>
                            </form>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const form = document.getElementById('pagoForm');
                                    const radios = document.querySelectorAll('input[name="btnradio"]');

                                    radios.forEach(radio => {
                                        radio.addEventListener('change', function() {
                                            // Deshabilitar todos los campos primero
                                            document.querySelectorAll('[name="interes"], [name="abono"], [name="liquidar"]').forEach(input => {
                                                input.disabled = true;
                                                input.removeAttribute('required');
                                            });

                                            // Habilitar y hacer required solo el campo seleccionado
                                            if (this.id === 'btnradio1') {
                                                document.querySelector('[name="interes"]').disabled = false;
                                                document.querySelector('[name="interes"]').setAttribute('required', 'required');
                                            } else if (this.id === 'btnradio2') {
                                                document.querySelector('[name="abono"]').disabled = false;
                                                document.querySelector('[name="abono"]').setAttribute('required', 'required');
                                            } else if (this.id === 'btnradio3') {
                                                document.querySelector('[name="liquidar"]').disabled = false;
                                                document.querySelector('[name="liquidar"]').setAttribute('required', 'required');
                                            }
                                        });
                                    });

                                    // Inicializar el estado
                                    document.querySelector('input[name="btnradio"]:checked').dispatchEvent(new Event('change'));
                                });
                            </script>


                        </div>
                    </div>

                    <!-- Historial de Pagos -->
                    <div class="card mt-4">
                        <div class="card-body">
                            <h4>Historial de Pagos</h4>

                            @if ($prestamo->pagos->isEmpty())
                            <p>No hay pagos registrados aún.</p>
                            @else
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Monto</th>
                                        <th>Tipo de Pago</th>
                                        <th>Fecha de Pago</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prestamo->pagos->sortByDesc('fecha_pago') as $pago)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>${{ number_format($pago->monto) }}</td>
                                        <td>
                                            @if($pago->tipo_pago === 'interes')
                                            Interés
                                            @elseif($pago->tipo_pago === 'abono')
                                            Abono
                                            @else
                                            Liquidación
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}</td>
                                        <td>
                                            <form action="{{ route('pagos.destroy', $pago->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    @if($prestamo->estado === 'pagado') disabled @endif
                                                    onclick="return confirm('¿Estás seguro de eliminar este pago?')">
                                                    <i class="fas fa-trash-alt"></i> Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            @endif
                        </div>
                    </div>

                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content-->
        </main>
        <!--end::App Main-->
        <!--begin::Footer-->
        <footer class="app-footer">
            <!--begin::To the end-->

            <!--end::To the end-->
            <!--begin::Copyright-->
            <strong>
                Copyright &copy; 2025&nbsp;
                <a href="https://adminlte.io" class="text-decoration-none">Edoiaza</a>.
            </strong>
            All rights reserved.
            <!--end::Copyright-->
        </footer>
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
        src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
        crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="../../dist/js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!-- OPTIONAL SCRIPTS -->
    <!-- sortablejs -->
    <script
        src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
        integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ="
        crossorigin="anonymous"></script>
    <!-- sortablejs -->
    <script>
        const connectedSortables = document.querySelectorAll('.connectedSortable');
        connectedSortables.forEach((connectedSortable) => {
            let sortable = new Sortable(connectedSortable, {
                group: 'shared',
                handle: '.card-header',
            });
        });

        const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
        cardHeaders.forEach((cardHeader) => {
            cardHeader.style.cursor = 'move';
        });
    </script>
    <!-- apexcharts -->
    <script
        src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
        integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
        crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script>
        // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
        // IT'S ALL JUST JUNK FOR DEMO
        // ++++++++++++++++++++++++++++++++++++++++++

        const sales_chart_options = {
            series: [{
                    name: 'Digital Goods',
                    data: [28, 48, 40, 19, 86, 27, 90],
                },
                {
                    name: 'Electronics',
                    data: [65, 59, 80, 81, 56, 55, 40],
                },
            ],
            chart: {
                height: 300,
                type: 'area',
                toolbar: {
                    show: false,
                },
            },
            legend: {
                show: false,
            },
            colors: ['#0d6efd', '#20c997'],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: 'smooth',
            },
            xaxis: {
                type: 'datetime',
                categories: [
                    '2023-01-01',
                    '2023-02-01',
                    '2023-03-01',
                    '2023-04-01',
                    '2023-05-01',
                    '2023-06-01',
                    '2023-07-01',
                ],
            },
            tooltip: {
                x: {
                    format: 'MMMM yyyy',
                },
            },
        };

        const sales_chart = new ApexCharts(
            document.querySelector('#revenue-chart'),
            sales_chart_options,
        );
        sales_chart.render();
    </script>
    <!-- jsvectormap -->
    <script
        src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
        integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y="
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
        integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY="
        crossorigin="anonymous"></script>
    <!-- jsvectormap -->
    <script>
        const visitorsData = {
            US: 398, // USA
            SA: 400, // Saudi Arabia
            CA: 1000, // Canada
            DE: 500, // Germany
            FR: 760, // France
            CN: 300, // China
            AU: 700, // Australia
            BR: 600, // Brazil
            IN: 800, // India
            GB: 320, // Great Britain
            RU: 3000, // Russia
        };

        // World map by jsVectorMap
        const map = new jsVectorMap({
            selector: '#world-map',
            map: 'world',
        });

        // Sparkline charts
        const option_sparkline1 = {
            series: [{
                data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
            }, ],
            chart: {
                type: 'area',
                height: 50,
                sparkline: {
                    enabled: true,
                },
            },
            stroke: {
                curve: 'straight',
            },
            fill: {
                opacity: 0.3,
            },
            yaxis: {
                min: 0,
            },
            colors: ['#DCE6EC'],
        };

        const sparkline1 = new ApexCharts(document.querySelector('#sparkline-1'), option_sparkline1);
        sparkline1.render();

        const option_sparkline2 = {
            series: [{
                data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
            }, ],
            chart: {
                type: 'area',
                height: 50,
                sparkline: {
                    enabled: true,
                },
            },
            stroke: {
                curve: 'straight',
            },
            fill: {
                opacity: 0.3,
            },
            yaxis: {
                min: 0,
            },
            colors: ['#DCE6EC'],
        };

        const sparkline2 = new ApexCharts(document.querySelector('#sparkline-2'), option_sparkline2);
        sparkline2.render();

        const option_sparkline3 = {
            series: [{
                data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
            }, ],
            chart: {
                type: 'area',
                height: 50,
                sparkline: {
                    enabled: true,
                },
            },
            stroke: {
                curve: 'straight',
            },
            fill: {
                opacity: 0.3,
            },
            yaxis: {
                min: 0,
            },
            colors: ['#DCE6EC'],
        };

        const sparkline3 = new ApexCharts(document.querySelector('#sparkline-3'), option_sparkline3);
        sparkline3.render();
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[name="btnradio"]').change(function() {
                $('#interes-group, #abono-group, #liquidar-group').hide();

                if ($('#btnradio1').is(':checked')) {
                    $('#interes-group').show();
                } else if ($('#btnradio2').is(':checked')) {
                    $('#abono-group').show();
                } else if ($('#btnradio3').is(':checked')) {
                    $('#liquidar-group').show();
                }
            });
        });
    </script>
    <!--end::Script-->
</body>
<!--end::Body-->

</html>

<script>
    $(document).ready(function() {
        $('#clientesTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
        });
    });
</script>