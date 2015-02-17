<!DOCTYPE html>
<head>
    <title>{$tituloPagina}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    {block name=cabecera}
        <h1>Tienda Online</h1>
    {/block}
    {block name=menu}
        {$categorias}
    {/block}
    {block name=contenido}
    {block name=destacados}{/block}
{block name=productos}{/block}
{/block}
{block name=pie}
    <p>Sara Alamillo Arroyo</p>
    <p>Desarrollo Web en Entorno Servidor</p>
{/block}			
</body>
</html>