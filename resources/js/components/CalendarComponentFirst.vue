<template>
    <fieldset class="first_input brdr-b-l p-0 col-1 h-60px m-0 col-lg col-6 position-relative">
        <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Дата туда</legend>
        <input class="bg-transparent border-0 ms-2 p-0 h-100" style="width: 95%;" name="departDate" type="text" v-model="selectedDate" @click="toggleCalendar">


        <div class="card position-absolute top-100 mt-3" id="card" v-if="isCalendarVisible" @click.stop>
            <div class="card-body">
                <div class="row justify-content-between">

                    <div class="col-6 row justify-content-start">
                        <div class="col-4">
                            <div class="bg-light rounded-circle d-flex calend-btn" @click="prevMonth">
                                <i class="fas fa-chevron-left m-auto text-black-200"></i>
                            </div>
                        </div>
                        <div class="col-8 d-flex">
                            <h6 class="my-auto me-0 ms-auto">
                                {{ currentMonth }}
                            </h6>
                        </div>
                    </div>

                    <div class="col-6 row justify-content-end">
                        <div class="col-8 d-flex">
                            <h6 class="my-auto">
                                {{ nextMonth_ }}
                            </h6>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <div class="bg-light rounded-circle d-flex calend-btn" @click="nextMonth">
                                <i class="fas fa-chevron-right m-auto text-black-200"></i>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="calendar">
                            <div class="days">
                                <div v-for="day in daysInMonth" :key="day" @click="selectDay(day)">
                                    {{ day }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="calendar">
                            <div class="days">
                                <div v-for="day in daysInNextMonth" :key="day" @click="selectNextMonthDay(day)">
                                    {{ day }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </fieldset>
</template>

<script>
export default {
    data() {
        return {
            isCalendarVisible: false,
            selectedDate: '',
            currentDate: new Date(),
        };
    },
    computed: {
        currentMonth() {
            return this.currentDate.toLocaleString('default', { month: 'long' });
        },
        nextMonth_(){
            return (new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, 1)).toLocaleString('default', { month: 'long' });
        },
        daysInMonth() {
            const firstDay = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth(), 1);
            const lastDay = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, 0);
            const days = [];

            for (let day = firstDay.getDate(); day <= lastDay.getDate(); day++) {
                days.push(day);
            }

            return days;
        },

        daysInNextMonth() {
            const firstDay = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, 1);
            const lastDay = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 2, 0);
            const days = [];

            for (let day = firstDay.getDate(); day <= lastDay.getDate(); day++) {
                days.push(day);
            }

            return days;
        },
    },
    methods: {
        toggleCalendar() {
            this.isCalendarVisible = !this.isCalendarVisible;
        },
        selectDay(day) {
            const selectedDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth(), day+1);
            this.selectedDate = selectedDate.toISOString().split('T')[0];
            this.isCalendarVisible = false;
        },
        selectNextMonthDay(day) {
            const selectedDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth()+1, day+1);
            this.selectedDate = selectedDate.toISOString().split('T')[0];
            this.isCalendarVisible = false;
        },
        prevMonth() {
            this.currentDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() - 1, 1);
        },
        nextMonth() {
            this.currentDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, 1);
        },
    },
};
</script>




<style scoped>
.card
{
    width: 250%;
    left: 0;
}

.calend-btn
{
    width: 30px;
    height: 30px;
}

.calendar {
    padding: 10px;
}

.calendar .days {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
}

.calendar .days div {
    padding: 5px;
    cursor: pointer;
}
</style>
