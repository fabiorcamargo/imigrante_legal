<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = Sitemap::create();

        // Adicione as URLs do seu site ao sitemap
        $sitemap->add(Url::create('/'));
        // ... adicione mais URLs

        return $sitemap->render();
    }
}
