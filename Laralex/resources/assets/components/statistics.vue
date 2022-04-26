<template>
  <div class="min-h-screen w-full bg-slate-100">
      <div class="flex flex-row shadow">
        <apexchart :options="chartOptions" :series="series" type="donut" height="150" v-if="this.series.length"></apexchart>
        <apexchart :options="chartOptionsInvoices" :series="invoiceCount" type="donut" height="150" v-if="this.series.length"></apexchart>
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
        colors: ["#fb923c"],
        stroke: {
          show: true,
          colors: ["#f97316"]
        },
        legend: {
          show: false
        },

        chart: {
          id: "pendingInvoices-chart"
        },
        dataLabels: {
          enabled: false
        },
        plotOptions: {
          pie: {
            donut: {
              size: "75%",
              labels: {
                show: true,
                name: {
                  show:false
                },
                value: {
                  show: true,
                  offsetY: 8,
                  fontSize: "12px",
                  fontWeight: "bold",
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
        colors: ["#60a5fa"],
        stroke: {
          show: true,
          colors: ["#3b82f6"]
        },
        legend: {
          show: false
        },
        chart: {
          id: "totalPendingInvoices-chart"
        },
        dataLabels: {
          enabled: false
        },
        plotOptions: {
          pie: {
            donut: {
              size: "75%",
              labels: {
                show: true,
                name: {
                  show:false
                },
                value: {
                  show: true,
                  offsetY: 8
                }

              }
            }
          }
        },
        labels: ['Offene Rechnungen']
      },
      apiData: {},
      series: [],
      invoiceCount: []
    }
  },

  created() {
    fetch("http://127.0.0.1:8000/laralex/api/getRevenue")
        .then(response => response.json())
        .then(data => {
          this.invoiceCount[0] = data.countInvoices;
          this.series[0] = parseFloat(data.openRevenue).toFixed(2);
        })
  },

  computed: {
  },

  methods: {},

}
</script>
