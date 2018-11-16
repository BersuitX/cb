<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

An uncaught Exception was encountered

Type:        <?php echo get_class($Vvz3bsiw0khw), "\n"; ?>
Message:     <?php echo $V15xvmvzbb0h, "\n"; ?>
Filename:    <?php echo $Vvz3bsiw0khw->getFile(), "\n"; ?>
Line Number: <?php echo $Vvz3bsiw0khw->getLine(); ?>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

Backtrace:
<?php	foreach ($Vvz3bsiw0khw->getTrace() as $Veqekzxyjyqy): ?>
<?php		if (isset($Veqekzxyjyqy['file']) && strpos($Veqekzxyjyqy['file'], realpath(BASEPATH)) !== 0): ?>
	File: <?php echo $Veqekzxyjyqy['file'], "\n"; ?>
	Line: <?php echo $Veqekzxyjyqy['line'], "\n"; ?>
	Function: <?php echo $Veqekzxyjyqy['function'], "\n\n"; ?>
<?php		endif ?>
<?php	endforeach ?>

<?php endif ?>
