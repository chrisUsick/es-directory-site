<template>
  <div>
    <select class="custom-select" v-model="selected">
      <option v-for="city in computedCities" :key="city.id" :value="city">{{city.name}}</option>
    </select>
  </div>
</template>
<script>
  export default {
    props: {
      cities: Array
    }
      ,
    data() {
      return {
        computedCities: [],
        selected: {}
      }
    },
    mounted: function() {
      const cities = [{id: -1, name: 'Select a city...'}]
      this.selected = cities[0]
      console.log(this.cities)
      this.computedCities = cities.concat(this.cities);
    },

    updated: function() {
      console.log(arguments)
      if (this.selected.id != -1) {
        window.location.href = `/${this.selected.slug}`
      }
    }
  }
</script>