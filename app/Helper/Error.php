<?php
function showErrors($errors, $name)
{
    if ($errors->has($name)) {
        return '
 			<div class="text-danger" role="alert">
                    <span style="font-size: 14px;">' . $errors->first($name) . '</span>
			</div>
 		';
    }
}