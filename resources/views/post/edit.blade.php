@extends('base_layout._layout');
@section('body')

    <div class="modal fade" id="Confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Alert</h4>
                </div>
                <div class="modal-body">
                    Are you sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <div class="portlet light bordered">
        @foreach($item as $i)
            @if("!$i->isdelete")

            <div class="portlet-title">
            <div class="caption font-red-sunglo">
                <i class="icon-settings font-red-sunglo"></i>
                <span class="caption-subject bold uppercase"> {{$i->posttitle}} </span>
                <span class="caption-subject bold uppercase" style="padding-left: 650px;">{{$i->department->name}}</span>
            </div>
            <div class="actions">
                <div class="btn-group">
                    <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown" aria-expanded="false"> Actions
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="/post/{{$i->id}}/active" class="Confirm" id="Confirm">
                                <i class="fa fa-pencil"></i> Enable </a></li>
                        <li>
                            <a href="/post/{{$i->id}}/disable" class="Confirm" id="Confirm">
                                <i class="fa fa-lock"></i> Disable </a>
                        </li>
                        <li>
                            <a href="/post/{{$i->id}}/delete" class="Confirm" id="Confirm">
                                <i class="fa fa-trash-o"></i> Delete </a></li>


                    </ul>
                </div>
            </div>
        </div>
        <div class="portlet-body form">
            <form role="form">
                <div class="form-group">
                <div class="row">
                <div class="col-md-7">

                <img class="col-md-7" width="300px" height="200px" src="/storage/images/{{$i->image}}">
                </div>
                    <div class="col-md-5">
                        <textarea  disabled rows="10" cols="50" style="background-color: white"> {{$i->content}}</textarea>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-11">
                            <label for="#i">Active ?</label>
                            <input id="i" type="checkbox"{{!($i->disable)?'checked':''}} class=" checkbox-list" name="poststatus">
                           <?php/*if the admin make this post*/?>
                            <a href="/post/{{$i->id}}/edit" class="btn btn-primary pull-right">Edit</a>

                        </div>
                    </div>
                </div>
            </form>
        </div>
            @endif
        @endforeach

    </div>
    @endsection
@section('script')
    <script>
        $(function(){
            //$("#Confirm").modal("show");
            $(".Confirm").click(function(e){
                $("#Confirm").modal("show");
                $("#Confirm .btn-danger").attr("href",$(this).attr("href"));
                return false;
                //e.preventDefault();
            });


        });
    </script>
    @endsection
