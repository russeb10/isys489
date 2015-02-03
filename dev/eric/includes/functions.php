<?
	function get_product_name($pid){
		$result=mysql_query("select name from store_products where serial=$pid");
		$row=mysql_fetch_array($result);
		return $row['name'];
		}
	function get_picture($pid){
		$result=mysql_query("select picture from store_products where serial=$pid");
		$row=mysql_fetch_array($result);
		return $row['picture'];
	}
	
	function get_price($pid){
		$result=mysql_query("select price from store_products where serial=$pid");
		$row=mysql_fetch_array($result);
		return $row['price'];
	}
	function remove_product($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
	}
	function get_order_total(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_price($pid);
			$sum+=$price*$q;
		}
		return $sum;
	}
	function addtocart($pid,$q){
		if($pid<1 or $q<1) return;
		
		if(is_array($_SESSION['cart'])){
			if(product_exists($pid)) return;
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['productid']=$pid;
			$_SESSION['cart'][$max]['qty']=$q;
		}
		else{
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['productid']=$pid;
			$_SESSION['cart'][0]['qty']=$q;
		}
	}
	function product_exists($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				$flag=1;
				break;
			}
		}
		return $flag;
	}
	
function create_receipt($O) {
		$orderid=intval($O); //Order Number
		
		//Billing Information
		
			$result=mysql_query("SELECT * FROM `store_order` as O JOIN store_customer on store_customer.id = customerid");
			$row=mysql_fetch_array($result);

			// here is where the order goes
			$p = $row["phone"];
			echo '<h1>PC Supplier</h1>';
			echo '<p>This is your invoice.  Please print this page and retain for your records.<br></p>';
			echo '<p><b>Order Number:     </b> 2014-'; 
			printf("%08d", $O) . '<br></p>';
			echo '<p></p>' ;
			echo '<p1>' . $row["name"] . '<br></p1>';
			echo '<p1>' . $row["address"] . '<br></p1>';
			echo '<p1>' . $row["City"] . ', ' . $row["State"] . '  ' .  $row["Zip"] . '<br></p1>';
			echo '<p1><br></p1>';
			echo '<p1><b>Phone: </b>' . substr($p,0,3) . "-" . substr($p,3,3) . "-" . substr($p,6,4) . '<br></p1>';
			echo '<p1><b>eMail: </b>' . $row["email"] . '<br></p1>';
			echo '<p1><br></p1>';
			echo '<p1><b>Billing Information</b></p1><br>';
			echo '<p1><b>Card Type:    </b>' . $row["CCType"] . '<br></p1>';
			echo '<p1><b>Card Number:  </b>**********' . substr($row["CCNum"],9) . '<br></p1>';
			echo '<p1><b>Card Expires: </b>' . $row["CCMonth"] . ' / ' . $row["CCYr"] . '<br></p1>';
			echo '<p1><b><br></b></p1>';
		
			// Summarize Order
			echo '<div align="left">' ;
			echo '<h1 align="left">Your Order</h1>';
				echo '<table border="1" cellpadding="2px" width="600px">';
				echo '<col width="75"><col width="350"><col width="100"><col width="100">';
				echo '<tr><th><b>QTY</th><th>ITEM</th><th>PRICE EA</th><th>EXT PRICE</b></th></tr>';
					$result=mysql_query("SELECT quantity, store_order_detail.price, name, description FROM store_order_detail JOIN store_products on store_order_detail.productid = store_products.serial where orderid = $O");
					while($row=mysql_fetch_array($result)){
				
					$unit_price = $row['price'];
					$quan = $row['quantity'];
					$name = $row['name'];	
					$desc = $row['description'];
					outputTable ($quan, $name, $desc, $unit_price);
					}
	}
	
	function outputTable($q, $i, $d, $c) {
$e = $q * $c;
echo "<tr valign='top'>
		<td align = 'center'>$q</td>
		<td><thl><b>$i</b>:  <p1>$d</p1></thl></td> 
		<td align = 'right'>" . number_format($c, 2) . "</td>
		<td align = 'right'><B>\$ " . number_format($e, 2) . "</B></td>
	</tr>";
	totalOrder($e);
}

function calcFreight($FREIGHT) {
	global $orderSubTotal;
	$orderFreight = $orderSubTotal * $FREIGHT;
	totalOrder($orderFreight);
	return $orderFreight;
}

function totalOrder($e) {
	global $orderSubTotal;
	$orderSubTotal = $orderSubTotal + $e;
}
?>