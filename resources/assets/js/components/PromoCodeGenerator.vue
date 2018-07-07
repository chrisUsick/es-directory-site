<template>
  <div>
    <div>
      <button v-if="!promotion" v-on:click="generatePromoCode">Generate promo Code</button>
    </div>

    <div v-if="promotion">
      <p>Take a screenshot or remember the following code</p>
      <p class="promoCode">{{promotion.code}}</p>
    </div>
    <canvas id="qr"></canvas>
  </div>
</template>
<script>
  import QRious from 'qrious' 
  export default {
    props: {
      'promotionId': Number},
    data() {
      return {
        promotion: null
      }
    },
    methods: {
      generatePromoCode() {
        fetch(`/api/promotions/${this.promotionId}`, {method: 'POST'})
          .then((promotion) => {
            this.promotion = promotion;
            let element = document.getElementById('qr');
            let qr = new QRious({
              element: element,
              value: `https://${window.location.hostname}/promotions/validate/${promotion.promotion_id}`,
              size: 200
            });
            console.log(this.promotion);
          });
      }
    }
  }
</script>