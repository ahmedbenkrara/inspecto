<template>
    <div>
        <div class="sm:w-[98%] md:w-[95%] lg:w-[80%] mx-auto relative">
            <div class="w-full grid grid-cols-2 md:h-[500px] rounded-md overflow-hidden ">
                <div class="sm:px-[10px] md:px-[40px] lg:px-[50px] sm:pt-[50px] md:pt-[100px] bg-[#f5f5f53d]">
                    <h1 class="font-bold font-poppins sm:hidden md:block md:text-[25px]">Diagnostic Auto en Ligne : Expertise, Confort, <br>Confiance.</h1>
                    <h1 class="font-bold font-poppins sm:block md:hidden text-[18px]">Diagnostic Auto Expert en Ligne.</h1>
                    <p class="text-[#bbbbbb] font-poppins sm:hidden md:block text-[14px] mt-3 max-w-[400px]">Échangez en Toute Fluidité avec Votre Véhicule grâce à Notre Équipe de Spécialistes Automobiles. Nous Possédons une Compréhension Profonde de Vos Besoins et Travaillons Inlassablement pour les Satisfaire.</p>
                    <p class="text-[#bbbbbb] font-poppins text-[14px] sm:block md:hidden mt-3 max-w-[400px]">Découvrez la Puissance de l'Analyse de Données pour une Diagnostic Auto Précis et Efficace.</p>
                </div>
                <div class="w-full sm:h-[300px] md:h-[500px]">
                    <img class="w-full object-cover h-full" src="https://images.pexels.com/photos/8985466/pexels-photo-8985466.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                </div>
            </div>
        </div>
        <div class="h-fit sm:pt-[50px] md:pt-[100px] py-[40px] w-full mx-auto">
            <ul class="flex w-fit mx-auto mb-4">
                <li class="step selected">1</li>
                <div class="sm:w-[50px] md:w-[80px] h-[6px] bg-[#e5e6e6] mt-[15px] selected"></div>
                <li class="step" :class="step >= 2 ? 'selected' : ''">2</li>
                <div class="sm:w-[50px] md:w-[80px] h-[6px] bg-[#e5e6e6] mt-[15px]" :class="step >= 2 ? 'selected' : ''"></div>
                <li class="step" :class="step >= 3 ? 'selected' : ''">3</li>
                <div class="sm:w-[50px] md:w-[80px] h-[6px] bg-[#e5e6e6] mt-[15px]" :class="step >= 3 ? 'selected' : ''"></div>
                <li class="step" :class="step == 4 ? 'selected' : ''">4</li>
            </ul>
            <!--step1-->
            <div v-show="step == 1" class="font-poppins sm:w-[90%] md:w-[70%] lg:w-[55%] mx-auto py-4 mt-[40px]">
                <h1 class="text-[18px] font-bold text-center">Choisissez les détails de votre voiture</h1>
                <p class="text-[15px] text-[#b3b1bc] mt-1 text-center">Tous les champs sont requis !</p>

                <div class="w-full mt-[40px]">
                    <label for="brand" class="block sm:text-[13px] md:text-[14px] mb-1">Marque</label>
                    <select id="brand" v-model="brand" name="brand" class="bg-[#fafafa] w-full block sm:text-[14px] md:text-[14px] sm:px-[12px] sm:py-[6px] md:px-4 md:py-2 outline-none border-[1px]">
                        <option value="" selected disabled>Sélectionnez la marque</option>
                        <option v-for="item in brands" :value="item.id" :key="item.id">{{ item.name }}</option>
                    </select>
                </div>
                <div class="w-full mt-4">
                    <label for="model" class="block sm:text-[13px] md:text-[14px] mb-1">Modèle</label>
                    <select id="model" v-model="model" name="model" :disabled="brand == ''" class="bg-[#fafafa] w-full block sm:text-[14px] md:text-[14px] sm:px-[12px] sm:py-[6px] md:px-4 md:py-2 outline-none border-[1px]">
                        <option value="" selected disabled>Sélectionnez le modèle</option>
                        <option v-for="item in filteredModels" :value="item.id" :key="item.id">{{ item.name }}</option>
                    </select>
                </div>
                <div class="w-full mt-4">
                    <label for="type" class="block sm:text-[13px] md:text-[14px] mb-1">Type de motorisation</label>
                    <select id="type" v-model="motoType" :disabled="model == ''" name="type" class="bg-[#fafafa] w-full block sm:text-[14px] md:text-[14px] sm:px-[12px] sm:py-[6px] md:px-4 md:py-2 outline-none border-[1px]">
                        <option value="" selected disabled>Sélectionner un type</option>
                        <option value="essence">Essence</option>
                        <option value="diesel">Diesel</option>
                        <option value="electrique">Electrique</option>
                        <option value="hybrid">Hybrid</option>
                    </select>
                </div>
                <div class="w-full mt-4">
                    <label for="motorisation" class="block sm:text-[13px] md:text-[14px] mb-1">Motorisation</label>
                    <select id="motorisation" v-model="moto" :disabled="model == ''" name="motorisation" class="bg-[#fafafa] w-full block sm:text-[14px] md:text-[14px] sm:px-[12px] sm:py-[6px] md:px-4 md:py-2 outline-none border-[1px]">
                        <option value="" selected disabled>Sélectionnez la motorisation</option>
                        <option v-for="item in filterMoto" :value="item.id" :key="item.id">{{ item.name }}</option>
                    </select>
                </div>
                <div class="w-full mt-4">
                    <label for="generation" class="block sm:text-[13px] md:text-[14px] mb-1">Génération</label>
                    <select id="generation" v-model="generation" :disabled="model == ''" name="generation" class="bg-[#fafafa] w-full block sm:text-[14px] md:text-[14px] sm:px-[12px] sm:py-[6px] md:px-4 md:py-2 outline-none border-[1px]">
                        <option value="" selected disabled>Sélectionnez la génération</option>
                        <option v-for="item in filterGeneration" :value="item.id" :key="item.id">{{ item.name }}</option>
                    </select>
                </div>
                <div class="w-full mt-[30px]">
                    <button @click="next(2)" class="btnhover w-1/2 block bg-black text-white sm:text-[14px] md:text-[14px] sm:px-4 sm:py-[6px] md:px-4 md:py-[9px] text-[14px]">Suivant</button>
                </div>      
            </div>

            <!--step2-->
            <div v-show="step == 2" class="font-poppins w-[55%] mx-auto py-4 mt-[40px]">
                <h1 class="text-[18px] font-bold text-center">Choisissez le type de problème</h1>
                <p class="text-[15px] text-[#b3b1bc] mt-1 text-center">Tous les champs sont requis !</p>

                <div class="w-full mt-4" v-for="item in problemTypes" :key="item.id">
                    <p @click="checkedType($event)" :typeid="item.id" class="problemtype bg-[#fafafa] cursor-pointer w-full block sm:text-[14px] md:text-[14px] sm:px-[12px] sm:py-[6px] md:px-4 md:py-2 outline-none border-[1px]">{{ item.name }}</p>
                </div>
                <div class="w-full mt-[30px]">
                    <button @click="next(3)" class="btnhover w-1/2 block bg-black text-white sm:text-[14px] md:text-[14px] sm:px-4 sm:py-[6px] md:px-4 md:py-[9px] text-[14px]">Suivant</button>
                </div>      
            </div>

            <!--step3-->
            <div v-show="step == 3" class="font-poppins w-[55%] mx-auto py-4 mt-[40px]">
                <h1 class="text-[18px] font-bold text-center">Où as-tu le problème ?</h1>
                <p class="text-[15px] text-[#b3b1bc] mt-1 text-center">Détails du problème</p>

                <div class="w-full mt-4" v-for="item in filterProblems" :key="item.id">
                    <p @click="checkedProblem($event)" :problem="item.id" class="problem bg-[#fafafa] cursor-pointer w-full sm:text-[14px] md:text-[14px] sm:px-[12px] sm:py-[6px] md:px-4 md:py-2 outline-none border-[1px] flex"><img class="w-[30px] block mr-2" :src="'images/cars/'+item.icon" /> {{ item.name }}</p>
                </div>
                <div class="w-full mt-[30px]">
                    <button @click="next(4)" class="btnhover w-1/2 block bg-black text-white sm:text-[14px] md:text-[14px] sm:px-4 sm:py-[6px] md:px-4 md:py-[9px] text-[14px]">Suivant</button>
                </div>   
            </div>

            <!--step4-->
            <div v-show="step == 4" class="font-poppins w-[55%] mx-auto py-4 mt-[40px]">
                <h1 class="text-[18px] font-bold text-center">Voici la solution que nous recommandons</h1>

                <p class="w-full mt-[30px] text-[14px]">
                    {{ getSolution ? getSolution.description : ''}}
                </p>

                <p class="text-[15px] text-[red] mt-4">Pour plus de détails, contactez-nous sur WhatsApp.</p>
                
                <div class="w-full mt-4">
                    <label for="phone" class="block sm:text-[13px] md:text-[14px] mb-1">Téléphone</label>
                    <input v-model="phone" type="text" id="phone" name="phone" class="bg-[#fafafa] w-full block sm:text-[14px] md:text-[14px] sm:px-[12px] sm:py-[6px] md:px-4 md:py-2 outline-none border-[1px]">
                </div>
                <div class="w-full mt-2">
                    <label for="fname" class="block sm:text-[13px] md:text-[14px] mb-1">Prénom</label>
                    <input v-model="fname" type="text" id="fname" name="fname" class="bg-[#fafafa] w-full block sm:text-[14px] md:text-[14px] sm:px-[12px] sm:py-[6px] md:px-4 md:py-2 outline-none border-[1px]">
                </div>
                
                <div class="w-full mt-[30px]">
                    <button @click="submitData()" class="btnhover w-1/2 block bg-black text-white sm:text-[14px] md:text-[14px] sm:px-4 sm:py-[6px] md:px-4 md:py-[9px] text-[14px]">Envoyer</button>
                </div>   
            </div>
        </div>
    </div>
