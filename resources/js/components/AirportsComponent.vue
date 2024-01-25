<template>
    <origin-search-component ref="childComponent1"></origin-search-component>

    <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>
    <a class="w-50px p-0 h-60px m-0 d-flex col-sm-1 d-none d-lg-flex" @click="logSearchQueries">
        <i class="fas fa-exchange-alt m-auto opacity-50"></i>
    </a>
    <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

    <destination-search-component ref="childComponent2"></destination-search-component>
</template>

<script>
import OriginSearchComponent from './OriginSearchComponent.vue';
import DestinationSearchComponent from './DestinationSearchComponent.vue';

export default {

    components:
        {
            OriginSearchComponent,
            DestinationSearchComponent,
        },

    methods: {
        logSearchQueries() {
            var temp = this.$refs.childComponent1.searchQuery;

            this.$refs.childComponent1.searchQuery = this.$refs.childComponent2.searchQuery;
            this.$refs.childComponent2.searchQuery = temp;

            temp = this.$refs.childComponent1.searchQuery_;

            this.$refs.childComponent1.searchQuery_ = this.$refs.childComponent2.searchQuery_;
            this.$refs.childComponent2.searchQuery_ = temp;

        },
    },
}
</script>
