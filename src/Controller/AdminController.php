<?php


namespace App\Controller;


use App\Form\FileUploadType;
use League\Flysystem\FilesystemException;
use League\Flysystem\FilesystemOperator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
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

    #[Route('/admin/files/upload', name: 'file_upload', methods: ['GET', 'POST'])]
    public function fileAdd(
        Request $request,
        ParameterBagInterface $parameterBag,
        FilesystemOperator $fileStorage
    ): Response {
        $form = $this->createForm(FileUploadType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $file = $data['file'] ?? null;
            if (!$file || !$file instanceof UploadedFile) {
                $this->addFlash('error', 'No file set.');
                return $this->redirectToRoute('file_upload');
            }

            $originalFilename = $file->getClientOriginalName();
            if ($fileStorage->fileExists($originalFilename)) {
                $this->addFlash('error', 'File already exists.');
                return $this->redirectToRoute('file_upload');
            }

            $file->move(
                $parameterBag->get('kernel.project_dir') . '/public/' . self::FILE_DIR,
                $originalFilename
            );

            $this->addFlash('success', "File $originalFilename uploaded.");
            return $this->redirectToRoute('file_list');
        }

        return $this->render('pages/file-upload.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}