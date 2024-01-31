import { createApp, h } from "vue";
import "./reset.css";
import "./styles.css";
import App from "./App.vue";
import { httpServiceToken } from "./types/injection-tokens";
import { HttpService } from "./services/http.service";
import { createPinia } from "pinia";

const app = createApp(App);
const pinia = createPinia();
app.provide(httpServiceToken, new HttpService());

app.use(pinia);
app.mount("#app");
