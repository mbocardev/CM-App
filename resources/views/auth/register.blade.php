<form method="POST" action="{{ route('register') }}">
    @csrf
    <!-- First Name -->
    <div class="mb-4">
        <input type="text" id="first_name" name="first_name" class="form-control form-control-lg form-control-alt" :value="old('first_name')" placeholder="First Name" required autofocus autocomplete="given-name">
        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
    </div>

    <!-- Last Name -->
    <div class="mb-4">
        <input type="text" id="last_name" name="last_name" class="form-control form-control-lg form-control-alt" :value="old('last_name')" placeholder="Last Name" required autocomplete="family-name">
        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
    </div>

    <!-- Email -->
    <div class="mb-4">
        <input type="email" id="email" name="email" class="form-control form-control-lg form-control-alt" :value="old('email')" placeholder="Email" required autocomplete="username">
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Telephone -->
    <div class="mb-4">
        <input type="tel" id="telephone" name="telephone" class="form-control form-control-lg form-control-alt" :value="old('telephone')" placeholder="Telephone" required autocomplete="tel">
        <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
    </div>
    
    <!-- Password -->
    <div class="mb-4">
        <input type="password" id="password" name="password" class="form-control form-control-lg form-control-alt" placeholder="Password" required autocomplete="new-password">
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mb-4">
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg form-control-alt" placeholder="Confirm Password" required autocomplete="new-password">
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <!-- Terms and Conditions -->
    <div class="mb-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="signup-terms" name="signup-terms">
            <label class="form-check-label" for="signup-terms">I agree to Terms & Conditions</label>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="row mb-4">
        <div class="col-md-6 col-xl-5">
            <button type="submit" class="btn w-100 btn-alt-success">
                <i class="fa fa-fw fa-plus me-1 opacity-50"></i> Register
            </button>
        </div>
    </div>
</form>
