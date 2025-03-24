<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Gallery Extension',
    'description' => 'Jednostavan plugin za prikaz galerije slika.',
    'category' => 'plugin',
    'author' => 'Tvoje Ime',
    'author_email' => 'tvoja.email@primer.com',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'version' => '4.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '13.0.0-13.99.99',  // Podržava TYPO3 verziju 13.x
            'php' => '8.1.0-8.99.99',      // Podržava PHP verziju 8.1+
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'YourVendor\\GalleryExtension\\' => 'Classes/',
        ],
    ],
];