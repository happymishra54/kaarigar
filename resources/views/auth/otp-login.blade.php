<x-guest-layout>

    <div class="max-w-md mx-auto">

        <h1 class="text-2xl font-bold mb-6 text-center">
            Login with OTP
        </h1>

        <div class="mb-4">

            <label class="block mb-2">
                Enter Mobile Number (with country code)
            </label>

            <input
                type="text"
                id="phone"
                placeholder="+919999999999"
                class="w-full rounded border-gray-300">

        </div>

        <button
            onclick="sendOTP()"
            class="bg-blue-600 text-white px-4 py-2 rounded">

            Send OTP

        </button>

        <div id="recaptcha-container"></div> <!-- reCAPTCHA will be rendered here -->

        <div class="mt-6">

            <input
                type="text"
                id="otp"
                placeholder="Enter OTP"
                class="w-full rounded border-gray-300">

        </div>

        <button
            onclick="verifyOTP()"
            class="bg-blue-600 text-white px-4 py-2 rounded mt-4">

            Verify OTP

        </button>

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
        
            const phone = document.getElementById('phone').value;
        
            firebase.auth()
                .signInWithPhoneNumber(
                    phone,
                    window.recaptchaVerifier
                )
                .then(function (confirmationResult) {
        
                    window.confirmationResult = confirmationResult;
        
                    alert('OTP Sent');
        
                })
                .catch(function (error) {
        
                    console.error(error);
        
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

        console.log("Laravel JSON:", data);

        if (data.success && data.redirect) {

            window.location.href = data.redirect;

        } else {

            alert("No redirect received");

        }

    });

})

.catch(function (error) {

    console.error(error);

    alert("Invalid OTP");

});

};
        
        </script>

    

</x-guest-layout>
