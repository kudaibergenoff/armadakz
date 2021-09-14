<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Services\Service;
use App\Models\News;
use App\Models\NewsComment;
use App\Models\NewStatus;
use App\Models\NewType;
use App\Models\ProductLike;
use App\Models\ReviewStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class NewsController extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $all = News::where('status_id',NewStatus::APPROVED)
            ->where('store_id',null)
            ->where('type_id','!=',NewType::VIDEO)
            ->latest()
            ->paginate(11);
        $articles = News::where('status_id',NewStatus::APPROVED)
            ->where('store_id',null)
            ->where('type_id',NewType::ARTICLE)
            ->latest()
            ->paginate(11);
        $news = News::where('status_id',NewStatus::APPROVED)
            ->where('store_id',null)
            ->where('type_id',NewType::NEW)
            ->latest()
            ->paginate(11);
        $videos = News::where('status_id',NewStatus::APPROVED)
            ->where('store_id',null)
            ->where('type_id',NewType::VIDEO)
            ->latest()
            ->paginate(11);
        $tops = News::where('status_id',NewStatus::APPROVED)
            ->where('store_id',null)
            ->whereIn('type_id',[NewType::ARTICLE,NewType::VIDEO])
            ->orderBy('views','desc')
            ->take(3)
            ->get();

        return view('pages.news.index',compact('all','articles','videos','news','tops'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function newsComments(Request $request)
    {
        $data = NewsComment::add($request->all());
        $data->user_id = Auth::check() ? Auth::id() : null;
        $data->save();

        $this->service->sendMail($data,'addNewComment'); // отправка писем админам
        return back()->with('success','Комментарий добавлен');
    }

    public function show(News $news,$slug)
    {
        $news = News::where('slug',$slug)->firstOrFail();
        $news->views('ArmadaNews'.$news->id);
        $comments = NewsComment::where('status_id','!=',ReviewStatus::NOT_ACTIVE)
            ->where('news_id',$news->id)->latest()->paginate(10);

        return view('pages.news.show',compact('news','comments'));
    }

    public function edit(News $news)
    {
        //
    }

    public function update(Request $request, News $news)
    {
        //
    }

    public function destroy(News $news)
    {
        //
    }
}
