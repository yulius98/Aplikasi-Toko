<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard Supplier</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        @livewireStyles
    </head>
    <body class="sb-nav-fixed">
        <x-navbar-accounting />
        
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <x-side-navbar-accounting />
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div id="content-area" class="mt-5 container">
                        <div class="mb-5 p-4 rounded shadow-2xl shadow-black bg-white">
                            <h2 class="h4 mb-3 text-dark">Pembelian Barang dari Supplier</h2>
                            @livewire('pbs')
                        </div>
                    </div>


                </main>
                <x-footer />
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        @livewireScripts
    </body>
</html>



