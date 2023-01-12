<?php


namespace App\Controller;


use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findBy([
            'published' => true,
            'hidden' => false,
        ], [
            'createdAt' => 'DESC'
        ]);
        return $this->render('pages/home.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route('/posts', name: 'posts')]
    public function posts(): Response
    {
        return new Response('TODO');
    }

    #[Route('/posts/{slug}', name: 'post')]
    public function post(string $slug, PostRepository $postRepository): Response
    {
        $post = $postRepository->findOneBy(
            [
                'slug' => $slug,
                'published' => true,
            ]
        );

        if (!$post) {
            throw $this->createNotFoundException();
        }

        return $this->render('pages/post.html.twig', [
            'post' => $post,
        ]);
    }
}