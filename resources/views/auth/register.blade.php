@include('partials.__header', ['title' => 'Register'])
<div class="container my-5">
    <div class="card text-center w-50 m-auto">
        <div class="card-header">
            <h1 class="card-title">Register</h1>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="register" method="post">
                @csrf
                <p>Create your account. It's free and only takes a minute.</p>

                <div class="row g-2">
                    <div class="col-md mb-3">
                        <div class="form-floating">
                            <input type="text" name="firstName" class="form-control" id="firstName" placeholder=" " value="" required value="{{ old('firstName') }}">
                            <label for="firstName">First Name</label>
                        </div>
                    </div>
                    <div class="col-md mb-3">
                        <div class="form-floating">
                            <input type="text" name="lastName" class="form-control" id="lastName" placeholder=" " value="" required>
                            <label for="lastName">Last Name</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="username" placeholder=" " required>
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="email" class="form-control" id="email" placeholder=" " required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Password" required>
                    <label for="password_confirmation">Confirm Password</label>
                </div>
                <div class="form-check text-start mb-3">
                    <input class="form-check-input" type="checkbox" value="" id="terms" required>
                    <label class="form-check-label" for="terms">
                        I accept the <a href="">Terms of Use</a> & <a href="">Privacy Policy</a>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register Now</button>

            </form>
        </div>
        <div class="card-footer text-muted">
            <a href="../" class=""><i class="fa-solid fa-backward-step"></i> Go back to Login</a>
        </div>
    </div>
</div>
@include('partials.__footer')