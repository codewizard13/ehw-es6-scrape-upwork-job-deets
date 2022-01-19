<?php // Define vars:
$page_title = "EHW APP: Scrape LinkedIn Course Info";
$prj_shortname = "ES6: Scrape LinkedIn Course Info";
$purpose = "JavaScript ES6 web scraper to quickly grab all important info
from an individual LinkedIn Learning course. This will be used to build
a markdown notetaking framework for the course";

?>

<!--
Project Name:   <?php echo $page_title . "\n" ?>
Proj Shortname: <?php echo $prj_shortname; ?> 
Filename:       controller.php
Date Created:   01/17/22
Date Updated:   --
Programmer:     Eric Hepperle

Purpose: 
<?php echo $purpose. "\n"; ?>

Usage:
Navigate to any video of a LinkedIn Learning course and paste the
code from App.js into the browser developer console and hit enter to run.

Requires:
* Browser navigated to a LinkedIn Learning course page
* Web server supporting PHP 7.4
* The project folder must live on a web server, local or remote.
* Be logged into LinkedIn Learning

Demonstrates:
* ES6 Arrow Functions
* Map, Reduce, Filter, Find
* Promises, Closures, Anonymous Functions
* SetTimeout, Timers,
* Const, Let, Var
* For-in, For-of, ForEach
* Continue, Break, Switch-Case

Tags:
ES6, arrow functions, PHP variables

Future:
* Use curl or fetch API to grab course page and parse info from there

-->

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="<?php echo $page_title; ?>">
<meta name="author" content="Eric L. Hepperle">
	
<title><?php echo $page_title; ?></title>


<link rel="stylesheet" href="style/main.css">

<!--<style></style>-->

</head>

<body>

<div id="wrapper" class="container-fluid">

<div id="ehw-top-head">
    <div id="header-img"></div>
    <h2><?php echo $page_title; ?></h2>
    <p>Filename: <span class="property"><?php echo basename(__FILE__); ?></span></p>
</div><!-- /ehw-top-head div -->

<main>
<div>
<h3>PURPOSE:</h3>

<p>This <strong>App</strong> is a <?php echo $purpose; ?></p>

<!--
<h3>STEPS:</h3>

<p>These are the steps to prepend a div to the body. Note that prepending adds to top of page, whereas appending adds to bottom of page.</p>

<ol>
	<li>Define JSON object</li>
	<li>Create new DIV element</li>
	<li>Add id "ehw-content" to div</li>
	<li>Create text node</li>
	<li>Add text node to div (appendChild)</li>
	<li>Prepend div to body</li>
</ol>
-->

<?php
// Get webpage content with cURL
$curl = curl_init(); //$curl is going to be data type curl resource

$target_url = "https://www.google.com/";

curl_setopt($curl, CURLOPT_URL, $target_url);
$result = curl_exec($curl);

echo "<h2>RESULT:</h2>";
echo $result;

?>

<style>
#hidden-div {
	background: yellow;
	width: 80%;
	border: solid 3px #333;
	min-height: 20px;

}
</style>

<div id="hidden-div"></div>




<!-- Code Section Template
<section class="ehw-code">
<h3>Let, Arrow Functions, ForEach</h3>
<pre>
// add code here
</pre>
</section><!-- /ehw-code -->

</main>

</div><!-- /wrappper -->

<!-- JavaScript -->
<script src="js/ehw.lib.js"></script>
<script src="js/App.js"></script>


</body>
</html>



<!--- --- ---

Notes:
- N/A-->