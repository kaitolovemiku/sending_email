@extends('layouts.index_layout')
@section('content')
<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">E-mail Sender</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="col-sm-12">
                <div name="error">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                        <ul>
                            @foreach ($errors->all() as $errors)
                            <li>{{ $errors }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if($message = Session::get('success'))
                    <div class="alert alert-success alert-block" >
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{$message}}</strong>
                    </div>
                    @endif
                </div>
                <div>
                    <div class="row">

                        <div class="col-sm-12 col-md-4">
                            @if(isset($lib))
                            {{ Form::open(['method' => 'put', 'route' => ['lib.update', $lib->id]])}}
                            @else
                            {{ Form::open(['url' => 'lib'])}}
                            @endif
                            <div class="form-group">
                                <p>To</p>
                            </div>
                            <div class="form-group">
                                @if(isset($lib->email_receiver))
                                {{ Form::email('email_receiver',$lib->email_receiver,['class' => 'form-control form-control-user', 'placeholder' => 'Enter Email Address...'])}}
                                @else
                                {{ Form::email('email_receiver','',['class' => 'form-control form-control-user', 'placeholder' => 'Enter Email Address...'])}}
                                @endif
                            </div>

                            <div class="form-group">
                                <p>Subject</p>
                            </div>
                            <div class="form-group">
                                @if(isset($lib->subject))
                                {{ Form::text('subject',$lib->subject,['class' => 'form-control form-control-user', 'placeholder' => 'Topic...'])}}
                                @else
                                {{ Form::text('subject','',['class' => 'form-control form-control-user', 'placeholder' => 'Topic...'])}}
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-8">
                            <div class="form-group">
                                <p>Content</p>
                            </div>
                            <div class="form-group">
                                @if(isset($lib->content))
                                {{ Form::textarea('content',$lib->content,['class' => 'form-control', 'placeholder' => 'Input your text here...'])}}
                                @else
                                {{ Form::textarea('content','',['class' => 'form-control', 'placeholder' => 'Input your text here...'])}}
                                @endif
                            </div>
                            <div class="form-group">
                                {{ Form::submit('Send e-mail',['class' => 'btn btn-primary btn-block'])}}
                            </div>
                            {{ Form::close() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 