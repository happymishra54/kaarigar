<div class="card border-0 shadow-lg rounded-4 overflow-hidden">

    <div class="card-body p-5">


        <h4 class="fw-bold text-danger mb-3">

            <i class="fa-solid fa-triangle-exclamation me-2"></i>

            Delete Account

        </h4>


        <p class="text-muted">

            Once your account is deleted, all your bookings, profile information,
            and account data will be permanently removed. This action cannot be undone.

        </p>



        <button
            type="button"
            class="btn btn-danger rounded-pill px-4"
            data-bs-toggle="modal"
            data-bs-target="#deleteAccountModal">


            <i class="fa-solid fa-trash me-2"></i>

            Delete Account


        </button>


    </div>

</div>





{{-- DELETE ACCOUNT MODAL --}}

<div class="modal fade"
     id="deleteAccountModal"
     tabindex="-1">


    <div class="modal-dialog modal-dialog-centered">


        <div class="modal-content rounded-4 border-0 shadow">


            <form method="POST"
                  action="{{ route('profile.destroy') }}">


                @csrf

                @method('DELETE')



                <div class="modal-header border-0">


                    <h5 class="modal-title fw-bold text-danger">

                        <i class="fa-solid fa-triangle-exclamation me-2"></i>

                        Confirm Delete

                    </h5>


                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">

                    </button>


                </div>





                <div class="modal-body">


                    <p class="text-muted">

                        Are you sure you want to permanently delete your account?

                        All your data will be removed.

                    </p>



                    <label class="form-label fw-semibold">

                        Enter Password

                    </label>



                    <input
                        type="password"
                        name="password"
                        class="form-control form-control-lg rounded-3"
                        placeholder="Your password">



                    @error('password')

                        <small class="text-danger">

                            {{ $message }}

                        </small>

                    @enderror


                </div>





                <div class="modal-footer border-0">


                    <button
                        type="button"
                        class="btn btn-secondary rounded-pill px-4"
                        data-bs-dismiss="modal">


                        Cancel


                    </button>



                    <button
                        type="submit"
                        class="btn btn-danger rounded-pill px-4">


                        <i class="fa-solid fa-trash me-2"></i>

                        Delete Permanently


                    </button>


                </div>


            </form>


        </div>


    </div>


</div>