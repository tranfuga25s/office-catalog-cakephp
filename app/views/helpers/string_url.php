<?php
class StringUrlHelper extends AppHelper {

	function convertir( $string )
	{
		// Define the maximum number of characters allowed as part of the URL
		$currentMaximumURLLength = 100;
		$string = strtolower($string);
		// Any non valid characters will be treated as _, also remove duplicate _
		$string = preg_replace('/[^a-z0-9_]/i', '_', $string);
		$string = preg_replace('/_[_]*/i', '_', $string);

	        // Cut at a specified length
		if (strlen($string) > $currentMaximumURLLength)
		{
			$string = substr($string, 0, $currentMaximumURLLength);
        	}

		// Remove beggining and ending signs
		$string = preg_replace('/_$/i', '', $string);
		$string = preg_replace('/^_/i', '', $string);
		return $string;
    }
}
?>