<?php
function encrypt($data)
{
    $key = 'qJB0rGtIn5UB1xG03efyCp';
    $iv = substr(hash('sha256', $key), 0, 16); // Generates a 16-byte IV
    $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv);
    return base64_encode($encrypted);
}

function decrypt($data)
{
    $key = 'qJB0rGtIn5UB1xG03efyCp';
    $iv = substr(hash('sha256', $key), 0, 16);
    $decrypted = openssl_decrypt(base64_decode($data), 'AES-256-CBC', $key, 0, $iv);
    return $decrypted;
}
?>