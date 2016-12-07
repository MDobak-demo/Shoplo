<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Product\Model\Price;
use AppBundle\Product\Model\ProductId;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Product\Model\Product;

/**
 * Class LoadProductsData
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class LoadProductsData implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $product = new Product();

            $product
                ->setId(new ProductId())
                ->setName($faker->sentence(rand(3, 6)))
                ->setDescription($faker->paragraph(rand(100, 200)))
                ->setPrice(new Price(rand(100, 300), $faker->randomElement(['PLN', 'USD', 'BTC'])))
            ;

            $manager->persist($product);
            $manager->flush();
        }
    }
}