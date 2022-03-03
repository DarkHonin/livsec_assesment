@extends('template') 

@section('title')
Login
@endsection

@section('content')
    <div class='m-auto card p-3 align-middle'>
                <div class='mb-3'>
                    Fill out the registraion form
                </div>
                    <div class='card-body'>
                        <form method='POST' action='/register' class='ma-auto'>
                            @csrf
                            <div class='mb-3'>
                                <label class='form-label' for='uname'>Username</label>
                                <input class='form-control' type='text' name='uname' placeholder='Username'>
                            </div>
                            <div class='mb-3'>
                                <label class='form-label' for='email'>Email</label>
                                <input class='form-control' type='text' name='email' placeholder='Email'>
                            </div>
                            <div class='mb-3'>
                                <label class='form-label' for='pword'>Password</label>
                                <input type='password' class='form-control' name='pword' placeholder='Password'>
                            </div>
                            <div class='mb-3'>
                                <label class='form-label' for='pword2'>Re-type Password</label>
                                <input type='password' class='form-control' name='pword2' placeholder='Re-type Password'>
                            </div>
                            <div>
                                <input class='btn btn-primary form-control' type='submit' value='Register'>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        </form>
                    </div>
                </div>
@endsection