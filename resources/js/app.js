import './bootstrap';
import { createApp } from 'vue';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import BudgetCars from './components/BudgetCars.vue'
import Diagnostics from './components/Diagnostics.vue'

const app = createApp()

app.component("cars", BudgetCars)
app.component("diagnostic", Diagnostics)

app.mount('#app')