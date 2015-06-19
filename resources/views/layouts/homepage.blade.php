<div class="col-6 col-lg-6 col-md-6 col-sm-12">
@foreach ($articles as $article)
@if($article->published == "1")
<?php
$date = $article->published_at;
$date = new DateTime($date);
$published = $date->format('M d, Y')
?>
   <div class="panel panel-primary">
 <div class="panel-heading"><a class="whitelink" href="/articles/{{ $article->url }}">{{ $article->title }}</a></div>

 <div class="panel-body">
@if($article->image)
<img class="img img-circle pull-left" height="75" width="75" src="/uploads/images/articles/{!! $article->image !!}">
@else
<img class="img img-thumbnail pull-left" src="http://placehold.it/75x75">
@endif
<?php
$article->excerpt = substr($article->body, 0, 150);
?>



          <p>{!! $article->excerpt !!}...</p>
<p class="pull-right"><i><small>
<a href="/articles/{{ $article->url }}">Continue Reading</a>
</small></i></p>
 </div>

 <div class="panel-footer"><p>
<i class="fa fa-calendar"></i> {!! $published !!}
<i class="fa fa-comment"></i> <a href="http://candojax.com/articles/{{ $article->url }}#disqus_thread"></a>

</p>
    </div>

</div>
@endif
@endforeach
</div>
<div class="col-6 col-lg-6 col-md-6 col-sm-12">

   <div class="panel panel-primary">
 <div class="panel-heading">Latest Tweets</div>

 <div class="panel-body">
<a width="100%" class="twitter-timeline" href="https://twitter.com/DuvalElects" data-widget-id="582399849980530688" data-chrome="noborders transparent">Tweets by @DuvalElects</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>
</div>
</div>


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
