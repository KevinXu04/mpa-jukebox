@extends('layouts.master')

@section('register')
    <div class="loginContainer">
        <div class="secondContainer">
            <h1>Register</h1>
            <div class="overlay" id="Register">
                <div class="wrapper">
                    <div class="content">
                        <div class="formContainer">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <label>Username</label>
                                <input type="text" name="name" placeholder="Your username" required>
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Your email" required>
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Your password" required>
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" placeholder="Confirm your password" required>
                                <input type="submit" value="Register">
                                <p>Already have an account? <a href="/">Sign in!</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
