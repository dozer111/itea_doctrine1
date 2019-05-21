<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class CategoryFixtures extends FakerAbstractFixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        for ($i=0;$i<7;$i++) {
            $faker = Factory::create();
            $category = new Category($faker->word);


            $this->addReference('category_'.$i, $category);



            $manager->persist($category);
        }




        $manager->flush();
    }
}
