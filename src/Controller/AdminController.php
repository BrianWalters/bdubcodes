<?php


namespace App\Controller;


use League\Flysystem\FilesystemOperator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    public const FILE_DIR = 'files';

    #[Route('/admin/files', name: 'file_list')]
    public function fileList(FilesystemOperator $fileStorage): Response
    {
        $directoryListing = $fileStorage->listContents('.');

        return $this->render('pages/file-list.html.twig', [
            'files' => $directoryListing,
        ]);
    }
}