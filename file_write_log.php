<?php 
//Author: İ. Mert inan 250201038
	function write_log($value)
	{
		$fp = fopen('log.txt', 'a');//opens file in append mode  
		fwrite($fp, "$value\n");    
		fclose($fp);  
	}
	
?>