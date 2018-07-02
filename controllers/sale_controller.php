<?php
class SaleController
{
	public function index()
	{
        if(isset($_GET['month']))
		{
			$month = $_GET['month'];

		}
		else{
			$month = '0';
		}
		if($month==0)
		{
			//echo "controller";
			$emfname = $_SESSION['user']['fname'];
			$emlname= $_SESSION['user']['lname'];
			$sale_list = sale::getall($emfname,$emlname);
			//print_r($sale_list);
			require_once("view/bigquery/test.php");
		}
		else{
			$emfname = $_SESSION['user']['fname'];
			$emlname= $_SESSION['user']['lname'];
			$sale_list = sale::get($emfname,$emlname,$month);
			require_once("view/bigquery/test.php");
		}
        
    }
}