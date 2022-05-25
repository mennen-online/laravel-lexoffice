<template>
  <div class="min-h-screen bg-slate-50">
    <div class="">
      <div class="bg-slate-100">
        <h1 class="p-6 text-4xl font-semibold text-slate-700">Kunden</h1>
      </div>

      <div id="table" class="max-w-screen-2xl p-6">
        <div
          id="table-navigation"
          class="mb-4 flex flex-row items-center justify-between text-slate-900"
        >
          <div
            class="flex flex-row overflow-hidden rounded-lg bg-slate-100 px-2 py-1.5 text-slate-400 shadow-sm outline outline-2 outline-slate-200 focus-within:text-slate-600"
          >
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
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
              />
            </svg>

            <input
              type="text"
              class="ml-1.5 appearance-none bg-slate-100 focus:outline-0"
            />
          </div>

          <div class="flex flex-row items-center">
            <p class="text-lg text-slate-700">
              Seite {{ this.page + 1 }} von {{ totalPages + 1 }}
            </p>
            <div class="ml-4 flex flex-row gap-2">
              <svg
                class="relative h-7 w-7 cursor-pointer rounded-sm outline outline-1 outline-slate-500 transition ease-out hover:scale-105"
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
                class="relative h-7 w-7 cursor-pointer rounded-sm outline outline-1 outline-slate-500 transition ease-out hover:scale-105"
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

        <div class="">
          <table
            v-if="this.entries.length"
            class="h-full w-full text-left align-baseline outline outline-1 outline-slate-200"
          >
            <thead>
              <th
                class="bg-slate-200 px-4 py-1.5 text-2xl font-medium uppercase text-slate-600"
              >
                Vorname
              </th>
              <th
                class="bg-slate-200 px-4 py-1.5 text-2xl font-medium uppercase text-slate-600"
              >
                Nachname
              </th>
              <th
                class="bg-slate-200 px-4 py-1.5 text-2xl font-medium uppercase text-slate-600"
              >
                Kundennummer
              </th>
              <th
                class="bg-slate-200 px-4 py-1.5 text-2xl font-medium uppercase text-slate-600"
              >
                Rechnungen
              </th>
            </thead>
            <tbody>
              <template v-for="entry in entries">
                <template v-for="a in entry">
                  <template v-if="a.firstName">
                    <tr
                      class="bg-slate-50 align-middle text-lg text-slate-700 transition hover:bg-slate-100 hover:outline hover:outline-1 hover:outline-slate-200 hover:drop-shadow"
                    >
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
                        <button
                          @click="showInvoice(entry.id)"
                          class="align-middle text-slate-300 transition hover:text-slate-600"
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-7 w-7"
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
                    <tr
                      class="bg-slate-50 align-middle text-lg text-slate-700 transition hover:bg-slate-100 hover:outline hover:outline-1 hover:outline-slate-200 hover:drop-shadow"
                    >
                      <td class="px-4 py-1">
                        {{ a.name }}
                      </td>
                      <td class="px-4 py-1">--</td>
                      <td class="px-4 py-1">
                        {{ entry["roles"]["customer"]["number"] }}
                      </td>
                      <td class="px-4 py-1">
                        <button
                          @click="showInvoice(entry.id)"
                          class="align-middle text-slate-300 transition hover:text-slate-600"
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-7 w-7"
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
            </tbody>
          </table>
        </div>

        <div
          v-if="!this.entries.length"
          class="flow-row flex justify-center border bg-slate-50 p-80"
        >
          <svg
            class="h-16 w-16 animate-spin"
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

    <teleport to="#super">
      <transition
        enter-active-class="transition"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="transition"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
      >
        <invoice
          v-if="invoiceVisible"
          :invoiceID="this.invoiceID"
          @close-modal="this.invoiceVisible = false"
        >
        </invoice>
      </transition>
    </teleport>
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
