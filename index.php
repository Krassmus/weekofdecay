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
                margin-top: 100px;
            }
            ul.events > li {
                border-bottom: thin solid lightgrey;
                border-top: thin solid lightgrey;
            }
	</style>
    </head>
    <body>
	<h1>WEEK OF DECAY</h1>

    <ul class="events">
        <?
	$postings = file_get_contents("https://pod.geraspora.de/people/edd464d023bc013370b64860008dbc6c/stream.json");
        $postings = json_decode($postings, true);
        $parsedown = new Parsedown();
        ?>
        <? foreach ($postings as $posting) : ?>
        <li>
            	<?= $parsedown->text($posting['text']) ?>
        </li>
	    <? endforeach ?>
        </ul>
        
        <h3>Impressum</h3>
	<h4>Angaben gemäß § 5 TMG:</h4>
	<p style="max-width: 400px; margin-left: auto;
                margin-right: auto;">Rasmus Fuhse<br />
	Reinholdstraße 8<br />
	37083 Göttingen
	</p>
	<h4>Kontakt:</h4>
	<table style="max-width: 400px; margin-left: auto;
                margin-right: auto;"><tr>
	<td>Telefon:</td>
	<td>0551-2054225</td></tr>
	<tr><td>E-Mail:</td>
	<td>Krassmus@gmail.com</td>
	</tr></table>
    </body>
</html>


