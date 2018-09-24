@extends("base_layout._layout")
@section("body")
    @if($item->count() ==0)
        <div id="prefix_408255967512" class="custom-alerts alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Nothing to show</div>
    @endif
    @if($item->count()>0)
@foreach($item as $i)
    <div class="portlet-body form">
        <form role="form" action="/post/{{$i->id}}/status">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-7">

                        <img class="col-md-7" width="300px" height="200px" src="/storage/images/{{$i->image}}">
                    </div>
                    <div class="col-md-5">
                        <textarea  disabled rows="10" cols="50" style="background-color: white"> {{$i->content}}</textarea>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                    </div>
                    <div class="col-md-12">
                        <label for="#i">Active ?</label>
                        <input id="i" type="checkbox"{{$i->poststatus?'checked':''}} class=" checkbox-list" name="poststatus">
                        <input type="submit" class="pull-right btn btn-primary" value="Active">

                    </div>
                </div>
            </div>

        </form>
    </div>
    @endforeach
    {{$item->links()}}
@else

    @endif

@endsection
