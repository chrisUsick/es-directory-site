<template>
  <div>
    <div>
      <button v-if="!promoCode" v-on:click="generatePromoCode">Generate promo Code</button>
    </div>

    <div v-if="promoCode">
      <p>Take a screenshot or remember the following code:</p>
      <p class="promo-code">
        <strong>{{promoCode.code}}</strong>
      </p>
    </div>
    <canvas id="qr"></canvas>
  </div>
</template>
<script>
  import QRious from 'qrious' 
  import api from '../api'
  export default {
    props: {
      'promotionId': Number},
    data() {
      return {
        promoCode: null
      }
    },
    methods: {
      generatePromoCode() {
        api.post(`promotions/${this.promotionId}`)
          .then(({data}) => {
            this.promoCode = data;
            let element = document.getElementById('qr');
            const hostname = window.location.hostname
            const scheme = window.location.scheme || 'http'
            let qr = new QRious({
              element: element,
              value: `${process.env.APP_URL}/promotions/validate/${this.promoCode.id}`,
              size: 200
            });
            console.log(this.promoCode);
          });
      }
    }
  }
</script>