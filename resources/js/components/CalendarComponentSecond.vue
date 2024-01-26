<template>
    <fieldset class="first_input brdr-b-l p-0 col-1 h-60px m-0 col-lg col-6 position-relative">
        <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Дата обратно</legend>
        <input class="bg-transparent border-0 ms-3 p-0 h-100" style="width: 95%;" name="returnDate" type="text" v-model="selectedDate" @focus="toggleCalendar" autocomplete="off">


        <div class="card position-absolute top-100 mt-3 z-3" id="card" v-show="isCalendarVisible" @click.stop>
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
                                <div class="d-flex rounded-circle p-0 day"
                                     v-for="day in daysInMonth"
                                     :key="day"
                                     @click="selectDay(day)"
                                     :class="{ 'selected-day': isSelectedDay(day, 'currentMonth') }"
                                >
                                    <p class="m-auto">{{ day }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="calendar">
                            <div class="days">
                                <div class="d-flex rounded-circle p-0 day"
                                     v-for="day in daysInMonth"
                                     :key="day"
                                     @click="selectNextMonthDay(day)"
                                     :class="{ 'selected-day': isSelectedDay(day, 'nextMonth') }"
                                >
                                    <p class="m-auto">{{ day }}</p>
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
            selectedDate: window.requestData['returnDate'],
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

        selectedDays() {
            // Преобразуем выбранную дату в массив выбранных дней
            const selectedDate = new Date(this.selectedDate);
            const selectedMonth = selectedDate.getMonth();
            return {
                currentMonth: selectedMonth === this.currentDate.getMonth()
                    ? [selectedDate.getDate()]
                    : [],
                nextMonth: selectedMonth === this.currentDate.getMonth() + 1
                    ? [selectedDate.getDate()]
                    : [],
            };
        },
    },
    methods: {
        toggleCalendar() {
            this.isCalendarVisible = !this.isCalendarVisible;
            if (this.isCalendarVisible) {
                // Добавим слушатель клика к документу при открытии div
                document.addEventListener('click', this.handleDocumentClick);
            } else {
                // Удалим слушатель клика к документу при закрытии div
                document.removeEventListener('click', this.handleDocumentClick);
            }
        },
        handleDocumentClick(event) {
            // Проверим, был ли клик внутри div, если нет, скроем div
            if (!this.$el.contains(event.target)) {
                this.toggleCalendar();
            }
        },


        selectDay(day) {
            const selectedDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth(), day+1);
            this.selectedDate = selectedDate.toISOString().split('T')[0];
            this.toggleCalendar();
        },
        selectNextMonthDay(day) {
            const selectedDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth()+1, day+1);
            this.selectedDate = selectedDate.toISOString().split('T')[0];
            this.toggleCalendar();
        },
        prevMonth() {
            this.currentDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() - 1, 1);
        },
        nextMonth() {
            this.currentDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, 1);
        },

        isSelectedDay(day, month) {
            // Проверяем, является ли текущий день выбранным в указанном месяце
            return this.selectedDays[month].includes(day);
        },
    },
};
</script>




<style scoped>
.card
{
    min-width: 250%;
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

.calendar .days div.selected-day {
    background-color: #4caf50; /* Замените на желаемый цвет выделения */
    color: #ffffff; /* Замените на желаемый цвет текста */
}

.day
{
    height: 26px;
    width: 26px;
}

@media screen and (max-width: 1200px)
{
    width: 300% !important;
}

@media screen and (max-width: 500px)
{
    .card
    {
        width: 200%;
        left: auto;
        right: 0 !important;
    }

    .day
    {
        height: 20px;
        width: 20px;
    }

}
</style>
