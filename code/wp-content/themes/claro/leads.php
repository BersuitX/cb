<?php
	/**
	 * Template name: Leads
	 */
	global $t_dir, $url;
	if( ! current_user_can('administrator') ) {
		wp_redirect( home_url() );
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>URLS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo $t_dir; ?>/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $t_dir; ?>/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $t_dir; ?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $t_dir; ?>/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $t_dir; ?>/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $t_dir; ?>/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $t_dir; ?>/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $t_dir; ?>/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<h1><a href="<?php echo $url; ?>/wp-admin/admin.php?page=exports-reports&report=1&action=export&export_type=csv"> Exportar </a></h1>
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">ID</th>
								<th class="column2">Documento</th>
								<th class="column3">Nombre</th>
								<th class="column4">Correo</th>
								<th class="column5">Celular</th>
								<th class="column6">Ciudad</th>
								<th class="column7">Repetido</th>
							</tr>
						</thead>
						<tbody>
								<?php $leads = get_leads(); ?>
								<?php if ( ! empty ( $leads ) ) { ?>
									<?php foreach ( $leads as $lead ) { ?>
									<tr>
										<td class="column1"><?php echo $lead->id; ?></td>
										<td class="column2"><?php echo $lead->identificacion; ?></td>
										<td class="column3"><?php echo $lead->nombre; ?></td>
										<td class="column4"><?php echo $lead->correo; ?></td>
										<td class="column5"><?php echo $lead->celular; ?></td>
										<td class="column6"><?php echo $lead->ciudad; ?></td>
										<td class="column7"><strong><?php echo $lead->repetido; ?></strong></td>
									</tr>
									<?php } ?>
								<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<!--===============================================================================================-->	
	<script src="<?php echo $t_dir; ?>/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $t_dir; ?>/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo $t_dir; ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $t_dir; ?>/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $t_dir; ?>/js/main.js"></script>
</body>
</html>