<?php
function decrypt($encryptedData, $secretKey) {
    // Decode the Base64-encoded ciphertext
    $encryptedData = base64_decode($encryptedData);

    // The IV should be the same as the secret key (used for simplicity, adjust accordingly)
    $iv = substr($secretKey, 0, 16);  // AES-128 uses 16 bytes IV

    // Decrypt the data using AES-128-CBC
    $decryptedData = openssl_decrypt($encryptedData, 'aes-128-cbc', $secretKey, OPENSSL_RAW_DATA, $iv);

    return $decryptedData;
}

if (isset($_GET['val'])) {
    // Get the encrypted value from the URL
    $encryptedValue = $_GET['val'];

    // Your secret key (must match the one used in JavaScript)
    $secretKey = '1234567890123456';  // Must be 16 characters for AES-128

    // Decrypt the value
    $decryptedValue = decrypt($encryptedValue, $secretKey);

    echo "Decrypted value: " . $decryptedValue;
} else {
    echo "No encrypted value provided.";
}
?>
