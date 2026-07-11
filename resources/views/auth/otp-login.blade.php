@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">

            <div class="card shadow-lg border-0">

                <div class="card-body p-4">

                    <div class="text-center mb-4">

                        <div class="display-3 mb-3">

                            🛠️

                        </div>

                        <h2 class="fw-bold">

                            Kaarigar

                        </h2>

                        <p class="text-muted">

                            Trusted Local Service Professionals

                        </p>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Mobile Number

                        </label>

                        <div class="input-group">

                            <span class="input-group-text">

                                +91

                            </span>

                            <input
                                id="phone"
                                type="text"
                                maxlength="10"
                                pattern="[0-9]{10}"
                                inputmode="numeric"
                                class="form-control"
                                placeholder="9876543210"
                                required>

                        </div>

                    </div>

                    <button
                        id="sendBtn"
                        type="button"
                        onclick="sendOTP()"
                        class="btn btn-primary w-100 mb-3">

                        Send OTP

                    </button>

                    <div id="recaptcha-container" class="mb-3"></div>

                    <div class="mb-3">

                        <label class="form-label">

                            OTP

                        </label>

                        <input
                            id="otp"
                            type="text"
                            maxlength="6"
                            class="form-control"
                            placeholder="Enter OTP">

                    </div>

                    <button
                        type="button"
                        onclick="verifyOTP()"
                        class="btn btn-success w-100">

                        Verify OTP

                    </button>

                    <div class="text-center mt-4 text-muted">

                        🔒 Secure OTP Authentication

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Firebase -->

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

    firebase.auth().signInWithPhoneNumber(phone, window.recaptchaVerifier)

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

    .catch(function () {

        alert('Invalid OTP');

    });

};

</script>

@endsection