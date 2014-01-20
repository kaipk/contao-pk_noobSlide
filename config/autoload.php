<?php

/**
 * Noobslider for Contao Open Source CMS
 *
 * Copyright (C) 2010-2014 KAIPO EDV IT Ges.m.b.H
 *
 * @author     Philipp Kaiblinger <philipp.kaiblinger@kaipo.at>
 * @package    pk_noobslide
 * @link       http://www.kaipo.at
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'PhilippKaiblinger',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'PhilippKaiblinger\noobSlide\ContentNoobSlidePreview' => 'system/modules/pk_noobSlide/elements/ContentNoobSlidePreview.php',
	'PhilippKaiblinger\noobSlide\ContentNoobSlideEnd'     => 'system/modules/pk_noobSlide/elements/ContentNoobSlideEnd.php',
	'PhilippKaiblinger\noobSlide\ContentNoobSlideNews'    => 'system/modules/pk_noobSlide/elements/ContentNoobSlideNews.php',
	'PhilippKaiblinger\noobSlide\ContentNoobSlideSetup'   => 'system/modules/pk_noobSlide/elements/ContentNoobSlideSetup.php',
	'PhilippKaiblinger\noobSlide\ContentNoobSlideSection' => 'system/modules/pk_noobSlide/elements/ContentNoobSlideSection.php',
	'PhilippKaiblinger\noobSlide\ModuleNoobSlideArticle'  => 'system/modules/pk_noobSlide/modules/ModuleNoobSlideArticle.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_noobslide_end'      => 'system/modules/pk_noobSlide/templates/elements',
	'ce_noobslide_preview'  => 'system/modules/pk_noobSlide/templates/elements',
	'ce_noobslide_section'  => 'system/modules/pk_noobSlide/templates/elements',
	'ce_noobslide_setup'    => 'system/modules/pk_noobSlide/templates/elements',
	'mod_noobslide_article' => 'system/modules/pk_noobSlide/templates/modules',
));
