<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png" />
        <link rel="icon" type="image/x-icon" href="{{url('/images/logos/logo.ico')}}">
        <title>@yield('title')</title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/99be30e45a.js" crossorigin="anonymous"></script>

        <!-- Nucleo Icons -->
        <link href="{{url('/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
        <link href="{{url('/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
        <!-- Main Styling -->
        <link href="{{url('/assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5')}}" rel="stylesheet" />
    </head>

    <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
        @yield('sidebar')

        <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
            <!-- Navbar -->
            <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
              <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                @yield('topnav')
                <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                  <div class="flex items-center md:ml-auto md:pr-4">
                  </div>
                  <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                    <li class="flex items-center pl-4 xl:hidden">
                      <a href="javascript:;" class="block p-0 text-sm transition-all ease-nav-brand text-slate-500" sidenav-trigger>
                        <div class="w-4.5 overflow-hidden">
                          <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                          <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                          <i class="ease-soft relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                        </div>
                      </a>
                    </li>
      
                    <!-- notifications -->
      
                    <li class="relative flex items-center pr-2 px-4">
                      <p class="hidden transform-dropdown-show"></p>
                      <a href="javascript:;" class="block p-0 text-sm transition-all ease-nav-brand text-slate-500" dropdown-trigger aria-expanded="false">
                        {{-- <i class="cursor-pointer fa fa-bell" aria-hidden="true"></i> --}}
                        <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog" aria-hidden="true"></i>

                      </a>
      
                      <ul dropdown-menu class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease-soft lg:shadow-soft-3xl duration-250 min-w-44 before:sm:right-7.5 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                        <!-- add show class on dropdown open js -->
                        <li class="relative mb-2">
                          <div class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 lg:transition-colors" href="javascript:;">
                            <div class="flex py-1">
                              <div class="my-auto">
                                <img src="{{ url('/assets/img/team-4.jpg') }}" class="inline-flex items-center justify-center mr-4 text-sm text-white h-9 w-9 max-w-none rounded-xl" />
                              </div>
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-1 text-sm font-normal leading-normal"><span class="font-semibold">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</span></h6>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="relative mb-2">
                          <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors" href="javascript:;">
                            <div class="flex py-1">
                              <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="mb-1 text-sm font-normal leading-normal"><i class="fa-solid fa-right-from-bracket mr-2"></i> Se déconnecter</button>
                              </form>
                            </div>
                          </a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
      
      
            <div class="w-full px-6 py-6 mx-auto min-h-screen">
              @yield('body')
              <footer class="pt-4">
                <div class="w-full px-6 mx-auto">
                  <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                      <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                        ©
                        <script>
                          document.write(new Date().getFullYear());
                        </script>
                        Inspecto. All rights reserved
                      </div>
                    </div>
                  </div>
                </div>
              </footer>
            </div>
          </main>
    </body>
    <script src="{{url('/assets/js/plugins/perfect-scrollbar.min.js')}}" async></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{url('/assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5')}}" async></script>
    @yield('scripts')
</html>
