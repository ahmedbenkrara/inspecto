<template>
    <div class="w-full sm:max-w-[400px] md:max-w-none mx-auto bg-white sm:h-fit lg:h-[200px] rounded-md p-2 lg:flex">
        <img class="mr-4 sm:w-full lg:w-[200px] object-cover sm:h-[200px] lg:h-full rounded-md block" :src="image" alt="">
        <div class="flex flex-col justify-between flex-grow">
            <div class="mt-4 flex justify-between">
                <div>
                    <h1 class="font-poppins font-[500] text-[14px]">{{ title }}</h1>
                    <!-- <p class="text-[#0000008c] sm:text-[12px] md:text-[13px] font-poppins md:font-[500] sm:mt-1 md:mt-2">Motorisation : {{ motorisation }}</p> -->
                    <p class="text-[#0000008c] sm:text-[12px] md:text-[13px] font-poppins md:font-[500] sm:mt-1 md:mt-2">{{ type != null ? 'Type : '+ type : '' }}</p>
                    <p class="text-[#0000008c] sm:text-[12px] md:text-[13px] font-poppins md:font-[500] mt-[2px]">{{ generation != null ? 'Génération : '+ generation : '' }}</p>
                </div>
                <p class="font-poppins h-fit text-[10px] text-[#1d6363] bg-[#f0f8ef] w-fit rounded-md px-[10px] py-[4px] font-[500]">Nouveau</p>
            </div>
            <button class="text-[white] block bg-[#1d6363] rounded-md px-4 py-2 text-[12px] font-poppins font-[600] w-fit lg:mb-4 sm:mt-2 lg:mt-0">{{ price != null ? price : '' }}</button>
        </div>
    </div>
</template>

<script>

export default{
    name: 'CarCard',
    props: [
        'image', 'title', 'motorisation', 'generation', 'price', 'type'
    ]
}
</script>