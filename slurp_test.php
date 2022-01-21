<?php

$target_url = 'https://www.amazon.com';
// $target_url = 'http://www.google.com';
$target_url = 'https://www.linkedin.com/learning/designing-restful-apis';
$target_url = 'https://www.linkedin.com/learning/search?keywords=API';
$base_url = 'https://www.linkedin.com/learning';

$search_str = "object oriented javascript es6";

$search_url = $base_url . '/search?keywords=' . rawurlencode($search_str);

//https://www.linkedin.com/learning/search?keywords=object%20oriented%20javascript%20es6


// https://media-exp1.licdn.com/dms/image/C4E0DAQHGEmHS49qQxw/learning-public-crop_144_256/0/1591038530598?e=1642798800&v=beta&t=H0kpiE_OU64SMNgzg3nXcUOWz3fTdoQUFsST9oyIVJo

/*
https://media-exp1.licdn.com/dms/image/C4E0DAQF2DX4_GzNtiw/learning-public-crop_144_256/0/1567115269108?e=1642798800&v=beta&t=-Z1yy9gsSMO2fwexPwwbroo1kausegBWWVpyGZAVJOY
VM1111:4 https://media-exp1.licdn.com/dms/image/C4D0DAQG6dQ0gh0wiAw/learning-public-crop_144_256/0/1622221555885?e=1642798800&v=beta&t=O0V5Si-232Czwg3Xjylej-0T09p9dSqM-HoGt46FCHw
VM1111:4 https://media-exp1.licdn.com/dms/image/C4E0DAQHGEmHS49qQxw/learning-public-crop_144_256/0/1591038530598?e=1642798800&v=beta&t=H0kpiE_OU64SMNgzg3nXcUOWz3fTdoQUFsST9oyIVJo
VM1111:4 https://media-exp1.licdn.com/dms/image/C4E0DAQEL8HR59bH8XQ/learning-public-crop_144_256/0/1567117874723?e=1642798800&v=beta&t=jU2HgEBTuw27DUNsj9e1ugRM6vSRnmCU0WFElSja_Cg
VM1111:4 https://media-exp1.licdn.com/dms/image/C4D0DAQHK-x5Xftt6NQ/learning-public-crop_144_256/0/1587058478275?e=1642798800&v=beta&t=i12RIkJBtJD-oy01WOeuXlohukFsn-YSgToNXsoGOL4
VM1111:4 https://media-exp1.licdn.com/dms/image/C4E0DAQHrK3_TAA5SMg/learning-public-crop_144_256/0/1595872229643?e=1642798800&v=beta&t=iGcJAIqQCANGJGT1xbfmHuwIzsv_LyBDhFUNj8pai9E
VM1111:4 https://media-exp1.licdn.com/dms/image/C4E0DAQHVilhWY2KSFw/learning-public-crop_144_256/0/1568059277687?e=1642798800&v=beta&t=y_M2adH5L2mPVEhftT5Q-I6X1u3oKNTLBbEIGJU66Y0
VM1111:4 https://media-exp1.licdn.com/dms/image/C4E0DAQHZ5J3EiCOgAw/learning-public-crop_144_256/0/1600448853491?e=1642798800&v=beta&t=czGVO4QCP2z2n8hhZA32mxGy3MbwkGP-3apUhu0SxyU
VM1111:4 https://media-exp1.licdn.com/dms/image/C4E0DAQG0jc7cAzGK8g/learning-public-crop_144_256/0/1567117555407?e=1642798800&v=beta&t=_tDzVfrkCEK7Fl17K5BM7YnDct_EN89p7j5kWgEFsLA
VM1111:4 https://media-exp1.licdn.com/dms/image/C560DAQGv2jZ7bIgGcw/learning-public-crop_144_256/0/1610728168219?e=1642798800&v=beta&t=s3D9SUqPmCr0XC3cCK7qSmPQHlzlfTQsIWC5Imf34x4
VM1111:4 https://media-exp1.licdn.com/dms/image/C4E0DAQFnjLm3IKbs6g/learning-public-crop_144_256/0/1573495097906?e=1642798800&v=beta&t=lIBxhpr5PGfD4GrdWQykrediv9e1X_8k0rtFUetNmm8

*/

echo $search_url . '<br>';
$html = '';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $search_url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);

// preg_match_all("!https://media-exp1.licdn.com/dms/image/[^\s]*?/learning-public-crop_144_256/0/[^\s]*?\?e=1642798800&v=beta&t=[^\s]*?!", $result, $matches);
preg_match_all('!https://media-exp1.licdn.com/dms/image/[^\s"]*!', $result, $matches);

print_r($matches);

// Raw Url Decode each match
function decode_url($u) {
    return $u . '<br>';
    return rawurldecode($u);
}

$decoded_matches = array_map('decode_url', $matches);
print_r($decoded_matches);

exit;


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


