<?php  @ini_set('upload_max_filesize', '20M'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    Document
    </title>
</head>
<body>
    <form enctype="multipart/form-data" action="" method="POST">
        <ul>
            <li>
                <input name="file" type="file" /><br />
            </li>
            <li>
                <br><input type="submit" name="submit" value="Upload" />
            </li>
        </ul>
    </form>
</body>

</html>
<?php
function validatedMobileNumber($mobile)
{
    if (!empty($mobile)){
        $mobile = preg_replace("/[^0-9]/", "", $mobile);
        $mobile = "+".$mobile;
        return $mobile;
    }else {
        return $mobile;
    }
}
function uploading_func($temp_arr){
    $postdata = array("d"=>$temp_arr);
    $url = 'https://api.clevertap.com/1/upload';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($postdata));
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        "X-CleverTap-Account-Id:TEST-5RW-K78-985Z",
        "X-CleverTap-Passcode:YOW-RMW-WIKL",
        "Content-Type:application/json"
    ]);
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response . PHP_EOL;
}


if (isset($_FILES['file']))
{
    $errors = array();
    $allowed_ext = array('csv');
    $file_name = $_FILES['file']['name'];
    $file_ext = strtolower(end(explode('.', $file_name)));
    $file_tmp = $_FILES['file']['tmp_name'];
    if (in_array($file_ext, $allowed_ext) === false) {
        $errors[] = 'Extension not allowed';
    }
    if(empty($errors))
    {
        $temp = 0;
        $rows   = array_map('str_getcsv', file($file_tmp));
        $removed = array_shift($rows);
        $chunk_arrays = array_chunk($rows,990);

        foreach($chunk_arrays as $chunks)
        {
            $temp_arr = array();
            foreach($chunks as $v)
            {
                if(isset($v[0]) && $v[0]!='' && (filter_var($v[2], FILTER_SANITIZE_EMAIL)))
                {
                    $arr = array(
                        'identity' => $v[0],
                        'type' => 'profile',
                        'Campaign Ids' => 'feb-2021',
                        'profileData' => array(
                            'Name' => $v[1],
                            'Email' => $v[2],
                            'Phone'=> validatedMobileNumber($v[3]),
                            'Campaign Ids' => 'feb-2021'
                            
                        )
                    );
                }
                $temp_arr[] = $arr;
            }
            uploading_func($temp_arr);
        }
    }
}
?> 