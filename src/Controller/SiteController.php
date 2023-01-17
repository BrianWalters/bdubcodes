<?php


namespace App\Controller;


use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        ], 5);
        return $this->render('pages/home.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route('/posts', name: 'posts')]
    public function posts(Request $request, PostRepository $postRepository): Response
    {
        $page = $request->query->get('page', 1);

        $posts = $postRepository->findBy(['published' => true, 'hidden' => false], [ 'createdAt' => 'DESC' ], 10, ($page - 1) * 10);

        return $this->render('pages/posts.html.twig', [
            'page' => $page,
            'posts' => $posts,
        ]);
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