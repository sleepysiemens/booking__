<template>
    <p class="mt-1 mb-0 opacity-75">Оценка</p>
    <div class="star-rating">
        <input type="hidden" v-model="setedRating" name="rating" required>
        <i
            v-for="star in stars"
            :key="star"
            @mouseover="hoverRating(star)"
            @click="setRating(star)"
            @mouseout="resetRating"
            class="fas fa-star"
            :class="{ 'star-selected': star <= setedRating || star <= selectedRating}"
        ></i>
    </div>
</template>

<script>
export default {
    data() {
        return {
            stars: [1, 2, 3, 4, 5],
            selectedRating: 0,
            setedRating: 0,
        };
    },
    methods: {
        hoverRating(rating) {
            this.selectedRating = rating;
        },
        setRating(rating) {
            // Здесь вы можете отправить рейтинг на сервер, например, через AJAX или другим способом
            this.setedRating=rating;
        },
        resetRating() {
            if (this.selectedRating === 0) {
                return;
            }
            this.selectedRating = 0;
        },
    },
};
</script>

<style scoped>
.star-rating {
    font-size: 24px;
    cursor: pointer;
    color: #9b9fa4;
}

.star-selected {
    opacity: 1 !important;
    color: var(--bs-app-theme);
}
</style>
