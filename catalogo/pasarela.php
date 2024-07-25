<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://www.paypal.com/sdk/js?client-id=AWQ2TJAYsaiUc_PSmwqorH5qvID1YFAkcdkJPEYcoNcHhzIE14ogVZac3cnZq3Pj0tmNn86_o8dJffUi&currency=USD"></script>
</head>
<body>
<div id="paypal-button-container"></div>
        <script>
        paypal.Buttons(
        {
            style:
            {
                color:'blue',
                shape: 'pill',
                label: 'pay'
            },
        createOrder: function(data, actions)
        {
            return actions.order.create(
                {
                purchase_units:[
                {
                    amount:
                    {
                        value: 30
                    }
                }]

            });
        },
        onApprove: function(data, actions){

            actions.order.capture().then(function (detalles){
                window.location.href="completo.php"
            });
        },
        onCancel: function(data)
        {
            alert("Pago cancelado");
            console.log(data);
        }
    }).render('#paypal-button-container');
        </script>
</body>
</html>