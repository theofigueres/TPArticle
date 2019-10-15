<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
     * Permet de créer une annonce
     * 
     * @Route("/ads/new", name="ads_create")
     * 
     * @return Response
     */
    public function create(Request $request){
        $article = new Article();

        $form = $this->createFormBuilder($article)
                     ->add('Libelle')
                     ->add('Prix')
                     ->add('description')
                     ->add('save', SubmitType::class, [
                         'label' => 'Créer la nouvelle annonce',
                         'attr' => [
                             'class' => 'btn btn-primary'
                         ]
                     ])
                     ->getForm();

        return $this->render('article/new.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/modificationArticle/{id}", name="article_modification")
     */
    public function modificationArticle(ArticleRepository $repo)
    {
        return $this->render('article/editArticle.html.twig', [
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
