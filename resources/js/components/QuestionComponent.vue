<template>
    <div class="card bg-light mb-3 border-0 cursor-pointer" @click="toggleAnswer()">
        <div class="card-body">
            <div class="row">
                <h4 class="col m-0">{{question_}}</h4>
                <span class="col-1 text-black opacity-50 d-flex filter-btn" :class="{'rotate-btn': IsAnswerActive,}">
                            <i class="fas fa-chevron-down m-auto"></i>
                        </span>
            </div>
            <div class="row fs-16px slide-hide" :class="{'slide': IsAnswerActive,}">
                <div class="col pt-3">
                    <p>{{answer_}}</p>
                </div>
            </div>

        </div>
    </div>
</template>

<script>

export default {
    props: {
        question:
            {
            type: String,
            required: true
            },
        answer:
            {
                type: String,
                required: true
            },
    },

    data()
    {
        return {
            question_: this.question,
            answer_: this.answer,
            IsAnswerActive: false,
        };
    },

    methods:
    {
        toggleAnswer()
        {
            this.IsAnswerActive=!this.IsAnswerActive;
        },

        AnswerActive()
        {
            return this.IsAnswerActive;
        },
    },

};
</script>

<style scoped>

.slide-hide
{
    overflow: hidden;
    max-height: 0;

    transition: .3s;
}

.slide
{
    max-height: 120px;
}

</style>
