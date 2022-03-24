<?php 
     //$path = "http://127.0.0.1:4200";
     $path = "https://pbhapi.moph.go.th:4200";

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <div class="collapse navbar-collapse order-3" id="navbarCollapse"> -->
    <link rel="icon" href="./public/images/index.png" type="image/x-icon" />
    <title>Moph : MeetingRoom</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-pro6/css/all.css" />
    <!-- bt5 -->
    <link rel="stylesheet" href="./plugins/bootstrap5/css/bootstrap.min.css" />
    <!-- daterange picker -->
    <link rel="stylesheet" href="./plugins/daterangepicker/daterangepicker.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="./public/styles/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="./plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="./plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="./plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="./plugins/sweetalert2/sweetalert2.min.css">

    <!-- fullCalendar Style -->
    <link rel="stylesheet" href="./public/styles/calendar.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./public/styles/adminlte.min.css">
    <link rel="stylesheet" href="./public/styles/styleindex.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white shadow">
            <div class="container-fluid ">
                <a href="" class="navbar-brand">
                    <img src="./public/images/logo.png" alt="Logo" class="brand-image " style="opacity: .8">
                    <span class="brand-text font-weight-light">ระบบจองห้องประชุม</span>
                </a>
                <a href="./room.php" class="navbar-brand ml-5">
                    <span class="brand-text font-weight-light">ห้องประชุม</span>
                </a>


                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- <a class="btn btn-success  mr-3">หน้าหลัก</a> -->
                    <a href="./_login.html" class="btn btn-success mr-3">เข้าสู่ระบบ</a>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color: rgba(189, 189, 189, 0.384);">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2 mt-2">
                        <div class="col-sm-12">
                            <h1 class="m-0 text-center"> ปฏิทินการใช้ห้องประชุม โรงพยาบาลเพชรบูรณ์</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center ">

                        <div class="col-xl-4 col-md-12 ">
                            <div class="card shadow">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h4><i class="fa-solid fa-fill-drip"></i> การประชุมประจำวัน</h4>
                                    </div>
                                </div>
                                <div class="card-body mb-0">
                                    <div id="showDate"></div>
                                    <div id="today" class="mt-2"></div>

                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h4><i class="fa-solid fa-fill-drip"></i> สีประจำห้องประชุม</h4>
                                    </div>
                                </div>
                                <div class="card-body mb-0">
                                    <div id="showcolor">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-12 ">
                            <div class="card ">
                                <div class="card-header text-white card-head ">
                                    <div class="text-center">
                                        <h4> ปฏิทินการใช้ห้องประชุม โรงพยาบาลเพชรบูรณ์</h5>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Modal -->
        <div class="modal fade " id="calendarmodal" tabindex="-1" role="dialog">
            <!--กำหนด id ให้กับ modal-->
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-center text-white edit-head">
                        <div class="text-center">
                            <h4 id="calendarmodal-title"> </h4>
                        </div>
                    </div>
                    <br>
                    <div class="col-lg-9">
                        <div class="form-group row">
                            <b class="col-lg-6">สถานที่ประชุม :</b>
                            <div class="col-lg-6">
                                <div id="calendarmodal-detail"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <b class="col-lg-6">ชื่อผู้ขอใช้ห้องประชุม:</b>
                            <div class="col-lg-6">
                                <div id="calendarmodal-name"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <b class="col-lg-6">กลุ่มงาน/ฝ่าย/แผนก :</b>
                            <div class="col-lg-6">
                                <div id="calendarmodal-dename"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <b class="col-lg-6">เบอร์ติดต่อสายตรง :</b>
                            <div class="col-lg-6">
                                <div id="calendarmodal-dephone"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <b class="col-lg-6">วันที่เริ่ม :</b>
                            <div class="col-lg-6">
                                <div id="calendarmodal-start"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <b class="col-lg-6">ถึงวันที่ :</b>
                            <div class="col-lg-6">
                                <div id="calendarmodal-end"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <b class="col-lg-6">เวลาเริ่ม :</b>
                            <div class="col-lg-6">
                                <div id="calendarmodal-starttime"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <b class="col-lg-6">ถึงเวลา :</b>
                            <div class="col-lg-6">
                                <div id="calendarmodal-endtime"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <b class="col-lg-6">จำนวนคน :</b>
                            <div class="col-lg-6">
                                <div id="calendarmodal-people"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <b class="col-lg-6">รูปแบบการจัดห้อง :</b>
                            <div class="col-lg-6">
                                <div id="calendarmodal-style"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->


        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b> </b>
            </div>
            <strong>Copyright &copy; 2022 ศูนย์คอมพิวเตอร์ โรงพยาบาลเพชรบูรณ์ สงวนลิขสิทธิ์ </strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="./plugins/jquery/jquery.min.js"></script>
    <script src="./plugins/bootstrap5/js/bootstrap.min.js"></script>
    <script src="./plugins/fontawesome-pro6/js/all.js"></script>
    <!-- Select2 -->
    <script src="./plugins/select2/js/select2.full.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="./plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- InputMask -->
    <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/inputmask/inputmask.min.js"></script>
        <script src="./public/javascript/moment-with-locales.js"></script>

    <!-- date-range-picker -->
    <script src="./plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="./plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Summernote -->
    <script src="./plugins/summernote/summernote-bs4.min.js"></script>
    <!-- Sweetalert2 -->
    <script src="./plugins/fontawesome-pro6/js/all.min.js"></script>

    <!-- AdminLTE App -->
    <script src="./public/javascript/adminlte.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="./public/javascript/maincalendar.js"></script>
    <script src='./public/javascript/calendar.js'></script>
    <script>
        $(function() {

            //Initialize Select2 Elements
            $('.select2').select2();
            //timepicker
            $('#datetimepicker1').datetimepicker({
                format: 'H:mm'
            });
            $('#datetimepicker2').datetimepicker({
                format: 'H:mm'
            });
            $('#datetimepicker3').datetimepicker({
                format: 'L'
            });
            $('#datetimepicker4').datetimepicker({
                format: 'L'
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // var path = 'https://pbhapi.moph.go.th:4200';
            var path = '<?php echo $path; ?>';

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: path + "/rooms",
                success: function(result) {
                    var data = data = '<div class="form-group row">' +
                        '<div class="input-group">';
                    for (i in result) {
                        data += '<label class="col-md-4 col-form-label">' + result[i].ro_name +
                            '  :</label> <div class="col-md ">'
                        data += "<div class='rounded h-75 w-100'  style =\"background-color : " +
                            result[i].ro_color + "\"></div>";
                        data += '</div>';
                    }
                    $('#showcolor').html(data);
                }
            });


            function toThaiDateString(date) {
                let monthNames = [
                    "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน",
                    "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม.",
                    "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
                ];

                let year = date.getFullYear() + 543;
                let month = monthNames[date.getMonth()];
                let numOfDay = date.getDate();

                let hour = date.getHours().toString().padStart(2, "0");
                let minutes = date.getMinutes().toString().padStart(2, "0");
                let second = date.getSeconds().toString().padStart(2, "0");

                return `${numOfDay} ${month} ${year} `; //+
                // `${hour}:${minutes}:${second} น.`;
            }
            let date1 = new Date();
            var button = '<center><button class="col-md-4 btn btn-info btn-block">' + toThaiDateString(date1) +
                '</button></center>'
            $('#showDate').html(button);

            var datetoday = new Date();
            var today2 = datetoday.toISOString("EN-AU", {
                    timeZone: "Australia/Melbourne"
                })
                .slice(0, 10);

            $.ajax({
                type: "get",
                dataType: "json",
                url: path + "/event/today",
                success: function(results) {
                    var today = ''
                    for (i in results) {
                       
                        if (results[i].ev_startdate == today2) {

                            today +=
                                "<div class='rounded border  mt-2 position-relative '  style =\"background-color : " +
                                results[i].ro_color + "\"> " +
                                "<div class='ml-5 '>" + results[i].ev_title + " เวลา " + results[i]
                                .ev_starttime + " ถึง " + results[i].ev_endtime + "</div>" +
                                '<span class="waitingForConnection"><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">' +
                                ' ใหม่ <span class="visually-hidden">unread messages</span><span>' +
                                "</div>";
                        }
                    }
                    $("#today").html(today);

                }
            })

        });

        function viewdetail(id) {
            //    console.log(id);
            var path = '<?php echo $path; ?>';
            // var id = calendar.getEventById(id); // ดึงข้อมูล ผ่าน api
            $.ajax({
                type: "POST",
                url: path + "/event/calendar",
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(results) {

                    for (i in results) {
                        if (results[i].ev_id == id) {
                            var title = results[i].ev_title;
                            var room = results[i].ro_name;
                            var style = results[i].st_name;
                            var start = results[i].ev_startdate;
                            var end = results[i].ev_enddate;
                            var starttime = results[i].ev_starttime;
                            var endtime = results[i].ev_endtime;
                            var people = results[i].ev_people;
                            var name = results[i].firstname;
                            var lastname = results[i].lastname;
                            var dename = results[i].de_name;
                            var dephone = results[i].de_phone;
                        }
                    }
                    $("#calendarmodal").modal("show");

                    $("#calendarmodal-title").html(title);
                    $("#calendarmodal-detail").html(room);
                    $("#calendarmodal-style").html(style);
                    //$("#calendarmodal-detail").html(event.extendedProps.detail);
                    $("#calendarmodal-start").html(start.split('T')[0]);
                    $("#calendarmodal-end").html(end.split('T')[0]);
                    $("#calendarmodal-starttime").html(starttime);
                    $("#calendarmodal-endtime").html(endtime);
                    $("#calendarmodal-people").html(people);
                    $("#calendarmodal-name").html(name + ' ' + lastname);
                    $("#calendarmodal-dename").html(dename);
                    $("#calendarmodal-dephone").html(dephone);
                },
            });
        }
    </script>
</body>

</html>