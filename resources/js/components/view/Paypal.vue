<template>
    <div>
        <PayPal
            amount="15.00"
            currency="USD"
            :client="credentials"
            env="sandbox"
            :invoice-number="randdomStrGenerate"
            :items="myItems"
            :experience="experienceOptions"
            notify-url="http://localhost:8000/api/payment/success">
        </PayPal>
        
    </div>
</template>
<script>
import PayPal from 'vue-paypal-checkout'
export default {
    name : "Paypal",
    data() {
        return {
            credentials: {
                sandbox: 'AaGXgceJ05kV4AoQi57VUPRFWE3j9KMBwnywIr_01A_T-saey5wSc-rB6WJbguvH-zUAkmnOobAkneQ1',
                // production: '<production client id>'
            },
            myItems: [
                {
                    "name": "dfsdfds",
                    "description": "fdsfds",
                    "quantity": "1",
                    "price": "15",
                    "currency": "USD"
                },
            ],
            experienceOptions: {
                input_fields: {
                    no_shipping: 1
                }
            }
        }
    },
    components: {
        PayPal
    },
    computed : {
        randdomStrGenerate(){
            var length = 8;
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }
    },
    methods : {
        onAuthorize(data, actions) {
            const vue = this;
            console.log('kjljklj');
            vue.$on('payment-authorized', data);
            if (this.commit) {
                return actions.payment.execute().then((response) => {
                    // vue.$emit('payment-completed', response);
                    axios.post("api/payment/success").then(({response}) => (this.data = response));
                });
            }
            // return true;
        },
    }

}
</script>