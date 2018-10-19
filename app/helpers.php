<?php 
	
	function currentUser(){
		return auth()->user();
	}

	function unique_multidim_array($array, $key){
		$temp_array = array();
		$i = 0;
		$key_array = array();

		foreach ($array as $val) {
			if (!in_array($val[$key], $key_array)) {
				$key_array[$i] = $val[$key];
				$temp_array[$i] = $val;
				$i++;
			}
		}
		return $temp_array;
	}

	function generateToken()
    {
        $token = '';
        $length = 10;
        $pattern = 'qwertyuioplkjhgfdsazxcvbnm1234567890';
        $max = strlen($pattern)-1;
        
        for($i = 0; $i < $length; $i++)
        {
            $token .= $pattern{mt_rand(0, $max)};
        }
        return $token;
    }


 ?>