<aside class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent">
    <div class="before">
        <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
        <a disabled class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="{{ url('/clients') }}" target="_blank">
            <img src="{{ url('/images/logos/logo.png') }}" class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Inspecto</span>
        </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

    <div style="overflow-y:auto;" class="after">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/requests') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-user icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Demandes</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/newsletter') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-at icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Newsletter</span>
                </a>
            </li>
            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Marques</h6>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/brands') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-table icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Liste</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/brands/create') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-circle-plus icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Ajouter</span>
                </a>
            </li>
            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Modèles</h6>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/modeles') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-table icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Liste</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/modeles/create') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-circle-plus icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Ajouter</span>
                </a>
            </li>
            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Générations</h6>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/generations') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-table icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Liste</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/generations/create') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-circle-plus icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Ajouter</span>
                </a>
            </li>
            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Motorisations</h6>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/motorisations') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-table icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Liste</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/motorisations/create') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-circle-plus icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Ajouter</span>
                </a>
            </li>
            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Prix</h6>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/pricerange') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-table icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Liste</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/pricerange/create') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-circle-plus icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Ajouter</span>
                </a>
            </li>
            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Voitures</h6>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/cars') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-table icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Liste</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/cars/create') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-circle-plus icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Ajouter</span>
                </a>
            </li>
            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Type de problème</h6>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/types') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-table icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Liste</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/types/create') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-circle-plus icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Ajouter</span>
                </a>
            </li>
            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Problème</h6>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/problems') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-table icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Liste</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/problems/create') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-circle-plus icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Ajouter</span>
                </a>
            </li>
            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Solution</h6>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/solutions') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-table icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Liste</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/solutions/create') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-circle-plus icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Ajouter</span>
                </a>
            </li>
            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Personnalisations</h6>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/custom') }}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                    <i class="fa-brands fa-medium icnav"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Modifier</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<script>
    const divBeforeHr = document.querySelector('.before');
    const divAfterHr = document.querySelector('.after');
    const screenHeight = window.innerHeight;
    const divBeforeHrHeight = divBeforeHr.clientHeight;
    const divAfterHrHeight = screenHeight - divBeforeHrHeight;
    divAfterHr.style.height = `${divAfterHrHeight - 150}px`;
</script>

<style>
    .icnav{
        font-size: 12px;
        color: #3a416f;
    }

    .height{
        height: calc(100vh-19.5rem);
    }

    ::-webkit-scrollbar {
        width: 0px !important;
    }
</style>