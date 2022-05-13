<template>
  <div class="w-full min-h-screen h-full bg-slate-100 flex flex-col px-6">

    <div class="z-0">
      <div
          class="flex flex-row justify-between mb-4 text-slate-900 items-baseline px-2"
      >
        <div>
          <p class="text-3xl font-semibold text-slate-700">Kontakte</p>
        </div>

        <div class="flex flex row">
          <p>Seite {{ this.page + 1 }} von {{ totalPages + 1 }}</p>
          <div class="flex flex-row ml-4 gap-2">
            <svg
                class="h-6 w-6 outline outline-1 rounded-sm outline-slate-500 transition cursor-pointer hover:scale-105 ease-out relative"
                fill="none"
                stroke="currentColor"
                stroke-width="1"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                @click="pageDown()"
            >
              <path
                  d="M15 19l-7-7 7-7"
                  stroke-linecap="round"
                  stroke-linejoin="round"
              />
            </svg>

            <svg
                class="h-6 w-6 outline outline-1 rounded-sm outline-slate-500 transition cursor-pointer hover:scale-105 ease-out relative"
                fill="none"
                stroke="currentColor"
                stroke-width="1"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                @click="pageUp"
            >
              <path
                  d="M9 5l7 7-7 7"
                  stroke-linecap="round"
                  stroke-linejoin="round"
              />
            </svg>
          </div>
        </div>
      </div>

      <div
          class="w-full min-h-screen bg-slate-50 rounded-xl shadow overflow-hidden mb-8"
      >
        <table
            v-if="this.entries.length"
            class="w-full h-full text-left align-baseline"
        >
          <th class="bg-blue-300 text-lg font-semibold px-4 py-1">Vorname</th>
          <th class="bg-blue-300 text-lg font-semibold px-4 py-1">Nachname</th>
          <th class="bg-blue-300 text-lg font-semibold px-4 py-1">
            Kundennummerr
          </th>
          <th class="bg-blue-300 text-lg font-semibold px-4 py-1">Rechnungen</th>
          <template v-for="entry in entries">
            <template v-for="a in entry">
              <template v-if="a.firstName">
                <tr class="even:bg-slate-100">
                  <td class="px-4 py-1">
                    {{ a.firstName }}
                  </td>
                  <td class="px-4 py-1">
                    {{ a.lastName }}
                  </td>
                  <td class="px-4 py-1">
                    {{ entry["roles"]["customer"]["number"] }}
                  </td>
                  <td class="px-4 py-1">
                    <button @click="">
                      <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="h-6 w-6"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                          stroke-width="2"
                      >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z"
                        />
                      </svg>
                    </button>
                  </td>
                </tr>
              </template>
              <template v-else-if="a['name']">
                <tr class="even:bg-slate-100">
                  <td class="px-4 py-1">
                    {{ a.name }}
                  </td>
                  <td class="px-4 py-1">--</td>
                  <td class="px-4 py-1">
                    {{ entry["roles"]["customer"]["number"] }}
                  </td>
                  <td class="px-4 py-1">
                    <button @click="showInvoice(entry.id)">
                      <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="h-6 w-6"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                          stroke-width="2"
                      >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z"
                        />
                      </svg>
                    </button>
                  </td>
                </tr>
              </template>
            </template>
          </template>
        </table>
        <div
            v-if="!this.entries.length"
            class="flex justify-center w-full min-h-screen h-full items-center"
        >
          <svg
              class="animate-spin w-16 h-16"
              fill="none"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
          >
            <path
                clip-rule="evenodd"
                d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                fill="currentColor"
                fill-rule="evenodd"
                opacity="0.2"
            />
            <path
                d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z"
                fill="currentColor"
            />
          </svg>
        </div>
      </div>
    </div>

    <div id="invoice" class="z-20">
      <invoice v-if="true" :invoiceID="this.invoiceID" class="">

      </invoice>
    </div>
  </div>
</template>

<script>
import invoice from "./invoice.vue";

export default {
  name: "contacts",
  components: {
    invoice,
  },
  data() {
    return {
      page: 0,
      totalPages: 0,
      size: 20,
      invoiceID: "",
      invoiceVisible: false,
      entries: [],
    };
  },
  methods: {
    pageUp() {
      if (this.page !== this.totalPages) {
        this.page++;
      }
    },

    pageDown() {
      if (this.page !== 0) {
        this.page--;
      }
    },

    showInvoice(id) {
      this.invoiceID = id;
      this.invoiceVisible = true;
    },

    async getData() {
      fetch(
        "http://127.0.0.1:8000/laralex/api/getAllContacts/" +
          "?page=" +
          this.page +
          "&size=" +
          this.size
      )
        .then((response) => response.json())
        .then((data) => {
          this.entries = data.data;
          this.totalPages = data.pages;
        });
    },
  },
  watch: {
    page(newPage, oldPage) {
      if (newPage !== oldPage) {
        this.entries = [];
        this.getData();
      }
    },
  },
  created() {
    this.getData();
  },
};
</script>
