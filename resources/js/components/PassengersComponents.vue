<template>
    <fieldset class="first_input p-0 col-1 h-60px m-0 col-lg col-6 position-relative">
        <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Пассажиры, класс</legend>
        <input class="bg-transparent border-0 ms-2 p-0 h-100" name="passengers" @click="toggleCard" type="text" v-model="total" />

        <div class="card position-absolute mt-3 w-100" v-if="isCardVisible" ref="card" id="card">
            <ul class="list-group border-0">
                <li class="list-group-item border-0 select-item border-bottom border-1 row">
                    <div class="col-8">
                        <p class="my-1">Взрослые</p>
                        <p class="m-0 fs-12px opacity-50">12 лет и старше</p>
                    </div>
                    <div class="col-4">
                        <div @click="decrement(1)" class="counter-button">-</div>
                        <input v-model="counter1" />
                        <div @click="increment(1)" class="counter-button">+</div>

                        <div @click="decrement(2)" class="counter-button">-</div>
                        <input v-model="counter2" />
                        <div @click="increment(2)" class="counter-button">+</div>

                        <div @click="decrement(3)" class="counter-button">-</div>
                        <input v-model="counter3" />
                        <div @click="increment(3)" class="counter-button">+</div>
                    </div>
                </li>
            </ul>
        </div>
    </fieldset>
</template>

<script>
import CounterComponent from '@/components/CounterComponent.vue'; // Замените '@/components/CounterComponent.vue' на путь к вашему компоненту

export default {
    components: {
        'counter-component': CounterComponent,
    },
    data() {
        return {
            isCardVisible: false,
            counter1: 1,
            counter2: 0,
            counter3: 0,
            total: 1,
        };
    },

    methods: {
        toggleCard() {
            this.isCardVisible = !this.isCardVisible;
        },
        increment(counterNumber) {
            this['counter' + counterNumber]++;
            this.updateTotal();
        },
        decrement(counterNumber) {
            if (counterNumber === 1 && this['counter' + counterNumber] <= 1) {
                return; // не допускаем уменьшение counter1 меньше 1
            }

            this['counter' + counterNumber]--;
            this.updateTotal();
        },
        updateTotal() {
            this.total = this.counter1 + this.counter2 + this.counter3;
        },
    },
};
</script>

<style scoped>
/* Ваши стили для элемента card */
</style>
