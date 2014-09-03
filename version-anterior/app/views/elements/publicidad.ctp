<?php
$ruta = $this->requestAction( array( 'controller' => 'promociones', 'action' => 'ver' ) );
if( $ruta != null ) {
?>
<a id="publicidad" rel="lightbox" href="/<?php echo $ruta; ?>"></a>
<script type="text/javascript">
    // <![CDATA[
        function autoFireLightbox() {
            //Check if location.hash matches a lightbox-anchor. If so, trigger popup of image.
            setTimeout(function() {
                if( document.getElementById( 'publicidad' ) ) {
                    Slimbox.open( document.getElementById( 'publicidad' ).href );
                }},
                250
            );
        }
    // ]]>
</script>
<?php
} else  { echo "<!-- Sin publicidades aplicadas -->"; }
?>