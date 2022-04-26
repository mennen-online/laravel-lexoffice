<template>
  <div class="min-h-screen w-full bg-slate-100">
    <div>
      <apexchart :options="chartOptions" :series="series" type="donut" width="500"></apexchart>
      <apexchart :options="chartOptionsInvoices" :series="seriesInvoices" type="donut" width="500"></apexchart>
    </div>
  </div>
</template>

<script>


export default {
  name: "statistics",

  components: {},
  data() {
    return {
      chartOptions: {
        chart: {
          id: "pendingInvoices-chart"
        },
        dataLabels: {
          enabled: false
        },
        plotOptions: {
          pie: {
            donut: {
              labels: {
                show: true,
                value: {
                  formatter: function (val) {
                    return val + " EUR"
                  }
                }
              }
            }
          }
        },
        labels: ['Offene Forderungen']
      },
      chartOptionsInvoices: {
        chart: {
          id: "totalPendingInvoices-chart"
        },
        dataLabels: {
          enabled: false
        },
        plotOptions: {
          pie: {
            donut: {
              labels: {
                show: true
              }
            }
          }
        },
        labels: ['Offene Rechnungen']
      },
      apiData: {},
      series: [1520],
      seriesInvoices: [25]

    }
  },

  created() {
    fetch("http://127.0.0.1:8000/laralex/api/getRevenue")
        .then(response => response.json())
        .then(data => this.apiData = data)
  },

  methods: {},

}
</script>
