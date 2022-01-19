const res = require("express/lib/response");

paypal.Buttons({
    createOrder: function() {
        return fetch('/create-order', {
            method: "POST",
            headers:{
                "Content-Type": 'application/json'
            },
            body: JSON.stringify({
                items: [
                    {
                        //Not enough time to learn how to get data from the database, this step will be hardcoded
                        id:1,
                        quantity:1
                    },                   
                ],
            }),
        }).then(res => {
            if(res.ok) return res.json()
            return res.json.then(json => Promise.reject(json))
        }).then(({id}) => {
            return id
        }).catch(e => {
            console.error(e.error)
        })
    },
    onApprove: function(data, actions) {
        // This function captures the funds from the transaction.
        return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        alert('Transaction completed by ' + details.payer.name.given_name);
        
        });
    }
}).render('#paypal');