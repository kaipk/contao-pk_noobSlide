<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  KAIPO EDV IT Ges.m.b.H 2010-2012
 * @author     Philipp Kaiblinger <philipp.kaiblinger@kaipo.at>
 * @package    NoobSlide
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 * @version    $Id
 */
 
 
/**
 * Class ModuleNoobSlideArticle
 *
 * Provide methods to include Article in Module.
 * @copyright  Philipp Kaiblinger 2012
 * @author     Philipp Kaiblinger <philipp.kaiblinger@kaipo.at>
 * @package    Controller
 */ 
class ModuleNoobSlideArticle extends Module
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
			$objTemplate = new BackendTemplate('be_wildcard');

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
		$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/pk_noobSlide/html/class.noobSlide.packed.js';
		$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/pk_noobSlide/html/class.MooSwipe.packed.js';
		$GLOBALS['TL_CSS'][] = 'system/modules/pk_noobSlide/html/noobSlide.css';
		
		$objArticle = $this->Database->query("SELECT alias FROM tl_article WHERE id={$this->nSarticleAlias}");
		
		// get article
		$article = $this->replaceInsertTags($this->getArticle($this->nSarticleAlias, false, true));
		// remove sub-indexers from included modules
		$article = str_replace('<!-- indexer::continue -->','', str_replace('<!-- indexer::stop -->','',$article));
		
		$this->Template->sliderCssId = ' id="' . $objArticle->alias . '"';
		$this->Template->article =  $article;

	}
}

