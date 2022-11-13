@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Import Form') }}</div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('import')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="setting"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Setting') }}</label>

                                <div class="col-md-6">
                                    <select name="setting" class="form-control @error('setting') is-invalid @enderror">
                                        <option value="2">Please select</option>
                                        @foreach($settings as $setting)
                                            <option
                                                value="{{$setting->id}}"
                                                @selected($setting->id == old('setting'))
                                            >
                                                {{$setting->label}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('setting')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="csv"
                                       class="col-md-4 col-form-label text-md-end">{{ __('CSV File') }}</label>

                                <div class="col-md-6">
                                    <input
                                        type="file"
                                        name="csv"
                                        class="form-control @error('csv') is-invalid @enderror"
                                    />

                                    @error('csv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="delimiter"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Delimiter') }}</label>

                                <div class="col-md-6">
                                    <select name="delimiter"
                                            class="form-control @error('delimiter') is-invalid @enderror"
                                    >
                                        <option value="">Please select</option>
                                        @foreach(App\Services\Delimiters::withDescription() as $delimiter)
                                            <option
                                                value="{{$delimiter['value']}}"
                                                @selected($delimiter['value'] == old('delimiter'))
                                            >
                                                {{$delimiter['description']}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('delimiter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('Import')
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
