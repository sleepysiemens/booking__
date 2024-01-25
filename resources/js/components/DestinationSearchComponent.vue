<template>
    <fieldset class="first_input brdr-b-l p-0 col-1 h-60px m-0 col-lg col-6 position-relative d-flex">
        <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Куда</legend>
        <input class="bg-transparent border-0 ms-3 p-0 h-100" v-model="searchQuery" @input="search" @click="showCard" @blur="hideCard" type="text" name="destination"/>
        <input type="hidden" name="destination_" v-model="searchQuery_">
        <div class="card position-absolute top-100 mt-3 search-origin-component overflow-y-scroll z-3" v-show="isCardVisible">
            <ul class="list-group border-0">
                <li class="list-group-item border-0 select-item border-bottom border-1" v-for="result in getDisplayResults()" :key="result.id" @click="selectItem(result)">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex opacity-50" v-if="result.iata_type === 'airport'">
                                <i class="fas fa-plane-arrival my-auto me-2"></i>
                                <p class="my-auto">
                                    {{ result.name}}
                                </p>
                            </div>
                            <p class="mb-0" v-if="result.iata_type === 'city'">
                                {{ result.name}}
                            </p>
                            <p class="m-0 fs-12px opacity-50">
                                {{ result.country_name}}
                            </p>
                        </div>
                        <div class="col-auto d-flex">
                            <p class="m-auto opacity-50">
                                {{result.airport_code}}
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </fieldset>
</template>


<script>
export default {
    data() {
        return {
            searchQuery: window.requestData['destination'],
            searchQuery_: window.requestData['destination_'],
            searchResults: [],
            isCardVisible: false,
            selectedResult: '',
        };
    },

    methods: {
        updateSearchQuery(value) {
            this.searchQuery = value;
        },

        search() {
            if (typeof this.searchQuery === 'string') {
                this.searchResults = this.fakeSearch(this.searchQuery);
                this.isCardVisible = true;
            } else {
                this.searchResults = [];
                this.isCardVisible = false;
            }
        },
        fakeSearch(query) {
            const data = window.airportsData || [];
            return data.filter(item => {
                if (typeof item.name === 'string') {
                    return item.code.toLowerCase().includes(query.toLowerCase());
                    //return item.merged_values.includes(query.toLowerCase());
                }
                return false;
            });
        },
        selectItem(itemName) {
            this.selectedResult = itemName.name;
            this.searchQuery = itemName.name;
            this.searchQuery_ = itemName.airport_code;
            this.isCardVisible = false;
        },
        showCard() {
            this.isCardVisible = true;
        },
        hideCard() {
            setTimeout(() => {
                this.isCardVisible = false;
            }, 200);
        },
        getDisplayResults() {
            // Возвращаем все результаты, если поле поиска пустое
            if (!this.searchQuery.trim()) {
                return window.airportsData || [];
            }
            // Возвращаем результаты фильтрации
            return this.searchResults;
        },
    },
};
</script>

<style scoped>
.select-item {
    transition: .3s;
}

.select-item:hover {
    background-color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity)) !important;
}

.search-origin-component {
    width: 130%;
}

.card {
    max-height: 300px;
    left: 0;
}

.card::-webkit-scrollbar {
    width: 0;
    height: 0;
}

input {
    width: 90%;
    margin: auto !important;
}
</style>
