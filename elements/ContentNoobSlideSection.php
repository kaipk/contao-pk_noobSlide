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


class ContentNoobSlideSection extends \ContentElement
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
			$objTemplate = new \BackendTemplate('be_wildcard');
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

		$objFile = \FilesModel::findByUuid($this->nSBackground);

		if ($objFile !== null && is_file(TL_ROOT . '/' . $objFile->path))
		{
			$this->Template->background = ('background-image:url(\'' . $objFile->path . '\');');
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

