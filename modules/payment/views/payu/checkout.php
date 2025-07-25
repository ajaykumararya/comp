<form id="payuForm" action="<?= $action ?>" method="post" style="display:none;">
    <input type="hidden" name="key" value="<?= $key ?>" />
    <input type="hidden" name="hash" value="<?= $hash ?>" />
    <input type="hidden" name="txnid" value="<?= $txnid ?>" />
    <input type="hidden" name="amount" value="<?= $amount ?>" />
    <input type="hidden" name="firstname" value="<?= $firstname ?>" />
    <input type="hidden" name="email" value="<?= $email ?>" />
    <input type="hidden" name="phone" value="<?= $phone ?>" />
    <input type="hidden" name="productinfo" value="<?= $productinfo ?>" />
    <input type="hidden" name="surl" value="<?= $surl ?>" />
    <input type="hidden" name="furl" value="<?= $furl ?>" />
</form>