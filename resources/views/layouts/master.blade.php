<meta name="viewport" content="width=device-width, initial-scale=1.0">

<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://bootswatch.com/yeti/bootstrap.min.css">


<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="http://candojax.com/css/carousel.css" rel="stylesheet">
<link href="http://candojax.com/css/styles.css" rel="stylesheet">

<link rel="stylesheet" href="http://candojax.com/css/footer.css">

<link type="text/css" href="http://candojax.com/css/editor.css" rel="stylesheet"/>
<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script> 
<title>canDoJax</title>
</head>
<body>
@include('layouts.menu')
        <div class="container maincont">
            @yield('content')
            <div class="push"></div>

        </div>
@include('layouts.footer')
<script type="text/javascript">
/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
var disqus_shortname = 'duvalelects'; // required: replace example with your forum shortname

/* * * DON'T EDIT BELOW THIS LINE * * */
(function () {
var s = document.createElement('script'); s.async = true;
s.type = 'text/javascript';
s.src = '//' + disqus_shortname + '.disqus.com/count.js';
(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
}());
</script>
    </body> 
</html> 
