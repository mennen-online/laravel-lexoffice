import {createApp} from "vue"
import laralex from "../components/laralex.vue"

const app = createApp({})
app
    .component("laralex", laralex)

app.mount('#app')