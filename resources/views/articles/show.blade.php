@extends('layouts.master')

@section('content')



   <div class="panel panel-primary">
 <div class="panel-heading">{{ $article->title }}</div>

 <div class="panel-body">

@if($article->image)
<img class="img img-thumbnail pull-left" src="/uploads/images/articles/{!! $article->image !!}">
@else
<img class="img img-thumbnail pull-left" src="http://placehold.it/75x75">
@endif


          <p>{!! $article->body !!}</p>
<hr>
         <b><i class="fa fa-user"></i> Author:</b> <a href="/articles/author/{{ $article->user->name }}">{{ $article->user->name }}</a> <b><i class="fa fa-tag"></i> Category:</b> <a href="/articles/category/{{ $article->tags }}">{{ $article->tags }}</a> <i class="fa fa-comment"></i> <a href="{{ $article->url }}#disqus_thread"></a>

          </div>
          <div class="panel-footer">

@if(isset($article->prv))
Previous: <a href="{{ $article->prv }}">{{ $article->pt }}</a>
@else
<a href="/articles">Return to index</a>
@endif

@if(isset($article->nxt))
<div class="pull-right">
Next: <a href="{{ $article->nxt }}">{{ $article->nt }}</a>
</div>
@else
<div class="pull-right">
<a href="{{ URL::route('articles.index') }}">Return to index</a>
</div>
@endif

    </div>


</div>
<div class="container">
<div id="disqus_thread"></div>
</div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'duvalelects';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>


@stop
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'duvalelects';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
</script>
