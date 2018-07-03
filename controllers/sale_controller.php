<?php
class SaleController
{
	public function index()
	{
        if(isset($_GET['month'])&&isset($_GET['year']))
		{
			$month = $_GET['month'];
			$year = $_GET['year'];
		}
		else{
			$month = '0';
			$year = '0';
		}
		if($month==0||$year==0)
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
			$sale_list = sale::get($emfname,$emlname,$month,$year);
			require_once("view/bigquery/test.php");
		}
        
	}
	public function year()
	{
		if(isset($_GET['year']))
		{
			$year = $_GET['year'];
		}
		else{
			$year = '0';
		}
		if($year==0)
		{
			//echo "controller";
			$emfname = $_SESSION['user']['fname'];
			$emlname= $_SESSION['user']['lname'];
			$sale_list = sale::getyear1($emfname,$emlname);
			require_once("view/bigquery/year1.php");
		}
		else{
			$emfname = $_SESSION['user']['fname'];
			$emlname= $_SESSION['user']['lname'];
			//echo $year;
			$sale_list = sale::getyear2($emfname,$emlname,$year);
			require_once("view/bigquery/year.php");
		}
	}
	public function vip()
	{
		if(isset($_GET['year']))
		{
			$year = $_GET['year'];
		}
		else
		{
			$year = '0';
		}
		if($year==0)
		{
			//echo "controller";
			require_once("view/bigquery/vip.php");
		}
		else
		{
			$month1 = sale::vip(1,$year);
			$month2 = sale::vip(2,$year);
			$month3 = sale::vip(3,$year);
			$month4 = sale::vip(4,$year);
			$month5 = sale::vip(5,$year);
			$month6 = sale::vip(6,$year);
			$month7 = sale::vip(7,$year);
			$month8 = sale::vip(8,$year);
			$month9 = sale::vip(9,$year);
			$month10 = sale::vip(10,$year);
			$month11 = sale::vip(11,$year);
			$month12 = sale::vip(12,$year);
			require_once("view/bigquery/vip.php");
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