import {createApp} from "vue"
import VueApexCharts from "vue3-apexcharts"
import laralex from "../components/laralex.vue"

const app = createApp({})
app
    .component("laralex", laralex)
    .use(VueApexCharts)

app.mount('#app')