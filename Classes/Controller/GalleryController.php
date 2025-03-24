<?php
namespace YourVendor\GalleryExtension\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Core\Resource\Folder;
use TYPO3\CMS\Core\Resource\StorageRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class GalleryController extends ActionController
{
    /**
     * Prikaz svih galerija u odabranom folderu
     */
    public function listAction(): void
    {
        $selectedFolder = $this->settings['selectFolder'];
        $galleries = $this->getGalleryFolders($selectedFolder);
        $this->view->assign('galleries', $galleries);
    }

    /**
     * Prikaz slika u galeriji
     */
    public function showAction(string $galleryIdentifier): void
    {
        $images = $this->getImagesFromFolder($galleryIdentifier);
        $this->view->assignMultiple([
            'galleryName' => basename($galleryIdentifier),
            'images' => $images
        ]);
    }

    private function getGalleryFolders(string $baseFolder): array
    {
        $storageRepository = GeneralUtility::makeInstance(StorageRepository::class);
        $storage = $storageRepository->findByUid(1);  // Default Storage UID, prilagodi ako treba

        /** @var Folder $folder */
        $folder = $storage->getFolder($baseFolder);
        $subFolders = $folder->getSubfolders();

        $galleries = [];
        foreach ($subFolders as $subFolder) {
            $galleries[] = [
                'name' => $subFolder->getName(),
                'identifier' => $subFolder->getIdentifier()
            ];
        }

        return $galleries;
    }

    private function getImagesFromFolder(string $folderIdentifier): array
    {
        $storageRepository = GeneralUtility::makeInstance(StorageRepository::class);
        $storage = $storageRepository->findByUid(1);

        $folder = $storage->getFolder($folderIdentifier);
        $files = $folder->getFiles(['jpg', 'jpeg', 'png', 'gif']);

        $images = [];
        foreach ($files as $file) {
            $images[] = [
                'title' => $file->getName(),
                'url' => $file->getPublicUrl()
            ];
        }

        return $images;
    }
}
