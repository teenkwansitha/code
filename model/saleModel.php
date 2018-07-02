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
		echo "model";
		//require("connect.php");
		echo "req";
		echo "pro";
		$emfname = $_SESSION['user']['fname'];
		$emlname= $_SESSION['user']['lname'];
		echo "$emfname";
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
		echo "run";
		require_once("bigquery.php");
		echo "runs";
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
	public static function get($fname,$lname,$month)
	{
		echo "model";
		//require("connect.php");
		$query = "SELECT t1.pname,sum(t1.total) as total1
		from
		(SELECT MONTH(SalesDate) AS mon,ProductName as pname,Price,Quantity as qty,Discount as dis,(Price*Quantity)-((Price*Quantity)* Discount)AS total,employee. FirstName AS emfname ,employee. LastName AS emlname
		from [salebigdata:Saledata.sale] AS sale
		inner join [salebigdata:Saledata.product]AS product on product. ProductID = sale.ProductID 
		inner join [salebigdata:Saledata.employee]AS employee on employee. EmployeeID = sale. SalesPersonID)as t1
		where t1.emfname='$fname' && t1.emlname='$lname' && t1.mon = $month
		group by t1.mon,t1.pname,t1.emfname,t1.emlname
		order by total1 DESC
		limit 10";
		echo "$fname";
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
}