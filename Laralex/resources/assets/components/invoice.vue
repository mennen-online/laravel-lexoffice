<template>
  <div
    class="fixed flex min-h-screen w-full items-center justify-center backdrop-blur-sm backdrop-brightness-[.33]"
  >
    <div
      class="flex h-96 w-full max-w-3xl flex-col rounded-lg bg-slate-50 shadow-lg"
    >
      <div class="flex items-center justify-between border-b p-2">
        <div class="flex flex-row">
          <span class="text-slate-300 transition hover:text-slate-600">
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
                d="M15 19l-7-7 7-7"
              />
            </svg>
          </span>

          <span class="text-slate-300 transition hover:text-slate-600">
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
                d="M9 5l7 7-7 7"
              />
            </svg>
          </span>
        </div>

        <div>{{ this.invoiceID }}</div>

        <button
          class="text-slate-300 transition hover:text-slate-600"
          @click="this.$emit('closeModal')"
        >
          <svg
            class="h-8 w-8"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M6 18L18 6M6 6l12 12"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </button>
      </div>

      <div class="flex-grow p-2">Content</div>

      <div class="border-t p-2">Lower</div>
    </div>
  </div>
</template>

<script>
export default {
  name: "invoice",
  props: ["invoiceID"],
};
</script>

<style scoped></style>
