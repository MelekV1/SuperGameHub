<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;
class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Jeux de fausse données 
        //Fixtures are used to load a “fake” 
        //set of data into a database that can then be 
        //used for testing or to help give you some interesting data 
        //while you’re developing your application.
        for($i=1; $i<=10 ;$i++){
            $article=new Article();
            $article->setTitle("T-Article $i")
                    ->setContent("<p>Commodo consequat deserunt pariatur elit.</p>")
                    ->setImage("http://placehold.it/350x150")
                    ->setCreatedAt(new \DateTime());
            $manager->persist($article);
        }
    $manager->flush();
    }
}

