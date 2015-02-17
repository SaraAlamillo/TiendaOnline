{extends 'master.tpl'}

{block name=productos}
    <h2>Productos</h2>
    <ol>
        {foreach from=$productos item=producto}
            <li>{$producto->nombre}</li>
            {/foreach}
    </ol>
{/block}

{block name=destacados}
    <h2>Destacados</h2>
    <ol>
        {foreach from=$destacados item=producto}
            <li>{$producto->nombre}</li>
            {/foreach}
    </ol>
{/block}
