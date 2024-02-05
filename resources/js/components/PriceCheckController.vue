<template>
    <div class="row">
        <div class="col-6">
            <h6 class="my-auto d-flex more-info" @click="ToggleInfo">
                {{passengers_amount}}
                <span class="col-1 text-black d-flex filter-btn ms-2" :class="{'rotate-btn': IsInfoActive,}">
                    <i class="fas fa-chevron-down m-auto"></i>
                </span>
            </h6>
        </div>
        <div class="col-6">
            <h6 class="my-auto fw-500 text-end ff-montserrat">{{total_rub}} ₽ / {{total_eur}}  €</h6>
        </div>
    </div>
    <div class="container p-0 pt-3 slide-hide opacity-50 mb-2" :class="{'slide': IsInfoActive,}">
        <div class="row" v-for="i in adults">
            <p class="col-7 fs-12px m-0 mb-1">бронь взрослого</p>
            <p class="col-5 fs-12px m-0 text-end">699 ₽ / 14  €</p>
        </div>
        <div class="row" v-for="i in children">
            <p class="col-7 fs-12px m-0 mb-1">бронь ребенка</p>
            <p class="col-5 fs-12px m-0 text-end">699 ₽ / 14  €</p>
        </div>
        <div class="row" v-for="i in infants">
            <p class="col-7 fs-12px m-0 mb-1">бронь младенца</p>
            <p class="col-5 fs-12px m-0 text-end">699 ₽ / 14  €</p>
        </div>
    </div>
</template>

<script>
export default
{
    props: {
        passengers_amount:
            {
                type: String,
                required: true
            },
        adults_amount:
            {
                type: Number,
                required: true
            },
        children_amount:
            {
                type: Number,
                required: true
            },
        infants_amount:
            {
                type: Number,
                required: true
            },
        total_rub:
            {
                type: Number,
                required: true
            },
        total_eur:
            {
                type: Number,
                required: true
            },
    },
    data()
    {
        return {
            IsInfoActive: false,
        };
    },
    computed:
        {
            adults()
            {
                const adults =[];
                for(let i=1; i<=this.adults_amount; i++)
                {
                    adults.push(i);
                }
                return adults;
            },

            children()
            {
                const children =[];
                for(let i=1; i<=this.children_amount; i++)
                {
                    children.push(i);

                }
                return children;
            },

            infants()
            {
                const infants =[];
                for(let i=1; i<=this.infants_amount; i++)
                {
                    infants.push(i)
                }
                return infants;
            }
        },
    methods:
        {
          ToggleInfo()
          {
              this.IsInfoActive=!this.IsInfoActive;
          },
        },
}
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

.more-info
{
    transition: .3s;
    cursor: pointer;
}

.more-info:hover
{
    opacity: .5;
}

</style>
