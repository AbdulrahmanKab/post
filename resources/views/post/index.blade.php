@extends('base_layout._layout')
@section('body')
    @if($item->count() != 0)
    <form style="margin-bottom: 5px">
    <div class="row">
     <div>
    <input type="text" class="input-circle col-md-10" name="q" style="width: 500px;">
     </div>
        <div class="col-md-2">
            <input type="submit"  value="Go" class="btn btn-circle" style="height: 30px;">
        </div>
    </div>
    </form>
    @endif
@if($item->count() ==0)
    <div id="prefix_408255967512" class="custom-alerts alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Nothing to show</div>@endif
    @foreach($item as $i)

    <div class="row">
        <div class="col-md-10">
            <div class="blog-post-sm bordered blog-container">
                <div class="blog-img-thumb">
                    <a href="javascript:;">
                        <img width="500px" height="200px" src="/storage/images/{{$i->image}}">
                    </a>
                </div>
                <div class="blog-post-content">
                    <h2 class="blog-title blog-post-title">
                        <a href="javascript:;">{{$i->posttitle}}</a>
                    </h2>
                    <p class="blog-post-desc">{{$i->content}} </p>
                    <div class="blog-post-foot">
                        <div class="blog-post-meta">
                            <i class="icon-calendar font-blue"></i>
                            <a href="javascript:;">{{$i->created_at}}</a>
                        </div>
                        <div class="blog-post-meta">
                            <i class="icon-book font-blue"></i>
                            <a href="javascript:;">{{$i->keyword}}</a>
                        </div>
                        <div class="blog-post-meta">
                            <i class="icon-bubble font-blue"></i>
                            <a href="javascript:;">14 Comments</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endforeach
    {{$item->links()}}

@endsection
