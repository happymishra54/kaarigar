<x-guest-layout>
<div class="max-w-4xl mx-auto py-12">

    <h1 class="text-3xl font-bold text-center mb-10">
        Welcome to Kaarigar
    </h1>

    <div class="grid md:grid-cols-2 gap-8">

        <!-- Customer -->
        <form method="POST" action="{{ route('become.customer') }}">
            @csrf

            <button
                type="submit"
                class="bg-white shadow rounded-xl p-8 hover:shadow-lg w-full text-left">

                <h2 class="text-2xl font-bold mb-3">
                    🏠 Need a Service
                </h2>

                <p class="text-gray-600">
                    Book electricians, plumbers, carpenters and other professionals.
                </p>

            </button>

        </form>

        <!-- Worker -->
        <form method="POST" action="{{ route('become.worker') }}">
            @csrf

            <button
                type="submit"
                class="bg-white shadow rounded-xl p-8 hover:shadow-lg w-full text-left">

                <h2 class="text-2xl font-bold mb-3">
                    🔧 Work as a Kaarigar
                </h2>

                <p class="text-gray-600">
                    Manage services and customer bookings.
                </p>

            </button>

        </form>

    </div>

</div>

</x-guest-layout>