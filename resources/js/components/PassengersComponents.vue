<template>
    <fieldset class="first_input p-0 col-1 h-60px m-0 col-lg col-6 position-relative">
        <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Пассажиры, класс</legend>
        <input class="bg-transparent border-0 ms-2 p-0 h-100" name="passengers_amount" @click="toggleCard" type="text" v-model="total" readonly/>

        <div class="card position-absolute mt-3 top-100 z-3" v-if="isCardVisible" ref="card" id="card">
            <ul class="list-group border-0">
                <li class="list-group-item border-0 select-item">

                    <div class="row">
                        <div class="col-7">
                            <p class="my-1">Взрослые</p>
                            <p class="m-0 fs-12px opacity-50">12 лет и старше</p>
                        </div>

                        <div class="col-5 row">
                            <div @click="decrement(1)" class="col-4 d-flex bg-light rounded-circle text-black-200 p-0 btn">
                                <i class="fas fa-minus m-auto"></i>
                            </div>
                            <input name="passengers[adults]" v-model="counter1" class="col-4"/>
                            <div @click="increment(1)" class="col-4 d-flex bg-light rounded-circle text-black-200 p-0 btn">
                                <i class="fas fa-plus m-auto"></i>
                            </div>
                        </div>
                    </div>

                </li>

                <li class="list-group-item border-0 select-item">

                    <div class="row">
                        <div class="col-7">
                            <p class="my-1">Дети</p>
                            <p class="m-0 fs-12px opacity-50">От 2 до 12 лет</p>
                        </div>

                        <div class="col-5 row">
                            <div @click="decrement(2)" class="col-4 d-flex bg-light rounded-circle text-black-200 p-0 btn">
                                <i class="fas fa-minus m-auto"></i>
                            </div>
                            <input name="passengers[children]" v-model="counter2" class="col-4"/>
                            <div @click="increment(2)" class="col-4 d-flex bg-light rounded-circle text-black-200 p-0 btn">
                                <i class="fas fa-plus m-auto"></i>
                            </div>
                        </div>
                    </div>

                </li>

                <li class="list-group-item border-0 select-item">

                    <div class="row">
                        <div class="col-7">
                            <p class="my-1">Младенцы</p>
                            <p class="m-0 fs-12px opacity-50">До 2 лет, без места</p>
                        </div>

                        <div class="col-5 row">
                            <div @click="decrement(3)" class="col-4 d-flex bg-light rounded-circle text-black-200 p-0 btn">
                                <i class="fas fa-minus m-auto"></i>
                            </div>
                            <input name="passengers[infants]" v-model="counter3" class="col-4"/>
                            <div @click="increment(3)" class="col-4 d-flex bg-light rounded-circle text-black-200 p-0 btn">
                                <i class="fas fa-plus m-auto"></i>
                            </div>
                        </div>
                    </div>

                </li>
            </ul>

            <div class="container pb-2">
                <div class="row bg-light m-2 rounded-2 border-3 border border-light h-35px">
                    <label :class="{ 'active': selectedOption === 'option1' }" class="col-6 rounded-1 d-flex class-select">
                        <input class="d-none" type="radio" name="trip_class" value="0" @change="handleChange('option1')" checked>
                        <p class="m-auto">Эконом</p>
                    </label>

                    <label :class="{ 'active': selectedOption === 'option2' }" class="col-6 rounded-1 d-flex class-select">
                        <input class="d-none" type="radio" name="trip_class" value="1" @change="handleChange('option2')">
                        <p class="m-auto">Бизнес</p>
                    </label>
                </div>
            </div>
        </div>
    </fieldset>
</template>

<script>
export default {
    data() {
        return {
            isCardVisible: false,

            counter1: window.requestData['passengers']['adults'],
            counter2: window.requestData['passengers']['children'],
            counter3: window.requestData['passengers']['infants'],
            total: window.requestData['passengers_amount'],

            selectedOption: 'option1',
        };
    },

    methods: {
        toggleCard()
        {
            this.isCardVisible = !this.isCardVisible;
        },
        increment(counterNumber)
        {
            this['counter' + counterNumber]++;
            this.updateTotal();
        },
        decrement(counterNumber)
        {
            if (counterNumber === 1 && this['counter' + counterNumber] <= 1) {
                return; // не допускаем уменьшение counter1 меньше 1
            }

            if (counterNumber > 1 && this['counter' + counterNumber] <= 0) {
                return; // не допускаем уменьшение counter1 меньше 1
            }

            this['counter' + counterNumber]--;
            this.updateTotal();
        },
        updateTotal()
        {
            this.total = this.counter1 + this.counter2 + this.counter3;
            if(this.total===1)
            {
                this.total=this.total + ' пассажир';
            }
            if(this.total>1 && this.total<5)
            {
                this.total=this.total + ' пассажира';
            }
            if(this.total>=5)
            {
                this.total=this.total + ' пассажиров';
            }
        },

        handleChange(selected) {
            this.selectedOption = selected;
        },
    },
};
</script>

<style scoped>
.card
{
    width: 150%;
    left: 0;
}

.btn
{
    width: 29px;
    height: 29px;
    margin: auto;
}

.class-select
{
    opacity: .5;
}

.active
{
    background-color: #fff;
    opacity: 1;
    transition: .2s;
}

</style>
