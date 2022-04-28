<template>
  <div class="min-h-screen bg-slate-100">
    <div class="h-12 shadow"></div>
    <div class="p-6">
      <div class="flex md:flex-row flex-col gap-6">
        <transition-group
          enter-active-class="duration-200 ease-out"
          enter-from-class="transform opacity-0"
          enter-to-class="opacity-100"
        >
          <div
            v-if="this.openRevenue.length"
            class="bg-slate-50 rounded-xl shadow"
          >
            <h1
              class="text-center text-slate-50 font-semibold mb-1 py-2 shadow bg-orange-500 rounded-t-xl"
            >
              Offene Forderungen
            </h1>
            <apexchart
              :options="chartOptionsRevenue"
              :series="openRevenue"
              height="200"
              type="donut"
              width="200"
              class=" flex flex-col items-center"
            />
          </div>

          <div
            v-if="this.invoiceCount.length"
            class="bg-slate-50 rounded-xl shadow"
          >
            <h1
              class="text-center text-slate-50 font-semibold mb-1 py-2 shadow bg-blue-500 rounded-t-xl"
            >
              Offene Rechnungen
            </h1>
            <apexchart
              :options="chartOptionsInvoices"
              :series="invoiceCount"
              height="200"
              type="donut"
              width="200"
              class=" flex flex-col items-center"
            ></apexchart>
          </div>

          <div
            v-if="this.customerData.length"
            class="bg-slate-50 rounded-xl shadow"
          >
            <h1
              class="text-center text-slate-50 font-semibold mb-1 py-2 shadow bg-emerald-500 rounded-t-xl"
            >
              Kunden
            </h1>
            <apexchart
              :options="chartOptionsCustomer"
              :series="customerData"
              height="200"
              type="donut"
              width="200"
              class=" flex flex-col items-center"
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
