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

$GLOBALS['TL_DCA']['tl_contao_slick'] = array
(

    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
        'ctable' => array('tl_contao_slick_settings'),
        'enableVersioning'            => true,
        'sql' => array
        (
            'keys' => array
            (
                'id' => 'primary'
            )
        )
    ),

    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode'                    => 1,
            'fields'                  => array('title'),
            'flag'                    => 1,
            'panelLayout'             => 'search,limit'
        ),
        'label' => array
        (            'fields'                  => array('title'),
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
            'edit' => array(
                'label'               => &$GLOBALS['TL_LANG']['tl_contao_slick']['edit'],
                'href'                => 'table=tl_contao_slick_settings',
                'icon' => 'edit.svg'
            ),
            'editheader' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_contao_slick']['editheader'],
                'href'                => 'act=edit',
                'icon'                => 'header.gif'
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
        'default'                     => '{title_legend},title,images,linkImage,imageSize,slidesToShow,slidesToScroll,infinite,speed,dots,autoplay,autoplaySpeed,arrows,fade,pauseOnFocus,pauseOnHover,pauseOnDotsHover,slideOrder;'
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
        'tstamp' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'title' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick']['title'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'images' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick']['images'],
            'inputType'               => 'fileTree',
            'eval'          => array(
                'fieldType'=>'checkbox',
                'orderField'=>'imagesOrder',
                'multiple'=>true,
                'files'=>true,
                'filesOnly'=>true,
                'extensions'=>\Config::get('validImageTypes'),
                'isGallery'=>true
            ),
            'sql'           => "blob NULL",
        ),
        'linkImage' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick']['linkImage'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
            ),
            'sql'                     => "char(1) NOT NULL default ''",
            'default' => true
        ),
        'imagesOrder' => array(
            'eval'          => array('doNotShow'=>true),
            'sql'           => "blob NULL",
        ),
        'imageSize' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick']['imageSize'],
            'exclude'                 => true,
            'inputType'               => 'imageSize',
            'options'                 => System::getImageSizes(),
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
                'rgxp'=>'natural',
                'includeBlankOption'=>true,
                'nospace'=>true,
                'helpwizard'=>true
            ),
            'sql'                     => "varchar(64) NOT NULL default ''"
        ),
        'slidesToShow' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick']['slidesToShow'],
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
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick']['slidesToScroll'],
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
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick']['infinite'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
            ),
            'sql'                     => "char(1) NOT NULL default ''",
            'default' => true
        ),
        'speed' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick']['speed'],
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
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick']['dots'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
            ),
            'sql'                     => "char(1) NOT NULL default ''",
            'default' => true
        ),
        'autoplay' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick']['autoplay'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
            ),
            'sql'                     => "char(1) NOT NULL default ''",
            'default' => true
        ),
        'autoplaySpeed' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick']['autoplaySpeed'],
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
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick']['arrows'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
            ),
            'sql'                     => "char(1) NOT NULL default ''",
            'default' => true
        ),
        'fade' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick']['fade'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
            ),
            'sql'                     => "char(1) NOT NULL default ''",
            'default' => false
        ),
        'pauseOnFocus' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick']['pauseOnFocus'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
            ),
            'sql'                     => "char(1) NOT NULL default ''",
            'default' => false
        ),
        'pauseOnHover' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick']['pauseOnHover'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
            ),
            'sql'                     => "char(1) NOT NULL default ''",
            'default' => false
        ),
        'pauseOnDotsHover' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick']['pauseOnDotsHover'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'eval'                    => array(
            ),
            'sql'                     => "char(1) NOT NULL default ''",
            'default' => false
        ),
        'slideOrder' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_contao_slick']['slideOrder'],
            'exclude'                 => true,
            'inputType'               => 'select',
            'reference'               => &$GLOBALS['TL_LANG']['tl_contao_slick']['MSC'],
            'eval'                    => array(
            ),
            'options' => array(
                'sorted',
                'timesync',
                'shuffle'
            ),
            'sql'                     => "varchar(12) NOT NULL default ''"
        ),
    )
);

class tl_contao_slick extends Backend {

}