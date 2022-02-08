<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<link rel="icon" href="../public/images/index.png" type="image/x-icon" />
	<title>Moph : MeetingRoom</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../plugins/bootstrap5/css/bootstrap.min.css" />
	<!-- Style Create -->
	<link rel="stylesheet" href="../public/styles/adminlte.min.css" />
	<link rel="stylesheet" href="../public/styles/styleindex.css" />

</head>

<body class="body_index">
	<div class="content-wrapper">
		<div class="col-md-4 position-absolute top-50 start-50 translate-middle">
			<div class="card shadow">
				<div class="card-header text-white text-center card-head">
					<img src="../public/images/logo.png" alt="Logo" class="rounded" width="50%">
					<!-- <span class="h2">Meeting Room </span> -->
				</div>
				<div class="card-body">
					<div class="col-12">
						<!-- Form -->
						<form method="post" id="frmLogin">
							<div class="  form-floating mb-3 mt-3">
								<input type="text" name="inputUsername" id="inputUsername" class="form-control" autocomplete="off" placeholder="Username" />
								<label for="floatingInputValue"> <small>Username</small></label>
							</div>
							<div class=" form-floating mb-3 mt-3">
								<input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" />
								<label for="floatingInputValue"><small>password</small></label>
							</div>
							<center>
								<div class="col-12 mt-4 mb-0">
									<button type="submit" value="btnLogin" id="btnLogin" class="login-btn btn-block">เข้าสู่ระบบ</button>
								</div>
							</center>
							<!-- /.col -->
							<center>
								<div class="copyright mt-4 ">
									Copyright &copy; 2021 ศูนย์คอมพิวเตอร์<br>โรงพยาบาลเพชรบูรณ์ สงวนลิขสิทธิ์
								</div>
							</center>

						</form>
						<!-- /.Form -->
					</div>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../node_modules/jquery/dist/jquery.min.js"></script>
	<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(function() {
			var path = '127.0.0.1:4500';


			//  if (token == 'Enterprise Resource Planning') {

			//  } else {
			
			$("#btnLogin").click(function(e) {
				e.preventDefault();

				$.ajax({
					type: "POST",
					url: path + "/login/login",
					data: $("#frmLogin").serialize(),
					dataType: "json",
					beforeSend: function() {
						$("#btnLogin").attr("disabled", "disabled");
						// $("#btnLogin").html("<img alt='loading' class='imgLoading' src='dist/img/load.gif'>");
					},
					timeout: 20000,
					error: function(jqXHR, exception) {
						var msg = '';

						if (jqXHR.status === 0) {
							msg = "ไม่สามารถเชื่อมต่อระบบเครือข่ายได้!";
						} else if (jqXHR.status == 404) {
							msg = "ไม่พบหน้านี้ในระบบ! [404]";
						} else if (jqXHR.status == 500) {
							msg = "ไม่สามารถเชื่อมต่อ Server ได้! [404]";
						} else if (exception === 'parsererror') {
							msg = "การร้องขอ JSON ผิดพลาด!";
						} else if (exception === 'timeout') {
							msg = "TIMEOUT\nการเชื่อมต่อใช้เวลานานเกินไป!";
						} else if (exception === 'abort') {
							msg = "การร้องขอ Ajax ถูกยกเลิกแล้ว!";
						} else {
							msg = "ไม่พบข้อผิดพลาด<br>" + jqXHR.responseText;
						}

						clearData(msg);
					},
					success: function(result) {
						if (result.status == 0) {
							clearData(result.message);
						} else {
							var user = result.person_username,
								id = result.person_id,
								name = result.person_firstname + ' ' + result.person_lastname,
								sign_id = result.sign_id,
								sign_name = result.sign_pic,
								po_id = result.position_id,
								po_name = result.position_name,
								ac_id = result.ac_id,
								ac_name = result.ac_name,
								page = result.person_page,
								right = result.person_right,
								line = result.person_token;

							//alert(user+" "+id+" "+name+" "+sign_id+" "+sign_name+" "+po_id+" "+po_name+" "+page+" "+right+" "+line);
							$.ajax({
								type: "POST",
								url: "login/level",
								data: {
									id: id
								},
								dataType: "json",
								success: function(result) {
									if (result.status == 0) {
										$("#btnLogin").html("เข้าสู่ระบบ");
										$("#btnLogin").removeAttr("disabled");
										$("#loginAlert").show(0).html(
												"<div align='center'>" + result
												.message + "</div>").delay(2500)
											.fadeOut('fast');
										$("#frmLogin")[0].reset();
										$("#inputUsername").focus();
									} else {
										if (result.length == 1) {
											login(user, id, name, sign_id,
												sign_name, result[0].level_id,
												result[0].duty_id, result[0]
												.duty_name, result[0]
												.faction_id, result[0]
												.faction_name, result[0]
												.depart_id, result[0]
												.depart_name, result[0]
												.ward_id, result[0].ward_name,
												po_id, po_name, ac_id,
												ac_name, page, right, line);
										} else {
											var depart = '';

											$('.item_office').html('');
											$('.item_office').select2({
												width: '100%'
											});

											for (key in result) {
												if (result[key].ward_id != 0) {
													depart = ' : ' + result[key]
														.ward_name;
												} else if (result[key]
													.depart_id != 0 && result[key]
													.ward_id == 0) {
													depart = ' : ' + result[key]
														.depart_name;
												} else if (result[key]
													.faction_id != 0 && result[
														key].depart_id == 0 &&
													result[key].ward_id == 0) {
													depart = ' : ' + result[key]
														.faction_name;
												} else {
													depart = '';
												}

												$('.item_office').append(
													'<option value="' +
													result[key].level_id +
													':' + result[key]
													.duty_id + ':' + result[
														key].duty_name + ':' +
													result[key].faction_id +
													':' + result[key]
													.faction_name + ':' +
													result[key].depart_id +
													':' + result[key]
													.depart_name + ':' +
													result[key].ward_id +
													':' + result[key]
													.ward_name + '">' +
													result[key].duty_name +
													depart + '</option>');
											}

											$('#blockModal').modal('show');

											$('#btnSave').on('click', function(
												e) {
												e.preventDefault();

												var office = $('#office')
													.val(),
													office = office.split(
														':');

												login(user, id, name,
													sign_id,
													sign_name, office[
														0], office[1],
													office[2], office[
														3], office[4],
													office[5], office[
														6], office[7],
													office[8], po_id,
													po_name, ac_id,
													ac_name, page,
													right, line);
											});
										}
									}
								}
							});
						}
					}
				});
			});

			$('#btnClose').on('click', function(e) {
				e.preventDefault();

				$("#btnLogin").removeAttr("disabled");
				$("#btnLogin").html("เข้าสู่ระบบ");
				$("#frmLogin")[0].reset();
				// $("#frmLevel")[0].reset();
			});

			function login(user, id, name, sign_id, sign_name, level_id, duty_id, duty_name, faction_id,
				faction_name, depart_id, depart_name, office_id, office_name, po_id, po_name, ac_id, ac_name,
				page, right, line) {
				$.post(
					'login/login.php', {
						'user': user,
						'id': id,
						'name': name,
						'sign_id': sign_id,
						'sign_name': sign_name,
						'level_id': level_id,
						'duty_id': duty_id,
						'duty_name': duty_name,
						'faction_id': faction_id,
						'faction_name': faction_name,
						'depart_id': depart_id,
						'depart_name': depart_name,
						'office_id': office_id,
						'office_name': office_name,
						'po_id': po_id,
						'po_name': po_name,
						'ac_id': ac_id,
						'ac_name': ac_name,
						'page': page,
						'right': right,
						'line': line
					},
					function() {
						location.href = page;
					}
				);
			}

			function clearData(msg) {
				$("#btnLogin").html("เข้าสู่ระบบ");
				$("#btnLogin").removeAttr("disabled");
				// $("#loginAlert").show(0).html("<div align='center'>"+msg+"</div>").delay(2500).fadeOut('fast');
				$("#frmLogin")[0].reset();
				// $("#frmLevel")[0].reset();
				$("#inputUsername").focus();
			}
			//  }
		});
	</script>
</body>

</html>