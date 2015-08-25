<?
require_once 'lib/Parsedown.php';
?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset='utf-8'>
        <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
        <title>Week of Decay</title>
        <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <style>
            body { font-family: 'Open Sans Condensed', sans-serif; background-color: black; color: grey; }
            h1, h2, h3, h4, h5 { font-family: 'Montserrat', sans-serif; letter-spacing: 0.3em; text-align: center; }
            h1, h2 { letter-spacing: 0.7em; color: yellow; }
            a { color: #999933; text-decoration: none; }
            a:hover { color: #cccc33; }
            ul.events {
                list-style-type: none;
                max-width: 400px;
                margin-left: auto;
                margin-right: auto;
                padding: 0px;
                margin-top: 35px;
            }
            ul.events > li {
                border-bottom: thin solid lightgrey;
                border-top: thin solid lightgrey;
            }
            .iconlinks {
            	text-align: center;
            }
            .iconlinks > a {
            	display: inline-block;
            	margin: 20px;
            }
            .gallery {
            	margin-top: 16px;
            }
            p {
            	margin-top: 16px;
            	margin-bottom: 16px;
            }
	</style>
    </head>
    <body>
	<h1>WEEK OF DECA<span style="letter-spacing: 0em;">Y</span></h1>

    <div class="iconlinks">
        <a href="https://www.jamendo.com/de/artist/366897/week-of-decay" title="Zum Abspielen und Herunterladen">
            <img src="assets/play.svg" width="50px">
        </a>
        <a href="https://vimeo.com/channels/280298" title="Zum Angucken und Ausmachen">
            <img src="assets/tv.svg" width="50px">
        </a>
    </div>

    <ul class="events">
        <?
	$postings = file_get_contents("https://pod.geraspora.de/people/edd464d023bc013370b64860008dbc6c/stream.json");
        $postings = json_decode($postings, true);
        $parsedown = new Parsedown();
        ?>
        <? foreach ($postings as $posting) : ?>
        <li>
        	<? if (count($posting['photos'])) : ?>
        	<div class="gallery">
        		<a href="<?= htmlentities($posting['photos'][0]['sizes']['large']) ?>" target="_blank">
        			<img src="<?= htmlentities($posting['photos'][0]['sizes']['large']) ?>" style="display: block; width: 100%;">
			</a>
			<? array_shift($posting['photos']) ?>
        		<? foreach ($posting['photos'] as $photo) : ?>
        			<a href="<?= htmlentities($photo['sizes']['large']) ?>" target="_blank">
        				<img src="<?= htmlentities($photo['sizes']['small']) ?>">
				</a>
        		<? endforeach ?>
        	</div>
        	<? endif ?>
            	<?= $parsedown->text($posting['text']) ?>
        </li>
	    <? endforeach ?>
        </ul>
        
        <div style="margin-top: 200px; font-size: 0.7em;">
        <h3>Impressum</h3>
	<h4>Angaben gemäß § 5 TMG:</h4>
	<p style="max-width: 400px; margin-left: auto;
                margin-right: auto;">Rasmus Fuhse<br />
	Reinholdstraße 8<br />
	37083 Göttingen
	</p>
	<h4>Kontakt:</h4>
	<table style="max-width: 400px; margin-left: auto; margin-right: auto; width: 100%;"><tr>
	<td>Telefon:</td>
	<td>0551-2054225</td></tr>
	<tr><td>E-Mail:</td>
	<td>Krassmus@gmail.com</td>
	</tr></table>
	</div>
    </body>
</html>


