<!DOCTYPE html>
<html lang="en">
<head>
	  <?php foreach ($data as $key): ?>
	<link rel="icon" type="image/png" href="<?=base_url()?>assets/login/images/<?=$key->logosistem?>">
	
	<title><?=$key->namasistem?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/css/main.css">

  	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2_ori/dist/sweetalert2.min.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">

		<div class="container-login100">
		
			<div class="wrap-login100" style="padding-top: 100px; padding-bottom: 100px;">
				
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?=base_url()?>assets/login/images/<?=$key->logosistem?>" alt="IMG">
				</div>

				<form class="login100-form validate-form" id="login">
					
					<span class="login100-form-title">
						Aplikasi<br><?=$key->namasistem?>
					</span>
					<div class="wrap-input100">
						<input class="input100" type="text" name="username" id="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<!-- data-validate = "Password Harus Diisi!" -->
					<div class="wrap-input100">
						<input class="input100" type="password" name="pass" id="inputPassword" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="btn_login">
							Login
						</button>
					</div>

					
				</form>
			</div>
		</div>
	</div>
	
	
 <?php endforeach ?>
	
<!--===============================================================================================-->	
	<script src="<?=base_url()?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=base_url()?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/vendor/tilt/tilt.jquery.min.js"></script>

	
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/js/main.js"></script>
	<script src="<?= base_url()?>assets/plugins/sweetalert2_ori/dist/sweetalert2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			// $('#btn_login').on('click', function(){
			// 	var username = $('#inputusername').val();
			// 	var password = $('#inputPassword').val();
			// 	login(username, password);
			// })
			$('#login').submit(function(e){
				e.preventDefault();
				var username = $('#username').val();
				var password = $('#inputPassword').val();
				var namasistem='<?=$key->namasistem?>';

				if (username == '') {
					Swal.fire("Masukan Terlebih dahulu UserName nya","","warning")
				}else if(password == ''){
					Swal.fire("Masukan Terlebih Dahulu Passwordnya","","warning")
				}else{
					login(username, password,namasistem);
				}
			})


		});
		function login(username, password,namasistem) {
			$.ajax({
				type: 'POST',
				url: '<?=base_url("index.php/Auth/proses_login")?>',
				dataType: 'json',
				data: {username,password,namasistem},
				success:function(response){
					$('#message').html(response.message);
					$('#logText').html('Login');
					if(response.error){
						Swal.fire('Login Gagal!','Username atau Password Salah!', 'error')
					}
					else{
						Swal.fire('Login Berhasil','Mohon tunggu','success')
						setTimeout(function(){
							location.href = '<?=strtolower(base_url())?>Dashboard';
						}, 500);
					}
				},
				error: function(response){
					Swal.fire("Program Error!","Hubungi IT!",'error')
				}
			});
		}
	</script>
</body>
</html>