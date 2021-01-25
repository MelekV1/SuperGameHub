<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\Category;
class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Jeux de fausse données 
        //Fixtures are used to load a “fake” 
        //set of data into a database that can then be 
        //used for testing or to help give you some interesting data 
        //while you’re developing your application.

        // use the factory to create a Faker\Generator instance
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category -> setTitle($faker->sentence())
                      ->setDescription($faker->paragraph());
            $manager ->persist($category);
            
            //6 a 4 article pour une category
            for($j=1; $j<=mt_rand(4,6) ;$j++){
                $article=new Article();
                $content =join($faker->paragraphs(5),'\n');
                $article->setTitle($faker->sentence())
                        ->setContent($content)
                        ->setImage("https://hip2save.com/wp-content/uploads/2020/09/ps5-controller.jpg?fit=1200%2C630&strip=all")
                        ->setCreatedAt($faker->dateTimeBetween('-6 months'))
                        ->setCategory($category);
                $manager->persist($article);

                //On donne des commentaires
                for($k=1; $k<=mt_rand(4,6) ;$k++){
                    $comment=new Comment();
                    $content .= join($faker->paragraphs(2));
                    
                    $now = new \DateTime();
                    $interval = $now ->diff($article ->getCreatedAt());
                    $days = $interval ->days ;
                    //$minimum= '-' . $days . ' days';
                    $comment->setAuthor($faker->name)
                            ->setContent($content)
                            ->setCreatedAt($faker->dateTimeBetween('-' . $days . ' days'))
                            ->setArticle($article);

                    $manager->persist($comment);
                }
            }
    }
    $manager->flush();
    }
}

