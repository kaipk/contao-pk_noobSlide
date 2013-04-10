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


class ContentNoobSlideSetup extends ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_noobslide_setup';


	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### NOOBSLIDE - SETUP ###';
			return $objTemplate->parse();
		}

		$time = time();
		if (($this->start > 0 && $this->start > $time) || ($this->stop > 0 && $this->stop < $time))
		{
			return '';
		}

		$blnStartStop = in_array('ce_startstop', $this->Config->getActiveModules());

		$objArticle = $this->Database->execute("SELECT a.*, COUNT(c.id) AS sections FROM tl_content c LEFT JOIN tl_article a ON c.pid=a.id WHERE c.type='noobslide_setup' AND c.pid={$this->pid}" . ($blnStartStop ? " AND (c.start='' OR c.start<$time) AND (c.stop='' OR c.stop>$time)" : '') . " GROUP BY c.pid");

		$objTotal = $this->Database->execute("SELECT COUNT(*) as total FROM tl_content WHERE type = 'noobslide_section' AND pid=$this->pid".($blnStartStop ? " AND (start='' OR start<$time) AND (stop='' OR stop>$time)" : ''));

		$cssID = deserialize($objArticle->cssID, true);
		$GLOBALS['NOOBSLIDE'][$this->pid]['id'] = $cssID[0] != '' ? $cssID[0] : standardize($objArticle->pid);
		$GLOBALS['NOOBSLIDE'][$this->pid]['previews'] = 0;
		$GLOBALS['NOOBSLIDE'][$this->pid]['sections'] = 0;
		$GLOBALS['NOOBSLIDE'][$this->pid]['total'] = $objTotal->total;

		return parent::generate();
	}

	protected function compile()
	{
		$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/pk_noobSlide/html/class.noobSlide.packed.js';
		$GLOBALS['TL_CSS'][] = 'system/modules/pk_noobSlide/html/noobSlide.css';

		if($this->nSMooSwipe)
		{
			$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/pk_noobSlide/html/class.MooSwipe.packed.js';
		}

		$GLOBALS['NOOBSLIDE'][$this->pid]['mode'] = $this->nSMode;
		$GLOBALS['NOOBSLIDE'][$this->pid]['jsElements'] = '1,2,3,4';
		$GLOBALS['NOOBSLIDE'][$this->pid]['startPoint'] = $this->nSStartPoint;
		$GLOBALS['NOOBSLIDE'][$this->pid]['randomStartPoint'] = $this->nSRandomStartPoint ? true : false;
		$GLOBALS['NOOBSLIDE'][$this->pid]['randomSlides'] = $this->nSRandomSlides ? true : false;
		$GLOBALS['NOOBSLIDE'][$this->pid]['nSPlayAuto'] = $this->nSPlayAuto ? true : false;
		$GLOBALS['NOOBSLIDE'][$this->pid]['interval'] = $this->nSEffectInterval;
		$GLOBALS['NOOBSLIDE'][$this->pid]['effectActive'] = $this->nSEffectsExtended;
		$GLOBALS['NOOBSLIDE'][$this->pid]['effect'] = $this->nSEffectTransition.".ease".$this->nSEffectEase;
		$GLOBALS['NOOBSLIDE'][$this->pid]['effectDuration'] = $this->nSEffectDuration;
		$GLOBALS['NOOBSLIDE'][$this->pid]['ControlButtons'] = $this->nSControlButtons ? true : false;
		$GLOBALS['NOOBSLIDE'][$this->pid]['Controls'] = $this->nSControls ? true : false;
		$GLOBALS['NOOBSLIDE'][$this->pid]['SideButtons'] = $this->nSSideButtons ? true : false;
		$GLOBALS['NOOBSLIDE'][$this->pid]['noobHandlesId'] = $cssID[0] != '' ? $cssID[0] : $objArticle->alias;
		$GLOBALS['NOOBSLIDE'][$this->pid]['width'] = $this->nSElemWidth;
		$GLOBALS['NOOBSLIDE'][$this->pid]['height'] = $this->nSElemHeight;
		$GLOBALS['NOOBSLIDE'][$this->pid]['nSMooSwipe'] = $this->nSMooSwipe ? true : false;
		$GLOBALS['NOOBSLIDE'][$this->pid]['nSMouseOver'] = $this->nSMouseOver ? true : false;

		$this->Template->sliderId = $this->pid;
		$this->Template->width = $this->nSElemWidth;
		$this->Template->height = $this->nSElemHeight;
	}
}

