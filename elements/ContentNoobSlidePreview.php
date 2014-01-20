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


class ContentNoobSlidePreview extends \ContentText
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_noobslide_preview';


	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new  \BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### NOOBSLIDE PREVIEW ' . ++$GLOBALS['NOOBSLIDE'][$this->pid]['previews'] . ' ###';
			$objTemplate->title = $this->headline;
			return $objTemplate->parse();
		}

		$time = time();
		if (($this->start > 0 && $this->start > $time) || ($this->stop > 0 && $this->stop < $time))
		{
			return '';
		}

		++$GLOBALS['NOOBSLIDE'][$this->pid]['previews'];

		$strBuffer = parent::generate();

		// Start the preview container
		if ($GLOBALS['NOOBSLIDE'][$this->pid]['previews'] == 1)
		{
			$strBuffer = '<div class="ce_noobSlide_previews">' . $strBuffer;
		}

		return $strBuffer;
	}


	protected function compile()
	{
		parent::compile();

		if ($GLOBALS['NOOBSLIDE'][$this->pid]['previews'] == 1)
		{
			$cssId = $this->cssID;
			$cssId[1] = trim($cssId[1] . ' first');
			$this->cssID = $cssId;
		}

		if ($GLOBALS['NOOBSLIDE'][$this->pid]['previews'] == $GLOBALS['NOOBSLIDE'][$this->pid]['total'])
		{
			$cssId = $this->cssID;
			$cssId[1] = trim($cssId[1] . ' last');
			$this->cssID = $cssId;
		}
	}
}

