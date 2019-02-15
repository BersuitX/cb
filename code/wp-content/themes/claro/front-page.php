<?php
	global $t_dir, $url;
	$error = false;
	if ( empty ( $_GET['code'] ) ) {
		$error = true;
	}

	$lead = $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM cl_lead WHERE MD5(identificacion) = %s', $_GET['code']) );
	if ( empty ( $lead ) ) {
		$error = true;
	}

	$lead_real = $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM cl_lead_up WHERE MD5(identificacion) = %s', $_GET['code']) );

	if ( ! $error ) {
		if ( empty( $lead_real ) ) {
			$insert = $wpdb->insert(
				'cl_lead_up',
				array(
					'id_lead' 				=> $lead->id,
					'nombre' 					=> $lead->nombre,
					'correo' 					=> $lead->correo,
					'identificacion' 	=> $lead->identificacion,
					'celular' 				=> $lead->celular,
					'categoria' 			=> $lead->categoria,
					'ciudad' 					=> $lead->ciudad,
					'visto' 					=> 1
				),
				'%s'
			);
		} else {
			$wpdb->update(
				'cl_lead_up',
				array(
					'visto'	=> $lead_real->visto+1
				),
				array(
					'id' 		=> $lead_real->id
				),
				'%s'
			);
		}
	}	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Claro</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $t_dir; ?>/front-page/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $t_dir; ?>/front-page/css/mediaw.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $t_dir; ?>/front-page/css/mediah.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="personas">
		<img src="<?php echo $t_dir; ?>/front-page/img/personas.png">
		</div>
		<div class="cont-text">
			<div class="text">
				<?php if ( ! $error ) { ?>
				<h1 class="text-title">¡Ya estamos conectados!</h1>
				<p class="text-description">Nos encanta tenerte aquí<br>y poder compartir contigo</p>
				<?php }else{ ?>
					<h1 class="text-title">¡Lo sentimos!</h1>
					<p class="text-description">No te encuentras registrado<br> para participar en esta campaña</p>
				<?php } ?>
			</div>
		</div>
		<!-- inconos SMS -->
		<div class="sms-1"><img src="<?php echo $t_dir; ?>/front-page/img/sms1.png"></div>
		<div class="sms-2"><img src="<?php echo $t_dir; ?>/front-page/img/sms1.png"></div>
		<div class="sms-3"><img src="<?php echo $t_dir; ?>/front-page/img/sms2.png"></div>

		<!-- inconos Whatsapp -->
		<div class="wp-desenfoque-1"><img src="<?php echo $t_dir; ?>/front-page/img/wp-desenfoque.png"></div>
		<div class="wp-desenfoque-2"><img src="<?php echo $t_dir; ?>/front-page/img/wp-desenfoque.png"></div>
		<div class="wp-1"><img src="<?php echo $t_dir; ?>/front-page/img/wp.png"></div>
		<div class="wp-2"><img src="<?php echo $t_dir; ?>/front-page/img/wp.png"></div>
	</div>
	
</body>
</html>