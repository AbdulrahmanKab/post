@extends('base_layout._layout');
@section('body')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br>
    @endif
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-post font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Edit {{$item->posttitle}} post</span>
            </div>

        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" method="post" action="/post/{{$item->id}}" enctype="multipart/form-data">
                @method("put")
                @csrf

                <div class="form-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Title</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Enter text"  value="{{$item->posttitle}}" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Content</label>
                        <div class="col-md-9">
                            <textarea rows="5" cols="106" class="text-default" name="content">{{$item->content}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Keyword</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Enter text" value="{{$item->keyword}}" name="keyword">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Department</label>
                    <div class="col-md-9">
                        <select class="form-control" name="department">
                            <option></option>
                            @foreach($department as $d)
                                <option value="{{$d->id}}" {{$item->department_id==$d->id?"selected":""}}> {{$d->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">post status</label>
                    <div class="col-md-1">
                        <input type="checkbox" class="form-control" {{$item->poststatus?'checked':''}} name="poststatus">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Allow comment</label>
                    <div class="col-md-1">
                        <input type="checkbox" class="form-control" {{$item->commentstatus?'checked':''}} name="allowcomment">
                    </div>
                </div>





                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" class="btn green">
                            <a class="btn  btn-danger btn-sm pull-right" href="/post" > Cancel
                            </a>                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
