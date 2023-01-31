@include('partials.__header', ['title' => 'Login'])
<div class="container my-5">
    <div class="card text-center w-50 m-auto">
        <div class="card-header">
            <i class="fa-solid fa-circle-user fs-1"></i>
        </div>
        <div class="card-body">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <h5 class="card-title">Member Login</h5>
                <div class="form-floating mb-3">
                    <input name="username" type="text" class="form-control" id="username" placeholder="username" required>
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
        <div class="card-footer text-muted">
            <a href="#" class="">Forget Password?</a>
            <hr>
            <a href="register" class="">Register</a>
        </div>
    </div>
</div>
@include('partials.__footer')