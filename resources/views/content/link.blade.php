@extends('main.content')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                        <form action="{{ route('link.store') }}" method="post" enctype="multipart/form-data" id="form-link" class="form-horizontal">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-3 control-label" for="input-status">Enter link</label>
                                <div class="col-sm-8">
                                    <input name="resource_link" type="url" value="{{ old('link') }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 control-label" for="input-status">Enter limit click</label>
                                <div class="col-sm-8">
                                    <input name="limit" type="number" placeholder="0 - unlimited" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 control-label" for="input-status">Enter link lifetime</label>
                                <div class="col-sm-8">
                                    <input name="lifetime" type="number" min="0" max="24" placeholder="maximum 24 hours" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-primary" type="submit">SEND</button>
                            </div>
                        </form>
                        <div class="row mb-3">
                            <div class="col-sm-12" id="list-users">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
