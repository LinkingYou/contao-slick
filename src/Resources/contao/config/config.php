<?php

/**
 * Contao-Slick Extension for Contao Open Source
 *
 * Based on http://kenwheeler.github.io/slick/
 *
 * @copyright  Copyright (c) 2017, Frank Müller
 * @author     Frank Müller <frank.mueller@linking-you.de>
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 */

/* Models */
$GLOBALS['TL_MODELS']['tl_contao_slick'] = 'LinkingYou\\ContaoSlick\\Model\\ContaoSlickModel';
$GLOBALS['TL_MODELS']['tl_contao_slick_settings'] = 'LinkingYou\\ContaoSlick\\Model\\ContaoSlickSettingsModel';

/*
 * Backend modules
 */
$GLOBALS['BE_MOD']['content']['contao_slick'] = array(
    'tables'       => array(
        'tl_contao_slick',
        'tl_contao_slick_settings'
    ),
);

/**
 * Frontend modules
 */

$GLOBALS['FE_MOD']['miscellaneous']['contaoSlick'] ='LinkingYou\\ContaoSlick\\Module\\ModuleContaoSlick';

