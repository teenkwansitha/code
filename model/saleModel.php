<?php
class sale
{
	public $pname;
    public $total;

	public function __construct($pname,$total)
	{

		$this->pname=$pname;
		$this->total=$total;

	}

	public static function getall($fname,$lname)
	{
		//echo "model";
		//require("connect.php");
		//echo "req";
		//echo "pro";
		$emfname = $_SESSION['user']['fname'];
		$emlname= $_SESSION['user']['lname'];
		//echo "$emfname";
		$query = "SELECT t1.pname as pname,sum(t1.total) as total1
		from
		(SELECT ProductName as pname,Price,Quantity as qty,Discount as dis,(Price*Quantity)-((Price*Quantity)* Discount)AS total,employee. FirstName AS emfname ,employee. LastName AS emlname
		from [salebigdata:Saledata.sale] AS sale
		inner join [salebigdata:Saledata.product]AS product on product. ProductID = sale.ProductID 
		inner join [salebigdata:Saledata.employee]AS employee on employee. EmployeeID = sale. SalesPersonID)as t1
		where t1.emfname='$fname' && t1.emlname='$lname'
		group by pname
		order by total1 DESC
		limit 10";
		//echo "run";
		require_once("bigquery.php");
		//echo "runs";
		$resultpro = array();
		$i=0;
		//print_r($result);
		foreach ($result as $row) 
		{	
			//printf('--- Row %s ---' . PHP_EOL, ++$i);
			foreach ($row as $column => $value) 
			{
				//$pname = $column;
				$total = json_encode($value);
				//echo $column."-".json_encode($value)."<br/>";
				if($i==0){
					$resultpro[0][]=json_encode($value);
					//echo $i."-".json_encode($value)."<br/>";
					$i++;
				}
				else{
					$resultpro[1][]=json_encode($value);
					//echo $i."-".json_encode($value)."<br/>";
					$i--;
				}
				
				//$saleList[] = new sale($pname,$total);
			}
		}
		return $resultpro ;
	}
	public static function get($fname,$lname,$month,$year)
	{
		//echo "model";
		//require("connect.php");
		$query = "SELECT t1.pname,sum(t1.total) as total1
		from
		(SELECT MONTH(SalesDate) AS mon,YEAR(SalesDate) AS yea,ProductName as pname,Price,Quantity as qty,Discount as dis,(Price*Quantity)-((Price*Quantity)* Discount)AS total,employee. FirstName AS emfname ,employee. LastName AS emlname
		from [salebigdata:Saledata.sale] AS sale
		inner join [salebigdata:Saledata.product]AS product on product. ProductID = sale.ProductID 
		inner join [salebigdata:Saledata.employee]AS employee on employee. EmployeeID = sale. SalesPersonID)as t1
		where t1.emfname='$fname' && t1.emlname='$lname' && t1.mon = $month && t1.yea = $year
		group by t1.yea,t1.mon,t1.pname,t1.emfname,t1.emlname
		order by total1 DESC
		limit 10";
		//echo "$fname";
		require_once("bigquery.php");
		//echo "runs";
		//print_r($result);
		$resultpro = array();
		$i=0;
		//print_r($result);
		foreach ($result as $row) 
		{	
			//printf('--- Row %s ---' . PHP_EOL, ++$i);
			foreach ($row as $column => $value) 
			{
				//$pname = $column;
				$total = json_encode($value);
				//echo $column."-".json_encode($value)."<br/>";
				if($i==0){
					$resultpro[0][]=json_encode($value);
					//echo $i."-".json_encode($value)."<br/>";
					$i++;
				}
				else
				{
					$resultpro[1][]=json_encode($value);
					//echo $i."-".json_encode($value)."<br/>";
					$i--;
				}
				
				//$saleList[] = new sale($pname,$total);
			}
		}
		return $resultpro ;
	}
	public static function getyear2($fname,$lname,$year)
	{
		//echo "model";
		//require("connect.php");
		$query = "SELECT max(t2.total1)as mac,t2.mon
		from
		(SELECT  t1.proid as proid1,t1.mon,t1.year,t1.pname as pname,sum(t1.total) as total1
				from
				(SELECT product. ProductID as proid ,month(SalesDate) as mon,year(SalesDate) as year,ProductName as pname,Price,Quantity as qty,Discount as dis,(Price*Quantity)-((Price*Quantity)* Discount)AS total,employee. FirstName AS emfname ,employee. LastName AS emlname
				from [salebigdata:Saledata.sale] AS sale
				inner join [salebigdata:Saledata.product]AS product on product. ProductID = sale.ProductID 
				inner join [salebigdata:Saledata.employee]AS employee on employee. EmployeeID = sale. SalesPersonID)as t1
				WHERE t1.emfname= '$fname' && t1.emlname= '$lname' && year=$year
				group by proid1,t1.mon,t1.year,pname)as t2
			group by t2.mon
			order by t2.mon
				limit 12";
		require_once("bigquery.php");
		//echo "runs";
		//print_r($result);
		$resultpro = array();
		$i=0;
		//print_r($result);
		foreach ($result as $row) 
		{	
			//printf('--- Row %s ---' . PHP_EOL, ++$i);
			foreach ($row as $column => $value) 
			{
				//$pname = $column;
				$total = json_encode($value);
				//echo $column."-".json_encode($value)."<br/>";
				if($i==0){
					$resultpro[0][]=json_encode($value);
					//echo $i."-".json_encode($value)."<br/>";
					$i++;
				}
				else
				{
					$resultpro[1][]=json_encode($value);
					//echo $i."-".json_encode($value)."<br/>";
					$i--;
				}
				
				//$saleList[] = new sale($pname,$total);
			}
		}
		return $resultpro ;
	}
	public static function getyear1($fname,$lname)
	{
		echo "model";
		//require("connect.php");
		$query = "SELECT max(t2.total1)as mac,t2.year
		from
		(SELECT  t1.proid as proid1,t1.mon,t1.year,t1.pname as pname,sum(t1.total) as total1
				from
				(SELECT product. ProductID as proid ,month(SalesDate) as mon,year(SalesDate) as year,ProductName as pname,Price,Quantity as qty,Discount as dis,(Price*Quantity)-((Price*Quantity)* Discount)AS total,employee. FirstName AS emfname ,employee. LastName AS emlname
				from [salebigdata:Saledata.sale] AS sale
				inner join [salebigdata:Saledata.product]AS product on product. ProductID = sale.ProductID 
				inner join [salebigdata:Saledata.employee]AS employee on employee. EmployeeID = sale. SalesPersonID)as t1
				WHERE t1.emfname= '$fname' && t1.emlname= '$lname'
				group by proid1,t1.mon,t1.year,pname)as t2
			group by t2.year
			order by t2.year
				limit 12";
		require_once("bigquery.php");
		//echo "runs";
		//print_r($result);
		$resultpro = array();
		$i=0;
		//print_r($result);
		foreach ($result as $row) 
		{	
			//printf('--- Row %s ---' . PHP_EOL, ++$i);
			foreach ($row as $column => $value) 
			{
				//$pname = $column;
				$total = json_encode($value);
				//echo $column."-".json_encode($value)."<br/>";
				if($i==0){
					$resultpro[0][]=json_encode($value);
					//echo $i."-".json_encode($value)."<br/>";
					$i++;
				}
				else
				{
					$resultpro[1][]=json_encode($value);
					//echo $i."-".json_encode($value)."<br/>";
					$i--;
				}
				
				//$saleList[] = new sale($pname,$total);
			}
		}
		return $resultpro ;
	}

