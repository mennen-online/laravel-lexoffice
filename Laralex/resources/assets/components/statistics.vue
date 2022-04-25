<template>
  <div class="min-h-screen w-full bg-slate-100">
    <chart-donut :chart-data="chartData"></chart-donut>
  </div>
</template>

<script>
import chartDonut from "./chart_Donut.vue";

export default {
  name: "statistics",

  components: {
    chartDonut
  },
  data() {
    return {
      chartData: []
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
