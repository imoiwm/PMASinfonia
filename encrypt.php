<?php
define("METHOD", "aes-128-gcm");

function encrypt(string $data, string $key): string {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(METHOD)); // potential to get same iv twice, but minimal
    $tag = ""; // openssl_encrypt will fill this
    $result = openssl_encrypt($data, METHOD, $key, OPENSSL_RAW_DATA, $iv, $tag, "", 16); // gets result
    return base64_encode($iv.$tag.$result); // return encoded result
} // taken from https://levelup.gitconnected.com/encryption-in-php-cf3ca98f4287

function decrypt($data, string $key): string {
    $data = base64_decode($data); // decode encrypted
    $ivLength = openssl_cipher_iv_length(METHOD);
    $iv = substr($data, 0, $ivLength);
    $tag = substr($data, $ivLength, 16);
    $text = substr($data, $ivLength + 16);
    return openssl_decrypt($text, METHOD, $key, OPENSSL_RAW_DATA, $iv, $tag);
}
?>