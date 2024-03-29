/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

//window.Vue= require('vue').default;

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */



const app = createApp({});

import OriginSearchComponent from './components/OriginSearchComponent.vue';
import DestinationSearchComponent from "./components/DestinationSearchComponent.vue";
import PassengersComponents from "./components/PassengersComponents.vue";
import CalendarComponent from "./components/CalendarComponent.vue";
import AirportsComponent from "./components/AirportsComponent.vue";
import RatingComponent from "./components/RatingComponent.vue";
import ImageInputComponent from "./components/ImageInputComponent.vue";
import QuestionComponent from "./components/QuestionComponent.vue";
import MoreInfoComponent from "./components/MoreInfoComponent.vue";
import PriceCheckController from "./components/PriceCheckController.vue";
import LoadingComponent from "./components/LoadingComponent.vue";

app.component('origin-search-component', OriginSearchComponent);
app.component('destination-search-component', DestinationSearchComponent);
app.component('passengers-component', PassengersComponents);
app.component('calendar-component', CalendarComponent);
app.component('airports-component', AirportsComponent);
app.component('rating-component', RatingComponent);
app.component('image-input-component', ImageInputComponent);
app.component('question-component', QuestionComponent);
app.component('more-info-component', MoreInfoComponent);
app.component('price-check-component', PriceCheckController);
app.component('loading-component', LoadingComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');
/*
    Vue.component('origin-search-component', require('./components/OriginSearchComponent.vue').default);

const app = new Vue({
    el:'#app',
})
*/
