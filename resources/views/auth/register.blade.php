<x-guest-layout>

    <div class="min-h-screen bg-slate-100 flex items-center justify-center px-4 py-10">
    

    <div class="w-full max-w-md">
    
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
    
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-8 text-center">
    
                <div class="text-5xl mb-3">
                    🛠️
                </div>
    
                <h1 class="text-3xl font-bold text-white">
                    Join Kaarigar
                </h1>
    
                <p class="text-blue-100 mt-2">
                    Create your account and get started
                </p>
    
            </div>
    
            <div class="p-8">
    
                <form method="POST" action="{{ route('register') }}">
    
                    @csrf
    
                    <!-- Full Name -->
    
                    <div class="mb-4">
    
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Full Name
                        </label>
    
                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            placeholder="Enter Full Name"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500">
    
                        <x-input-error
                            :messages="$errors->get('name')"
                            class="mt-2" />
    
                    </div>
    
                    <!-- Role -->
    
                    <div class="mb-4">
    
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Register As
                        </label>
    
                        <select
                            name="role"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500">
    
                            <option value="customer">Customer</option>
                            <option value="worker">Worker</option>
    
                        </select>
    
                    </div>
    
                    <!-- Mobile Number -->
    
                    <div class="mb-4">
    
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Mobile Number
                        </label>
    
                        <div class="flex">
    
                            <span class="flex items-center justify-center px-4 bg-gray-100 border border-r-0 border-gray-300 rounded-l-xl text-gray-700 font-semibold">
                                +91
                            </span>
    
                            <input
                                type="text"
                                name="phone"
                                value="{{ old('phone') }}"
                                maxlength="10"
                                required
                                placeholder="9876543210"
                                class="w-full border border-gray-300 rounded-r-xl px-4 py-3 focus:ring-2 focus:ring-blue-500">
    
                        </div>
    
                        <x-input-error
                            :messages="$errors->get('phone')"
                            class="mt-2" />
    
                    </div>
    
                    <!-- Email -->
    
                    <div class="mb-4">
    
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Email Address
                        </label>
    
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            placeholder="Enter Email Address"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500">
    
                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2" />
    
                    </div>
    
                    <!-- Password -->
    
                    <div class="mb-4">
    
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Password
                        </label>
    
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            placeholder="Create Password"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500">
    
                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2" />
    
                    </div>
    
                    <!-- Confirm Password -->
    
                    <div class="mb-6">
    
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Confirm Password
                        </label>
    
                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            placeholder="Confirm Password"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500">
    
                        <x-input-error
                            :messages="$errors->get('password_confirmation')"
                            class="mt-2" />
    
                    </div>
    
                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl transition">
    
                        Create Account
    
                    </button>
    
                </form>
    
                <div class="text-center mt-6">
    
                    <span class="text-gray-600">
                        Already have an account?
                    </span>
    
                    <a
                        href="{{ route('login') }}"
                        class="text-blue-600 font-semibold hover:underline ml-1">
    
                        Login
    
                    </a>
    
                </div>
    
            </div>
    
        </div>
    
    </div>

    
    </div>
    
    </x-guest-layout>
    