<template>
    <div>
        <div class="sm:w-[98%] md:w-[95%] lg:w-[80%] mx-auto relative">
            <div class="w-full grid grid-cols-2 md:h-[500px] rounded-md overflow-hidden ">
                <div class="sm:px-[10px] md:px-[40px] lg:px-[50px] sm:pt-[50px] md:pt-[100px] bg-[#f5f5f53d]">
                    <h1 class="font-bold font-poppins sm:hidden md:block md:text-[25px]">Trouvez votre voiture <br>idéale selon votre <br>budget.</h1>
                    <h1 class="font-bold font-poppins sm:block md:hidden text-[18px]">Trouvez votre voiture parfaite.</h1>
                    <p class="text-[#bbbbbb] font-poppins sm:hidden md:block text-[14px] mt-3 max-w-[400px]">Découvrez votre prochaine voiture idéale en explorant les meilleures options en fonction de votre budget sur notre site. Faites un choix éclairé pour votre prochain achat automobile.</p>
                    <p class="text-[#bbbbbb] font-poppins text-[14px] sm:block md:hidden mt-3 max-w-[400px]">Explorez et choisissez la voiture parfaite selon votre budget sur notre site.</p>
                </div>
                <div class="w-full sm:h-[300px] md:h-[500px]">
                    <img class="w-full object-cover h-full" src="https://images.unsplash.com/photo-1615836442383-6e787668bc6c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="">
                </div>
            </div>
            <div id="topview" class="test rounded-md sm:w-[90%] md:w-[80%] left-0 right-0 mx-auto absolute sm:hidden md:block bottom-[-40px] shadow-2xl">
                <div class="bg-white px-4 py-3 rounded-md shadow-lg">
                    <div class="sm:block md:flex w-full h-fit">
                        <input ref="budget" class="input w-full block px-6 py-[16px] outline-none border-none" type="text" placeholder="Entrez votre budget">
                        <select ref="marque" class="input w-full block px-6 py-[16px] outline-none border-none md:mr-2 bg-white">
                            <option selected disabled value="">Marque</option>
                            <option value="all">Tout</option>
                            <option v-for="item in brands" :value="item.id">{{ item.name }}</option>
                        </select>
                        <select ref="carburant" class="input w-full block px-6 py-[16px] outline-none border-none md:mr-2 bg-white">
                            <option selected disabled value="">Carburant</option>
                            <option value="all">Tout</option>
                            <option value="essence">Essence</option>
                            <option value="diesel">Diesel</option>
                            <option value="electrique">Electrique</option>
                            <option value="hybrid">Hybrid</option>
                        </select>
                        <button @click="search()" class="sm:hidden md:block px-6 rounded-md text-white bg-[#1d6363] font-[400] font-poppins text-[14px]">Recherche</button>
                        <button @click="search()" class="sm:block md:hidden px-4 py-2 mt-2 rounded-md text-white bg-[#1d6363] font-[400] font-poppins text-[14px] w-full">Recherche</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-fit sm:pt-[50px] md:pt-[100px] w-[90%] mx-auto">
            <div id="second" class="test rounded-md sm:w-[95%] md:w-[80%] mx-auto sm:block md:hidden shadow-2xl mb-[40px]">
                <div class="bg-white px-4 py-3 rounded-md shadow-lg">
                    <div class="sm:block md:flex w-full h-fit">
                        <input ref="budget1" class="input w-full block px-6 py-[16px] outline-none border-none" type="text" placeholder="Entrez votre budget">
                        <select ref="marque1" class="input w-full block px-6 py-[16px] outline-none border-none md:mr-2 bg-white">
                            <option selected disabled value="">Marque</option>
                            <option value="all">Tout</option>
                            <option v-for="item in brands" :value="item.id">{{ item.name }}</option>
                        </select>
                        <select ref="carburant1" class="input w-full block px-6 py-[16px] outline-none border-none md:mr-2 bg-white">
                            <option selected disabled value="">Carburant</option>
                            <option value="all">Tout</option>
                            <option value="essence">Essence</option>
                            <option value="diesel">Diesel</option>
                            <option value="electrique">Electrique</option>
                            <option value="hybrid">Hybrid</option>
                        </select>
                        <button @click="search()" class="sm:hidden md:block px-6 rounded-md text-white bg-[#1d6363] font-[400] font-poppins text-[14px]">Recherche</button>
                        <button @click="search()" class="sm:block md:hidden px-4 py-2 mt-2 rounded-md text-white bg-[#1d6363] font-[400] font-poppins text-[14px] w-full">Recherche</button>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="font-poppins font-[600] sm:text-[16px] md:text-[18px]">Voitures</h1>
                    <p class="font-poppins font-[400] text-[13px] text-[#5f5f5f]">Explorez les voitures !</p>
                </div>
                <div>
                    <select ref="prix" class="select select-bordered w-full max-w-xs bg-white" @change="searchRange()">
                        <option disabled selected value="">Gammes de prix</option>
                        <option value="all">Tous les prix</option>
                        <option v-for="item in getNewListOfPrices" :value="item">{{ item }} Dh</option>
                    </select>
                </div>
            </div>
            <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 mt-6">
                <div v-if="loading" class="w-full sm:max-w-[400px] md:max-w-none mx-auto bg-white sm:h-fit lg:h-[200px] rounded-md p-2 lg:flex animate-pulse">
                    <div class="bg-gray-300 mr-4 sm:w-full lg:w-[200px] h-[200px] lg:h-full rounded-md block"></div>
                    <div class="flex flex-col justify-between flex-grow">
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h1 class="font-poppins font-[500] text-[14px] bg-gray-300 text-transparent rounded-md">Loading...</h1>
                                <p class="sm:text-[12px] md:text-[13px] font-poppins md:font-[500] sm:mt-1 md:mt-2 bg-gray-300 text-transparent rounded-md">Loading...</p>
                                <p class="sm:text-[12px] md:text-[13px] font-poppins md:font-[500] mt-[2px] bg-gray-300 text-transparent rounded-md">Loading...</p>
                            </div>
                            <p class="font-poppins h-fit text-[10px] text-[#1d6363] w-fit rounded-md px-[10px] py-[4px] font-[500] bg-gray-300 text-transparent">Loading...</p>
                        </div>
                        <button class="text-[white] block rounded-md px-4 py-2 text-[12px] font-poppins font-[600] w-fit lg:mb-4 sm:mt-2 lg:mt-0 bg-gray-300 text-transparent">Loading...</button>
                    </div>
                </div>
                <div v-if="loading" class="w-full sm:max-w-[400px] md:max-w-none mx-auto bg-white sm:h-fit lg:h-[200px] rounded-md p-2 lg:flex animate-pulse">
                    <div class="bg-gray-300 mr-4 sm:w-full lg:w-[200px] h-[200px] lg:h-full rounded-md block"></div>
                    <div class="flex flex-col justify-between flex-grow">
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h1 class="font-poppins font-[500] text-[14px] bg-gray-300 text-transparent rounded-md">Loading...</h1>
                                <p class="sm:text-[12px] md:text-[13px] font-poppins md:font-[500] sm:mt-1 md:mt-2 bg-gray-300 text-transparent rounded-md">Loading...</p>
                                <p class="sm:text-[12px] md:text-[13px] font-poppins md:font-[500] mt-[2px] bg-gray-300 text-transparent rounded-md">Loading...</p>
                            </div>
                            <p class="font-poppins h-fit text-[10px] text-[#1d6363] w-fit rounded-md px-[10px] py-[4px] font-[500] bg-gray-300 text-transparent">Loading...</p>
                        </div>
                        <button class="text-[white] block rounded-md px-4 py-2 text-[12px] font-poppins font-[600] w-fit lg:mb-4 sm:mt-2 lg:mt-0 bg-gray-300 text-transparent">Loading...</button>
                    </div>
                </div>
                <div v-if="loading" class="w-full sm:max-w-[400px] md:max-w-none mx-auto bg-white sm:h-fit lg:h-[200px] rounded-md p-2 lg:flex animate-pulse">
                    <div class="bg-gray-300 mr-4 sm:w-full lg:w-[200px] h-[200px] lg:h-full rounded-md block"></div>
                    <div class="flex flex-col justify-between flex-grow">
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h1 class="font-poppins font-[500] text-[14px] bg-gray-300 text-transparent rounded-md">Loading...</h1>
                                <p class="sm:text-[12px] md:text-[13px] font-poppins md:font-[500] sm:mt-1 md:mt-2 bg-gray-300 text-transparent rounded-md">Loading...</p>
                                <p class="sm:text-[12px] md:text-[13px] font-poppins md:font-[500] mt-[2px] bg-gray-300 text-transparent rounded-md">Loading...</p>
                            </div>
                            <p class="font-poppins h-fit text-[10px] text-[#1d6363] w-fit rounded-md px-[10px] py-[4px] font-[500] bg-gray-300 text-transparent">Loading...</p>
                        </div>
                        <button class="text-[white] block rounded-md px-4 py-2 text-[12px] font-poppins font-[600] w-fit lg:mb-4 sm:mt-2 lg:mt-0 bg-gray-300 text-transparent">Loading...</button>
                    </div>
                </div>
                <div v-if="loading" class="w-full sm:max-w-[400px] md:max-w-none mx-auto bg-white sm:h-fit lg:h-[200px] rounded-md p-2 lg:flex animate-pulse">
                    <div class="bg-gray-300 mr-4 sm:w-full lg:w-[200px] h-[200px] lg:h-full rounded-md block"></div>
                    <div class="flex flex-col justify-between flex-grow">
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h1 class="font-poppins font-[500] text-[14px] bg-gray-300 text-transparent rounded-md">Loading...</h1>
                                <p class="sm:text-[12px] md:text-[13px] font-poppins md:font-[500] sm:mt-1 md:mt-2 bg-gray-300 text-transparent rounded-md">Loading...</p>
                                <p class="sm:text-[12px] md:text-[13px] font-poppins md:font-[500] mt-[2px] bg-gray-300 text-transparent rounded-md">Loading...</p>
                            </div>
                            <p class="font-poppins h-fit text-[10px] text-[#1d6363] w-fit rounded-md px-[10px] py-[4px] font-[500] bg-gray-300 text-transparent">Loading...</p>
                        </div>
                        <button class="text-[white] block rounded-md px-4 py-2 text-[12px] font-poppins font-[600] w-fit lg:mb-4 sm:mt-2 lg:mt-0 bg-gray-300 text-transparent">Loading...</button>
                    </div>
                </div>

                <!-- <CarCard v-for="item in paginatedDisplay" :image="item.image" :type="item.motorisation.type" :title="item.modele.brand.name + ' '+ item.modele.name" :motorisation="item.motorisation.name" :generation="item.generation != null ? item.generation.name : ''" :price="getPrice(item).mint +'-'+ getPrice(item).maxt"/> -->
                <CarCard v-for="item in paginatedDisplay" :image="item.image" :type="item.motorisation.type" :title="item.modele.brand.name + ' '+ item.modele.name" :motorisation="item.motorisation.name" :generation="item.generation != null ? item.generation.name : ''" :price="getPrice(item).min +'-'+ getPrice(item).max+' DH'"/>
            </div>
            <div class="mt-[60px] mb-[40px]">
                <button class="px-4 py-2 mr-2 rounded-md text-[#1d6363] bg-[#f0f8ef] font-[500] font-poppins text-[12px] border-[1px]" @click="previousPage" :disabled="currentPage === 1">Précédent</button>
                <button class="px-4 py-2 rounded-md text-[#1d6363] bg-[#f0f8ef] font-[500] font-poppins text-[12px] border-[1px]" @click="nextPage" :disabled="currentPage * pageSize >= display.length">suivant</button>
            </div>
        </div>
    </div>
