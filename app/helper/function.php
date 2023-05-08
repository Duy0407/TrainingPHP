<?php
function ShowError($errors, $name)
{
	if ($errors->has($name)) {
		return '<div class="validate_error">'.$errors->first($name).'</div>';
	}
}
?>
