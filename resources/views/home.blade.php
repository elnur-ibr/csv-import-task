@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Import Form') }}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('import')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <select name="setting">
                                @foreach($settings as $setting)
                                    <option value="2">Please select</option>
                                    <option value="{{$setting->id}}">{{$setting->label}}</option>
                                @endforeach
                            </select>
                            <input type="file" name="csv">Csv</input>
                            <button type="submit">@lang('Import')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
