<x-guest-layout>
 
    <div class="" style="">

    <section class="bg-gray-50 w-100">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
  <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 ">
          <img class="w-8 h-8 mr-2" src="{{url('/assets/img/passportease-favicon-color.png')}}" style="transform:scale(2)" alt="logo">
          PassportEase    
      </a>
      <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                  Sign in to your account
              </h1>
              <x-validation-errors class="mb-4" />
              <form class="space-y-4 md:space-y-6 mt-4" method="POST" action="{{ route('login') }}">
              @csrf
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
                      <input type="email" name="email" value="{{old('email')}}" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required>
                  </div>
                  <div class="mt-2">
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                  </div>
                  <div class="flex items-center justify-between mb-4 mt-4">
                      <div class="flex items-start">
                          <div class="flex items-center h-5">
                            <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 " >
                          </div>
                          <div class="ml-3 text-sm">
                            <label for="remember" class="text-gray-500 ">Remember me</label>
                          </div>
                      </div>
                      @if (Route::has('password.request'))
                      <a href="{{ route('password.request') }}" class="text-sm font-medium text-primary-600 hover:underline ">Forgot password?</a>

                      @endif
                  </div>

                  <div class="flex justify-center m-4">
                  <x-button class=" ">
                    {{ __('Log in') }}
                </x-button>
                  </div>
            
                  <p class="text-sm font-light text-gray-800 mt-4">
                      Don’t have an account yet? <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline ">Sign up</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>
    </div>
    

</x-guest-layout>
