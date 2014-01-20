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
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['noobSlide_article'] = '{title_legend},name,headline,type;{config_legend},nSarticleAlias;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['nSarticleAlias'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['nSarticleAlias'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_noobSlide', 'getArticleAlias'),
	'eval'                    => array('mandatory'=>true, 'submitOnChange'=>true),
	'wizard' => array
	(
		array('tl_module_noobSlide', 'editArticleAlias')
	),
	'sql'					  => "int(10) unsigned NOT NULL default '0'"
);


class tl_module_noobSlide extends tl_module
{

	/**
	 * Get all articles and return them as array (article alias)
	 * @param object
	 * @return array
	 */
	public function getArticleAlias(DataContainer $dc)
	{
		$arrPids = array();
		$arrAlias = array();
		if (!$this->User->isAdmin)
		{
			foreach ($this->User->pagemounts as $id)
			{
				$arrPids[] = $id;
				$arrPids = array_merge($arrPids, $this->getChildRecords($id, 'tl_page', true));
			}

			if (empty($arrPids))
			{
				return $arrAlias;
			}

			$objAlias = $this->Database->prepare("SELECT a.id, a.title, a.inColumn, p.title AS parent FROM tl_article a LEFT JOIN tl_page p ON p.id=a.pid WHERE a.pid IN(". implode(',', array_map('intval', array_unique($arrPids))) .") ORDER BY parent, a.sorting")
									   ->execute();
		}
		else
		{
			$objAlias = $this->Database->prepare("SELECT a.id, a.title, a.inColumn, p.title AS parent FROM tl_article a LEFT JOIN tl_page p ON p.id=a.pid ORDER BY parent, a.sorting")
									   ->execute();
		}

		if ($objAlias->numRows)
		{
			$this->loadLanguageFile('tl_article');

			while ($objAlias->next())
			{
				$arrAlias[$objAlias->parent][$objAlias->id] = $objAlias->title . ' (' . (strlen($GLOBALS['TL_LANG']['tl_article'][$objAlias->inColumn]) ? $GLOBALS['TL_LANG']['tl_article'][$objAlias->inColumn] : $objAlias->inColumn) . ', ID ' . $objAlias->id . ')';
			}
		}
		return $arrAlias;
	}


	/**
	 * Return the edit article alias wizard
	 * @param object
	 * @return string
	 */
	public function editArticleAlias(DataContainer $dc)
	{
		return ($dc->value < 1) ? '' : ' <a href="contao/main.php?do=article&amp;table=tl_article&amp;act=edit&amp;id=' . $dc->value . '" title="'.sprintf(specialchars($GLOBALS['TL_LANG']['tl_module']['editalias'][1]), $dc->value).'" style="padding-left:3px;">' . $this->generateImage('alias.gif', $GLOBALS['TL_LANG']['tl_module']['editalias'][0], 'style="vertical-align:top;"') . '</a>';
	}
}