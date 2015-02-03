<?
	include("../../db.php");
	include("../includes/functions.php");
	
	if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
		$pid=$_REQUEST['productid'];
		addtocart($pid,1);
		header("location:shoppingcart.php");
		exit();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<script language="javascript">
			function addtocart(pid){
				document.form1.productid.value=pid;
				document.form1.command.value='add';
				document.form1.submit();
			}
		</script>

		<meta charset="utf-8" />
		<title>PC Supplier</title>
		<link rel="stylesheet" type="text/css" media="screen" href="productStyle.css" />
		<h1>Available Products</h1>		
	</head>
	
	<body>
		<form name="form1">
			<input type="hidden" name="productid" />
			<input type="hidden" name="command" />
		</form>
	
		<table border="0" cellpadding="2px" width="600px">
			<?
				$result=mysql_query("select * from store_products");
				while($row=mysql_fetch_array($result)){
			?>
			<tr>
				<td><img src="<?=$row['picture']?>" /></td>
				<td>   	<b><?=$row['name']?></b><br />
						<?=$row['description']?><br />
						Price: $ <?=number_format($row['price'],2)?><br /><br />
						<input type="button" value="Add To Cart" onclick="addtocart(<?=$row['serial']?>)" />
				</td>
			</tr>
			<tr><td colspan="2"><hr size="1" /></td>
			<? } ?>
		</table>
	</body>
</html>