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


class ContentNoobSlideEnd extends \ContentElement
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_noobslide_end';


	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### NOOBSLIDE - END ###';
			return $objTemplate->parse();
		}

		$time = time();
		if (($this->start > 0 && $this->start > $time) || ($this->stop > 0 && $this->stop < $time))
		{
			return '';
		}

		return parent::generate();
	}


	protected function compile()
	{

		$this->Template->enableSlider = false;
		$this->Template->closeLink = $GLOBALS['NOOBSLIDE'][$this->pid]['sectionLink'] ? true : false;
		$this->Template->previews = $GLOBALS['NOOBSLIDE'][$this->pid]['previews'] > 0 ? true : false;

		//generate elements
		$arrJsElements = array();
		for ($i = 0; $i < $GLOBALS['NOOBSLIDE'][$this->pid]['sections']; $i++) {
	    	$arrJsElements[] = $i;
		}

		if ($GLOBALS['NOOBSLIDE'][$this->pid]['sections'] > 1)
		{
			$this->Template->enableSlider = true;
			$this->Template->articleId = $GLOBALS['NOOBSLIDE'][$this->pid]['id'];
			$this->Template->startPoint = $GLOBALS['NOOBSLIDE'][$this->pid]['startPoint'];
			$this->Template->randomStartPoint = $GLOBALS['NOOBSLIDE'][$this->pid]['randomStartPoint'];
			$this->Template->randomSlides = $GLOBALS['NOOBSLIDE'][$this->pid]['randomSlides'];
			$this->Template->jsElements = implode(',',$arrJsElements);
			$this->Template->countElements = $GLOBALS['NOOBSLIDE'][$this->pid]['sections'];
			$this->Template->nSPlayAuto = $GLOBALS['NOOBSLIDE'][$this->pid]['nSPlayAuto'] ? 1 : 0;
			$this->Template->interval = $GLOBALS['NOOBSLIDE'][$this->pid]['interval'];
			$this->Template->effectActive = $GLOBALS['NOOBSLIDE'][$this->pid]['effectActive'];
			$this->Template->effect = $GLOBALS['NOOBSLIDE'][$this->pid]['effect'];
			$this->Template->effectDuration = $GLOBALS['NOOBSLIDE'][$this->pid]['effectDuration'];
			$this->Template->ControlButtons = $GLOBALS['NOOBSLIDE'][$this->pid]['ControlButtons'];
			$this->Template->Controls = $GLOBALS['NOOBSLIDE'][$this->pid]['Controls'];
			$this->Template->SideButtons = $GLOBALS['NOOBSLIDE'][$this->pid]['SideButtons'];
			$this->Template->noobHandlesId = $GLOBALS['NOOBSLIDE'][$this->pid]['noobHandlesId'];
			$this->Template->sliderId = $this->pid;
			$this->Template->width = $GLOBALS['NOOBSLIDE'][$this->pid]['width'];
			$this->Template->height = $GLOBALS['NOOBSLIDE'][$this->pid]['height'];
			$this->Template->playbackLabel = $GLOBALS['TL_LANG']['MSC']['ControlButtons'][0];
			$this->Template->stopLabel = $GLOBALS['TL_LANG']['MSC']['ControlButtons'][1];
			$this->Template->playLabel = $GLOBALS['TL_LANG']['MSC']['ControlButtons'][2];
			$this->Template->previous = $GLOBALS['TL_LANG']['MSC']['previous'];
			$this->Template->next = $GLOBALS['TL_LANG']['MSC']['next'];
			$this->Template->mode_src = $GLOBALS['NOOBSLIDE'][$this->pid]['mode'];
			$this->Template->nSMooSwipe = $GLOBALS['NOOBSLIDE'][$this->pid]['nSMooSwipe'];
			$this->Template->nSMouseOver = $GLOBALS['NOOBSLIDE'][$this->pid]['nSMouseOver'];

			switch( $GLOBALS['NOOBSLIDE'][$this->pid]['mode'] )
			{
				case 'fade':
					$this->Template->mode = 'fade:\'true\'';
					break;

				case 'vertical':
					$this->Template->mode = 'mode:\'vertical\'';
					break;

				case 'horizontal':
				default:
					$this->Template->mode = 'mode:\'horizontal\'';
					break;
			}
		}
	}
}

