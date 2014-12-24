<html>
<head>
<title>2014 Year in Twitter Favs</title>
<style>
body {
  background-color: #333;
  color: #cfcfcf;
  font-family: 'Helvetica Neue', Roboto, 'Segoe UI', Calibri, sans-serif;
}
#main {
  margin: 30px auto;
  width: 600px;
}
h1 {
  margin-bottom: 10px;
  font-weight: lighter;
}
h2 {
  margin: 0 0 30px 0;
  font-weight: lighter;
}
</style>
</head>
<body>
<div id="main">
  <h1>2014 Year in Twitter Favs</h1>
  <h2></h2>

  <div id="tweets">
  <?php include('favs.html'); ?>
  </div>
</div>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script id="twitter-wjs" type="text/javascript" async defer src="//platform.twitter.com/widgets.js"></script>
<!--
<script>
$.getScript('//platform.twitter.com/widgets.js', function() {
  $.get('favids.2014.json', function(favs) {
    $('h2').html(favs.length + ' of my favorite tweets')

    for(i=0; i<1; i++) {
      twttr.widgets.createTweet(
        favs[i], 
        document.getElementById('tweets'),
        {
          theme: 'dark'
        }
      );
    }
  });
});
</script>
-->
</body>
</html>
