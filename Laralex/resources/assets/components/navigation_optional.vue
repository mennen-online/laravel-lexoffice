<template>
  <div class="bg-slate-100 h-12">
    <div class="flex flex-row p-2">
      <div :class="[!visible ? 'block' : 'hidden']">
        <button class="block md:hidden mx-auto text-slate-900" @click="toggleMobile">
          <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-8 w-8"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
          >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M4 6h16M4 12h16M4 18h16"
            />
          </svg>
        </button>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  props: ["visible"],
  name: "navigation_optional",
  methods: {
    toggleMobile() {
      this.$emit("toggleMobile")

    }
  }
}
</script>

<style scoped>

</style>