<?php

namespace App\Controllers;

use App\Standards\Database;
use App\Models\Articles;
use App\Standards\ControlerAbstract;

class ArticleController extends ControlerAbstract
{
    public function showAll(): void
    {
        $db = new Database();
        $articles = $db->allRecords(Articles::class);
        foreach ($articles as $article) {
            echo $article->getTitle().'<br>';
        }
        //$variable($articles);
        $this->template('articles_all.tpl');
    }
}
