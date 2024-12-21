<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>NurseCall | Dashboard v2</title><!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="NurseCall | Dashboard ">
    <meta name="author" content="ColorlibHQ">
    <meta name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard">
    <!--end::Primary Meta Tags--><!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">
    <!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css"
        integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css"
        integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper"> <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i> </a> </li>
                </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
                    <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle"
                            data-bs-toggle="dropdown"><span class="d-none d-md-inline">Admin Panel</span> </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <!--begin::User Image-->
                            <li class="user-footer"> <a href="#" class="btn btn-default btn-flat">Profile</a>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-default btn-flat float-end">Sign out</button>
                                </form>

                            </li>
                            <!--end::Menu Footer-->
                        </ul>
                    </li> <!--end::User Menu Dropdown-->
                </ul> <!--end::End Navbar Links-->
            </div> <!--end::Container-->
        </nav> <!--end::Header--> <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
            <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="./index.html" class="brand-link">
                    <!--begin::Brand Image--> <img src="{{ asset('assets/img/Logo.png') }}" alt="AdminLTE Logo"
                        class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span
                        class="brand-text fw-light">Nurse Call</span> <!--end::Brand Text--> </a>
                <!--end::Brand Link-->
            </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2"> <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item"> <a href="{{ route('dashboard') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-speedometer"></i>
                                <p>Dashboard</p>
                            </a> </li>
                    </ul>
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item"> <a href="{{ route('dashboard') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-speedometer"></i>
                                <p>Riwayat</p>
                            </a> </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        @if ($errors->any())
                            <div class="alert alert-danger" id="error-alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Menampilkan pesan sukses jika ada -->
                        @if (session('success'))
                            <div class="alert alert-success" id="success-alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="col-sm-6">
                            <h4 class="mb-0">Dashboard v2</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <button type="submit" class="btn btn-primary btn-sm btn-flat float-end"
                                    data-toggle="modal" data-target="#addDeviceModal">Tambah
                                    Device</button>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div>
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!-- Info boxes -->
                    <div class="row">
                        @foreach ($data as $device)
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box position-relative" id="info-box-container-{{ $device->id_device }}">
                                    <span class="info-box-icon text-bg-primary shadow-sm">
                                        <i class="@if ($device->device_name == 'room') bi bi-hospital
                                        @else
                                            bi bi-door-open @endif"></i>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Ruang: {{ $device->room }}</span>
                                        <div class="d-flex justify-content-between">
                                            <span class="info-box-number">{{ $device->device_name }}: {{ $device->room_number }}</span>
                                            <span class="info-box-number" id="info-box-{{ $device->id_device }}"></span>
                                        </div>
                                    </div>
                                    <!-- Dropdown Icon -->
                                    <span class="position-absolute top-0 end-0 p-2">
                                        <!-- Dropdown Button -->
                                        <div class="dropdown">
                                            <button class="btn btn-link p-0" type="button" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <!-- Dropdown Menu -->
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><button class="dropdown-item" data-toggle="modal"
                                                        data-target="#editModal{{ $device->id_device }}">Edit</button>
                                                </li>
                                                <li><button class="dropdown-item" data-toggle="modal"
                                                        data-target="#deleteModal{{ $device->id_device }}">Hapus</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- /.row -->
                    
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main--> <!--begin::Footer-->
        <footer class="app-footer"> <!--begin::To the end-->
            <div class="float-end d-none d-sm-inline">NurseCall System</div> <!--end::To the end-->
            <!--begin::Copyright--> <strong>
                Copyright &copy; NurseCall&nbsp;
                <a href="https://adminlte.io" class="text-decoration-none">NurseCall.io</a>.
            </strong>
            All rights reserved.
            <!--end::Copyright-->
        </footer> <!--end::Footer-->


        <div class="modal fade" id="addDeviceModal" tabindex="-1" role="dialog"
            aria-labelledby="addDeviceModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDeviceModalLabel">Tambah Perangkat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('devices.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <!-- Input untuk ID perangkat -->
                            <div class="form-group">
                                <label for="id_device">ID Perangkat</label>
                                <input type="text" class="form-control" id="id_device" name="id_device"
                                    maxlength="5" required>
                            </div>

                            <!-- Input untuk Nama perangkat -->
                            <div class="form-group">
                                <label for="device_name">Pilih Tipe (Room/Bath)</label>
                                <select class="form-select" id="device_name" name="device_name" required>
                                    <option value="room">Ruangan</option>
                                    <option value="bath">Kamar Mandi</option>
                                </select>
                            </div>

                            <!-- Input untuk Nama Ruangan -->
                            <div class="form-group">
                                <label for="room">Nama Ruangan</label>
                                <input type="text" class="form-control" id="room" name="room"
                                    maxlength="50" required>
                            </div>

                            <!-- Input untuk Nomor Ruangan -->
                            <div class="form-group">
                                <label for="room_number">Nomor Ruangan</label>
                                <input type="number" class="form-control" id="room_number" name="room_number"
                                    min="1" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Perangkat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach ($data as $device)
            <!-- Modal Edit -->
            <div class="modal fade" id="editModal{{ $device->id_device }}" tabindex="-1" role="dialog"
                aria-labelledby="addDeviceModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addDeviceModalLabel">Tambah Perangkat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="editForm" method="POST" action="{{ route('device.update', 'id_device') }}">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <input type="hidden" class="form-control" id="id_device" name="id_device"
                                    maxlength="5" required value="{{ $device->id_device }}">
                                <div class="mb-3">
                                    <label for="device_name" class="form-label">Nama Perangkat</label>
                                    <input type="text" class="form-control" id="device_name" name="device_name"
                                        required value="{{ $device->device_name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="room" class="form-label">Ruang</label>
                                    <input type="text" class="form-control" id="room" name="room"
                                        required value="{{ $device->room }}">
                                </div>
                                <div class="mb-3">
                                    <label for="room_number" class="form-label">Nomor Ruang</label>
                                    <input type="number" class="form-control" id="room_number" name="room_number"
                                        required value="{{ $device->room_number }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan
                                    Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Modal Hapus --}}
            <div class="modal fade" id="deleteModal{{ $device->id_device }}" tabindex="-1" role="dialog"
                aria-labelledby="addDeviceModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addDeviceModalLabel">Tambah Perangkat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="delete-form-{{ $device->id_device }}"
                            action="{{ route('device.destroy', $device->id_device) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">
                                <h6>Yaking ingin menghapus data?</h6>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan
                                    Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach


    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/adminlte.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script> <!--end::OverlayScrollbars Configure--> <!-- OPTIONAL SCRIPTS --> <!-- apexcharts -->
    <script>
        // Cek jika ada alert sukses atau error
        setTimeout(function() {
            let successAlert = document.getElementById('success-alert');
            let errorAlert = document.getElementById('error-alert');

            // Jika alert sukses ada, sembunyikan setelah 3 detik
            if (successAlert) {
                successAlert.style.display = 'none';
            }

            // Jika alert error ada, sembunyikan setelah 3 detik
            if (errorAlert) {
                errorAlert.style.display = 'none';
            }
        }, 3000); // 3000 milidetik = 3 detik
    </script>
   <script>
    // Fungsi untuk mengambil data berdasarkan id_device
    function fetchDeviceData(id_device) {
        console.log(`Fetching data for device ID: ${id_device}`); // Log ID device yang sedang di-fetch
        $.ajax({
            url: `/get-device-calls/${id_device}`, // Tambahkan id_device ke URL
            method: 'GET',
            success: function(response) {
                console.log(`Data fetched successfully for device ID: ${id_device}`, response); // Log data yang diterima
                
                // Update tampilan data pada info box
                $(`#info-box-${id_device}`).html('');
                let infoBoxContainer = $(`#info-box-container-${id_device}`);
                
                // Reset background color
                infoBoxContainer.removeClass('bg-success bg-danger bg-warning');
                
                if (response.length > 0) {
                    let hasActiveCall = false; // Flag untuk memeriksa apakah ada status "on"
                    response.forEach(call => {
                        if (call.status === "ON") {
                            hasActiveCall = true; // Jika ada status "on", ubah flag
                            $(`#info-box-${id_device}`).append(`
                                <div>
                                    <p><strong>${call.button_type} | ${call.status}</strong></p>
                                </div>
                            `);
                            
                            // Tentukan warna background berdasarkan button_type
                            if (call.button_type === 'Call') {
                                infoBoxContainer.addClass('bg-success'); // Hijau untuk Call
                            } else if (call.button_type === 'Emergency') {
                                infoBoxContainer.addClass('bg-danger'); // Merah untuk Emergency
                            } else if (call.button_type === 'Infus') {
                                infoBoxContainer.addClass('bg-warning'); // Oranye untuk Infus
                            }
                        }
                    });

                    // Jika tidak ada status "on", tampilkan pesan "No calls found"
                    if (!hasActiveCall) {
                        $(`#info-box-${id_device}`).html('<p>No calls found.</p>');
                        console.log(`No active calls found for device ID: ${id_device}`); // Log untuk status off
                    }
                } else {
                    $(`#info-box-${id_device}`).html('<p>No calls found.</p>');
                    console.log(`No data found for device ID: ${id_device}`); // Log jika tidak ada data sama sekali
                }
            },
            error: function(error) {
                console.error(`Error fetching device data for ID: ${id_device}`, error); // Log error
            }
        });
    }

    $(document).ready(function() {
        // Looping setiap id_device
        @foreach ($data as $device)
            setInterval(() => {
                fetchDeviceData("{{ $device->id_device }}"); // Bungkus dengan tanda kutip
            }, 1000); // Interval 1 detik (1000ms)
        @endforeach
    });
</script>




</body><!--end::Body-->

</html>
