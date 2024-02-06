<template>
    <div class="w-100 position-relative h-600px overflow-hidden">
        <img class="object-fit-cover w-50 m-auto position-absolute absolute-image bg-dark_" :src="bg_dark" alt="img">
        <img class="object-fit-cover w-50 m-auto position-absolute absolute-image bg-dark__" :src="bg_dark" alt="img">
        <img class="object-fit-cover w-50 m-auto position-absolute absolute-image bg-dark__" style="animation-delay: 15s" :src="bg_dark" alt="img">
        <img class="object-fit-cover w-50 m-auto position-absolute absolute-image bg-dark__" style="animation-delay: 30s" :src="bg_dark" alt="img">

        <img class="object-fit-cover w-50 m-auto position-absolute absolute-image bg-light_" :src="bg_light" alt="img">
        <img class="object-fit-cover w-50 m-auto position-absolute absolute-image bg-light__" :src="bg_light" alt="img">
        <img class="object-fit-cover w-50 m-auto position-absolute absolute-image bg-light__" style="animation-delay: 20s" :src="bg_light" alt="img">
        <img class="object-fit-cover w-50 m-auto position-absolute absolute-image bg-light__" style="animation-delay: 40s" :src="bg_light" alt="img">

        <img class="object-fit-cover w-50 m-auto position-absolute absolute-image plane" :src="plane" alt="img">
        <img class="object-fit-cover w-50 m-auto position-absolute absolute-image plane-2" :src="plane" alt="img">
        <img class="object-fit-cover w-50 m-auto position-absolute absolute-image" :src="building" alt="img">
    </div>
</template>

<script>
export default
{
    props: {
        bg_dark:
            {
                type: String,
                required: true
            },
        bg_light:
            {
                type: String,
                required: true
            },
        building:
            {
                type: String,
                required: true
            },
        plane:
            {
                type: String,
                required: true
            },
    },
}
</script>

<style scoped>
.absolute-image
{
    left: 0;
    right: 0;
}

.plane
{
    animation: flying 5s linear infinite;
    transform: translateX(150px) translateY(120px) scale(.3);
}

@keyframes flying
{
    0% {transform: translateX(150px) translateY(120px) scale(.3)}
    5% {transform: translateX(150px) translateY(120px) scale(.3)}
    70% {transform: translateX(-700px) translateY(-100px)}
    95% {transform: translateX(-700px) translateY(-100px)}
    100% {transform: translateX(-700px) translateY(-100px)}
}

.plane-2
{
    animation: flying-2 5s linear infinite;
    transform:  rotate(-17deg) translateX(900px) translateY(0px) scale(1);
}

@keyframes flying-2
{
    0% {transform:  rotate(-17deg) translateX(1000px) translateY(50px) scale(1);}
    50% {transform:  rotate(-17deg) translateX(1000px) translateY(50px) scale(1);}
    100% {transform:  rotate(-17deg) translateX(100px) translateY(200px) scale(.5);}
}

.bg-light_
{
    animation-duration: 40s;
    animation-name: bg-dark;
    animation-iteration-count: 1;
    opacity: 0;
}

.bg-light__
{
    animation-duration: 80s;
    animation-name: bg-dark_;
    animation-iteration-count: infinite;
    opacity: 0;
}

.bg-dark_
{
    animation-duration: 30s;
    animation-name: bg-dark;
    animation-iteration-count: 1;
    opacity: 0;
}

.bg-dark__
{
    animation-duration: 60s;
    animation-name: bg-dark_;
    animation-iteration-count: infinite;
    opacity: 0;
}

@keyframes bg-dark
{
    0% {transform: translateX(0px); opacity: 1}
    100% {transform: translateX(-1500px); opacity: 1}
}

@keyframes bg-dark_
{
    0% {transform: translateX(1100px); opacity: 1}
    100% {transform: translateX(-1500px); opacity: 1}
}


</style>
