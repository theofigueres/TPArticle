<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="articles_liste")
     */
    public function listeArticles(ArticleRepository $repo)
    {
        return $this->render('article/index.html.twig', [
            'articles' => $repo->findAll()
        ]);
    }

    /**
     * @Route("/articlesLigne", name="articles_ligne")
     */
    public function listeArticlesLigne(ArticleRepository $repo)
    {
        return $this->render('article/ligneArticles.html.twig', [
            'articles' => $repo->findAll()
        ]);
    }


    /**
     * @Route("/article/{id}", name="article_affiche")
     */
    public function afficheArticle(Article $article)
    {
        return $this->render('article/afficheArticle.html.twig', [
            'article' => $article
        ]);
    }
}
