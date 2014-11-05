<?php

class metaTags {
	
	public function ogp($var = array()){
		$ogpProp = '';

		foreach($var as $key => $value){
			if(is_array($value)){	
				
				foreach($value as $k => $val){
					
					if(is_numeric($k)){
						$ogpProp .= '<meta property="og:'.$key.'" content="'.$val.'" />';
					}else{
						if(is_array($val)){	

							foreach($val as $newK => $value){
								
								$ogpProp .= '<meta property="og:'.$key.':'.$k.'" content="'.$value.'" />';
								
							}
						}
					}
				}
			}
			else{
				
				$ogpProp .= '<meta property="og:'.$key.'" content="'.$value.'" />';
			}
		}
		return $ogpProp;	
	}
	
	public function twitterCard($var = array()){
		$twitterCard = '';

		foreach($var as $key => $value){
			$twitterCard .= '<meta property="twitter:'.$key.'" content="'.$value.'" />';		
		}
		return $twitterCard;	
	}
	
	public function meta($var = array()){
		$metaTags = '';

		foreach($var as $key => $value){
			$metaTags .= '<meta property="'.$key.'" content="'.$value.'" />';		
		}
		return $metaTags;	
	}
	
}

?>
