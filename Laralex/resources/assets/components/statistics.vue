<template>
  <div class="min-h-screen bg-slate-100">
    <div class="h-12 shadow">

    </div>
    <div class="p-6">
      <div class="flex flex-row gap-6">
        <transition-group enter-active-class="duration-200 ease-out" enter-from-class="transform opacity-0"
                          enter-to-class="opacity-100">
          <div v-if="this.series.length" class="bg-slate-50 rounded-xl shadow">
            <h1 class="text-center text-slate-50 font-semibold mb-1 py-2 shadow bg-orange-500 rounded-t-xl">Offene
              Forderungen</h1>
            <apexchart :options="chartOptions" :series="series" height="200" type="donut" width="200"/>
          </div>
          <div v-if="this.series.length" class="bg-slate-50 rounded-xl shadow">
            <h1 class="text-center text-slate-50 font-semibold mb-1 py-2 shadow bg-blue-500 rounded-t-xl">Offene Rechnungen</h1>
            <apexchart v-if="this.series.length" :options="chartOptionsInvoices" :series="invoiceCount" width="200" height="200"
                       type="donut"></apexchart>

          </div>
        </transition-group>
      </div>
    </div>
    <!--    <apexchart v-if="this.series.length" :options="chartOptions" :series="series" height="250" type="donut"></apexchart>-->

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
                  show: false
                },
                value: {
                  show: true,
                  offsetY: 6,
                  fontSize: "16px",
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
                  show: false
                },
                value: {
                  show: true,
                  offsetY: 6,
                  fontSize: "16px",
                  fontWeight: "bold"
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

  computed: {},

  methods: {},

}
</script>
