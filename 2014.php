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
.block {
  margin: 10px;
  border: 1px solid red;
  min-height: 200px;
}

#block-0 {
  min-height: 100%;
}
</style>
</head>
<body>
<div id="main">
  <h1>2014 Year in Twitter Favs</h1>
  <h2></h2>

  <div id="tweets">
  </div>
</div>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="onScreen/jquery.onscreen.js"></script>
<script>
var loading = 0;
$.getScript("//platform.twitter.com/widgets.js", function() {
  // twttr.widgets.load($('.batch')[0]);

  $.get("favuris.2014.json", function(favs) {
    tweets = favs;
    // Tweet Count
    $("h2").html(favs.length + " of my favorite tweets");

    // Create Blocks
    for(i=0; i<Math.floor(favs.length/20); i++) {
      $("#tweets").append("<div id='block-" + i + "' class='block'></div>");
    }

    // Bind for single-loading
    twttr.events.bind('loaded', function(e) {
      loading = 0;
      console.log("done", loading);
    });

    // Initial Load
    var t = "";
    for(i=0; i<20; i++) {
      t += "<blockquote class='twitter-tweet'><a href='" + favs[i] + "'></a></blockquote>"
    }
    $("#block-0").html(t);
    loading = 1;
    twttr.widgets.load($("#block-0")[0]);

    // onScreen loading
    $('.block').onScreen({
      direction: 'vertical',
      doIn: function() {
        console.log(loading);
        if(!loading) {
          loading = 1;

          console.log("entering ", this.id);
          console.log($(this).html());

          if(!$(this).html()) {
            offset = parseInt(this.id.substring(6));
            start = offset*20;
            end = offset*20 + 20;
            if(end > tweets.length) { end = tweets.length; }
            for(i=start; i<end; i++) {
              t += "<blockquote class='twitter-tweet'><a href='" + tweets[i] + "'></a></blockquote>"
            }
            $(this).html(t);

            twttr.widgets.load(this);
          }
        }
      },
      doOut: function() {
        console.log("leaving ", this.id);
        $(this).html("");
      },
    });

    /*
    for(i=0; i<1; i++) {
      twttr.widgets.createTweet(
        favs[i], 
        document.getElementById('tweets'),
        {
          theme: 'dark'
        }
      );
    }
    */
  });
});
</script>
</body>
</html>
