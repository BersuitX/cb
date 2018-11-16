<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: <?php echo $Vgz2c4ocyllo; ?></p>
<p>Message:  <?php echo $V15xvmvzbb0h; ?></p>
<p>Filename: <?php echo $Vohaqukrowkd; ?></p>
<p>Line Number: <?php echo $Vcfdirgq3swa; ?></p>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

	<p>Backtrace:</p>
	<?php foreach (debug_backtrace() as $Veqekzxyjyqy): ?>

		<?php if (isset($Veqekzxyjyqy['file']) && strpos($Veqekzxyjyqy['file'], realpath(BASEPATH)) !== 0): ?>

			<p style="margin-left:10px">
			File: <?php echo $Veqekzxyjyqy['file'] ?><br />
			Line: <?php echo $Veqekzxyjyqy['line'] ?><br />
			Function: <?php echo $Veqekzxyjyqy['function'] ?>
			</p>

		<?php endif ?>

	<?php endforeach ?>

<?php endif ?>

</div>