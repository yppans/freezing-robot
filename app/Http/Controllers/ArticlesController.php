<?php namespace App\Http\Controllers;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\User;
//use Illuminate\Http\Request;
use Request;

class ArticlesController extends Controller {



    public function index()
    {
        $articles = Article::latest()->where('published', '=', 1)->get();

    
        //$articles->excerpt = substr($content, 0, 100);
        //print_r($articles);
Session::flash('category', NULL);
Session::flash('author', NULL);
        return view('articles.index', compact('articles'));
    }

    public function show($url)
    {
        if (is_numeric($url)) {
            $article = Article::find($url);
            $url = $article->url;
        } else {
            $article = Article::where('url', '=', $url)->first();
			if ($article == NULL)
			{
				abort(404);
			}
            $next = $article->id;
            $next++;
            $prev = $article->id;
            $prev--;
           if($nextarticle = Article::find($next)) {
               $n = $nextarticle->url;
               $nt = $nextarticle->title;
               $article->nxt = $n;
               $article->nt = $nt;
           }
            if($prevarticle = Article::find($prev)) {
                $p = $prevarticle->url;
                $pt = $prevarticle->title;
               $article->prv = $p;
                $article->pt = $pt;
            }



        }

        return view('articles.show', compact('article'));
    }

    public function showTagged($tag)
    {
        if (is_numeric($tag)) {
            $articles = Article::find($tag);
        } else {
            //print $tag;
	Session::flash('category', $tag);
            $articles = Article::latest()->where('tags', '=', $tag)->where('published', '=', 1)->get();

        }
        return view('articles.index', compact('articles'));
    }
    public function showAuthor($author)
    {
			if (is_numeric($author))
			{
				$writer = User::find($author);
			}
			else
			{
				$writer = User::where('name', '=', $author)->first();
			}
			$authorid = $writer->id;
			$authorname = $writer->name;
            $articles = Article::latest()->where('user_id', '=', $authorid)->where('published', '=', 1)->get();
	Session::flash('author', $authorname);
        return view('articles.index', compact('articles'));
    }


}