</template>

<script>
import CarCard from './CarCard.vue'
import axios from 'axios'

export default{
    name: 'BudgetCars',
    data(){
        return{
            brands: [],
            cars: [],
            loading: true, 
            prices: [],
            display: [],
            budget: '',
            marque: '',
            price: 0,
            isform2 : false,
            currentPage: 1,
            pageSize: 20,
        }
    },
    methods:{
        async loadBrands(){
            let brands = await axios.get('/api/getbrands')
            this.brands = brands.data
        },
        async loadCars(){
            let cars = await axios.get('/api/getCars')
            this.cars = cars.data.data
            this.display = this.cars
            
        },
        async loadPrices(){
            let prices = await axios.get('/api/getprices')
            this.prices = prices.data
        },
        getPrice(car){
            if(car.priceranges != null){
                let priceranges = car.priceranges;
                if(priceranges.length > 0){
                    let min = priceranges[0].min
                    let max = priceranges[0].max
                    let mint = priceranges[0].name.split('-')[0]
                    let maxt = priceranges[0].name.split('-')[1]

                    priceranges.forEach((item) => {
                        if(item.min < min){
                            min = item.min
                            mint = item.name.split('-')[0]
                        }

                        if(item.max > max){
                            max = item.max
                            maxt = item.name.split('-')[1]
                        }
                    })
                    return {
                        min,max,mint,maxt
                    }
                }else{
                    return null
                }
            }else{
                return null
            }
        },
        search(){
            this.currentPage = 1
            let budget = this.isForm2Hidden ? this.$refs.budget.value : this.$refs.budget1.value
            let marque = this.isForm2Hidden ? this.$refs.marque.value : this.$refs.marque1.value
            let carburant = this.isForm2Hidden ? this.$refs.carburant.value : this.$refs.carburant1.value
            let prix = this.$refs.prix
            
            // Reset display to all cars
            this.display = this.cars
            
            // Apply brand filter if selected
            if(marque != ''){
                if(marque != 'all'){
                    this.display = this.display.filter((item) => item.modele.brand.id == marque)
                }
            }
            
            // Apply fuel type filter if selected
            if(carburant != 'all'){
                this.display = this.display.filter(item => item.motorisation.type.includes(carburant))
            }
            
            // Apply budget filter if entered
            if(budget != ''){
                prix.value = 'all' // Reset the price range selection
                this.display = this.display.filter((item) => (this.getPrice(item).min <= parseFloat(budget) && this.getPrice(item).max >= parseFloat(budget)))
            }
            // Apply price range filter if selected
            else if(prix.value != '' && prix.value != 'all'){
                let local = prix.value.split('-')
                this.display = this.display.filter((item) => (this.getPrice(item).min <= parseFloat(local[0]) && this.getPrice(item).max >= parseFloat(local[1])))
            }
        },


        searchRange(){
            let budget = this.isForm2Hidden ? this.$refs.budget : this.$refs.budget1
            let prix = this.$refs.prix.value
            budget.value = '' // Reset the budget input field
            let marque = this.isForm2Hidden ? this.$refs.marque.value : this.$refs.marque1.value
            let carburant = this.isForm2Hidden ? this.$refs.carburant.value : this.$refs.carburant1.value
            
            this.display = this.cars // Reset the display to all cars
            
            // Apply brand filter if selected
            if(marque != ''){
                if(marque != 'all'){
                    this.display = this.display.filter((item) => item.modele.brand.id == marque)
                }
            }
            
            // Apply fuel type filter if selected
            if(carburant != 'all'){
                this.display = this.display.filter(item => item.motorisation.type.includes(carburant))
            }
            
            // Filter by price range
            if(prix != ''){
                if(prix != 'all'){
                    let local = prix.split('-')
                    this.display = this.display.filter((item) => (this.getPrice(item).min <= parseFloat(local[0]) && this.getPrice(item).max >= parseFloat(local[1])))
                }
            }
        },

        previousPage() {
            if (this.currentPage > 1) {
                this.currentPage--
            }
            this.scroll()
        },
        nextPage() {
            const maxPage = Math.ceil(this.display.length / this.pageSize)
            if (this.currentPage < maxPage) {
                this.currentPage++
            }
            this.scroll()
        },
        scroll(){
            const section = document.getElementById('topview')
            if (section) {
                section.scrollIntoView({ behavior: 'smooth', block: 'start' })
            }
        }
    },
    computed:{
        isForm2Hidden(){
            let second = document.getElementById('second')
            return window.getComputedStyle(second).display == 'none'
        },
        paginatedDisplay() {
            const start = (this.currentPage - 1) * this.pageSize
            const end = start + this.pageSize
            return this.display.slice(start, end)
        },
        getMinMax(){
            if(this.prices.length == 0){
                return {
                    min: 0,
                    max: 0
                }
            }
            // Initialize min and max with the values from the first object in the array
            const initialMinMax = { min: this.prices[0].min, max: this.prices[0].max };

            // Use Array.reduce to find the lowest and highest prices
            return this.prices.reduce((acc, current) => {
                return {
                    min: Math.min(acc.min, current.min),
                    max: Math.max(acc.max, current.max),
                };
            }, initialMinMax);
        },
        getNewListOfPrices(){
            const gap = 20000
            const maxPrice = this.getMinMax.max

            const res = []
            let min = 0

            while (min <= maxPrice) {
                const max = min + gap
                const range = `${min}-${max}`
                res.push(range)
                min = max
            }

            return res
        }
    },
    async mounted(){
        await this.loadBrands()
        await this.loadPrices()
        await this.loadCars()
        this.loading = false
    },
    components: {
        CarCard
    }
}
</script>