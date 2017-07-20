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

$GLOBALS['TL_DCA']['tl_contao_slick_settings'] = array
(

    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
        'ptable' => 'tl_contao_slick',
        'enableVersioning'            => true,
        'sql' => array
        (
            'keys' => array            (
                'id' => 'primary',
                'pid' => 'index'
            )
        )
    ),

    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode'                    => 4,
            'fields'                  => array('title'),
            'flag'                    => 1,
            'headerFields' => array(
                'title'
            ),
            'child_record_callback'   => array('tl_contao_slick_settings', 'listSettings')
        ),
        'label' => array
        (
            'fields'                  => array('title'),
            'format'                  => '%s'
        ),
        'global_operations' => array
        (
            'all' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'                => 'act=select',
                'class'               => 'header_edit_all',
                'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
            )
        ),
        'operations' => array
        (
            'edit' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_contao_slick']['edit'],
                'href'                => 'act=edit',
                'icon'                => 'edit.gif'
            ),
            'copy' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_contao_slick']['copy'],
                'href'                => 'act=copy',
                'icon'                => 'copy.gif'
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_contao_slick']['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.gif',
                'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ),
            'show' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_contao_slick']['show'],
                'href'                => 'act=show',
                'icon'                => 'show.gif'
            )
        )
    ),

    // Select
    'select' => array
    (
        'buttons_callback' => array()
    ),

    // Edit
    'edit' => array
    (
        'buttons_callback' => array()
    ),

    // Palettes
    'palettes' => array
    (
        '__selector__'                => array(''),
        'default'                     => '{title_legend},title,breakpoint,slidesToShow,slidesToScroll,infinite,speed,dots,autoplay,autoplaySpeed,arrows,fade,pauseOnFocus,pauseOnHover,pauseOnDotsHover;'
    ),

    // Subpalettes
    'subpalettes' => array
    (
        ''                            => ''
    ),

    // Fields
    'fields' => array
    (
        'id' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL auto_increment"
        ),
        'pid' => array(
            'foreignKey' => 'tl_contao_slick.title',
            'sql' => "int(10) unsigned NOT NULL default '0'",
            'relation' => array(
                'type'=>'belongsTo',
                'load'=>'eager'
            )
        ),
        'tstamp' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'title' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick_settings']['title'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'breakpoint' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick_settings']['breakpoint'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
                'rgxp' => 'natural'
            ),
            'sql'                     => "varchar(64) NOT NULL default ''",
            'default' => '1000'
        ),
        'slidesToShow' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick_settings']['slidesToShow'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
                'rgxp' => 'natural'
            ),
            'sql'                     => "varchar(64) NOT NULL default ''",
            'default' => '2'
        ),
        'slidesToScroll' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick_settings']['slidesToScroll'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
                'rgxp' => 'natural'
            ),
            'sql'                     => "varchar(64) NOT NULL default ''",
            'default' => '1'
        ),
        'infinite' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick_settings']['infinite'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
            ),
            'sql'                     => "char(1) NOT NULL default ''",
            'default' => true
        ),
        'speed' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick_settings']['speed'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
                'rgxp' => 'natural'
            ),
            'sql'                     => "varchar(64) NOT NULL default ''",
            'default' => '1000'
        ),
        'dots' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick_settings']['dots'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
            ),
            'sql'                     => "char(1) NOT NULL default ''",
            'default' => true
        ),
        'autoplay' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick_settings']['autoplay'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
            ),
            'sql'                     => "char(1) NOT NULL default ''",
            'default' => true
        ),
        'autoplaySpeed' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick_settings']['autoplaySpeed'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
                'rgxp' => 'natural'
            ),
            'sql'                     => "varchar(64) NOT NULL default ''",
            'default' => '1000'
        ),
        'arrows' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick_settings']['arrows'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
            ),
            'sql'                     => "char(1) NOT NULL default ''",
            'default' => true
        ),
        'fade' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick_settings']['fade'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
            ),
            'sql'                     => "char(1) NOT NULL default ''",
            'default' => false
        ),
        'pauseOnFocus' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick_settings']['pauseOnFocus'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
            ),
            'sql'                     => "char(1) NOT NULL default ''",
            'default' => false
        ),
        'pauseOnHover' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick_settings']['pauseOnHover'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
            ),
            'sql'                     => "char(1) NOT NULL default ''",
            'default' => false
        ),
        'pauseOnDotsHover' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick_settings']['pauseOnDotsHover'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
            ),
            'sql'                     => "char(1) NOT NULL default ''",
            'default' => false
        ),
    )
);

class tl_contao_slick_settings extends Backend {

    public function listSettings($item) {

        //var_dump($item);

        $tmp = $item["title"];

        if ($item["breakpoint"]) {
            $tmp .= ' ('.$item["breakpoint"].')';
        }

        return $tmp;
    }
}