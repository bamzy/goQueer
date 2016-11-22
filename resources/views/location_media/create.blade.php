@extends('dashboard')

@section('section')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Assign Media to Location</h2>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(array('action' => 'LocationMediaController@store','method'=>'POST')) !!}
    <div class="row" >

        <div class="col-xs-12 col-sm-12 col-md-12" style="visibility: hidden">
            <div class="form-group">
                {{ Form::hidden('location_id', 1, array('id' => 'location_id')) }}
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
            <div  class="form-group">
                {!! Form::Label('type', 'Media:') !!}
                {!! Form::select('media_id', $medias, null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Add</button>
            <a class="btn btn-primary" href="{{ route('location.index') }}">Back</a>
        </div>
    </div>
    {!! Form::close() !!}
    <script>
    </script>

@endsection