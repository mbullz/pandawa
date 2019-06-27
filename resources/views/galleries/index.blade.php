@extends('layouts.app')

@section('page_title')
	Galleries
@endsection

@section('breadcrumb')
	<li><a href="#">Dashboard</a></li>
	<li><a href="#">Galleries</a></li>
	<li class="active">Index</li>
@endsection

@section('content')
	
	<div class="row">
        <div class="col-lg-12">
        	@if ($role == 'admin')
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Add Photo</strong>
                    </div>
                    <div class="card-body">
                        
                        <form action="/galleries" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="photo" class=" form-control-label">Photo</label></div>
                                <div class="col-12 col-md-9"><input type="file" id="photo" name="photo" placeholder="" class="form-control"><small class="form-text text-muted">Upload photo</small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="description" class=" form-control-label">Keterangan</label></div>
                                <div class="col-12 col-md-9"><textarea id="description" name="description" class="form-control" rows="5"></textarea><small class="form-text text-muted"></small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">&nbsp;</div>
                                <div class="col-12 col-md-9"><input type="submit" value="Submit" class="btn btn-primary" /></div>
                            </div>
                        </form>

                    </div>
                </div>
        	@endif

            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Studio Room Photos</strong>
                </div>
                <div class="card-body">
                	
                    <div class="row">
                    	@foreach ($galleries as $gallery)
                            <div class="col-lg-4" style="margin-bottom: 10px;">
                                <a href="{{ URL()->asset('uploads') . '/' . $gallery->photo }}" target="_blank">
                                    <img src="{{ URL()->asset('uploads') . '/' . $gallery->photo }}" />
                                </a>
                                <center>
                                    {!! nl2br($gallery->description) !!}

                                    @if ($role == 'admin')
                                        <form action="/galleries/{{ $gallery->gallery_id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="submit" value="Delete" class="btn btn-danger" />
                                        </form>
                                    @endif
                                </center>
                                <br />
                            </div>
                        @endforeach
                    </div>

            	</div>
        	</div>
    	</div>
	</div>

@endsection