</template>


<script>
import axios from 'axios'

export default{
    name: 'Diagnostics',
    data(){
        return{
            step: 1,
            brands: [],
            brand: "",

            models: [],
            model: "",

            motorisations: [],
            moto: "",
            motoType: "",

            generations: [],
            generation: "",

            problemTypes: [],
            type: 0,

            problems: [],
            problem : 0,

            solutions: [],
            solution: '',

            phone: '',
            fname: ''
        }
    },
    methods: {
        next(step){
            if(step == 2 && !this.validateStep1()){
                return
            }

            if(step == 3 && this.type == 0){
                alert(`Le choix d'une catégorie de problème est obligatoire !`)
                return
            }

            if(step == 4 && this.problem == 0){
                alert(`Il est nécessaire de choisir un problème !`)
                return
            }

            this.step = step
        },
        validateStep1(){
            let br = document.getElementById('brand')
            let md = document.getElementById('model')
            let mt = document.getElementById('motorisation')
            let gn = document.getElementById('generation')

            if(this.brand == ""){
                br.classList.add('error')
                return false
            }else{
                if(br.classList.contains('error')){
                    br.classList.remove('error')
                }
            }

            if(this.model == ""){
                md.classList.add('error')
                return false
            }else{
                if(md.classList.contains('error')){
                    md.classList.remove('error')
                }
            }

            if(this.moto == ""){
                mt.classList.add('error')
                return false
            }else{
                if(mt.classList.contains('error')){
                    mt.classList.remove('error')
                }
            }

            if(this.filterGeneration.length > 0 && this.generation == ""){
                gn.classList.add('error')
                return false
            }else{
                if(gn.classList.contains('error')){
                    gn.classList.remove('error')
                }
            }

            return true
        },
        async loadBrands(){
            let brands = await axios.get('/api/getbrands')
            this.brands = brands.data
        },
        async loadModels(){
            let models = await axios.get('/api/getModeles')
            this.models = models.data
        },
        async loadMoto(){
            let moto = await axios.get('/api/getMotorisations')
            this.motorisations = moto.data
        },
        async loadGenerations(){
            let generations = await axios.get('/api/getGenerations')
            this.generations = generations.data
        },
        async loadTypes(){
            let types = await axios.get('/api/getProblemTypes')
            this.problemTypes = types.data
        },
        async loadProblems(){
            let problems = await axios.get('/api/getProblems')
            this.problems = problems.data
            console.log(this.problems)
        },
        async loadSolutions(){
            let solutions = await axios.get('/api/getSolutions')
            this.solutions = solutions.data
        },
        checkedType(e){
            let items = document.getElementsByClassName('problemtype')
            items = Array.from(items)
            items.forEach((item) => {
                if(item.classList.contains('radioactive')){
                    item.classList.remove('radioactive')
                }
            })
            e.target.classList.add('radioactive')
            this.type = e.target.getAttribute('typeid')
        },
        checkedProblem(e){
            let items = document.getElementsByClassName('problem')
            items = Array.from(items)
            items.forEach((item) => {
                if(item.classList.contains('radioactive')){
                    item.classList.remove('radioactive')
                }
            })
            e.target.classList.add('radioactive')
            this.problem = e.target.getAttribute('problem')
        },
        async submitData(){
            if(this.phone == ''){
                alert('Le téléphone est requis !')
                return
            }

            if(this.fname == ''){
                alert('Le prénom est requis !')
                return
            }

            let response = await axios.post('/api/sendRequest', {
                'generation': this.generation == "" ? null : this.generation,
                'motorisation': this.moto,
                'phone': this.phone,
                'fname': this.fname,
                'problem': this.problem 
            })

            window.open(response.data, '_blank')
        }
    },
    computed:{
        filteredModels(){
            return this.models.filter(x => x.mark_id == this.brand)
        },
        filterMoto(){
            return this.motorisations.filter(x => x.modele_id == this.model && x.type == this.motoType)
        },
        filterGeneration(){
            return this.generations.filter(x => x.modele_id == this.model)
        },
        filterProblems(){
            return this.problems.filter(x => x.type_id == this.type)
        },
        getSolution(){
            return this.solutions.find(x => x.problem_id == this.problem)
        }
    },
    watch:{
        brand(){
            this.model = ""
        },
        model(){
            this.moto = ""
            this.motoType = ""
            this.generation = ""
        }
    },
    async mounted(){
        await this.loadBrands()
        await this.loadModels()
        await this.loadMoto()
        await this.loadGenerations()
        await this.loadTypes()
        await this.loadProblems()
        await this.loadSolutions()
    }
}
</script>

<style scoped>
    /* .step{
        @apply w-fit text-center mx-10;
    } */

    .step{
        @apply w-[35px] h-[35px] mx-auto mb-2 rounded-full bg-[#e5e6e6] text-black flex items-center justify-center font-poppins text-[14px];
    }

    /* .step p{
        @apply w-fit mx-auto text-[14px] font-poppins;
    } */

    .selected{
        background-color: #1D6363 !important;
        color: white !important;
        cursor: pointer;
    }

    .error{
        border-color: red;
    }

    .radioactive{
        @apply border-[#97c680];
    }
</style>