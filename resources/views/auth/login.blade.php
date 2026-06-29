<x-guest-layout>

<div class="min-h-screen bg-slate-100 flex items-center justify-center px-4">

    <div class="w-full max-w-md">

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-8 text-center">

                <div class="text-5xl mb-3">
                    🛠️
                </div>

                <h1 class="text-3xl font-bold text-white">
                    Kaarigar
                </h1>

                <p class="text-blue-100 mt-2">
                    Find trusted local professionals
                </p>

            </div>

            <div class="p-8">

                <form method="POST" action="{{ route('login') }}">

                    @csrf

                    <!-- Role Selection -->
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Login As
                    </label>

                    <div class="grid grid-cols-2 gap-3 mb-6">

                        <label class="border rounded-xl p-3 text-center cursor-pointer hover:bg-gray-50">

                            <input
                                type="radio"
                                name="role"
                                value="customer"
                                checked>

                            <span class="ml-2">
                                Customer
                            </span>

                        </label>

                        <label class="border rounded-xl p-3 text-center cursor-pointer hover:bg-gray-50">

                            <input
                                type="radio"
                                name="role"
                                value="worker">

                            <span class="ml-2">
                                Worker
                            </span>

                        </label>

                    </div>

                    <!-- Email / Mobile -->

                    <div class="mb-4">

                        <label class="block text-sm font-semibold text-gray-700 mb-2">

                            Email or Mobile Number

                        </label>

                        <input
                            type="text"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Enter Email or Mobile Number"
                            required
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                        @error('email')

                            <div class="text-red-500 text-sm mt-1">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    <!-- Password -->

                    <div class="mb-4">

                        <label class="block text-sm font-semibold text-gray-700 mb-2">

                            Password

                        </label>

                        <input
                            type="password"
                            name="password"
                            placeholder="Enter Password"
                            required
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    </div>

                    <!-- Remember -->

                    <div class="flex items-center mb-6">

                        <input
                            type="checkbox"
                            name="remember"
                            id="remember">

                        <label
                            for="remember"
                            class="ml-2 text-sm text-gray-600">

                            Remember Me

                        </label>

                    </div>

                    <!-- Login Button -->

                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl transition">

                        Login

                    </button>

                </form>

                <!-- OTP Coming Soon -->

                <div class="mt-6 border border-yellow-300 bg-yellow-50 rounded-xl p-4">

                    <div class="font-semibold text-yellow-800">

                        📱 Mobile OTP Login

                    </div>

                    <div class="text-sm text-yellow-700 mt-1">

                        Coming Soon

                    </div>

                </div>

                <!-- Links -->

                <div class="flex justify-between mt-6 text-sm">

                    @if (Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="text-blue-600 hover:underline">

                            Forgot Password?

                        </a>

                    @endif

                    <a
                        href="{{ route('register') }}"
                        class="text-blue-600 hover:underline">

                        Register

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</x-guest-layout>

