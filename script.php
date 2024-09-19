<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<script>
    function encryptData(data, secretKey) {
        // Convert the secret key and IV to UTF8 encoding
        var key = CryptoJS.enc.Utf8.parse(secretKey);
        var iv = CryptoJS.enc.Utf8.parse(secretKey);  // For simplicity, we use the key as the IV. IV should be 16 bytes.

        // Encrypt the data using AES with CBC mode and PKCS7 padding
        var encrypted = CryptoJS.AES.encrypt(CryptoJS.enc.Utf8.parse(data), key, {
            iv: iv,
            mode: CryptoJS.mode.CBC,
            padding: CryptoJS.pad.Pkcs7
        });

        // Return the ciphertext as Base64 encoded string
        return encrypted.toString();
    }

    // Example usage:
    var secretKey = '1234567890123456';  // Must be 16 characters for AES-128
    var data = 'Hello, World!';
    var encryptedValue = encryptData(data, secretKey);

    // Log the encrypted value and pass it via URL or AJAX
    console.log('Encrypted Value:', encryptedValue);
    
    // Example URL (encode the value before passing it in a URL)
    var v_certificate = '<a href="https://yourdomain.com/DownloadCertificate?val=' + encodeURIComponent(encryptedValue) + '" target="_blank">Download</a>';
    console.log(v_certificate);
</script>
