<?php  
	/**
	* 
	*/
	class Request_helper
	{
		/*		FUNCTION IS AJAX 		*/

		public function is_ajax() 
		{
		  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
		}	
	}