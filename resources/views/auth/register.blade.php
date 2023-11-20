<x-guest-layout>
  
    <section class="bg-gray-50 ">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0" style="margin-top: 220px">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 ">
          <img class="w-8 h-8 mr-2" src="{{url('/assets/img/passportease-favicon-color.png')}}" style="transform:scale(2)" alt="logo">
          PassportEase    
      </a>
      <div class="w-full bg-white rounded-lg shadow  md:mt-0 sm:max-w-md xl:p-6" >
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8" >
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                  Create an account
              </h1>
              <x-validation-errors class="mb-4" />
              <form class="space-y-4 md:space-y-6" action="{{ route('register') }}" method="POST">
              @csrf
                  <div class="mt-2">
                      <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">First Name</label>
                      <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="John" required="">
                  </div>
                  <div class="mt-2">
                      <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Last Name</label>
                      <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Doe" required="">
                  </div>
                  <div class="mt-2">
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email Address</label>
                      <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="name@company.com" required="">
                  </div>

                  <div class="mt-2">
                      <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">Phone Number</label>
                      <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="07X XXX XXXX" >
                  </div>

                  <div class="mt-2">
                      <label for="address" class="block mb-2 text-sm font-medium text-gray-900 ">Address</label>
                      <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Winchester , London" >
                  </div>

                  <div class="mt-2">
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
                  </div>
                  <div class="mt-2">
                      <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 ">Confirm Password</label>
                      <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
                  </div>
                  <div class="flex items-start mt-4">
                      <div class="flex items-center h-5">
                        <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 " required="">
                      </div>
                      <div class="ml-3 text-sm">
                        <label for="terms" class="font-light text-gray-500 ">I accept the <a class="font-medium text-primary-600 hover:underline " href="#" required>Terms and Conditions</a></label>
                      </div>
                  </div>
                

                    <div class="flex justify-center mt-4">

                        <x-button class="ml-4">
                            {{ __('Register') }}
                        </x-button>

                    </div>

                  <p class="text-sm font-light text-gray-500 mt-2">
                      Already have an account? <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline">Login here</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>

</x-guest-layout>
