import axios from "axios";

export default {
    template: `
        <div class="container mt-5 mb-5">
            <h4>Subscribe for email notification on price exceeded</h4>
            <div class="row">
                <div class="col-md-12 mt-5">
                    <form @submit.prevent="subscribe">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" id="email" v-model="subscriberEmail" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price" id="price" v-model="subscriberPrice" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    `,
    data() {
        return {
            subscriberEmail: '',
            subscriberPrice: ''
        }
    },
    methods: {
        subscribe() {
            axios
                .post('/subscribe', {
                    'email': this.subscriberEmail,
                    'price': this.subscriberPrice
                })
                .then(response => {
                    this.subscriberEmail = '';
                    this.subscriberPrice = '';
                    alert('Successfully subscribed!');
                })
                .catch(function (error) {
                    alert(error.response.data.message);
                });
        }
    }
}
