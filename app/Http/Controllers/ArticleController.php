<?php namespace App\Http\Controllers;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
//use Illuminate\Http\Request;
Use Request;
//Use Illuminate\Routing\Controller;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('App\Http\Middleware\AdminMiddleware');
    }
        public function index()
    {
        $articles = Article::latest()->get();

    
        //$articles->excerpt = substr($content, 0, 100);
        //print_r($articles);
        return view('articles.select', compact('articles'));
    }
    public function create()
    {
        return view('articles.create');
    }
    public function store()
    {
        $input = Request::all();
        $article = new Article;
        $article->title = $input['title'];
        $user = Request::user();
        $input['user_id'] = $user->id;
        $input['published_at'] = Carbon::now();
        $input['url'] = str_slug($article->title, "-");
	$img = Request::file('image');	

	$destinationPath = 'uploads/images/articles';
	$prepend = date('YmdHis');
	$fileName = $prepend.".".$img->getClientOriginalExtension();
	Request::file('image')->move($destinationPath, $fileName);
	$input['image'] = $fileName;

        Article::create($input);
		$successmsg = "Your article has been created! You may view it by clicking <a href='/articles/".$input['url']."'>here.</a>";
        return redirect('articles')->with('message', $successmsg);
    }

    public function edit($id)
    {
        $article = Article::findorFail($id);
                return view('articles.edit', compact('article'));

    }
        public function update($id, Request $request)
    {
        $article = Article::findorFail($id);
       // $article->update($request->all());
        $user = Request::user();       
        $req = Request::all();  
        $req['user_id'] = $user->id;
        $req['published_at'] = Carbon::now();
        $req['url'] = str_slug($article->title, "-");

	$img = Request::file('image');
	if ($img != NULL) {
	$destinationPath = 'uploads/images/articles';
	$prepend = date('YmdHis');
	$fileName = $prepend.".".$img->getClientOriginalExtension();
	Request::file('image')->move($destinationPath, $fileName);
	$req['image'] = $fileName;   
	}      
        //$newinfo = $request Request::input('name')     
        print_r($req);
        //$article->save();
        $article->update($req);
                //return view('articles.edit', compact('article'));
        return redirect('article');

    }
/*
/*
    public function newArticle()
    {
        $article = Article::create([
            //$url = str_slug($title, "-");
            'title' => 'First Article',
            'body' => 'Lorem Ipsum',
            'url' => 'lorem-ipsum',
            'tags' => 'testpost',
            'published_at' => Carbon::now()]);
        return view('welcome');
    }
*/

}
