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


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] 			= 'nSEffectsExtended';
$GLOBALS['TL_DCA']['tl_content']['palettes']['noobSlide_setup'] 		= '{type_legend},type,headline; {nSSettings_legend},nSMode,nSElemClass,nSElemWidth,nSElemHeight;{nSEffects_legend},nSEffectsExtended;{nSPlay_legend},nSEffectInterval,nSStartPoint,nSRandomStartPoint,nSPlayAuto;{nSControls_legend},nSControls,nSMooSwipe,nSControlButtons,nSSideButtons,nSMouseOver;{protected_legend:hide},protected;{expert_legend:hide},guests,start,stop,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['noobSlide_preview']		= '{type_legend},type,headline;{text_legend},text;{image_legend},addImage;{link_legend:hide},nsUrl,nSTarget;{protected_legend:hide},protected;{expert_legend:hide},guests,start,stop,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['noobSlide_section']		= '{type_legend},type;{image_legend},nSBackground;{link_legend:hide},nSUrl,nSTarget;{protected_legend:hide},protected;{expert_legend:hide},guests,start,stop,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['noobSlide_news']			= '{type_legend},type;{include_legend},nSNews;{protected_legend:hide},protected;{expert_legend:hide},guests,start,stop,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['noobSlide_end'] 			= '{type_legend},type;{protected_legend:hide},protected;{expert_legend:hide},guests,start,stop,cssID,space';


/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['nSEffectsExtended'] 	= 'nSEffectTransition,nSEffectEase,nSEffectDuration';


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['nSMode'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_content']['nSMode'],
  'default'                 => 'horicontal',
  'inputType'               => 'radio',
  'options'                 => array('horicontal','vertical', 'fade'),
  'reference'               => &$GLOBALS['TL_LANG']['tl_content']['nSModeR'],
  'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['nSElemClass'] = array
(
  'label' => &$GLOBALS['TL_LANG']['tl_content']['nSElemClass'],
  'inputType' => 'text',
  'eval' => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['nSElemWidth'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_content']['nSElemWidth'],
  'exclude'                 => true,
  'inputType'               => 'text',
  'eval'                    => array("rgxp" => "numeric", "mandatory" => true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['nSElemHeight'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_content']['nSElemHeight'],
  'exclude'                 => true,
  'inputType'               => 'text',
  'eval'                    => array("rgxp" => "numeric", "mandatory" => true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['nSEffectsExtended'] = array
(
  'label'						=> &$GLOBALS['TL_LANG']['tl_content']['nSEffectsExtended'],
  'exclude'						=> true,
  'inputType'					=> 'checkbox',
  'eval'						=> array('submitOnChange'=>true, 'tl_class'=>'clr')
);
	
$GLOBALS['TL_DCA']['tl_content']['fields']['nSEffectTransition'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_content']['nSEffectTransition'],
  'inputType'               => 'select',
  'options'                 => array('Quad', 'Cubic', 'Quart', 'Quint', 'Sine', 'Expo', 'Circ', 'Bounce', 'Back', 'Elastic'),
  'reference'               => &$GLOBALS['TL_LANG']['tl_content']['nSEffectTransition'],
  'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['nSEffectEase'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_content']['nSEffectEase'],
  'default'                 => '1',
  'inputType'               => 'radio',
  'options'                 => array('In', 'Out', 'InOut'),
  'reference'               => &$GLOBALS['TL_LANG']['tl_content']['nSEffectEase'],
  'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['nSPlayAuto'] = array
(
  'label'					=> &$GLOBALS['TL_LANG']['tl_content']['nSPlayAuto'],
  'inputType'				=> 'checkbox',
  'eval'              		=> array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['nSEffectInterval'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_content']['nSEffectInterval'],
  'inputType'               => 'text',
  'eval'                    => array('mandatory'=>true, 'nospace'=>true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['nSEffectDuration'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_content']['nSEffectDuration'],
  'inputType'               => 'text',
  'eval'                    => array('mandatory'=>true,'nospace'=>true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['nSStartPoint'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_content']['nSStartPoint'],
  'inputType'               => 'text',
  'eval'                    => array('mandatory'=>true, 'nospace'=>true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['nSRandomStartPoint'] = array
(
  'label'					=> &$GLOBALS['TL_LANG']['tl_content']['nSRandomStartPoint'],
  'inputType'				=> 'checkbox',
  'eval'              		=> array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['nSControls'] = array
(
  'label'					=> &$GLOBALS['TL_LANG']['tl_content']['nSControls'],
  'inputType'				=> 'checkbox',
  'eval'              		=> array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['nSMooSwipe'] = array
(
  'label'					=> &$GLOBALS['TL_LANG']['tl_content']['nSMooSwipe'],
  'inputType'				=> 'checkbox',
  'eval'              		=> array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['nSControlButtons'] = array
(
  'label'					=> &$GLOBALS['TL_LANG']['tl_content']['nSControlButtons'],
  'inputType'				=> 'checkbox',
  'eval'              		=> array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['nSSideButtons'] = array
(
  'label'					=> &$GLOBALS['TL_LANG']['tl_content']['nSSideButtons'],
  'inputType'				=> 'checkbox',
  'eval'              		=> array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['nSNews'] = array
(
  'label'					=> &$GLOBALS['TL_LANG']['tl_content']['nSNews'],
  'exclude'			=> true,
  'inputType'			=> 'select',
  'options_callback'	=> array('tl_content_noobSlide', 'getNewsModules'),
  'eval'				=> array('mandatory'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['nSBackground'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_content']['nSBackground'],
	'exclude'			=> true,
	'inputType'			=> 'fileTree',
	'eval'				=> array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true, 'extensions'=>'png,gif,jpg,jpeg', 'tl_class'=>'clr'),
);

$GLOBALS['TL_DCA']['tl_content']['fields']['nSUrl'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['MSC']['url'],
	'exclude'			=> true,
	'search'			=> true,
	'inputType'			=> 'text',
	'eval'				=> array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50 wizard'),
	'wizard' => array
	(
		array('tl_content', 'pagePicker')
	),
);

$GLOBALS['TL_DCA']['tl_content']['fields']['nSTarget'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['MSC']['target'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array('tl_class'=>'w50 m12')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['nSMouseOver'] = array
(
  'label'					=> &$GLOBALS['TL_LANG']['tl_content']['nSMouseOver'],
  'inputType'				=> 'checkbox',
  'eval'              		=> array('tl_class'=>'w50')
);

class tl_content_noobSlide extends Backend
{
	
	/**
	 * Return all news list modules
	 *
	 * @param	DataContainer
	 * @return	array
	 * @link	http://www.contao.org/callbacks.html#options_callback
	 */
	public function getNewsModules($dc)
	{
		$arrModules = array();
		$objModules = $this->Database->execute("SELECT * FROM tl_module WHERE type='newslist'");
		
		while( $objModules->next() )
		{
			$arrModules[$objModules->id] = $objModules->name;
		}
		
		return $arrModules;
	}
}

