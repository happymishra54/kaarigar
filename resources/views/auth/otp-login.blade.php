<x-guest-layout>

<div class="min-h-screen bg-gradient-to-br from-blue-700 via-indigo-700 to-purple-800 flex items-center justify-center px-4">

    <!-- Background Effects -->
    <div class="absolute inset-0 overflow-hidden">

        <div class="absolute top-10 left-10 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>

        <div class="absolute bottom-10 right-10 w-96 h-96 bg-blue-400/20 rounded-full blur-3xl"></div>

    </div>

    <!-- Login Card -->
    <div class="relative w-full max-w-md">

        <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-3xl shadow-2xl p-8">

            <!-- Logo -->
            <div class="text-center mb-8">

                <div class="w-20 h-20 mx-auto mb-4 bg-white rounded-2xl flex items-center justify-center shadow-lg">

                    <span class="text-4xl">🛠️</span>

                </div>

                <h1 class="text-4xl font-extrabold text-white">
                    Kaarigar
                </h1>

                <p class="text-white/80 mt-2">
                    Trusted Local Service Professionals
                </p>

            </div>

            <!-- Mobile Number -->
            <div class="mb-5">

                <label class="block text-white mb-2 text-sm">
                    Mobile Number
                </label>

                <div class="flex items-center bg-white rounded-xl overflow-hidden shadow-lg">

                    <div class="px-4 py-4 bg-gray-100 font-bold text-gray-700">
                        +91
                    </div>

                    <input
                        id="phone"
                        type="text"
                        maxlength="10"
                        pattern="[0-9]{10}"
                        inputmode="numeric"
                        placeholder="9876543210"
                        class="w-full px-4 py-4 outline-none text-gray-700"
                        required>

                </div>

            </div>

            <!-- Send OTP -->
            <button
                id="sendBtn"
                onclick="sendOTP()"
                class="w-full py-4 rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 text-green font-bold text-lg shadow-lg hover:scale-105 transition duration-300">

                Send OTP

            </button>

            <div id="recaptcha-container"></div>

            <!-- OTP Field -->
            <div class="mt-6">

                <input
                    type="text"
                    id="otp"
                    maxlength="6"
                    placeholder="Enter OTP"
                    class="w-full px-4 py-4 rounded-xl border-0 shadow-lg focus:ring-2 focus:ring-blue-500">

            </div>

            <!-- Verify OTP -->
            <button
                onclick="verifyOTP()"
                class="w-full mt-4 py-4 rounded-xl bg-gradient-to-r from-green-500 to-emerald-600 text-green font-bold text-lg shadow-lg hover:scale-105 transition duration-300">

                Verify OTP

            </button>

            <!-- Footer -->
            <div class="mt-6 text-center text-white/80 text-sm">

                🔒 Secure OTP Authentication

            </div>

        </div>

    </div>

</div>

<script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-auth.js"></script>

<script>

const firebaseConfig = {

    apiKey: "AIzaSyDCAN_dDHsmdofcPcWZ1xH3q_5ax__SOK8",

    authDomain: "project-7b38d.firebaseapp.com",

    projectId: "project-7b38d",

    appId: "1:857570961985:web:64162859124a3f160cf4c0"

};

firebase.initializeApp(firebaseConfig);

window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
    'recaptcha-container',
    {
        size: 'invisible'
    }
);

window.sendOTP = function () {

    const mobile = document.getElementById('phone').value;

    if (mobile.length !== 10) {

        alert('Please enter a valid 10-digit mobile number');

        return;
    }

    const phone = '+91' + mobile;

    document.getElementById('sendBtn').innerHTML = 'Sending OTP...';

    firebase.auth()
        .signInWithPhoneNumber(
            phone,
            window.recaptchaVerifier
        )
        .then(function (confirmationResult) {

            window.confirmationResult = confirmationResult;

            document.getElementById('sendBtn').innerHTML = 'OTP Sent ✓';

            alert('OTP Sent Successfully');

            document.getElementById('otp').focus();

        })
        .catch(function (error) {

            console.error(error);

            document.getElementById('sendBtn').innerHTML = 'Send OTP';

            alert(error.message);

        });

};

window.verifyOTP = function () {

    const otp = document.getElementById('otp').value;

    window.confirmationResult.confirm(otp)

    .then(function (result) {

        fetch('/firebase-login', {

            method: 'POST',

            headers: {

                'Content-Type': 'application/json',

                'X-CSRF-TOKEN': '{{ csrf_token() }}'

            },

            body: JSON.stringify({

                phone: result.user.phoneNumber

            })

        })

        .then(response => response.json())

        .then(data => {

            if (data.success && data.redirect) {

                window.location.href = data.redirect;

            } else {

                alert('Login failed');

            }

        });

    })

    .catch(function (error) {

        console.error(error);

        alert('Invalid OTP');

    });

};

</script>

</x-guest-layout>

