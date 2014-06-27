<?php
class FckHelper extends Helper
{
	function load($id, $toolbar = 'Default') {
		$did = '';
		foreach (explode('.', $id) as $v) {
	 		$did .= ucfirst($v);
		}

		return <<<FCK_CODE
<script type="text/javascript">
ckLoader_$did = function () {
	CKEDITOR.BasePath = '/js/ckeditor/';
	CKEDITOR.ToolbarSet = '$toolbar';
	CKEDITOR.replace( '$did' );
}
ckLoader_$did();
</script>
FCK_CODE;
	}
}
?>