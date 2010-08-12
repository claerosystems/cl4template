<!DOCTYPE html>
<html lang="<?php if (isset($language)) echo $language; ?>" class="no-js">
<head>
    <meta charset="utf-8">
    <title><?php if (DEVELOPMENT_FLAG) echo '*** DEVELOPMENT SITE '; ?><?php echo SHORT_NAME . ' v' . APP_VERSION; ?> <?php if (isset($pageTitle) && trim($pageTitle) != '') echo ' - ' . $pageTitle; ?></title>
    <meta name="description" content="<?php if (isset($metaDescription)) echo $metaDescription; ?>" />
    <meta name="keywords" content="<?php if (isset($metaKeywords)) echo $metaKeywords; ?>" />
    <meta name="author" content="<?php if (isset($metaAuthor)) echo $metaAuthor; ?>" />
    <meta name="viewport" content="width=device-width" />
<?php foreach ($styles as $file => $type) echo '    ' . HTML::style($file, array('media' => $type)), EOL; ?>
    <!-- http://www.modernizr.com/ fixes missing html5 elements in IE and detects for new HTML5 features -->
    <script src="/js/modernizr-1.5.min.js"></script>
    <script>
        var pageLocale = '<?php echo i18n::lang(); ?>';
        var pageUrl = 'http://<?php echo $_SERVER['SERVER_NAME']; ?><?php echo $_SERVER['REQUEST_URI']; ?>';
        var baseUrl = 'http://<?php echo $_SERVER['SERVER_NAME']; ?>';
        var pageDate = '<?php //echo $this->getCurrentDate(); ?>';
        var pageSection = '<?php echo $pageSection; ?>';
        var pageName = '<?php echo $pageName; ?>';
        var googleMapsApiPublicKey = '<?php echo GOOGLE_API_KEY; ?>';
    </script>
</head>
<body id="<?php if (isset($pageName)) echo str_replace(' ','_',$pageName); ?>" class="<?php echo $bodyClass; ?>">
<div id="wrapper">
<?php if (DEVELOPMENT_FLAG) { ?>
    <aside class="development">THIS SITE IS CURRENTLY UNDER DEVELOPMENT</aside>
<?php } // if ?>
    <aside class="mainTitle"><?php echo LONG_NAME . ' v' . APP_VERSION; ?></aside>
    <header>
        <nav class="primary">
            <ul>
                <li class="home"><a href="/<?php echo i18n::lang(); ?>/page/home"><?php echo __('Home'); ?></a></li>
                <li class="about"><a href="/<?php echo i18n::lang(); ?>/page/about"><?php echo __('About'); ?></a></li>
                <li class="news"><a href="/<?php echo i18n::lang(); ?>/page/news"><?php echo __('News'); ?></a></li>
                <li class="missing"><a href="/<?php echo i18n::lang(); ?>/page/missing"><?php echo __('Missing'); ?></a></li>
                <li class="contact"><a href="/<?php echo i18n::lang(); ?>/page/contact"><?php echo __('Contact'); ?></a></li>
<?php if (!$loggedIn) { ?>
                <li><a href="/<?php echo i18n::lang(); ?>/account"><?php echo __('Login'); ?></a></li>
<?php } // if ?>
                <li class="last language"><?php echo __('Language: '); ?><?php if (isset($languageOptions)) echo $languageOptions; ?></li>
            </ul>
        </nav>
<?php if ($loggedIn) { ?>
        <nav class="private">
            <ul>
                <li style="padding-left:7px;"><?php echo __('Welcome'); ?> <?php echo $_SESSION['full_name']; ?></li>
                <li><a href="/<?php echo i18n::lang(); ?>/account"><?php echo __('My Account'); ?></a></li>
                <li><a href="/<?php echo i18n::lang(); ?>/admin"><?php echo __('Admin'); ?></a></li>
                <li><a href="/<?php echo i18n::lang(); ?>/meta"><?php echo __('Meta'); ?></a></li>
                <li class="last"><a href="/<?php echo i18n::lang(); ?>/account/logout"><?php echo __('Logout'); ?></a></li>
            </ul>
        </nav>
<?php } // if ?>
    </header>
<?php if (isset($message) && $message != '') echo '<div class="statusMessage message">' . $message . '</div>' . EOL; ?>
    <div id="mainContent">
<?php echo $bodyHtml; ?>
    </div>
    <div style="clear:both;"></div>
    
    <footer>
        <nav>
            &copy;<?php echo date('Y'); ?> Claero Systems <?php echo __('All Rights Reserved'); ?>
            | <a href="/<?php echo i18n::lang(); ?>/page/home/sitemap"><?php echo __('Site Map'); ?></a>
            | <a href="/<?php echo i18n::lang(); ?>/page/home/privacy"><?php echo __('Privacy Policy'); ?></a>
            | <a href="/<?php echo i18n::lang(); ?>/page/home/aboutsite"><?php echo __('About this site'); ?></a>
        </nav>

        <div style="clear:both;"></div>

        <div id="kohana-profiler" style="display:none;">
<?php //echo View::factory('profiler/stats'); ?>
        </div>
<?php //echo Kohana::debug($_SERVER); ?>

    </footer>
</div> <!-- wrapper -->

<!-- disabled for now, should only be loaded as needed...
<?php if (GOOGLE_API_KEY != '') { ?>
<?php // Javascript jquery libraries loaded from Google CDN for paralell processing and caching advantage, using google.load as prescribed best practice ?>
<script src="http://www.google.com/jsapi?key=<?php echo GOOGLE_API_KEY; ?>" type="text/javascript"></script>
<script>
    google.load("jquery", "1.4.2");
    google.load("jqueryui", "1.8.2");
</script>
<?php } else { ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js" type="text/javascript"></script>
<?php } // if ?>
-->

<!-- Javascript, put all javascript here or in $onloadJs if possible -->
<?php foreach ($scripts as $file) echo HTML::script($file), "\n"; ?>

<!-- Javascript to run once the page is loaded -->
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({ cache: false }); // don't cache ajax calls
        $('a').click(function() { this.blur(); } ); // avoid lingering borders on selected links
<?php if (isset($onLoadJs)) echo $onLoadJs; // the following blank line is there for formatting ?>

    });
</script>

<?php if (ANALYTICS_ID != '') { ?>
<!-- Google Analytics Code -->
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', '<?php echo ANALYTICS_ID; ?>']);
    _gaq.push(['_trackPageview']);
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
<?php } // if ?>
</body>
</html>