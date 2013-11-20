{include file='head/head.tpl'}
    <body>
        <div id="wrap">
            <header>
                <h1 id="siteName"><a href="/">{$page->getHeader()}</a></h1>
                <h2 id="tagLine">{$page->getTagLine()}</h2>
            </header>
            <nav id="primaryNav">
                {include file='nav/contentNav.tpl' id="mainNav"}
            </nav>
            <div id="content">
                <h3 class="pageTitle">{$page->getTitle()}</h3>
                {include file='content.tpl'}
            </div>
            <footer>
                Site
                <dl>
                    <dt>developed by:</dt>
                    <dd><a href="http://matt.travi.org">Matt&nbsp;Travi</a></dd>
                </dl>
            </footer>
        </div>

        {include file='head/jsInclude.tpl'}

        {if $page->isProduction()} {include file='head/analytics.tpl'} {/if}

        <!-- Prompt IE 6 users to install Chrome Frame. chromium.org/developers/how-tos/chrome-frame-getting-started -->
        <!--[if lt IE 7 ]>
        <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
        <script>window.attachEvent('onload',function(){literal}{{/literal}CFInstall.check({literal}{{/literal}mode:'overlay'{literal}}{/literal}){literal}}{/literal})</script>
        <![endif]-->
    </body>
</html>