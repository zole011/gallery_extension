<?php
defined('TYPO3') or die();

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

ExtensionUtility::configurePlugin(
    'YourVendor.GalleryExtension',
    'Gallery',
    [
        \YourVendor\GalleryExtension\Controller\GalleryController::class => 'list, show',
    ],
    // Plugin configuration (non-cachable actions)
    [
        \YourVendor\GalleryExtension\Controller\GalleryController::class => 'list, show',
    ]
);

// Register FlexForm
ExtensionManagementUtility::addPiFlexFormValue(
    'gallery_extension_gallery',
    'FILE:EXT:gallery_extension/Configuration/FlexForms/flexform_gallery.xml'
);