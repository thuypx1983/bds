<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
<div id="wrapper">
    <header id="header">
        <div class="header-top">
            <div class="container">
                <div class="row">           
                     <?php if (theme_get_setting('image_logo', 'phamxuanthuy')): ?>
                                <?php if ($logo): ?>
                                                                           <div id="logo">
                                            <h1>
                                                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
                                                    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
                                                </a>
                                            </h1>
                                        </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <hgroup id="site-name-wrap">
                                    <h1 id="site-name">
                                        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
                                            <span><?php print $site_name; ?></span>
                                        </a>
                                    </h1>
                                    <?php if ($site_slogan): ?><h2
                                        id="site-slogan"><?php print $site_slogan; ?></h2><?php endif; ?>
                                </hgroup>
                            <?php endif; ?>
                <div class="banner-header">
                           <?php print render($page['header_top_right']); ?>
                </div>    
                </div>
            </div>
        </div>
    </header>
    <nav id="menu-main" class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

            </div>
            <div id="navbar" class="navbar-collapse collapse" >
                <?php
                $main_menu = variable_get('menu_main_links_source', 'main-menu');
                $tree = menu_tree($main_menu);
                print render($tree);
                ?>
            </div>
        </div>
    </nav>
    <div id="slider">
        <?php print render($page['banner']); ?>
    </div>
    <div id="main-content">


        <div id="primary">
            <?php if (theme_get_setting('breadcrumbs')): ?>
                <?php if ($breadcrumb): ?>
                    <div id="breadcrumbs">
                        <div class="container">
                            <div class="row"><?php print $breadcrumb; ?></div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php print render($page['help']); ?>
            <?php print $messages; ?>
            <div id="content-wrapper nd-khoi">
                <div class="container">
                    <div class="row">
                        <div id="content" class="col-xs-12 col-sm-12 col-md-9 col-lg-9 pull-right">
                            <?php print render($title_prefix); ?>
                            <?php if ($title): ?>
                                <h1 class="page-title">
                                <?php print ($title); ?>
                                </h1><?php endif; ?>
                            <?php print render($title_suffix); ?>
                            <?php if (!empty($tabs['#primary'])): ?>
                                <div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
                            <?php if ($action_links): ?>
                                <ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
                            <?php print render($page['content']); ?>
                        </div>
                        <div id="sidebar" class="hidden-xs hidden-sm col-md-3 col-lg-3 pull-left">
                            <?php if ($page['sidebar_left']): ?>
                                <?php print render($page['sidebar_left']); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


            </div>

                <div id="dang-ky" class="tu-van container nd-khoi">
                    <div class="row">
                        <div class="col-left nd-col col-xs-12 col-sm-7 col-md-7">
                            <?php if ($page['content_left']): ?>
                                <?php print render($page['content_left']); ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-right nd-col col-xs-12 col-sm-5 col-md-5">
                            <?php if ($page['content_right']): ?>
                                <?php print render($page['content_right']); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="khoi-end nd-khoi">
                    <div class="container">
                        <div class="row">
                            <div class="huong-dan col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <?php if ($page['footer_top_left']): ?>
                                    <?php print render($page['footer_top_left']); ?>
                                <?php endif; ?>
                            </div>
                            <div class="danh-gia col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <?php if ($page['footer_top_right']): ?>
                                    <?php print render($page['footer_top_right']); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($page['content_bottom']): ?>
                <?php print render($page['content_bottom']); ?>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <footer id="footer">
        <div class="container">
            <?php if ($page['footer_bottom']): ?>
                <?php print render($page['footer_bottom']); ?>
            <?php endif; ?>
        </div>
    </footer>
</div>







