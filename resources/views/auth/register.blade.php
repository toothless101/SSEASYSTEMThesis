@extends('layout.app')
@section('title', 'SSEA | Register')
@section('content')

<!--REGISTER CSS-->
<link rel="stylesheet" href="{{asset('css/register.css')}}">

<div class="container signup-container">

    <!--LEFT Section-->
    <div class="left">
        <h1>Sign Up</h1>
        <div class="underline"></div>

        <!-- Signup Message -->
        <div class="createmsg">
            <h2>Create an Admin user</h2>
        </div>

        <!--SIGN UP FORM-->

        <form method="" action="">
            <div class="form-group mb-4 position-relative">
                <input type="text" id="fullname" name="fullname" autofocus>
                <label for="fullname">Full Name</label>
                <i class="fas fa-user icon"></i>
            </div>
            
            <div class="form-group mb-4 position-relative">
                <input type="text" id="fullname" name="fullname" autofocus>
                <label for="fullname">Email</label>
                <i class="fas fa-envelope icon"></i> 
            </div>

            <!-- Username Field -->
            <div class="form-group mb-4 position-relative">
                <input type="text" id="username" name="username">
                <label for="username">Username</label>
                <i class="fas fa-user icon"></i>
            </div>

            <!-- Password Field -->
            <div class="form-group mb-4 position-relative">
                <input type="password" id="password" name="password">
                <label for="password">Password</label>
                <i class="fas fa-lock icon"></i>
            </div>

            <div class="signup_button">
                <button type="submit" class="s-btn">Sign Up</button>
            </div>
        </form>

        <!-- Login Prompt -->
        <div class="login_button">
            Already have an account? 
            <a href="#">Login</a>
        </div>
    </div>

    <!--RIght Section-->
    <div class="right">
        <h1>TAGUM CITY COLLEGE OF SCIENCE AND TECHNOLOGY <br> FOUNDATION, INC.</h1>

        <!-- School Logos -->
        <div class="school_logos">
            <div class="school_logo">
                <img src="{{ asset('img/418786725_1079231866656453_7752077010997336838_n (1).png') }}" alt="tccstfi_logo">
            </div>
            <div class="ssc_logo">
                <img src="{{ asset('img/Untitled-1.png') }}" alt="tccstfi_logo">
            </div>
        </div>
    </div>
</div>
@endsection