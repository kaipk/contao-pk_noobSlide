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
 * Fields
 */ 
$GLOBALS['TL_LANG']['tl_content']['nSMode'] 				= array('Noobslider direction', 'Noobslider direction (horizontal, vertical or fade)');
$GLOBALS['TL_LANG']['tl_content']['nSModeR']['horicontal'] 	= 'Horizontal';
$GLOBALS['TL_LANG']['tl_content']['nSModeR']['vertical']	= 'Vertical';
$GLOBALS['TL_LANG']['tl_content']['nSModeR']['fade']		= 'Fade-Mode';
$GLOBALS['TL_LANG']['tl_content']['nSElemWidth'] 			= array('Width', 'Overall width, all internal parts must be adjusted.');
$GLOBALS['TL_LANG']['tl_content']['nSElemClass'] 			= array('CSS Klasse', 'Please specify a CSS class');
$GLOBALS['TL_LANG']['tl_content']['nSElemHeight'] 			= array('Height', 'Noobslide height, larger elements will be hidden!');
$GLOBALS['TL_LANG']['tl_content']['nSEffectsExtended'] 		= array('Enable Advanced settings', 'Based on the library Mootools Fx.');
$GLOBALS['TL_LANG']['tl_content']['nSEffectTransition']		= array('Movements', 'See examples on http://demos111.mootools.net/Fx.Transitions');
$GLOBALS['TL_LANG']['tl_content']['nSEffectEase'] 			= array('Ease', 'Softens the impact.');
$GLOBALS['TL_LANG']['tl_content']['nSPlayAuto'] 			= array('Enable autoplay');
$GLOBALS['TL_LANG']['tl_content']['nSStartPoint'] 			= array('Starting point Noobslide', 'Indication of the starting element (0 is the first item)');
$GLOBALS['TL_LANG']['tl_content']['nSEffectInterval'] 		= array('Delay', 'in milliseconds.');
$GLOBALS['TL_LANG']['tl_content']['nSEffectDuration'] 		= array('Duration', 'in milliseconds.');
$GLOBALS['TL_LANG']['tl_content']['nSControls'] 			= array('Activate navigation'); 
$GLOBALS['TL_LANG']['tl_content']['nSControlButtons'] 		= array('Enable playback buttons', 'Back, Stop, Read');  
$GLOBALS['TL_LANG']['tl_content']['nSSideButtons'] 			= array('Enable button next - previous', 'Next Page, Previous Page'); 
$GLOBALS['TL_LANG']['tl_content']['nSBackground'] 			= array('Background-Image','Each Section can contain a background-image.');
$GLOBALS['TL_LANG']['tl_content']['nSNews'] 				= array('Newsarchive', 'Please select a news-archive.');
$GLOBALS['TL_LANG']['tl_content']['nSMooSwipe'] 			= array('Smartphone-Support', 'Gives easy access to left and right swipe events for iOS and other touch devices.');
$GLOBALS['TL_LANG']['tl_content']['nSMouseOver'] 			= array('Mouseover/out', 'on mouseover the slider stops. on mouseout the slider goes to the next element');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_content']['nSSettings_legend']	    = 'Settings';
$GLOBALS['TL_LANG']['tl_content']['nSEffects_legend']     	= 'Effects';
$GLOBALS['TL_LANG']['tl_content']['nSPlay_legend']	     	= 'Play Settings';
$GLOBALS['TL_LANG']['tl_content']['nSControls_legend']     	= 'Navigation';

