<template>
</template>

<script>
import {Doughnut} from "vue-chartjs"

export default {
  name: "chart_Donut",
  props: {
    label: {
      type: String
    },
    chartData: {
      type: Array
    },
    options: {
      type: Object
    }
  },
  mounted() {
    const revenue = this.chartData.map(d => d.openRevenue)
    const count = this.chartData.map(d => d.countInvoices)
  }
}
</script>

<style scoped>

</style>