<?php
/* $tweets = $this->twitterfetcher->getTweets(array(
    'consumerKey'       => 'Wc9bI9zzBX1DqgAAiPFNVA',
    'consumerSecret'    => 'i44x2VZDdhbmCDb9sBAVZWCwyYMR00FmdMRje5yM',
    'accessToken'       => '69592847-ffcX2EjUrf0eTfEgJFvHWXQArCXZLzmmSkvliYbOg',
    'accessTokenSecret' => '2QAJ2Su9tM0xThUiO2hykhSJjNrCe1yjW6cnmHNu14',
    'usecache'          => true,
    'count'             => 1,
    'numdays'           => 30
));
print_r($tweets); */
?>

<?php foreach ($news as $news_item): ?>
<?php $feed_channel = $this->config->item('feed_channel'); ?>

<article>
	<header>
		<h3><?php echo $news_item['title'] ?></h3>
	</header>

	<div>
		<?php $content = $this->typography->auto_typography($news_item['content']); ?>
	    <?php echo $content ?>
	</div>

	<footer>
		<p>Author: <?php echo $news_item['author'] ?></p>
	</footer>
</article>

<?php endforeach ?>

<section class="wrap">
    <article class="bbcfeed">
        <!-- bbc news feed -->
        <div id="emp1" class="player" style="float:left">
          <p>In order to see this content you need to have both <a href="http://www.bbc.co.uk/webwise/askbruce/articles/browse/java_1.shtml" title="BBC Webwise article about enabling javascript">Javascript</a> enabled and <a href="http://www.bbc.co.uk/webwise/askbruce/articles/download/howdoidownloadflashplayer_1.shtml" title="BBC Webwise article about downloading">Flash</a> installed. Visit <a href="http://www.bbc.co.uk/webwise/">BBC&nbsp;Webwise</a> for full instructions</p>
        </div>
    </article>
</section>

<!-- embed for BBC news -->
<script type="text/javascript" src="http://www.bbc.co.uk/emp/swfobject.js"></script>
<script type="text/javascript" src="http://www.bbc.co.uk/emp/embed.js"></script>
<script type="text/javascript" src="http://www.bbc.co.uk/cs/jst/mod/1/jst_core.v1.2.js"></script>
<script type="text/javascript" src="http://www.bbc.co.uk/emp/simulcast/shCore.js"></script>
<script type="text/javascript" src="http://www.bbc.co.uk/emp/simulcast/shBrushJScript.js"></script>
<script type="text/javascript" src="http://www.bbc.co.uk/emp/simulcast/prototype.js"></script>
<script type="text/javascript" src="http://www.bbc.co.uk/emp/simulcast/scriptaculous.js?load=effects"></script>

<script type="text/javascript">
  dp.SyntaxHighlighter.HighlightAll('onceCode');
  var width = 350;
  var height = 200;   
  var playlist;
  var config;   
  var revision; 

function reload(url) {
  var emp = new embeddedMedia.Player();
  emp.setWidth(width);
  emp.setHeight(height);
  emp.setDomId("emp1");
  emp.set("config_settings_autoPlay","true");
  playlist = "http://www.bbc.co.uk/emp/simulcast/"+url+".xml";
  emp.setPlaylist(playlist);
  config = "http://www.bbc.co.uk/emp/simulcast/config_"+url+".xml";
  emp.setConfig(config);
  emp.write(); 
  updateEmbed();
 }
 
 function updateEmbed() {
  $('codeWrap').update('<pre name="code" class="js:nogutter" id="embedCode"></pre>');
  $('embedCode').update("var emp = new embeddedMedia.Player();"+"\n"+
                        "emp.setWidth('"+width+"');"+"\n"+
                        "emp.setHeight('"+height+"');"+"\n"+
                        "emp.setPlaylist('"+playlist+"');"+"\n"+
                        "emp.setConfig('"+config+"');"+"\n"+
                        "emp.write();");           
  dp.SyntaxHighlighter.HighlightAll('code');
 }

 reload("<?php echo $feed_channel; ?>");
</script>
