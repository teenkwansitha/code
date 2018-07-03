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
	public function report_3()
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
			echo "controller1";
			//$emfname = $_SESSION['user']['fname'];
			//$emlname= $_SESSION['user']['lname'];
			$sale_list = sale::getallreport_3();
			//print_r($sale_list);
			require_once("view/bigquery/report_3.php");
		}
		else{
			echo "controller2";
			$sale_list = sale::getreport_3($month);
			require_once("view/bigquery/report_3.php");
		}
	}
}