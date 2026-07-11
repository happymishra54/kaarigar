<div class="card border-0 shadow-lg rounded-4 overflow-hidden">

    <div class="card-body p-5">


        <h4 class="fw-bold mb-3">

            <i class="fa-solid fa-user-pen text-primary me-2"></i>

            Profile Information

        </h4>


        <p class="text-muted mb-4">

            Update your account name and email address.

        </p>





        {{-- Email Verification Form --}}

        <form id="send-verification"
              method="POST"
              action="{{ route('verification.send') }}">

            @csrf

        </form>





        {{-- Profile Update Form --}}

        <form method="POST"
              action="{{ route('profile.update') }}">


            @csrf

            @method('PATCH')





            {{-- NAME --}}

            <div class="mb-4">


                <label class="form-label fw-semibold">

                    Name

                </label>


                <input
                    type="text"
                    name="name"
                    class="form-control form-control-lg rounded-3"
                    value="{{ old('name',$user->name) }}"
                    required
                    autofocus>



                @error('name')

                    <small class="text-danger">

                        {{ $message }}

                    </small>

                @enderror


            </div>







            {{-- EMAIL --}}

            <div class="mb-4">


                <label class="form-label fw-semibold">

                    Email Address

                </label>


                <input
                    type="email"
                    name="email"
                    class="form-control form-control-lg rounded-3"
                    value="{{ old('email',$user->email) }}"
                    required>



                @error('email')

                    <small class="text-danger">

                        {{ $message }}

                    </small>

                @enderror





                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())


                    <div class="alert alert-warning rounded-4 mt-3">


                        <i class="fa-solid fa-envelope-circle-check me-2"></i>


                        Your email address is not verified.



                        <button
                            form="send-verification"
                            class="btn btn-link p-0 ms-2 text-decoration-none">


                            Send verification email


                        </button>



                    </div>




                    @if(session('status') === 'verification-link-sent')


                        <div class="alert alert-success rounded-4">


                            <i class="fa-solid fa-circle-check me-2"></i>

                            Verification link sent successfully.


                        </div>


                    @endif



                @endif



            </div>








            {{-- SAVE BUTTON --}}

            <button
                type="submit"
                class="btn btn-primary rounded-pill px-5 py-3">


                <i class="fa-solid fa-floppy-disk me-2"></i>


                Save Changes


            </button>





            @if(session('status') === 'profile-updated')


                <span class="text-success fw-semibold ms-3">


                    <i class="fa-solid fa-circle-check me-1"></i>


                    Saved Successfully


                </span>


            @endif



        </form>


    </div>


</div>