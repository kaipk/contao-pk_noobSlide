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
 

class ContentNoobSlidePreview extends ContentText
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
			$objTemplate = new BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### NOOBSLIDE PREVIEW ' . ++$GLOBALS['NOOBSLIDE'][$this->pid]['previews'] . ' ###';
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

 