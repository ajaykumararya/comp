<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3./org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Airpay</title>
<script type="text/javascript">
function submitForm(){
			var form = document.forms[0];
			form.submit();
		}
</script>
</head>
<body onload="javascript:submitForm()">
<center>
<table width="500px;">
	<tr>
		<td align="center" valign="middle">Do Not Refresh or Press Back <br/> Redirecting to Airpay</td>
	</tr>
	<tr>
		<td align="center" valign="middle">
			<form action="	https://payments.airpay.co.in/pay/index.php" method="post">
                <input type="hidden" name="privatekey" value="<?php echo $privatekey; ?>">
                <input type="hidden" name="mercid" value="<?php echo $mercid; ?>">
				<input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
 		        <input type="hidden" name="currency" value="356">
		        <input type="hidden" name="isocurrency" value="INR">
				<!-- <input type="hidden" name="arpyVer" value="3"> -->
				<input type="hidden" name="chmod" value="<?php echo $hiddenmod; ?>">					
				<?php
                // pre($_POST);
                foreach($postdata as $field => $value){
                    if($field == 'orderid')
                        continue;
                    echo form_hidden($field,$value);
                }
				Checksum::outputForm($checksum);
				?>

			</form>
		</td>

	</tr>

</table>

</center>
</body>
</html>
