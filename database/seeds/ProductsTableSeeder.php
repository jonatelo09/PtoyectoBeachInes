<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //model factories 
        /*factory(Category::class, 5)->create();
        factory(Product::class, 100)->create();
        factory(ProductImage::class, 200)->create();*/

        $categories = factory(App\Category::class, 5)->create();//creamos 5 categorias en la base de datos
        $categories->each(function ($category){
            $products = factory(App\Product::class, 20)->make();//crea 20 productos por cada categoria sin guardarlo en la base de datos 
            $category->products()->saveMany($products);//asi se guarda en la base de datos pero con las respectivas relaciones enntre producto e imagenes

            $products->each(function($p){//en est funcion asigno 5 imagenes para cada producto
                $images = factory(App\ProductImage::class, 5)->make();
                $p->images()->saveMany($images);
            });

        });
        
        /*$users = factory(App\User::class, 3)
            ->create()
            ->each(function($u){
                $u->posts()->save(factory(App\Post::class)->make());
            });*/

    }
}
