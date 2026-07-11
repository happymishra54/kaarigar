<div class="card border-0 shadow-lg rounded-4 overflow-hidden">

    <div class="card-body p-5">


        <h4 class="fw-bold mb-3">

            <i class="fa-solid fa-lock text-primary me-2"></i>

            Update Password

        </h4>


        <p class="text-muted mb-4">

            Ensure your account is protected by using a strong password.

        </p>



        <form method="POST"
              action="{{ route('password.update') }}">


            @csrf

            @method('PUT')



            {{-- CURRENT PASSWORD --}}

            <div class="mb-4">


                <label class="form-label fw-semibold">

                    Current Password

                </label>


                <input
                    type="password"
                    name="current_password"
                    class="form-control form-control-lg rounded-3"
                    autocomplete="current-password">



                @error('current_password','updatePassword')

                    <small class="text-danger">

                        {{ $message }}

                    </small>

                @enderror


            </div>





            {{-- NEW PASSWORD --}}

            <div class="mb-4">


                <label class="form-label fw-semibold">

                    New Password

                </label>


                <input
                    type="password"
                    name="password"
                    class="form-control form-control-lg rounded-3"
                    autocomplete="new-password">



                @error('password','updatePassword')

                    <small class="text-danger">

                        {{ $message }}

                    </small>

                @enderror


            </div>





            {{-- CONFIRM PASSWORD --}}

            <div class="mb-4">


                <label class="form-label fw-semibold">

                    Confirm New Password

                </label>


                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control form-control-lg rounded-3"
                    autocomplete="new-password">



                @error('password_confirmation','updatePassword')

                    <small class="text-danger">

                        {{ $message }}

                    </small>

                @enderror


            </div>





            <button
                type="submit"
                class="btn btn-primary rounded-pill px-5 py-3">


                <i class="fa-solid fa-floppy-disk me-2"></i>

                Save Password


            </button>





            @if(session('status') === 'password-updated')


                <span class="text-success fw-semibold ms-3">


                    <i class="fa-solid fa-circle-check me-1"></i>

                    Saved Successfully


                </span>


            @endif



        </form>


    </div>

</div>