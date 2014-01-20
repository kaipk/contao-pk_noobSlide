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


class ContentNoobSlideNews extends \ContentElement
{

	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');
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

		$objModule = new \ModuleNewsList($this->Database->execute("SELECT * FROM tl_module WHERE id=".(int)$this->nSNews), $this->inColumn);
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

