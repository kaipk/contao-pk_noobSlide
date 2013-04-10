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


class ContentNoobSlideNews extends ContentElement
{

	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### NOBSLIDE - NEWS SECTIONS '.++$GLOBALS['NOOBSLIDE'][$this->pid]['sections'].' ###';
			$objTemplate->title = $this->headline;
			return $objTemplate->parse();
		}

		$time = time();
    	if (($this->start > 0 && $this->start > $time) || ($this->stop > 0 && $this->stop < $time))
    	{
      	 	return '';
    	}

   		$objContent = $this->Database->execute("SELECT * FROM tl_content WHERE id=".$this->id);
		$arrCSS = deserialize($this->cssID);
		$arrCSS[1] = trim($arrCSS[1] . ' ce_noobSlide_section');
		$objContent->cssID = $arrCSS;

		$objModule = new ModuleNewsList($this->Database->execute("SELECT * FROM tl_module WHERE id=".(int)$this->nSNews), $this->inColumn);
		$objModule->generate();

		$strBuffer = '';
		$arrArticles = $objModule->Template->articles;

		foreach( $arrArticles as $strArticle )
		{
			$objSection = new ContentNoobSlideSection($objContent);
			$strBuffer .= $objSection->generate();
			$strBuffer .= $strArticle;
		}

		return $strBuffer;

	}

	protected function compile(){}
}

