@extends('template') 

@section('title')
Login
@endsection

@section('content')
    <div class='m-auto card p-3 align-middle'>
                <div class='mb-3'>
                    Please login to continue
                </div>
                    <div class='card-body'>
                        <form method='POST' action='/login' class='ma-auto'>
                            @csrf
                            <div class='mb-3'>
                                <label class='form-label' for='email'>Email</label>

                                <input class='form-control' type='email' name='uname' placeholder='Email'>
                            </div>
                            <div class='mb-3'>
                                <label class='form-label' for='pword'>Password</label>
                                <input type='password' class='form-control' name='pword' placeholder='Password'>
                            </div>
                            <div>
                                <input class='btn btn-primary form-control' type='submit' value='login'>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        </form>
                    </div>
                </div>
@endsection