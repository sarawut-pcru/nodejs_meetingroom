<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="/style/index.png" type="image/x-icon" />
<title>Moph : MeetingRoom</title>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="style/adminlte.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="css/buttons.bootstrap4.min.css">

<!-- Toastr -->
<link rel="stylesheet" href="css/toastr.min.css">
<!-- index Style -->
<link rel="stylesheet" href="style/styleindex.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link active">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">จะไปหน้าไหน</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-white  elevation-4 " style="background-color: #008622;">

            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="/style/logo.png" alt="Logo" class="w-75" style="opacity: .8">
                <span class="brand-text font-weight-light" style="font-size: 28px;"></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar mt-3 ">

                <!-- Sidebar Menu -->
                <nav class="mt-2 position-relative">

                    <ul class="nav nav-pills nav-sidebar  flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item ">
                            <a href="/staff" class="nav-link active">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>ยื่นคำขอจองห้องประชุม
                                </p>
                            </a>
                        </li>
                        <li class="nav-item mt-3 ">
                            <a href="" class="nav-link active">
                                <i class="nav-icon fas fa-bell-exclamation"></i>
                                <p>สถานะการจอง</p>
                            </a>
                        </li>
                        <li class="nav-item mt-3 ">
                            <a href="" class="nav-link active">
                                <i class="nav-icon fas fa-list-ol"></i>
                                <p>รายการคำขอยื่นจอง</p>
                            </a>
                        </li>
                        <hr class="mt-5 mb-5">
                        <li class="nav-item ">
                            <a href="/" class="btn btn-block btn-moph ">
                                <i class="nav-icon fas fa-sign-out-alt"></i>ออกจากระบบ
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>

            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color: rgba(189, 189, 189, 0.384);">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid p-4">

                    <div class="row mt-3">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <!-- general form elements -->
                            <div class="card shadow">
                                <div class="card-header card-head">
                                    <h3 class="text-center">รายการคำขอยื่นจองห้องประชุม</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>โครงการ</th>
                                                <th>ห้อง</th>
                                                <th>จำนวนคนเข้าประชุม</th>
                                                <th>ผู้จอง</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Misc</td>
                                                <td>PSP browser</td>
                                                <td>PSP</td>
                                                <td>-</td>
                                                <td align="center"><a class="btn badge-success"><i class="fas fa-check-circle"></i></a>
                                                    <a class="btn badge-info"><i class="fas fa-check-circle"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Other browsers</td>
                                                <td>All others</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td align="center"><a class="btn badge-success"><i class="fas fa-check-circle"></i></a>
                                                    <a class="btn badge-info"><i class="fas fa-check-circle"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Misc</td>
                                                <td>PSP browser</td>
                                                <td>PSP</td>
                                                <td>-</td>
                                                <td align="center"><a class="btn badge-success"><i class="fas fa-check-circle"></i></a>
                                                    <a class="btn badge-info"><i class="fas fa-check-circle"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Other browsers</td>
                                                <td>All others</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td align="center"><a class="btn badge-success"><i class="fas fa-check-circle"></i></a>
                                                    <a class="btn badge-info"><i class="fas fa-check-circle"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Misc</td>
                                                <td>PSP browser</td>
                                                <td>PSP</td>
                                                <td>-</td>
                                                <td align="center"><a class="btn badge-success"><i class="fas fa-check-circle"></i></a>
                                                    <a class="btn badge-info"><i class="fas fa-check-circle"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Other browsers</td>
                                                <td>All others</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td align="center"><a class="btn badge-success"><i class="fas fa-check-circle"></i></a>
                                                    <a class="btn badge-info"><i class="fas fa-check-circle"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Misc</td>
                                                <td>PSP browser</td>
                                                <td>PSP</td>
                                                <td>-</td>
                                                <td align="center"><a class="btn badge-success"><i class="fas fa-check-circle"></i></a>
                                                    <a class="btn badge-info"><i class="fas fa-check-circle"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Other browsers</td>
                                                <td>All others</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td align="center"><a class="btn badge-success"><i class="fas fa-check-circle"></i></a>
                                                    <a class="btn badge-info"><i class="fas fa-check-circle"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Misc</td>
                                                <td>PSP browser</td>
                                                <td>PSP</td>
                                                <td>-</td>
                                                <td align="center"><a class="btn badge-success"><i class="fas fa-check-circle"></i></a>
                                                    <a class="btn badge-info"><i class="fas fa-check-circle"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Other browsers</td>
                                                <td>All others</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td align="center"><a class="btn badge-success"><i class="fas fa-check-circle"></i></a>
                                                    <a class="btn badge-info"><i class="fas fa-check-circle"></i></a>
                                                </td>
                                            </tr> <tr>
                                                <td>Misc</td>
                                                <td>PSP browser</td>
                                                <td>PSP</td>
                                                <td>-</td>
                                                <td align="center"><a class="btn badge-success"><i class="fas fa-check-circle"></i></a>
                                                    <a class="btn badge-info"><i class="fas fa-check-circle"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Other browsers</td>
                                                <td>All others</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td align="center"><a class="btn badge-success"><i class="fas fa-check-circle"></i></a>
                                                    <a class="btn badge-info"><i class="fas fa-check-circle"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>โครงการ</th>
                                                <th>ห้อง</th>
                                                <th>จำนวนคนเข้าประชุม</th>
                                                <th>ผู้จอง</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- ./col -->
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="js/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- InputMask -->

    <!-- Switch bootstrap -->
    <script src="js/bootstrap-switch.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/dataTables.responsive.min.js"></script>
    <script src="js/responsive.bootstrap4.min.js"></script>
    <script src="js/dataTables.buttons.min.js"></script>
    <script src="js/buttons.bootstrap4.min.js"></script>

    <!-- Toastr -->
    <script src="js/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="style/adminlte.js"></script>

    <script>
        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

        $(function () {

            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        $(document).ready(function () {
            $.ajax({
                type: "get",
                dataType: "json",
                url: "/style",
                success: function (result) {
                    //  const json = JSON.stringify(response);
                    var user = '<option value="" selected disabled>-รูปแบบห้อง-</option>';
                    for (ii in result) {
                        user += '<option value="' + result[ii].st_id + '">' + result[ii]
                            .st_name +
                            '</option>';
                    }
                    // a simple user
                    $('#style').html(user);

                }
            });
            $.ajax({
                type: "get",
                dataType: "json",
                url: "https://sarawut-pcru.github.io/Data/tbl_rooms.json",
                success: function (result) {
                    var user = '<option value="" selected disabled>-ห้องประชุม-</option>';
                    for (ii in result) {
                        user += '<option value="' + result[ii].ro_id + '">' + result[ii]
                            .ro_name +
                            '</option>';
                    }
                    $('#room').html(user);

                }
            });
            $("#room").change(function () {
                var ro_id = $(this).val();
                $.ajax({
                    type: "get",
                    dataType: "json",
                    url: "https://sarawut-pcru.github.io/Data/tbl_rooms.json",
                    data: {
                        ro_id: ro_id,
                    },
                    success: function (result) {
                        var user = '';
                        for (ii in result) {
                            user += result[ii].ro_id;
                            if (result[ii].ro_id === ro_id) {
                                var people = result[ii].ro_people;
                                var detail = result[ii].ro_detail;
                            }
                        }
                        $('#people').val(people);
                        $('#detail').val(detail);
                    }
                });
            });

        });
    </script>
</body>

</html>