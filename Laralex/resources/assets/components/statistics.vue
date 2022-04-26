<template>
  <div class="min-h-screen w-full bg-slate-100">
    <apexchart width="500" height="500" type="bar" :series="chartData"></apexchart>
  </div>
</template>

<script>


export default {
  name: "statistics",

  components: {

  },
  data() {
    return {
      chartData: [
        {
          name: "Offen",
          data: [1500, 24]
        }
      ]
    }
  },

  created() {
    fetch("http://127.0.0.1:8000/laralex/api/getRevenue")
        .then(response => response.json())
        .then(data => this.chartData = data)
  },

  methods: {

  }

}
</script>
