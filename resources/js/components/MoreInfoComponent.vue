<template>
    <div class="d-flex ms-3 ms-lg-0 mt-2 mt-lg-0 justify-content-lg-end text-black-200 info position-relative">
        <div class="card position-absolute w-100 bg-light" style="right: 200px" v-show="isInfoVisible">
            <div class="card-body position-relative">
                <div class="position-absolute cursor-pointer" @click="ToggleInfo" style="right: 10px; top: 10px">
                    <i class="fas fa-times-circle"></i>
                </div>
                <h6 class="mb-2">Как заполнить данные</h6>
                <p class="mb-0"><b>Общая информация</b></p>
                <p>
                    Данные для оформления брони билетов должны соответствовать документу пассажира, по которому он собирается путешествовать. При вводе данных все буквы должны быть написаны латиницей (в английской раскладке клавиатуры), без пробелов и дефисов. Двойная фамилия указывается слитно, без пробелов и дефисов.
                </p>
                <p class="mb-1"><b>Паспорт</b></p>
                <ul>
                    <li >
                        <p class="mb-0">Написание как в документе 1234567890</p>
                    </li>
                    <li>
                        <p>Срок действия паспорта (до какого годен) указывается при наличии</p>
                    </li>

                </ul>
            </div>
        </div>
        <div class="d-flex cursor-pointer" @click="ToggleInfo">
            <i class="far fa-question-circle my-auto"></i>
            <p class="my-auto ms-1">Как заполнить данные</p>
        </div>
    </div>
</template>

<script>
export default{
    data()
        {
            return{
                isInfoVisible: false
            }
        },
        methods:
            {
                ToggleInfo()
                {
                    this.isInfoVisible=!this.isInfoVisible;
                }
            }
}
</script>
