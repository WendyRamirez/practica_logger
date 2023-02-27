@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Contact Form</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="card-title text-center">Formulario de Email Test</h5>
                </div>
                    <div class="card-body">  
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control-plaintext" name="name" placeholder="name">
                                        </div>
                                     </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Celular Number</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control-plaintext" name="phone" placeholder="phone">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control-plaintext" name="email" placeholder="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Subject</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control-plaintext" name="subject" placeholder="subject">
                                    </div>
                                        </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-2 col-form-label">Message</label>
                                    <div class="col-sm-10">
                                        <textarea name="message" cols="50" placeholder="Message"></textarea>
                                    </div>
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-info col-md-10">Submit</button>
                                    </div>
                            </div>
                        </form>  
                    </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection