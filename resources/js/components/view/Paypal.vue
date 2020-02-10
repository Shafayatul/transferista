<template>
    <div>
        <PayPal
            :amount="this.project.project_amount"
            currency="USD"
            :client="credentials"
            env="sandbox"
            :invoice-number="randdomStrGenerate"
            :items="myItems"
            :experience="experienceOptions"
                
            v-on:payment-authorized="onAuthorize"
            v-on:payment-completed="onCompleted"
            v-on:payment-cancelled="onCancelled">
        </PayPal>
    </div>
</template>
<script>
import PayPal from 'vue-paypal-checkout'
export default {
    props:['project','t_id'],
    name : "Paypal",
    data() {
        return {
            credentials: {
                sandbox: 'AaGXgceJ05kV4AoQi57VUPRFWE3j9KMBwnywIr_01A_T-saey5wSc-rB6WJbguvH-zUAkmnOobAkneQ1',
                // production: '<production client id>'
            },
            myItems: [
                {
                    "name":this.project.project_title,
                    "description": this.project.project_description,
                    "quantity": "1",
                    "price": parseFloat(this.project.project_amount),
                    "currency": "USD"
                },
            ],
            experienceOptions: {
                input_fields: {
                    no_shipping: 1
                }
            },
            data: {
                transferista_id: this.project.transferista_id,
                project_id:this.project.id,
                amount: this.project.project_amount 
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
            // const vue = this;
            // console.log(data);

            // vue.$on('payment-authorized', data);
            // if (this.commit) {
            //     return actions.payment.execute().then((response) => {
            //         console.log('kjljklj');
                    // vue.$emit('payment-completed', response);
                    // axios.post("api/payment/success").then(({response}) => (this.data = response));
            //     });
            // }
            // return true;
        },
        onCompleted(data){
            
            console.log('-------')
            console.log('complete')
            axios.post("/api/payment/success", this.data)
            .then(res=>{
                EventBus.$emit('Paid',this.project.id)
            });
        },
        onCancelled(data){
            console.log('-------')
            // console.log(data)
        }
    },
    mounted(){
            // this.$on('payment-authorized', (data)=>{
            //     console.log('dhbcdhjbshjc')
            //     console.log(data)
            // });
            // this.$on('payment-completed', (data)=>{
            //     console.log('dhbcdhjbshjc')
            //     console.log(data)
            // });
            // this.$on('payment-cancelled', (data)=>{
            //     console.log('dhbcdhjbshjc')
            //     console.log(data)
            // });
            
    }

}
</script>