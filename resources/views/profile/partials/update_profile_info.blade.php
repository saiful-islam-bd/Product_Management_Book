<div class="row">
    <div class="col-2"></div>

    <div class="col-8">
        <div class="card p-5">
            <h4 class="text-lg font-medium text-gray-600">Profile Information</h4>
            <p class="mt-1 text-sm text-gray-400">
                Update your account's profile information and email address.
            </p>

            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')

                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" id=""
                        placeholder="Title">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="text" name="email" value="{{ $user->email }}" class="form-control" id=""
                        placeholder="Email">
                </div>


                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif

                <div class="flex items-center gap-4">
                    {{-- <x-primary-button>{{ __('Save') }}</x-primary-button> --}}

                    <button class="btn btn-primary" style="">Save</button>

                    @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="alert alert-success mt-3">{{ __('Saved Successfully!') }}</p>
                    @endif
                </div>

            </form>

        </div>



    </div>
</div>

<div class="col-2"></div>
</div>
