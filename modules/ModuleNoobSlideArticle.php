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
 * Namespace
 */
namespace PhilippKaiblinger\noobSlide;


/**
 * Class ModuleNoobSlideArticle
 *
 * Provide methods to include Article in Module.
 * @copyright  Philipp Kaiblinger 2014
 * @author     Philipp Kaiblinger <philipp.kaiblinger@kaipo.at>
 * @package    Controller
 */
class ModuleNoobSlideArticle extends \Module
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_noobslide_article';


	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### NOOBSLIDE FROM ARTICLE ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		// Return no alias has been set
		if ($this->nSarticleAlias < 0)
		{
			return '';
		}

		return parent::generate();
	}


	/**
	 * Generate module
	 */
	protected function compile()
	{
		// Include js and css files
		$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/pk_noobSlide/assets/class.noobSlide.packed.js';
		$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/pk_noobSlide/assets/class.MooSwipe.packed.js';
		$GLOBALS['TL_CSS'][] = 'system/modules/pk_noobSlide/assets/noobSlide.css';

		$objArticle = $this->Database->query("SELECT alias FROM tl_article WHERE id={$this->nSarticleAlias}");

		// get article
		$article = $this->replaceInsertTags($this->getArticle($this->nSarticleAlias, false, true));
		// remove sub-indexers from included modules
		$article = str_replace('<!-- indexer::continue -->','', str_replace('<!-- indexer::stop -->','',$article));

		$this->Template->sliderCssId = ' id="' . $objArticle->alias . '"';
		$this->Template->article =  $article;

	}
}

