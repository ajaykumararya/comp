<?php
Class Checksum {
    public static function calculateChecksum($data, $secret_key) {
		$checksum = md5($data.$secret_key);
		return $checksum;
	}

    public static function encrypt($data, $salt) {
        // Build a 256-bit $key which is a SHA256 hash of $salt and $password.
        $key = hash('SHA256', $salt.'@'.$data);
        return $key;
    }	

	public static function encryptSha256($data) {    
        $key = hash('SHA256', $data);
        return $key;
    }    
    public static function calculateChecksumSha256($data, $salt) { 
		// print($data);
		// exit;
        $checksum = hash('SHA256', $salt.'@'.$data);
        return $checksum;
    }
	
/*  public static function getAllParams() {
		//ksort($_POST);
		$all = '';
        $except_list=array('checksum','privatekey','mercid','message');
		foreach($_POST as $key => $value)	{
			if(!in_array($key,$except_list)) {
				$all .= "'";
					$_POST[key] = Checksum::sanitizedParam($value);
			}
		}
	}
*/
    public static function outputForm($checksum) {
		//ksort($_POST);
		// foreach($_POST as $key => $value) {
		// 		echo '<input type="hidden" name="'.$key.'" value="'.$value.'" />'."\n";
		// }
		echo '<input type="hidden" name="checksum" value="'.$checksum.'" />'."\n";
	}

    public static function verifyChecksum($checksum, $all, $secret) {
		$cal_checksum = Checksum::calculateChecksum($secret, $all);
		$bool = 0;
		if($checksum == $cal_checksum)	{
			$bool = 1;
		}

		return $bool;
	}
}
