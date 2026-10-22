<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Redirecting to PayU...</title>
</head>
<body onload="document.forms['payuForm'].submit();">
    <div style="text-align: center; margin-top: 20vh; font-family: Arial;">
        <h3>Redirecting to Secure Payment Gateway... Please wait.</h3>
        <p>Do not refresh or press back button.</p>
    </div>

    <form action="{{ $payuUrl }}" method="post" name="payuForm">
        <input type="hidden" name="key" value="{{ $merchantKey }}" />
        <input type="hidden" name="txnid" value="{{ $txnid }}" />
        <input type="hidden" name="amount" value="{{ $amount }}" />
        <input type="hidden" name="productinfo" value="{{ $productInfo }}" />
        <input type="hidden" name="firstname" value="{{ $firstname }}" />
        <input type="hidden" name="email" value="{{ $email }}" />
        <input type="hidden" name="phone" value="{{ $phone }}" />
        <input type="hidden" name="surl" value="{{ $surl }}" />
        <input type="hidden" name="furl" value="{{ $furl }}" />
        <input type="hidden" name="hash" value="{{ $hash }}" />
    </form>
</body>
</html>