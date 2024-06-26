@extends('layouts.master')

@section('login')
    <div class="loginContainer">
        <div class="secondContainer">
            <h1>Login</h1>
            <div class="overlay" id="Login">
                <div class="wrapper">
                    <div class="content">
                        <div class="formContainer">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Your email" value="{{ old('email') }}" required>
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Your password" required>
                                <input type="submit" value="Login">
                                <p>Don't have an account yet? <a href="{{ route('register') }}">Sign up!</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection