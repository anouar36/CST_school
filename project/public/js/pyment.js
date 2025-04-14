var prix = document.getElementById('price').value;
var couersId = document.getElementById('courseId').value;

console.log(prix);
console.log(couersId);
   
paypal.Buttons({
createOrder: function(data, actions) {
return actions.order.create({
    purchase_units: [{
        amount: {
            value: prix 
        }
    }]
});
},




onApprove: function(data, actions) {
return actions.order.capture().then(function(details) {
    fetch('http://localhost:82/verifyPayment', {
        
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            orderID: data.orderID,
            payerID: details.payer.payer_id,
            // dateStarte: dateStarte,  
            // dateFine: dateFine,
            // prixTotale: prixTotale,
            // days: days,
            // prix: prix
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/student/`;
        
            // Create a hidden input to send orderID
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'orderID';
            input.value = data.orderID;

            const input2 = document.createElement('input');
            input2.type = 'hidden';
            input2.name = 'courseId';
            input2.value = couersId;
        
            // Append input to the form
            form.appendChild(input);
            form.appendChild(input2);
        
            // Append the form to the body and submit it
            document.body.appendChild(form);
            form.submit();
        } else {
            alert(data.message || 'Piyment is not successful');
        }
    })
    .catch(error => {
        console.error('sum erorr is hupen', error);
        alert('sum erorr is hupen ples call seporte');
    });
});
}
}).render('#paypal-button-container');