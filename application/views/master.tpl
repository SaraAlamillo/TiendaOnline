<!DOCTYPE html>
<head>
    <title>{$tituloPagina}</title>
</head>
<body>
    {block name=cabecera}
	<h1>Tienda Online</h1>
    {/block}
    {block name=menu}
	{$categorias}
    {/block}
    {block name=contenido}
	<ol>
	{foreach from=$productos item=producto}
	    <li>{$producto->nombre}</li>
	{/foreach}
	</ol>
    {/block}
    {block name=pie}
	<p>Sara Alamillo Arroyo</p>
	<p>Desarrollo Web en Entorno Servidor</p>
    {/block}			
</body>
</html>