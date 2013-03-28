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
$GLOBALS['TL_LANG']['tl_content']['nSMode'] 				= array('Noobslider Modus', 'Modus des Noobsliders (horizontal, vertikal oder fade)');
$GLOBALS['TL_LANG']['tl_content']['nSModeR']['horicontal'] 	= 'Horizontal';
$GLOBALS['TL_LANG']['tl_content']['nSModeR']['vertical']	= 'Vertikal';
$GLOBALS['TL_LANG']['tl_content']['nSModeR']['fade']		= 'Fade-Modus';
$GLOBALS['TL_LANG']['tl_content']['nSElemWidth'] 			= array('Breite', 'Breite des NoobSliders, alle Elemente innerhalb dieses Bereiches werden angepasst.');
$GLOBALS['TL_LANG']['tl_content']['nSElemClass'] 			= array('CSS Klasse', 'Bitte geben Sie eine CSS-Klasse an.');
$GLOBALS['TL_LANG']['tl_content']['nSElemHeight'] 			= array('Höhe', 'Höhe des NoobSliders, Elemente die höher sind werden nicht angezeigt!');
$GLOBALS['TL_LANG']['tl_content']['nSEffectsExtended'] 		= array('Effekt Bewegung aktivieren', 'Basierend auf der Mootools Fx.Transitions Library');
$GLOBALS['TL_LANG']['tl_content']['nSEffectTransition']		= array('Bewegung', 'siehe http://demos111.mootools.net/Fx.Transitions f&uuml;r Beispiele');
$GLOBALS['TL_LANG']['tl_content']['nSEffectEase'] 			= array('Ease', 'Damit wird der Effekt weicher dargestellt.');
$GLOBALS['TL_LANG']['tl_content']['nSPlayAuto'] 			= array('Autoplay aktivieren');
$GLOBALS['TL_LANG']['tl_content']['nSStartPoint'] 			= array('Startpunkt des Noobslide', 'Angabe des Startelements. (0 ist das erste Element)');
$GLOBALS['TL_LANG']['tl_content']['nSRandomStartPoint']		= array('zufälligen Startpunkt aktivieren');
$GLOBALS['TL_LANG']['tl_content']['nSRandomSlides']			= array('zufällige Reihenfolge der Elemente', 'Diese Option funktioniert nur, wenn die Option zufälliger Startpunkt NICHT ausgewählt ist.');
$GLOBALS['TL_LANG']['tl_content']['nSEffectInterval'] 		= array('Einblendungsdauer', 'Angabe in Millisekunden.');
$GLOBALS['TL_LANG']['tl_content']['nSEffectDuration'] 		= array('Effektdauer', 'Angabe in Millisekunden.');
$GLOBALS['TL_LANG']['tl_content']['nSControls'] 			= array('Navigation aktivieren', 'Navigation ein-/ausblenden');
$GLOBALS['TL_LANG']['tl_content']['nSControlButtons'] 		= array('Abspielbuttons aktivieren', 'Zurückspielen, Anhalten, Abspielen');
$GLOBALS['TL_LANG']['tl_content']['nSSideButtons'] 			= array('Vor- und Zurückbuttons aktivieren', 'Vorwärts, Zurück');
$GLOBALS['TL_LANG']['tl_content']['nSBackground'] 			= array('Hintergrundbild','Jeder Abschnitt kann ein Hintergrundbild besitzen. Stellen Sie sicher, dass es geeignet für den Slider ist!');
$GLOBALS['TL_LANG']['tl_content']['nSNews'] 				= array('Newsarchiv', 'Bitte wählen Sie ein Newsarchiv aus.');
$GLOBALS['TL_LANG']['tl_content']['nSMooSwipe'] 			= array('Smartphone-Support', 'Wischgesten aktivieren (MooSwipe)');
$GLOBALS['TL_LANG']['tl_content']['nSMouseOver'] 			= array('Mouseover/out aktivieren', 'bei Mouseover wird der Slider angehalten und beim Mouseout wird zum nächsten Element geslidet.');
$GLOBALS['TL_LANG']['tl_content']['nSPreviewElementsPerPage'] = array('Elemente Pro Sliderseite', 'Geben Sie die Anzahl der Elemente ein, die pro Seite angezeigt werden sollen.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_content']['nSSettings_legend']	    = 'Einstellungen';
$GLOBALS['TL_LANG']['tl_content']['nSEffects_legend']     	= 'Effekte';
$GLOBALS['TL_LANG']['tl_content']['nSPlay_legend']	     	= 'Abspielverhalten';
$GLOBALS['TL_LANG']['tl_content']['nSControls_legend']     	= 'Navigation';

