<a href="{{ route('blog',['slug'=>$blog->slug]) }}">
    <div class="card h-100">
        <img
            src="/img/blog{{ $loop->iteration }}.jpg"
            class="card-img-top"
            alt="..."
        />
        <div class="card-body">
            <h5 class="card-title">{{ $blog->lang('title') }}</h5>
    {{--        <p class="card-text">--}}
    {{--            Some quick example text to build on the card title and make up the bulk of the--}}
    {{--            card's content.--}}
    {{--        </p>--}}
        </div>
        <div class="card-footer text-muted d-flex justify-content-between" style="border-top: 0px">
            <div>{{ $blog->created_at->format('d.m.Y') }}</div>
            <div>
                <i class="far fa-eye"></i>
                <span class="mr-3">{{ $blog->views }}</span>
                <i class="far fa-thumbs-up"></i>
                <span>{{ $blog->likes }}</span>
            </div>
        </div>
    </div>
</a>
