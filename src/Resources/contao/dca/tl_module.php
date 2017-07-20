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

/**
 * add palettes
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['contaoSlick'] = '{title_legend},name,headline,type;{contaoslick_legend},contaoslick_slick';

/**
 * add fields
 */

$GLOBALS['TL_DCA']['tl_module']['fields']['contaoslick_slick'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['contaoslick_slick'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'foreignKey' => 'tl_contao_slick.title',
    'relation' => array(
        'type' => 'belongsTo',
        'table' => 'tl_contao_slick',
        'field' => 'id'
    ),
    'eval' => array(
        'mandatory' => true,
        'includeBlankOption' => true
    ),
    'sql' => "int(10) unsigned NOT NULL default '0'"
);
