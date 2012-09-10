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
 
 
class ContentNoobSlideEnd extends ContentElement
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
			$objTemplate = new BackendTemplate('be_wildcard');
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

