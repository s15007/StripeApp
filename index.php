<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="css/main.css" rel="stylesheet">
    <title></title>
</head>
<body style="text-align: center;">
<form action="charge.php" method="POST">
    <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="pk_test_bBS4rwi9YDtRfnnY9erbz1cT"
        data-amount="299"
        data-name="Lamp"
        data-description="test charge"
        data-image="./img/lamp.png"
        data-locale="auto"
        data-currency="jpy">
    </script>
    <script src="https://checkout.stripe.com/checkout.js"></script>

    <button id="customButton" >カスタムボタン</button>

    <script>
        var handler = StripeCheckout.configure({
            key: 'pk_test_bBS4rwi9YDtRfnnY9erbz1cT',
            image: './img/lamp.png',
            locale: 'auto',
            token: function(token) {
                // You can access the token ID with `token.id`.
                // Get the token ID to your server-side code for use.
                // Prevent user from leaving page
                window.onbeforeunload = function() {
                    return "";
                };

                // Dynamically create a form element to submit the results
                // to your backend server
                var form = document.createElement("form");
                form.setAttribute('method', "POST");
                form.setAttribute('action', "charge.php");

                // Add the token ID as a hidden field to the form
                var inputToken = document.createElement("input");
                inputToken.setAttribute('type', "hidden");
                inputToken.setAttribute('name', "stripeToken");
                inputToken.setAttribute('value', token.id);
                form.appendChild(inputToken);

                // Add the email as a hidden field to the form
                var inputEmail = document.createElement("input");
                inputEmail.setAttribute('type', "hidden");
                inputEmail.setAttribute('name', "stripeEmail");
                inputEmail.setAttribute('value', token.email);
                form.appendChild(inputEmail);

                // Finally, submit the form
                document.body.appendChild(form);

                // Artificial 1 second delay for testing
                setTimeout(function() {
                    window.onbeforeunload = null;
                    form.submit();
                }, 1000);
            }
        });

        document.getElementById('customButton').addEventListener('click', function(e) {
            // Open Checkout with further options:
            handler.open({
                name: 'Lamp',
                description: '決済',
                currency: 'jpy',
                amount: 2000
            });
            e.preventDefault();
        });

        // Close Checkout on page navigation:
        window.addEventListener('popstate', function() {
            handler.close();
        });
    </script>
</form>
</body>
</html>