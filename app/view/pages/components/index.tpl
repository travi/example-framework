<ul>
    {foreach key=navItem item=navLink from=$content}
    <li><a href="{$navLink}">{$navItem}</a></li>
    {/foreach}
</ul>