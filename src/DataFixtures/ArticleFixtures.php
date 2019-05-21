<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends FakerAbstractFixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i=0;$i<70;$i++) {
            $faker = $this->faker;
            $dateTime = (new \DateTime())->getTimestamp();
            $article = new Article($faker->sentence(mt_rand(4, 10)));
            $article
                ->setCreatedAt($dateTime)
                ->setUpdatedAt($dateTime)
                ->setCategory($this->getReference('category_'.mt_rand(0, 6)))
                ->setImage($faker->imageUrl());
        
            $sentenceNumber = mt_rand(3, 15);
            $body = '';
            foreach ($this->setBody($sentenceNumber, $faker) as $sentence) {
                $body.=$sentence;
            }

            $article->setBody($body);

            $manager->persist($article);
        }








        $manager->flush();
    }


    private function setBody(int $sentenceNumber)
    {
        for ($i=0;$i<$sentenceNumber;$i++) {
            yield "<p>{$this->faker->sentences(mt_rand(1, 10), true)}</p>";
        }
    }
    
    
    
    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
          CategoryFixtures::class,
        ];
    }
}
