      <header class="bg-sky absolute left-0 top-0 z-50 flex w-full items-center border-b">
        <div class="container">
          <div class="relative flex items-center justify-between">
            <div class="px-4">
              <a href="{{ route('home') }}"
                class="block py-6 text-2xl font-semibold tracking-wide text-primary lg:text-2xl">E-Mading</a>
            </div>
            <div class="flex items-center px-4">
              <button id="hamburger" name="hamburger" class="absolute right-4 block lg:hidden">
                <span class="hamburger-line origin-top-left transition duration-300 ease-in-out"></span>
                <span class="hamburger-line transition duration-300 ease-in-out"></span>
                <span class="hamburger-line origin-bottom-left transition duration-300 ease-in-out"></span>
              </button>

              <nav id="navMenu"
                class="bg-dark shadow-lightDark-100 absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg py-5 shadow-sm lg:static lg:mr-10 lg:block lg:max-w-full lg:rounded-none lg:bg-transparent lg:shadow-none">
                <ul class="block lg:flex">
                  <li class="group">
                    <a href="{{ route('home') }}"
                      class="mx-5 flex py-2 text-base text-slate-600 group-hover:text-primary">Home</a>
                  </li>
                  @auth
                  @if (!auth()->user()->roles->contains('name', 'student'))
                  <li class="group">
                    <a href="{{ route('dashboard') }}"
                      class="mx-5 flex py-2 text-base text-slate-600 group-hover:text-primary">Dashboard</a>
                  </li>
                  @endif
                    <div class="relative flex flex-col items-center">
                      <button id="dropdownBtn" class="h-[40px] w-[40px] overflow-hidden rounded-full bg-sky-400 p-1"
                        onclick="">
                        <img src="{{ asset('assets/img/festfun.jpg') }}"
                          class="h-auto w-full max-w-full object-cover object-center" alt="">
                      </button>

                      <div id    = "dropdownContent"
                        class = "absolute right-0 top-12 hidden rounded border bg-white shadow-sm">
                        <ul class = "flex w-[200px] flex-col gap-5 p-3">
                          <li>
                            <p href="" class="border-b pb-3 text-lg font-semibold capitalize text-primary">Hi,
                              {{ auth()->user()->name }}</p>
                          </li>
                          <li><a href=""
                              class="flex items-center gap-3 text-base text-secondary hover:text-primary"><i
                                class="fa-solid fa-user"></i>profil</a></li>
                          <li><a href="{{ route('bookmark.index') }}"
                              class="flex items-center gap-3 text-base text-secondary hover:text-primary"><i
                                class="fa-solid fa-bookmark"></i> favorit saya</a></li>
                          <li><a href=""
                              class="flex items-center gap-3 border-t pt-2 text-base text-secondary hover:text-primary">
                              <i class="fa-solid fa-right-from-bracket"></i>
                              <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit">Logout</button>
                              </form>
                            </a></li>
                          </li>
                        </ul>
                      </div>


                    </div>
                  @else
                    <li class="group">
                      <a href="{{ route('login.index') }}"
                        class="mx-5 flex py-2 text-base text-slate-600 group-hover:text-primary">Login</a>
                    </li>
                    <li class="group">
                      <a href="{{ route('register.index') }}"
                        class="mx-5 flex py-2 text-base text-slate-600 group-hover:text-primary">Register</a>
                    </li>
                  @endauth
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </header>