<nav id="nav" class="sm:pt-[18px] lg:pt-[25px] sm:pb-[18px] sm:w-[95%] lg:w-[90%] mx-auto flex items-center font-varelarounded">
    <img class="sm:w-[95px] lg:w-[120px] block mr-[6%] z-[1000]" src="{{ url('/images/logos/logo.png') }}" alt="">
    <div class="w-full justify-between items-center text-[16px] sm:hidden lg:flex">
        <ul class="text-[#1e1e2f] flex">
            <li><a href="{{ url('/') }}" class="listhover cursor-pointer block mr-[40px] opacity-90">Accueil</a></li>
            <li><a href="{{ url('/search') }}" class="listhover cursor-pointer block mr-[40px] opacity-90">Trouver Auto</a></li>
            <li><a href="{{ url('/diagnostics') }}" class="listhover cursor-pointer block mr-[40px] opacity-90">Diagnostique</a></li>
            <li><a href="{{ url('/about') }}" class="listhover cursor-pointer block opacity-90">À Propos</a></li>
        </ul>
        <div class="flex items-center ml-[40px]">
            <a href="{{ url('/contact') }}" class="listhover cursor-pointer opacity-90 block mr-[25px]">Contact</a>
            <a href="{{ url('/login') }}" class="btnhover cursor-pointer opacity-90 block bg-[#1e1e2f] text-white px-6 py-2 rounded-[20px]">Se Connecter</a>
        </div>
    </div>
    <!-- menu button (open/close) -->
    <div id="menubtn" class="bg-[#1e1e2f] z-[1000] px-[9px] py-[12px] ml-auto cursor-pointer sm:block lg:hidden">
        <div class="bg-white w-[16px] h-[2px] mb-[4px]"></div>
        <div class="bg-white w-[16px] h-[2px]"></div>
    </div>
</nav>
<!-- menu body -->
<div id="menubody" class="fixed left-0 bg-white w-full h-full font-varelarounded pt-[80px] z-[100]">
    <div class="h-full px-[20px] pb-4 pt-[20px]">
        <div class="w-full h-full justify-between text-[16px] flex flex-col ">
            <ul class="text-black">
                <a href="{{ url('/') }}" class="cursor-pointer opacity-80 block text-[16px] py-[20px] border-b-[1px]">Accueil</a>
                <a href="{{ url('/search') }}" class="cursor-pointer opacity-80 block text-[16px] py-[20px] border-b-[1px]">Trouver Auto</a>
                <a href="{{ url('/diagnostics') }}" class="cursor-pointer opacity-80 block text-[16px] py-[20px] border-b-[1px]">Diagnostique</a>
                <a href="{{ url('/about') }}" class="cursor-pointer opacity-80 block text-[16px] py-[20px]">À Propos</a>
            </ul>
            <div class="flex w-full sm:text-[14px] md:text-[16px] border-t-[1px] pt-[20px] font-poppins font-[300]">
                <a href="{{ url('/contact') }}" class="mr-4 cursor-pointer opacity-90 block bg-white border-gray-200 border-[1px] text-[#1e1e2f] px-6 py-2 rounded-[20px] w-fit">Contact</a>
                <a href="{{ url('/login') }}" class="cursor-pointer opacity-90 block bg-[#1e1e2f] text-white px-6 py-2 rounded-[20px] w-fit">Se Connecter</a>
            </div>
        </div>
    </div>
</div>
<script>
    let nav = document.getElementById('nav')
    let menubody = document.getElementById('menubody')
    let menubtn = document.getElementById('menubtn')
    let opened = false
    const menusize = () => {
        // menubody.style.height = `calc(100% - ${nav.offsetHeight}px)`
        menubody.style.top = `0`
    }
    $('#menubody').slideUp(0, menusize)
    let children = menubtn.children
    
    window.addEventListener("resize", (e) => {
        menusize()
        //code to remove 
        if(e.target.innerWidth >= 1072){
            children[0].classList.remove('a')
            children[1].classList.remove('b')
            children[0].classList.remove('x')
            children[1].classList.remove('y')
            if(opened){
                $('#menubody').slideUp()
                opened = false
            }
        }
    })

    menubtn.addEventListener('click', () => {
        if(!opened){
            children[0].classList.remove('a')
            children[1].classList.remove('b')
            children[0].classList.add('x')
            children[1].classList.add('y')
            opened = true
            $('#menubody').slideDown(1000)
            
        }else{
            children[0].classList.remove('x')
            children[1].classList.remove('y')
            children[0].classList.add('a')
            children[1].classList.add('b')
            opened = false
            $('#menubody').slideUp(1000)
            
        }
    })
</script>