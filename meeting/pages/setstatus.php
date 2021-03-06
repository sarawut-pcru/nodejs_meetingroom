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
<!-- DataTables -->
<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
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
                    <a class="nav-link active">เปิด-ปิด สิทธิ์การเพิ่มข้อมูล</a>
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
                    <div class="row  mt-3">
                        <div class="col-xl-6 col-md-12 col-sm-12">
                            <!-- general form elements -->
                            <div class="card shadow">
                                <div class="card-header  card-head ">
                                    <div class="text-center">
                                        <h1>เปิด-ปิด สิทธิ์การเพิ่มข้อมูล</h1>
                                    </div>
                                </div>
                                <!-- form start -->
                                <form method="POST" action="" id="frmdata" name="frmdata">
                                    <div class="card-body">
                                        <!--//? /.Room Name -->
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">ward :</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2 select2-info " data-dropdown-css-class="select2-success" id="ward_id" name="ward_id"></select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">faction :</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2 select2-info " data-dropdown-css-class="select2-success" id="fac_id" name="faction_id"></select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">deaprt :</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2 select2-info " data-dropdown-css-class="select2-success" id="depart_id" name="depart_id"></select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-md-3 col-form-label">สถานะ :</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2 select2-info " data-dropdown-css-class="select2-success" id="setstatus" name="setstatus">
                                                        <option value="Y">เปิด</option>
                                                        <option value="N">ปิด</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer ">
                                        <div class="row justify-content-between ">
                                            <button type="reset" class="col-md-4 btn btn-secondary mt-2" id="btnreset">ยกเลิก</button>
                                            <button type="submit" id="btnRooms">เพิ่มสิทธิ์การเพิ่มอุปรณ์</button>
                                        </div>
                                    </div>
                                    <input type="hidden" id="dv_id" value="" name="dv_id">
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-xl-6 col-md-12 col-sm-12">
                            <!-- general form elements -->
                            <div class="card shadow">
                                <div class="card-header card-head ">
                                    <div class="text-center">
                                        <h1>ward ที่เปิดสถานะ</h1>
                                    </div>
                                </div>
                                <!-- form start -->
                                <form method="" action="" id="">
                                    <div class="card-body table-responsive p-2">
                                        <!--//? tableTools -->
                                        <div id="tableward">
                                        </div>
                                        <!--//? tableTools -->
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

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
    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
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
            $('#btnRooms').addClass('col-md-4 btn bg-color mt-2 saveroom');
            $('#btnRooms').html('เพิ่มสิทธิ์การเพิ่มอุปรณ์');
            var path = '<?php echo $_SESSION['mt_path']; ?>';
            var lv_id = '<?php echo $_SESSION['mt_duty_id']; ?>';
            var depart_id = '<?php echo $_SESSION['mt_de_id']; ?>';
            var ward_id = '<?php echo $_SESSION['mt_ward_id']; ?>';
            var fac_id = '<?php echo $_SESSION['mt_faction_id']; ?>';


            // แสดงข้อมูลส่วนตัว
            var prefix = ''
            if (<?php echo $_SESSION['mt_prefix'] ?> == 1) {
                prefix = 'นาย'
            } else {
                prefix = 'นาง'

            }
            $('#prefix').val(prefix);
            $('#name').val('<?php echo $_SESSION['mt_name'] ?>');
            $('#de_name').val('<?php echo $_SESSION['mt_de_name'] ?>');
            $('#ward_name').val("<?php echo $_SESSION['mt_ward_name']; ?>");
            $('#fac_name').val("<?php echo $_SESSION['mt_faction_name']; ?>");
            $('#positions').val("<?php echo $_SESSION['mt_duty_name'] ?>");

            

            $.ajax({
                type: "get",
                dataType: "json",
                url: path + "/depart/faction",
                success: function(result) {
                    var fact = '';
                    for (ii in result) {

                        fact += '<option value="' + result[ii].faction_id + '">' + result[ii]
                            .faction_name +
                            '</option>';

                    }
                    $('#fac_id').html(fact);
                    $(document).on('change', '#fac_id', function() {
                        var factionid = $('#fac_id').val();
                        $.ajax({
                            type: "get",
                            dataType: "json",
                            url: path + "/depart/de_faction",
                            data: {
                                faction_id: factionid,
                            },
                            success: function(result) {
                                var depart = '';

                                for (ii in result) {

                                    depart += '<option value="' + result[ii].depart_id + '">' + result[ii]
                                        .depart_name +
                                        '</option>';
                                    // }

                                }
                                $('#depart_id').html(depart);
                            }
                        });
                    })
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
                            ward += '<option value="' + result[ii].ward_id + '">' + result[ii]
                                .ward_name +
                                '</option>';
                        }

                    }
                    $('#ward_id').html(ward);

                }
            });
            $(document).on('click', '#btnreset', function(e) {
                e.preventDefault();
                $('#btnRooms').removeClass();
                $('#btnRooms').addClass('col-md-4 btn bg-color mt-2 saveroom');
                $('#btnRooms').html('เพิ่มสิทธิ์การเพิ่มอุปรณ์');

            });
            $(document).on('click', '.saveroom', function(e) {
                e.preventDefault();
                var ward_id = $('#ward_id').val();
                var setstatus = $('#setstatus').val();
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: path + "/setstatus",
                    data: {
                        ward_id: ward_id,
                        setstatus: setstatus,
                    },
                    success: function(result) {
                        if (result.status == 200) {
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

                            location.reload();

                        } else {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                            })
                            Toast.fire({
                                icon: 'warning',
                                title: result.message
                            })

                            location.reload();

                        }
                    }
                })

            })
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: path + "/setstatus",
                success: function(data) {
                    var i = 0;
                    var table = '<table id="table_ward"  with="100%" class="table table-hover text-nowrap">' +
                        '<thead><tr><th>ID</th><th>ward</th><th>สถานะสิทธิ์</th><th></th></tr></thead>';

                    $.each(data, function(idx, cell) {
                        var msg = '';
                        if (cell.setstatus == "Y") {
                            msg = '<span style="font-size:16px" class=" badge rounded-pill bg-primary">เปิด</span>';
                        } else {
                            msg = '<span style="font-size:16px" class="badge rounded-pill bg-danger">ปิด</span>';
                        }

                        table += ('<tr>');
                        table += ('<td width="10%">' + cell.dv_id + '</td>');
                        table += ('<td width="30%" id="wardname">' + cell.ward_name + '</td>');
                        // table += ('<td><img src="' + obj.ImageURLs.Thumb + '"></td>');
                        table += ('<td width="10%" align="center">' + msg + '</td>');
                        table += ('<td  align="center"width="20%"><a id="' + cell.dv_id + '" class="btn btn-info btnEdit"title="แก้ไขข้อมูล"><i class="fas fa-edit"></i></a>' +
                            ' <a id="' + cell.dv_id + '" class="btn btn-danger btnDels" title="ลบข้อมูล"><i class="fa fa-trash-alt " ></i></a></td>');
                        table += ('</tr>');

                    });

                    table += '</table>';
                    $("#tableward").html(table);

                    $("#table_ward")
                        .DataTable({
                            responsive: true,
                            lengthChange: false,
                            "lengthMenu": [
                                [10, 24, 49, -1],
                                [10, 25, 50, "All"]
                            ],
                            autoWidth: false,
                            buttons: {
                                dom: {
                                    button: {
                                        className: "btn btn-light  ",
                                    },
                                },
                                buttons: [{
                                    extend: "colvis",
                                    className: "btn btn-outline-success"
                                }, ]
                            },
                            language: {
                                buttons: {
                                    colvis: "Change columns",
                                },
                            },
                        })
                        .buttons()
                        .container()
                        .appendTo("#tb_Tools_wrapper .col-md-6:eq(0)");

                    $(document).on('click', '.btnEdit', function(e) {
                        e.preventDefault();
                        var dv_id = $(this).attr('id');

                        $.ajax({
                            type: 'get',
                            dataType: 'json',
                            url: path + "/setstatus",
                            data: {
                                dv_id: dv_id
                            },
                            success: function(result) {
                                for (i in result) {
                                    var dvid = result[i].dv_id;
                                    var ward_id = result[i].ward_id;
                                    var fac_id = result[i].faction_id;
                                    var de_id = result[i].depart_id;
                                }
                                $('#btnRooms').removeClass();
                                $('#btnRooms').addClass('col-md-4 btn btn-warning mt-2 btnsaveEdit');
                                $('#btnRooms').html('ยืนยันแก้ไขสิทธิ์');
                                $('#dv_id').val(dvid);
                                $.ajax({
                                    type: "get",
                                    dataType: "json",
                                    url: path + "/depart/ward",
                                    success: function(results) {
                                        var ward = '';
                                        for (ii in results) {
                                            if (results[ii].ward_id == ward_id) {
                                                ward += '<option selected value="' + results[ii].ward_id + '" selected >' + results[ii]
                                                    .ward_name +
                                                    '</option>'
                                            } else {
                                                ward += '<option value="' + results[ii].ward_id + '">' + results[ii]
                                                    .ward_name +
                                                    '</option>';
                                            }
                                        }
                                        $('#ward_id').html(ward);
                                    }
                                });
                                $.ajax({
                                    type: "get",
                                    dataType: "json",
                                    url: path + "/depart/faction",
                                    success: function(results) {
                                        var fact = '';
                                        for (ii in results) {
                                            if (results[ii].faction_id == fac_id) {
                                                fact += '<option selected value="' + results[ii].faction_id + '" selected >' + results[ii]
                                                    .faction_name +
                                                    '</option>'
                                            } else {
                                                fact += '<option value="' + results[ii].faction_id + '">' + results[ii]
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
                                    url: path + "/depart/de_faction",
                                    data: {
                                        faction_id: fac_id,
                                    },
                                    success: function(results) {
                                        var dep = '';
                                        for (ii in results) {
                                            if (results[ii].depart_id == de_id) {
                                                dep += '<option selected value="' + results[ii].depart_id + '" selected >' + results[ii]
                                                    .depart_name +
                                                    '</option>'
                                            } else {
                                                dep += '<option value="' + results[ii].depart_id + '">' + results[ii]
                                                    .depart_name +
                                                    '</option>';
                                            }
                                        }
                                        $('#depart_id').html(dep);
                                    }
                                });
                               
                                // $('#btnRooms').val(result.ward_name);
                            }
                        })
                    })


                    $(document).on('click', '.btnsaveEdit', function(e) {
                        e.preventDefault();
                        var dv_id = $('#dv_id').val();
                        var ward_id = $('#ward_id').val();
                        var dept_id = $('#depart_id').val();
                        var fac_id = $('#fac_id').val();
                        var setstatus = $('#setstatus').val();
                      
                        $.ajax({
                            type: "put",
                            dataType: "json",
                            url: path + "/setstatus",
                            data: {
                                dv_id: dv_id,
                                ward_id: ward_id,
                                faction_id: fac_id,
                                depart_id: dept_id,
                                setstatus: setstatus,
                                
                            },
                            success: function(result) {
                                if (result.status == '200') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: result.message,
                                    }).then((result) => {
                                        location.reload();
                                    })
                                } else {
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 1500,
                                    })
                                    Toast.fire({
                                        icon: 'warning',
                                        title: result.message,

                                    }).then((result) => {
                                        location.reload();
                                    })
                                }
                            }
                        })
                    })
                    $(document).on('click', '.btnDels', function(e) {
                        e.preventDefault();
                        var dv_id = $(this).attr('id');

                        $.ajax({
                            type: "delete",
                            dataType: "json",
                            url: path + "/setstatus",
                            data: {
                                dv_id: dv_id
                            },
                            success: function(result) {
                                if (result.status == '200') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: result.message,
                                    }).then((result) => {
                                        location.reload();
                                    })
                                } else {
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 1500,
                                    })
                                    Toast.fire({
                                        icon: 'warning',
                                        title: result.message,

                                    }).then((result) => {
                                        location.reload();
                                    })
                                }
                            }
                        })
                    })



                }
            })

        });
    </script>

</body>

</html>