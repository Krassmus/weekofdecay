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
            body { font-family: 'Open Sans Condensed', sans-serif; background-color: black; }
            h1 { font-family: 'Montserrat', sans-serif; letter-spacing: 0.7em; color: yellow; text-align: center; }
            a { color: #999933; text-decoration: none; }
            a:hover { color: #cccc33; }
            ul.events > li {
                border-bottom: thin solid lightgrey;
                border-top: thin solid lightgrey;
            }
	</style>
    </head>
    <body>
	<h1>WEEK OF DECAY</h1>

    <ul style="list-style-type: none; max-width: 400px; margin-left: auto; margin-right: auto;">
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
    </body>
</html>


