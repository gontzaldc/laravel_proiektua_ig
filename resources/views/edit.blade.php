<!-- app/views/edit.blade.php -->
@extends('layouts.app')
@section('content')
@if (Auth::check())
<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('games') }}">View All Character</a></li>
        <li><a href="{{ URL::to('games/create') }}">Create a Character</a>
    </ul>
</nav>
        <div class="container">
            <div class="row">
                <h1>Submit a Character</h1>
                <form action="/games/{{$games->id}}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            Please fix the following errors
                        </div>
                    @endif

                    {!! csrf_field() !!}
                    <div class="form-group{{ $errors->has('izena') ? ' has-error' : '' }}">
                        <label for="izena">Character izena</label>
                        <input type="text" class="form-control" id="izena" name="izena" placeholder="izena" value="{{ old('izena',$games->izena) }}">
                        @if($errors->has('izena'))
                            <span class="help-block">{{ $errors->first('izena') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('deskripzioa') ? ' has-error' : '' }}">
                        <label for="deskripzioa">deskripzioa</label>
                        <textarea class="form-control" id="deskripzioa" name="deskripzioa" placeholder="deskripzioa">{{ old('deskripzioa',$games->deskripzioa)  }}</textarea>
                        @if($errors->has('deskripzioa'))
                            <span class="help-block">{{ $errors->first('deskripzioa') }}</span>
                        @endif
                    </div>
                    
                    <div class="form-group{{ $errors->has('adina') ? ' has-error' : '' }}">
                        <label for="adina">adina</label>
                        <input type="text" class="form-control" id="adina" name="adina" placeholder="adina" value="{{ old('adina',$games->adina) }}">
                        @if($errors->has('adina'))
                            <span class="help-block">{{ $errors->first('adina') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('jokalariKop') ? ' has-error' : '' }}">
                        <label for="jokalariKop">jokalariKop</label>
                        <input type="text" class="form-control" id="jokalariKop" name="jokalariKop" placeholder="jokalariKop" value="{{ old('jokalariKop',$games->jokalariKop) }}">
                        @if($errors->has('jokalariKop'))
                            <span class="help-block">{{ $errors->first('jokalariKop') }}</span>
                        @endif
                    </div>
                    <!-- <div class="form-group{{ $errors->has('irudia') ? ' has-error' : '' }}">
                        <label for="irudia">irudia</label>
                        <input type="file" class="form-control" id="irudia" name="irudia" placeholder="irudia" value="{{ old('irudia',$games->irudia) }}">
                        @if($errors->has('irudia'))
                            <span class="help-block">{{ $errors->first('irudia') }}</span>
                        @endif
                    </div> -->
                    <button type="submit" class="btn btn-default">Submit</button>
                    </form>
            </div>
        </div>
    @endif
@endsection
