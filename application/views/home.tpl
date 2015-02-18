{extends 'master.tpl'}

{block name=productos}
    <table border="1">
        {foreach from=$productos item=producto}
            <tr>
                <td><img src="{$imagenesDir}/productos/{$producto->imagen}" width="100px" /></td>
                <td>
                    {$producto->nombre} <br />
                    Precio: 
                    {if $producto->descuento ne 0}
                <strike>{$producto->precio}</strike> <b>{$producto->descuento}</b>
                {else}
                    {$producto->precio} 
                {/if}
            €
        </td>
    </tr>
{/foreach}
{$paginadorProductos}
</table>
{/block}
