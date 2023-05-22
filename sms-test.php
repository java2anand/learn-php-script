<?php
$msg = 'hello Abhishek';
$ch = curl_init();
$url = 'https://0mjumny3gf.execute-api.ap-south-1.amazonaws.com/dev/?message='. urlencode($msg) .'&number=918210900939&subject=TCHJKY&passcode=grBsQJDYzhg9JJ27VuQ2SxbYnDwkMa65';
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$tuData = curl_exec($tuCurl);
if(!curl_errno($tuCurl)){
  $info = curl_getinfo($tuCurl);
print_r($info);die;
  echo 'Took ' . $info['total_time'] . ' seconds to send a request to ' . $info['url'];
} else {
  echo 'Curl error: ' . curl_error($tuCurl);
} 


curl_close($ch);

?>
