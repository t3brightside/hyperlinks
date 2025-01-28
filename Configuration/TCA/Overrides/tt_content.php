<?php
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;

$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['hyperlinks_selected'] =  'actions-link';

// Get extension configuration
$extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);

// Content element type dropdown
ExtensionManagementUtility::addTcaSelectItem(
    "tt_content",
    "CType",
    [
        'label' => 'Hyperlinks',
        'value' => 'hyperlinks_selected',
        'icon' => 'actions-link',
        'group' => 'default',
        'description' => 'Shows list of hyperlinks.',
    ],
    'textmedia',
    'after'
);
    // For inline editing of hyperlink records
    $tempColumns = array(
        'tx_hyperlinks' => [
            'label' => 'Hyperlinks',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_hyperlinks_domain_model_hyperlink',
                'MM' => 'tx_hyperlinks_mm',
                'MM_opposite_field' => 'tx_hyperlinks',
                'MM_match_fields' => [
                    'tablenames' => 'tt_content',
                    'fieldname' => 'tx_hyperlinks',
                ],
                'appearance' => [
                    'collapseAll' => true,
                    'useSortable' => true,
                    'showNewRecordLink' => true,
                    'levelLinksPosition' => 'bottom',
                    'showSynchronizationLink' => true,
                    'showPossibleLocalizationRecords' => true,
                    'showAllLocalizationLink' => true,
                    'enabledControls' => [
                        'info' => true,
                        'new' => true,
                        'dragdrop' => true,
                        'sort' => true,
                        'hide' => true,
                        'delete' => true,
                        'localize' => true,
                    ],
                ],
            ],
        ],
    );
/*
    $tempColumns = array(
        'tx_hyperlinks' => [
            'label' => 'Hyperlinks',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_hyperlinks_domain_model_hyperlink',
                'MM' => 'tx_hyperlinks_mm',
                'MM_opposite_field' => 'tx_hyperlinks',
                'size' => 5,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                        'options' => [
                            'windowOpenParameters' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                        ],
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => false,
                    ],
                ],
                'appearance' => [
                    'collapseAll' => true,
                    'expandSingle' => true,
                    'newRecordLinkAddTitle' => true,
                    'useCombination' => true,
                    'useSortable' => true,
                    'enabledControls' => [
                        'info' => true,
                        'new' => true,
                        'dragdrop' => true,
                        'sort' => true,
                        'hide' => true,
                        'delete' => true,
                        'localize' => true,
                    ],
                ],
            ],
        ],
    );
}
    */
ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns);
$GLOBALS['TCA']['tt_content']['types']['hyperlinks_selected']['showitem'] = '
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
        --palette--;;general,
        --palette--;;headers,tx_hyperlinks,
    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
        --palette--;;frames,
        --palette--;;appearanceLinks,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
        --palette--;;language,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
        --palette--;;hidden,
        --palette--;;access,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
        categories,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
        rowDescription,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
';