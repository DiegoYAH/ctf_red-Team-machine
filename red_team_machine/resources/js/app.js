// import './bootstrap';
import { createApp } from 'vue';
import Navigation from './components/Navigation.vue';

const navegacion = createApp({});
navegacion.component('navegacion-component', Navigation);
navegacion.mount("#app");