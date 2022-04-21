<?php
define("METHOD", "aes-128-gcm"); // pedefines the method of choice

/*
 * Encrypts the piece of data with a salt
 * Preconditions: none
 * Postconditions: none
 * Parameters:
 * string $data: the data to be converted
 * string $key: the salt to be set
 * Returns:
 * The encrypted data in a string
 */
function encrypt(string $data, string $key): string {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(METHOD)); // potential to get same iv twice, but minimal
    $tag = ""; // openssl_encrypt will fill this
    $result = openssl_encrypt($data, METHOD, $key, OPENSSL_RAW_DATA, $iv, $tag, "", 16); // gets result
    return base64_encode($iv.$tag.$result); // return encoded result
} // taken from https://levelup.gitconnected.com/encryption-in-php-cf3ca98f4287

/*
 * Decrypts the piece of data with a salt
 * Preconditions: none
 * Postconditions: none
 * Parameters:
 * string $data: the data to be converted
 * string $key: the salt to be set
 * Returns:
 * The decrypted data in a string
 */
function decrypt($data, string $key): string {
    $data = base64_decode($data); // decode encrypted
    $ivLength = openssl_cipher_iv_length(METHOD); // gets the length of random bytes
    $iv = substr($data, 0, $ivLength); // gets random bytes
    $tag = substr($data, $ivLength, 16); // gets the tag
    $text = substr($data, $ivLength + 16); // gets encrypted data
    return openssl_decrypt($text, METHOD, $key, OPENSSL_RAW_DATA, $iv, $tag); // decrypts the data
}
?>