<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<url>
		<loc><?php echo Router::url('/',true); ?></loc>
		<changefreq>daily</changefreq>
		<priority>1.0</priority>
	</url>
	<?php foreach ( $noticias as $noticia ):?>
	<url>
		<loc><?php echo Router::url( '/noticias/ver/'.$noticia['Noticias']['id_noticia'],true); ?></loc>
		<lastmod><?php echo $time->toAtom($noticia['Noticias']['modified']); ?></lastmod>
		<priority>0.8</priority>
	</url>
	<?php endforeach; ?>
	<?php foreach ( $categorias as $categoria ):?>
	<url>
		<loc><?php echo Router::url( '/categorias/ver/'.$categoria['Categoria']['id_categoria'],true); ?></loc>
		<priority>0.8</priority>
	</url>
	<?php endforeach; ?>
	<?php foreach ( $productos as $producto ):?>
	<url>
		<loc><?php echo Router::url( '/productos/ver/'.$producto['Producto']['id_producto'],true); ?></loc>
		<priority>0.8</priority>
	</url>
	<?php endforeach; ?>
	<?php foreach ( $promociones as $promocion ):?>
	<url>
		<loc><?php echo Router::url( '/promociones/ver/'.$promocion['Promocion']['id_promocion'],true); ?></loc>
		<priority>0.8</priority>
	</url>
	<?php endforeach; ?>
</urlset>