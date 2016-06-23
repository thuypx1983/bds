<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<?php print $styles; ?>
<?php print $scripts; ?>
<!--[if lt IE 9]><script src="<?php print base_path() . drupal_get_path('theme', 'phamxuanthuy') . '/js/html5.js'; ?>"></script><![endif]-->
</head>
<body data-spy="scroll" data-target=".side-menu" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  <a class="scrollToTop" style="display: inline;" data-scroll data-options='{ "easing": "easeOutCubic" }' data-scroll="" href="#">
        <img alt="" src="<?php echo file_create_url(drupal_get_path('theme', 'phamxuanthuy').'/images/back-to-top.png');?>">
    </a>
</body>
</html>
