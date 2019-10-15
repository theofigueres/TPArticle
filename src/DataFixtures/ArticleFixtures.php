<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create("fr_FR");

        for ($i=1; $i < 100; $i++){ 
          $article = new Article();
          $article->setLibelle($faker->sentence(6))
                  ->setDescription($faker->paragraph(4))
                  ->setPrix(mt_rand(10,900))
                  ->setImage($faker->imageurl(1000,350));
                  $manager->persist($article);
        }

        $manager->flush();
    }
}
