<x-guest-layout>

    <h1 class="text-2xl font-bold mb-6 text-center">
        Admin Login
    </h1>

    <form method="POST" action="{{ route('login') }}">

        @csrf

        <div class="mb-4">
            <label>Email</label>

            <input
                type="email"
                name="email"
                class="w-full rounded border-gray-300"
                required>
        </div>

        <div class="mb-4">
            <label>Password</label>

            <input
                type="password"
                name="password"
                class="w-full rounded border-gray-300"
                required>
        </div>

        <button
            type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded w-full">

            Login

        </button>

    </form>

</x-guest-layout>