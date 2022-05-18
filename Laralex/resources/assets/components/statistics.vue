<template>
  <div class="min-h-screen bg-slate-50">
    <div class="px-6">
      <h1 class="py-6 text-3xl font-semibold text-slate-700">Statistiken</h1>

      <div class="flex flex-col gap-6 md:flex-row">
        <transition-group
          enter-active-class="duration-200 ease-out"
          enter-from-class="transform opacity-0"
          enter-to-class="opacity-100"
        >
          <div
            v-if="this.openRevenue.length"
            class="rounded-xl bg-slate-50 shadow"
          >
            <h1
              class="mb-1 rounded-t-xl bg-orange-500 py-2 text-center font-semibold text-slate-50 shadow"
            >
              Offene Forderungen
            </h1>
            <apexchart
              :options="chartOptionsRevenue"
              :series="openRevenue"
              height="200"
              type="donut"
              width="200"
              class="flex flex-col items-center"
            />
          </div>

          <div
            v-if="this.invoiceCount.length"
            class="rounded-xl bg-slate-50 shadow"
          >
            <h1
              class="mb-1 rounded-t-xl bg-blue-500 py-2 text-center font-semibold text-slate-50 shadow"
            >
              Offene Rechnungen
            </h1>
            <apexchart
              :options="chartOptionsInvoices"
              :series="invoiceCount"
              height="200"
              type="donut"
              width="200"
              class="flex flex-col items-center"
            ></apexchart>
          </div>

          <div
            v-if="this.customerData.length"
            class="rounded-xl bg-slate-50 shadow"
          >
            <h1
              class="mb-1 rounded-t-xl bg-emerald-500 py-2 text-center font-semibold text-slate-50 shadow"
            >
              Kunden
            </h1>
            <apexchart
              :options="chartOptionsCustomer"
              :series="customerData"
              height="200"
              type="donut"
              width="200"
              class="flex flex-col items-center"
            ></apexchart>
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
      chartOptionsRevenue: {
        colors: ["#fb923c"],
        legend: {
          show: false,
        },

        chart: {
          id: "openRevenue-chart",
        },
        dataLabels: {
          enabled: false,
        },
        plotOptions: {
          pie: {
            donut: {
              size: "75%",
              labels: {
                show: true,
                name: {
                  show: true,
                },
                total: {
                  show: true,
                  label: ["Gesamt"],
                  formatter: function (w) {
                    return (
                      parseFloat(w.globals.seriesTotals)
                        .toFixed(2)
                        .toLocaleString() + " EUR"
                    );
                  },
                },
                value: {
                  fontSize: "16px",
                  fontWeight: "bold",
                },
              },
            },
          },
        },
        labels: ["Offene Forderungen"],
      },
      chartOptionsInvoices: {
        colors: ["#60a5fa"],
        legend: {
          show: false,
        },
        chart: {
          id: "totalPendingInvoices-chart",
        },
        dataLabels: {
          enabled: false,
        },
        plotOptions: {
          pie: {
            donut: {
              size: "75%",
              labels: {
                show: true,
                name: {
                  show: true,
                },
                total: {
                  show: true,
                  label: ["Gesamt"],
                },
                value: {
                  fontWeight: "bold",
                },
              },
            },
          },
        },
        labels: ["Offene Rechnungen"],
      },
      chartOptionsCustomer: {
        colors: ["#ef4444", "#10b981"],
        legend: {
          show: false,
        },
        chart: {
          id: "customerDistribution-chart",
        },
        dataLabels: {
          enabled: false,
        },
        plotOptions: {
          pie: {
            donut: {
              size: "75%",
              labels: {
                show: true,
                name: {
                  show: true,
                },
                value: {
                  show: true,
                  offsetY: 6,
                  fontSize: "16px",
                  fontWeight: "bold",
                },
                total: {
                  show: true,
                  label: ["Gesamt"],
                },
              },
            },
          },
        },
        labels: ["Unternehmen", "Privatkunden"],
      },
      apiData: {},
      openRevenue: [],
      invoiceCount: [],
      customerData: [],
    };
  },

  created() {
    fetch("http://127.0.0.1:8000/laralex/api/getRevenue")
      .then((response) => response.json())
      .then((data) => {
        this.invoiceCount[0] = data.countInvoices;
        this.openRevenue[0] = parseFloat(data.openRevenue)
          .toFixed(2)
          .toLocaleString();
      });

    fetch("http://127.0.0.1:8000/laralex/api/getContactsCount")
      .then((response) => response.json())
      .then((data) => {
        this.customerData[0] = data.companyCount;
        this.customerData[1] = data.personCount;
      });
  },

  computed: {},

  methods: {},
};
</script>
