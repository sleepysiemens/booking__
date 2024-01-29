<template>
    <div class="m-0 col-auto row position-relative p-0">
        <fieldset class="first_input brdr-b-l p-0 col-1 h-60px m-0 col-lg col-6 position-relative d-flex">
            <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Дата туда</legend>
            <input class="bg-transparent border-0 ms-3 p-0 h-100 input" style="width: 95%;" name="departDate" type="text" v-model="startDate" @focus="toggleStartDate" autocomplete="off">
        </fieldset>
        <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

        <fieldset class="brdr-b-r p-0 col-1 h-60px m-0 col-lg col-6 position-relative d-flex">
            <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Дата обратно</legend>
            <input class="bg-transparent border-0 ms-3 p-0 h-100" style="width: 95%;" name="returnDate" type="text" v-model="endDate" @focus="toggleEndDate" ref="end_date" autocomplete="off">
        </fieldset>

        <div class="card position-absolute top-100 mt-3 z-3 p-0" id="card" v-show="isCalendarVisible" @click.stop>
            <div class="card-body">
                <div class="row py-2 mb-4">
                    <div class="col-6 d-flex">
                        <h5 class="my-auto" v-show="isStartDate">Выберите дату отправления</h5>
                        <h5 class="my-auto" v-show="isEndDate">Выберите дату возвращения</h5>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-primary d-flex" @click="noEndDate">
                            <p class="m-auto">Обратный билет не нужен</p>
                        </a>
                    </div>
                </div>
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
                                <div class="d-flex rounded-circle p-0 day mb-2"
                                     v-for="day in daysInMonth"
                                     :key="day"
                                     @click="selectDay(day)"
                                     :class="{
                                         'selected-day': isSelectedDay(day, 'currentMonth'),
                                         'between-days': isBetweenSelectedDates(day, 'currentMonth'),
                                         'disabled': isInPast(day, 'currentMonth'),
                                     }"
                                >
                                    <p class="m-auto">{{ day }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="calendar">
                            <div class="days">
                                <div class="d-flex rounded-circle p-0 day mb-2"
                                     v-for="day in daysInNextMonth"
                                     :key="day"
                                     @click="selectNextMonthDay(day)"
                                     :class="{
                                         'selected-day': isSelectedDay(day, 'nextMonth'),
                                         'between-days': isBetweenSelectedDates(day, 'nextMonth'),
                                         'disabled': isInPast(day, 'nextMonth'),
                                     }"
                                >
                                    <p class="m-auto">{{ day }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            isCalendarVisible: false,
            isStartDate: false,
            isEndDate: false,
            startDate: window.requestData['departDate'],
            endDate: window.requestData['returnDate'],
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
            const startDate = new Date(this.startDate);
            const endDate = new Date(this.endDate);
            const selectedStartMonth = startDate.getMonth();
            const selectedEndMonth = endDate.getMonth();

            var currentMonth=[];
            var nextMonth=[];

            if(selectedStartMonth === this.currentDate.getMonth())
            {
                currentMonth[0]=startDate.getDate();
            }

            if(selectedEndMonth === this.currentDate.getMonth())
            {
                currentMonth[1]=endDate.getDate();
            }

            if(selectedStartMonth === this.currentDate.getMonth()+1)
            {
                nextMonth[0]=startDate.getDate();
            }

            if(selectedEndMonth === this.currentDate.getMonth()+1)
            {
                nextMonth[1]=endDate.getDate();
            }


            return {
                currentMonth ,nextMonth
            };
        },
    },
    methods: {
        toggleStartDate()
        {
            this.isStartDate=true;
            this.isEndDate=false;
            this.toggleCalendar();
        },
        toggleEndDate()
        {
            this.isEndDate=true;
            this.isStartDate=false;
            this.toggleCalendar();
        },
        toggleCalendar() {
            this.isCalendarVisible = true;
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
                this.isCalendarVisible=false;
            }
        },


        selectDay(day) {
            const startDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth(), day + 1);
            const currentDate = new Date();

            if (startDate >= currentDate)
            {
                if (this.isStartDate)
                {
                    this.startDate = startDate.toISOString().split('T')[0];
                    this.$refs.end_date.focus();
                }
                else
                {
                    if(startDate.toISOString().split('T')[0] >= this.startDate)
                        this.endDate = startDate.toISOString().split('T')[0];
                }
            }
        },

        selectNextMonthDay(day) {
            const startDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, day + 1);
            const currentDate = new Date();

            if (startDate >= currentDate)
            {
                if (this.isStartDate)
                {
                    this.startDate = startDate.toISOString().split('T')[0];
                    this.$refs.end_date.focus();
                }
                else
                {
                    if(startDate.toISOString().split('T')[0] >= this.startDate)
                        this.endDate = startDate.toISOString().split('T')[0];
                }
            }
        },


        prevMonth()
        {
            this.currentDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() - 1, 1);
        },
        nextMonth()
        {
            this.currentDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, 1);
        },

        isSelectedDay(day, month)
        {
            // Проверяем, является ли текущий день выбранным в указанном месяце
            return this.selectedDays[month].includes(day);
        },

        isBetweenSelectedDates(day, month)
        {
            var currentDate;
            if(month==='currentMonth')
            {
                currentDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth(), day+1);
            }
            else
            {
                currentDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, day+1);
            }
            currentDate=currentDate.toISOString().split('T')[0];

            if(this.endDate!=='не установлено')
            {
                if(currentDate>this.startDate&&currentDate<this.endDate)
                    return true;
            }
            else
            return false;
        },

        isInPast(day, month)
        {
            var Day;
            if(month==='currentMonth')
            {
                Day = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth(), day+1);
            }
            else
            {
                Day = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, day+1);
            }

            var currentDate = new Date();
            Day=Day.toISOString().split('T')[0];
            currentDate=currentDate.toISOString().split('T')[0];
            return (Day < currentDate);
        },

        noEndDate()
        {
            this.endDate = 'не установлено';
            this.isCalendarVisible = false;
        },
    },
};
</script>




<style scoped>
.card
{
    max-width: none;
    width: 145%;
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
    background-color: var(--bs-app-theme);
    color: #ffffff; /* Замените на желаемый цвет текста */
}

.calendar .days div.between-days
{
    background-color: var(--bs-app-theme);
    color: #ffffff; /* Замените на желаемый цвет текста */
    opacity: .5;
}

.calendar .days div.disabled
{
    opacity: .5;
    cursor: default;
}

.day
{
    height: 26px;
    width: 26px;
}

.input
{
    width: 90% !important;
    margin: auto;
}

@media screen and (max-width: 1200px)
{
}

@media screen and (max-width: 500px)
{
    .day
    {
        height: 20px;
        width: 20px;
    }

}
</style>
