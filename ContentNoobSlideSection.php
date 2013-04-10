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


class ContentNoobSlideSection extends ContentElement
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_noobslide_section';


	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### NOOBSLIDE - SECTION ' . ++$GLOBALS['NOOBSLIDE'][$this->pid]['sections'] . ' ###';
			$objTemplate->title = $this->headline;
			return $objTemplate->parse();
		}

		$time = time();

    	if (($this->start > 0 && $this->start > $time) || ($this->stop > 0 && $this->stop < $time))
	    {
			return '';
		}

    	++$GLOBALS['NOOBSLIDE'][$this->pid]['sections'];

		$strBuffer = parent::generate();

		// Start the noobslide container
		if ($GLOBALS['NOOBSLIDE'][$this->pid]['sections'] == 1)
		{
			$strBuffer = '<div class="ce_noobSlide_container" style="width:'.$GLOBALS['NOOBSLIDE'][$this->pid]['width'].'px;height:'.$GLOBALS['NOOBSLIDE'][$this->pid]['height'].'px">' . $strBuffer;
		}

		// Close the preview ul/li
		if ($GLOBALS['NOOBSLIDE'][$this->pid]['sections'] == 1 && $GLOBALS['NOOBSLIDE'][$this->pid]['previews'] > 0)
		{
			$strBuffer = '</div>' . $strBuffer;
		}

		return $strBuffer;
	}


	protected function compile()
	{
		$this->Template->first = false;
		$this->Template->last = false;
		$this->Template->closeLink = false;
		$this->Template->openLink = false;
		$this->Template->target = '';
		$this->Template->href = $this->nSUrl;
		$this->Template->width = $GLOBALS['NOOBSLIDE'][$this->pid]['width'];
		$this->Template->height = $GLOBALS['NOOBSLIDE'][$this->pid]['height'];

		if ($GLOBALS['NOOBSLIDE'][$this->pid]['sections'] == 1)
		{
			$this->Template->first = true;
		}
		else
		{
			$this->Template->closeLink = $GLOBALS['NOOBSLIDE'][$this->pid]['sectionLink'] ? true : false;
		}

		if ($GLOBALS['NOOBSLIDE'][$this->pid]['sections'] == $GLOBALS['NOOBSLIDE'][$this->pid]['total'])
		{
			$this->Template->last = true;
		}

		//background-image was not displayed in contao3 see ticket #8
		if (version_compare(VERSION, '3.0', '<'))
		{
			if (is_file(TL_ROOT . '/' . $this->nSBackground))
			{
				$this->Template->background = ('background-image:url(\'' . $this->nSBackground . '\');');
			}
		}
		else
		{
			$objModel = \FilesModel::findByPk($this->nSBackground);

			if ($objModel !== null && is_file(TL_ROOT . '/' . $objModel->path))
			{
				$this->Template->background = ('background-image:url(\'' . $objModel->path . '\');');
			}
		}

		// Override the link target
		if ($this->nSTarget)
		{
			global $objPage;
			$this->Template->target = ($objPage->outputFormat == 'html5') ? ' target="_blank"' : ' onclick="window.open(this.href); return false;"';
		}

		$GLOBALS['NOOBSLIDE'][$this->pid]['sectionLink'] = $this->nSUrl == '' ? false : true;
		$this->Template->openLink = $GLOBALS['NOOBSLIDE'][$this->pid]['sectionLink'];
	}
}

