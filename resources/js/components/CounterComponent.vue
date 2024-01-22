<template>
    <div>
        <div @click="decrement" class="counter-button">-</div>
        <input v-model="counter" />
        <div @click="increment" class="counter-button">+</div>
    </div>
</template>

<script>
export default {
    props: {
        initialValue: {
            type: Number,
            default: 0,
        },
        total: {
            type: Object,
            default: () => ({ value: 0 }),
        },
    },
    data() {
        return {
            counter: this.initialValue,
        };
    },
    methods: {
        increment() {
            this.counter++;
            this.$emit('update:total', { value: this.getTotal() });
        },
        decrement() {
            if (this.counter > 0) {
                this.counter--;
                this.$emit('update:total', { value: this.getTotal() });
            }
        },
        getTotal() {
            return this.counter;
        },
    },
};
</script>

<style scoped>
.counter-button {
    cursor: pointer;
    padding: 5px 10px;
    background-color: #eee;
    border: 1px solid #ccc;
    display: inline-block;
    user-select: none;
    font-size: 16px;
    margin: 0 5px;
}
</style>
