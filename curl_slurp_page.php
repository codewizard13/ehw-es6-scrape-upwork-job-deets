<?php
/* VARIABLES */
$base_url = 'https://www.linkedin.com/learning';
$target_url = $base_url . '/search?keywords=API';

$search_str = "object oriented javascript es6";
$search_str = "object oriented php";

/* Sample search url:
   https://www.linkedin.com/learning/search?keywords=object%20oriented%20javascript%20es6
*/
$search_url = $base_url . '/search?keywords=' . rawurlencode($search_str);
echo '<h3>$search_url: ' . $search_url . '</h3>';

// Slurp web page content and return html
function get_web_content($search_url) {
    
    // Slurp page code with cURL
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $search_url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    return curl_exec($curl);
}

$html = get_web_content($search_url);

// Define regex for image urls
$regex_img = '!https://media-exp1.licdn.com/dms/image/[^\s"]*!';

// Get and return array of image urls from web content
function get_img_urls($html, $reg) {
    // Find and return array of all image urls
    preg_match_all($reg, $html, $matches);

    // Get unique urls only
    $images = array_values(array_unique($matches[0]));
    return $images;
}

$img_urls = get_img_urls($html, $regex_img);

// Store image container style in a heredoc
$img_cont_style = <<<EOT
float: left;
margin: 7 0 0 7;
list-style: none;
max-width: 500px;
width: 21%;
EOT;

// Make image container style into global constant
//  so we can access inside functions
define('IMG_CONT_STYLE', $img_cont_style);

function print_link_list($urls) {
    $out = ''; // initialize output buffer
    $out .= '<ul>';
    for ($i=0; $i<count($urls); $i++) {
        $out .= "<li style='" . IMG_CONT_STYLE. "'>";
        $out .= "<img src='$urls[$i]' style='width: 100%'>";
        $out .= '</li>';
    }
    $out .= '</ul>';
    return $out;
}
$html = print_link_list($img_urls);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
.ehw-wrapper {
    background: beige;
    border: solid 2px red;
    margin: 2rem auto;
    max-width: 1024px;
    width: 60%;
    overflow: hidden;
}
</style>
</head>
<body>
    <section class='ehw-wrapper'>
        <?php echo $html; ?>
    </section>
</body>
</html>


