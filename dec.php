<?php
function my_decrypt($data, $key) {
    // Remove the base64 encoding from our key
    $encryption_key = base64_decode($key);
    // To decrypt, split the encrypted data from our IV - our unique separator used was "::"
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}


function my_encrypt($data, $key) {
    // Remove the base64 encoding from our key
    $encryption_key = base64_decode($key);
    // Generate an initialization vector
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    // Encrypt the data using AES 256 encryption in CBC mode using our encryption key and initialization vector.
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    // The $iv is just as important as the key for decrypting, so save it with our encrypted data using a unique separator (::)
    return base64_encode($encrypted . '::' . $iv);
}
if(isset($_GET['path'])){


    $path = $_GET['path'];

    // decrypt
    $msg = file_get_contents("$path");
    $key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';
    $msg_encrypted = my_decrypt($msg, $key);
    $file = fopen("$path", 'wb');
    fwrite($file, $msg_encrypted);
    fclose($file);

   
    echo "<script type='text/javascript' language='Javascript'>window.open('$path');</script>";
    
    if($_GET['path']=='1'){
        echo "<script>window.location.href = 'enc.php?i=1 && path=$path';</script>";
    }else{
        echo "<script>window.location.href = 'enc.php?path=$path';</script>";
    }
   




}


?>