<?php
/* VARIABLES */
$target_url = 'https://www.amazon.com';
// $target_url = 'http://www.google.com';
$target_url = 'https://www.linkedin.com/learning/designing-restful-apis';
$target_url = 'https://www.linkedin.com/learning/search?keywords=API';
$base_url = 'https://www.linkedin.com/learning';

$search_str = "object oriented javascript es6";

/* Sample search url:
   https://www.linkedin.com/learning/search?keywords=object%20oriented%20javascript%20es6
*/
$search_url = $base_url . '/search?keywords=' . rawurlencode($search_str);
echo '<h3>$search_url: ' . $search_url . '</h3>';

/* Sample course thumb urls:
https://media-exp1.licdn.com/dms/image/C4E0DAQF2DX4_GzNtiw/learning-public-crop_144_256/0/1567115269108?e=1642798800&v=beta&t=-Z1yy9gsSMO2fwexPwwbroo1kausegBWWVpyGZAVJOY
https://media-exp1.licdn.com/dms/image/C4D0DAQG6dQ0gh0wiAw/learning-public-crop_144_256/0/1622221555885?e=1642798800&v=beta&t=O0V5Si-232Czwg3Xjylej-0T09p9dSqM-HoGt46FCHw
https://media-exp1.licdn.com/dms/image/C4E0DAQHGEmHS49qQxw/learning-public-crop_144_256/0/1591038530598?e=1642798800&v=beta&t=H0kpiE_OU64SMNgzg3nXcUOWz3fTdoQUFsST9oyIVJo
https://media-exp1.licdn.com/dms/image/C4E0DAQEL8HR59bH8XQ/learning-public-crop_144_256/0/1567117874723?e=1642798800&v=beta&t=jU2HgEBTuw27DUNsj9e1ugRM6vSRnmCU0WFElSja_Cg
*/

// Clear $html variable
$html = '';

// Slurp page code with cURL
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $search_url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);

// preg_match_all("!https://media-exp1.licdn.com/dms/image/[^\s]*?/learning-public-crop_144_256/0/[^\s]*?\?e=1642798800&v=beta&t=[^\s]*?!", $result, $matches);
preg_match_all('!https://media-exp1.licdn.com/dms/image/[^\s"]*!', $result, $matches);

// Callback function to rawurldecode each match
function decode_url($u) {
    return $u . '<br>';
    // return rawurldecode($u);
}

// Get unique urls only
$images = array_values(array_unique($matches[0]));

// Store image container style in a heredoc
$img_cont_style = <<<EOT
float: left;
margin: 7 0 0 7;
list-style: none;
EOT;

// Make image container style into global constant
//  so we can access inside functions
define('IMG_CONT_STYLE', $img_cont_style);

function print_link_list($urls) {
    $out = ''; // initialize output buffer
    $out .= '<ul>';
    for ($i=0; $i<count($urls); $i++) {
        $out .= "<li style='" . IMG_CONT_STYLE. "'>";
        $out .= "<img src='$urls[$i]' style='width: 500'>";
        $out .= '</li>';
    }
    $out .= '</ul>';
    return $out;
}
$html = print_link_list($images);

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


