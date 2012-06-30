-- **********************************************************
-- *                                                        *
-- * IMPORTANT NOTE                                         *
-- *                                                        *
-- * Do not import this file manually but use the TYPOlight *
-- * install tool to create and maintain database tables!   *
-- *                                                        *
-- **********************************************************

-- 
-- Table `tl_content`
-- 

CREATE TABLE `tl_content` (
  `nSMode` varchar(64) NOT NULL default 'horicontal',
  `nSElemWidth` varchar(255) NOT NULL default '',
  `nSElemHeight` varchar(255) NOT NULL default '',
  `nSElemClass` varchar(255) NOT NULL default '',
  `nSEffectInterval` int(10) NOT NULL default '3000',
  `nSEffectsExtended` char(1) NOT NULL default '',
  `nSEffectDuration` int(10) NOT NULL default '1000', 
  `nSEffectTransition` varchar(64) NOT NULL default '',
  `nSEffectEase` varchar(64) NOT NULL default '',
  `nSPlayAuto` char(1) NOT NULL default '',
  `nSControls` char(1) NOT NULL default '',
  `nSControlButtons` char(1) NOT NULL default '',
  `nSSideButtons` char(1) NOT NULL default '',
  `nSStartPoint` int(10) NOT NULL default '0',
  `nSBackground` varchar(255) NOT NULL default '',
  `nSUrl` varchar(255) NOT NULL default '',
  `nSTarget` char(1) NOT NULL default '',
  `nSNews` int(10) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- 
-- Table `tl_module`
-- 

CREATE TABLE `tl_module` (
  `nSarticleAlias` int(10) unsigned NOT NULL default '0',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;