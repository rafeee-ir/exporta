<?php
namespace App\Console\Commands;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;
use App\Models\Post;
class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an XML Sitemap';
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        SitemapGenerator::create('https://exportaworld.com')->writeToFile(public_path('sitemap.xml'));

//        $postsitmap = Sitemap::create();
//        Post::get()->each(function (Post $post) use ($postsitmap) {
//            $postsitmap->add(
//                Url::create("/blog/{$post->slug}")
//                    ->setPriority(0.1)
//                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
//            );
//        });
//        Product::get()->each(function (Product $product) use ($postsitmap) {
//            $postsitmap->add(
//                Url::create("/products/{$product->slug}")
//                    ->setPriority(0.9)
//                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
//            );
//        });
//        Supplier::get()->each(function (Supplier $supplier) use ($postsitmap) {
//            $postsitmap->add(
//                Url::create("/brands/{$supplier->slug}")
//                    ->setPriority(0.9)
//                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
//            );
//        });
//        $postsitmap->writeToFile(public_path('sitemap.xml'));
    }
}
