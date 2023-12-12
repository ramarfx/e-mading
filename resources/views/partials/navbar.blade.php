      <header class="bg-sky absolute left-0 top-0 z-50 flex w-full items-center border-b">
        <div class="container">
          <div class="relative flex items-center justify-between">
            <div class="px-4">
              <a href="#home"
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
                    <a href="/" class="mx-5 flex py-2 text-base text-slate-600 group-hover:text-primary">Home</a>
                  </li>
                  <li class="group">
                    <a href="/posts" class="mx-5 flex py-2 text-base text-slate-600 group-hover:text-primary">Posts</a>
                  </li>
                  @auth
                    <div class="flex flex-col items-center">
                      <div class="h-[32px] w-[32px] bg-sky-400">
                      </div>

                      <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <a onclick="return confirm('Apakah Yakin?') ? this.parentElement.submit() : null "
                          class="mx-5 flex cursor-pointer py-2 text-base text-slate-600 group-hover:text-primary">Logout</a>
                      </form>
                    </div>
                  @else
                    <li class="group">
                      <a href="/login" class="mx-5 flex py-2 text-base text-slate-600 group-hover:text-primary">Login</a>
                    </li>
                    <li class="group">
                      <a href="/register"
                        class="mx-5 flex py-2 text-base text-slate-600 group-hover:text-primary">Register</a>
                    </li>
                  @endauth
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </header>
