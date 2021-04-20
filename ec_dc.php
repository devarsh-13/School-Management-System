<?php


error_reporting(0);
class ecdc
{
	public function encrypt($os)
    {
		// Store a string into the variable which
		// need to be Encrypted
		$simple_string = $os;

		// Store the cipher method
		$ciphering = "AES-128-CTR";

		// Use OpenSSl Encryption method
		$iv_length = openssl_cipher_iv_length($ciphering);
		$options = 0;

		// Non-NULL Initialization Vector for encryption
		$encryption_iv = '1234567891011121';

		// Store the encryption key
		$encryption_key = "GeeksforGeeks";

		// Use openssl_encrypt() function to encrypt the data
		$encryption = openssl_encrypt($simple_string, $ciphering,
		$encryption_key, $options, $encryption_iv);
 
 		return $encryption;
	}

	public function decrypt($en)
    {

		// Non-NULL Initialization Vector for decryption
		 $decryption_iv = '1234567891011121';
		 $ciphering = "AES-128-CTR";
		 $options = 0;

		// Store the decryption key
		 $decryption_key = "GeeksforGeeks";

		// Use openssl_decrypt() function to decrypt the data
		$decryption=openssl_decrypt ($en, $ciphering, $decryption_key, $options, $decryption_iv);
		
		return $decryption;
	}
}
?>
