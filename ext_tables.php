<?php
defined('TYPO3') or die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

ExtensionManagementUtility::addPiFlexFormValue(
    'gallery_extension_gallery',
    'FILE:EXT:gallery_extension/Configuration/FlexForms/flexform_gallery.xml'
);
