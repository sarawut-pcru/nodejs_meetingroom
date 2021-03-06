<?php
require_once "../login/check_session.php";
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../public/images/index.png" type="image/x-icon" />
<title>Moph : MeetingRoom</title>

<!-- Font Awesome -->
<link rel="stylesheet" href="..//plugins/fontawesome-pro6/css/all.min.css">
<!-- bt -->
<link rel="stylesheet" href="../plugins/bootstrap5/css/bootstrap.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="../public/styles/ionicons.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- colorpic -->
<link rel="stylesheet" href="../plugins/colorpicker/colorpicker.css">
<!-- Sweetalert2 -->
<link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../public/styles/adminlte.min.css">
<link rel="stylesheet" href="../public/styles/styleindex.css">

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
                    <a href="_index.php" class="nav-link">หน้าแรก</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link active">เพิ่มข้อมูลอุปกรณ์</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Sidebar -->
        <?php require_once '../sidebar.php'; ?>
        <!-- Sidebar -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color: rgba(189, 189, 189, 0.384);">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid ">
                    <?php require_once '../infomation.php'; ?>
                    <div class="row justify-content-center mt-3">

                        <!-- ./col -->
                        <!-- //? Form Tools -->
                        <div class="col-xl-10 col-md-12 col-sm-12">
                            <!-- general form elements -->
                            <div class="card shadow">
                                <div class="card-header  card-head ">
                                    <div class="text-center">
                                        <h1>เพิ่มอุปกรณ์</h1>
                                    </div>
                                </div>
                                <!-- form start -->
                                <form method="POST" action="" id="frmTools">
                                    <div class="card-body ">
                                        <!--//? /.Tool Name -->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">อุปกรณ์ :</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " id="to_name" name="to_name" />
                                                </div>
                                            </div>
                                        </div>
                                        <!--//? /.Tool Name -->
                                        <!-- //? Input People -->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">ward :</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2 select2-info " data-dropdown-css-class="select2-success" id="ward_id">
                                                        <option value="0"></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">faction :</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2 select2-info " data-dropdown-css-class="select2-success" id="fac_id">
                                                        <option value="0"></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">แผนกที่ดูแล :</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2 select2-info " data-dropdown-css-class="select2-success" id="de_id">
                                                        <option value="0"></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- //? Input People -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer ">
                                        <div class="row justify-content-between ">
                                            <button type="reset" class="col-md-4 btn btn-secondary mt-2">ยกเลิก</button>
                                            <button type="submit" class="col-md-4 btn bg-color mt-2" id="btnTools" name="btnTools">ยืนยันเพิ่มอุปกรณ์</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- ./col -->
                        <!-- //? Form Tools -->
                    </div>
                    <!-- ./row form -->

                </div>

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
    <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
    <?php require_once '../footer.php'; ?>
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap5/js/bootstrap.min.js"></script>
    <!-- Font Awesome 6 -->
    <script src="../plugins/fontawesome-pro6/js/all.min.js"></script>
    <!-- Select2 -->
    <script src="../plugins/select2/js/select2.full.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <!-- color picker -->
    <script src="../plugins/colorpicker/colorpic.js"></script>
    <!-- Sweetalert2 -->
    <script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../public/javascript/adminlte.js"></script>
    <script>
        $(document).ready(function() {

            cache_clear();

            setInterval(function() {
                cache_clear()
            }, 60000);
        });


        function cache_clear() {

            var path = '<?php echo $_SESSION['mt_path'] ?>';
            var id = '<?php echo $_SESSION['mt_id']; ?>';
            var level = '<?php echo $_SESSION['mt_duty_id']; ?>';
            $.ajax({
                type: "get",
                url: path + "/event/count/user",
                data: {
                    id: id,
                },
                success: function(result) {
                    if (result.ev_status > 0) {
                        $("#uun1").html(
                            '<div class="badge badge-danger">' + result.ev_status + "</div>"
                        );
                    }
                },
            });
            $.ajax({
                type: "get",
                dataType: "json",
                url: path + "/event/count/staff",
                success: function(result) {
                    var bage = 0;

                    for (ii in result) {
                        if (result[ii].bage > 0) {
                            bage++;
                        }
                    }

                    $("#bagestaff").html(bage);
                }
            });
            $.ajax({
                type: "get",
                dataType: "json",
                url: path + "/event/count",
                data: {
                    level: level,
                },
                success: function(result) {
                    var bage = 0;

                    for (ii in result) {
                        if (result[ii].bage > 0) {
                            bage++;
                        }
                    }
                    $("#bage").html(bage);

                }
            });

            // window.location.reload(); use this if you do not remove cache
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.my-colorpicker1').colorpicker()
            $('.select2').select2();

            var path = '<?php echo $_SESSION['mt_path']; ?>';
            var lv_id = '<?php echo $_SESSION['mt_duty_id']; ?>';
            var depart_id = '<?php echo $_SESSION['mt_de_id']; ?>';
            var ward_id = '<?php echo $_SESSION['mt_ward_id']; ?>';
            var fac_id = '<?php echo $_SESSION['mt_faction_id']; ?>';

            // แสดงข้อมูลส่วนตัว
            var prefix = '';
            if (<?php echo $_SESSION['mt_prefix']; ?> == 1) {
                prefix = 'นาย';
            } else if (<?php echo $_SESSION['mt_prefix']; ?> == 2) {
                prefix = 'นาง';
            }
            $('#name').val("<?php echo $_SESSION['mt_name']; ?>");
            $('#prefix').val(prefix);
            $('#de_name').val("<?php echo $_SESSION['mt_de_name']; ?>");
            $('#ward_name').val("<?php echo $_SESSION['mt_ward_name']; ?>");
            $('#fac_name').val("<?php echo $_SESSION['mt_faction_name']; ?>");
            $('#positions').val("<?php echo $_SESSION['mt_duty_name']; ?>");
            



            $.ajax({
                type: "get",
                dataType: "json",
                url: path + "/depart",
                success: function(result) {
                    var depart = '';

                    for (ii in result) {
                        if (result[ii].depart_id == depart_id) {
                            depart += '<option selected value="' + result[ii].depart_id + '" selected >' + result[ii]
                                .depart_name +
                                '</option>'
                        } else {
                            depart += '<option value="0"></option><option value="' + result[ii].depart_id + '">' + result[ii]
                                .depart_name +
                                '</option>';
                        }

                    }
                    $('#de_id').html(depart);

                }
            });
            $.ajax({
                type: "get",
                dataType: "json",
                url: path + "/depart/faction",
                success: function(result) {
                    var fact = '';
                    for (ii in result) {
                        if (result[ii].faction_id == fac_id) {
                            fact += '<option selected value="' + result[ii].faction_id + '" selected >' + result[ii]
                                .faction_name +
                                '</option>'
                        } else {
                            fact += '<option value="0"></option><option value="' + result[ii].faction_id + '">' + result[ii]
                                .faction_name +
                                '</option>';
                        }

                    }
                    $('#fac_id').html(fact);

                }
            });
            $.ajax({
                type: "get",
                dataType: "json",
                url: path + "/depart/ward",
                success: function(result) {
                    var ward = '';
                    for (ii in result) {
                        if (result[ii].ward_id == ward_id) {
                            ward += '<option selected value="' + result[ii].ward_id + '" selected >' + result[ii]
                                .ward_name +
                                '</option>'
                        } else {
                            ward += '<option value="0"></option><option value="' + result[ii].ward_id + '">' + result[ii]
                                .ward_name +
                                '</option>';
                        }

                    }
                    $('#ward_id').html(ward);

                }
            });


            /// Tools
            $(document).on('click', '#btnTools', function(e) {
                // $('#btnTools').click(function(e) {
                e.preventDefault();
                var to_name = $('#to_name').val();
                var depart_id = $('#de_id').val();
                var ward_id = $('#ward_id').val();
                var faction_id = $('#fac_id').val();
                $.ajax({
                    type: "POST",
                    url: path + "/tools",
                    dataType: "json",
                    data: {
                        to_name: to_name,
                        depart_id: depart_id,
                        ward_id: ward_id,
                        faction_id: faction_id,
                    },
                    success: function(result) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        Toast.fire({
                            icon: 'success',
                            title: result.message

                        })
                        $("#frmTools")[0].reset();
                        $("#to_name")[0].focus();
                    },
                    error: function(result) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        Toast.fire({
                            icon: 'warning',
                            title: 'ไม่สามารถบันทึกข้อมูลอุปกรณ์ได้'

                        }).then((result) => {
                            msg = '';
                            clear_tools(msg);

                        })

                    }
                });

                function clear_tools(msg) {
                    $("#frmTools")[0].reset();
                    $("#to_name")[0].focus();
                }

            });

        });
    </script>

</body>

</html>