<!DOCTYPE html>
<?php
	if (isset($this->session->userdata['logged_in'])) {
		header("location: login/user_login_process");
	}
?>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login - Tugas Kelompok Pemweb</title>
		<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/pages/auth.css">
	</head>

	<body>
