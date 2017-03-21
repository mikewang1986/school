<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="alipayment" action="alipayapi.php" method="post" style="display:none;">
    <!--卖家支付宝帐户-->
    <input type="hidden" name="WIDseller_email" value="2986689335@qq.com" />
    
    <!--商户订单号-->
    <input type="hidden" name="WIDout_trade_no" value="<?= $_GET['o'];?>" />
    
    <!--订单名称-->
    <input type="hidden" name="WIDsubject" value="<?= $_GET['gn'];?>" />
    
    <!--付款金额-->
    <input type="hidden" name="WIDtotal_fee" value="<?= $_GET['r'];?>" />      
    <!--订单描述-->
    <input type="hidden" name="WIDbody" value="<?= $_GET['t'];?>"/>
    
    <!--商品展示地址-->
    <input type="hidden" name="WIDshow_url" value=""/>
    <input type="submit" style="display:none;" id="subm">
</form>
<script>
	document.getElementById('subm').click();
</script>