	public static function vip($month,$year)
	{
		echo "model";
		//require("connect.php");
		$query = "SELECT month( SalesDate) as mon,customer. FirstName as cusname,customer. LastName as cuslname ,sum((Price*Quantity)-((Price*Quantity)* Discount))AS total, city.CityName as city
		, country. CountryName as country		
			from [salebigdata:Saledata.sale] AS sale
				inner join [salebigdata:Saledata.product]AS product on product. ProductID = sale.ProductID  
			inner join [salebigdata:Saledata.customer]AS customer on customer. CustomerID = sale. CustomerID
			inner join [salebigdata:Saledata.city]as city on customer. CityID = city. CityID
			inner join [salebigdata:Saledata.country] as country on country. CountryID = city. CountryID   
			where month( SalesDate)=$month && year(SalesDate)=$year
			group by mon,cusname,cuslname,city,country
			order by total DESC
			limit 10";
		require_once("bigquery.php");
		//echo "runs";
		//print_r($result);
		$resultpro = array();
		$i=0;
		//print_r($result);
		foreach ($result as $row) 
		{	
			//printf('--- Row %s ---' . PHP_EOL, ++$i);
			foreach ($row as $column => $value) 
			{
				//$pname = $column;
				$total = json_encode($value);
				//echo $column."-".json_encode($value)."<br/>";
				if($i==0){
					$resultpro[0][]=json_encode($value);
					echo $i."-".json_encode($value)."<br/>";
					$i++;
				}
				if($i==1)
				{
					$resultpro[1][]=json_encode($value);
					echo $i."-".json_encode($value)."<br/>";
					$i++;
				}
				if($i==2)
				{
					$resultpro[2][]=json_encode($value);
					echo $i."-".json_encode($value)."<br/>";
					$i++;
				}
				if($i==3)
				{
					$resultpro[3][]=json_encode($value);
					echo $i."-".json_encode($value)."<br/>";
					$i=0;
				}

				
				//$saleList[] = new sale($pname,$total);
			}
		}
		return $resultpro ;
	}

}