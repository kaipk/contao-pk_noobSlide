<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2012 Leo Feyer
 * 
 * @package Pk_noobSlide
 * @link    http://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'ContentNoobSlidePreview' => 'system/modules/pk_noobSlide/ContentNoobSlidePreview.php',
	'ContentNoobSlideEnd'     => 'system/modules/pk_noobSlide/ContentNoobSlideEnd.php',
	'ContentNoobSlideNews'    => 'system/modules/pk_noobSlide/ContentNoobSlideNews.php',
	'ContentNoobSlideSetup'   => 'system/modules/pk_noobSlide/ContentNoobSlideSetup.php',
	'ContentNoobSlideSection' => 'system/modules/pk_noobSlide/ContentNoobSlideSection.php',
	'ModuleNoobSlideArticle'  => 'system/modules/pk_noobSlide/ModuleNoobSlideArticle.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_noobslide_end'      => 'system/modules/pk_noobSlide/templates',
	'ce_noobslide_preview'  => 'system/modules/pk_noobSlide/templates',
	'ce_noobslide_section'  => 'system/modules/pk_noobSlide/templates',
	'ce_noobslide_setup'    => 'system/modules/pk_noobSlide/templates',
	'mod_noobslide_article' => 'system/modules/pk_noobSlide/templates',
));
