<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\uploadFile;
use DB;
use Log;
use App\Models\News;
use App\Models\Tags;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;



class NewsController extends Controller
{
    //
    use uploadFile;

    public function index(Request $request)
    {
        return view('admin.news.index');
    }

    public function create(Request $request)
    {
        $param['news'] = null;
        return view('admin.news.create', $param);
    }

    public function store(Request $request)
    {

        $arrData = $request->validate([
            'news_id' => 'nullable',
            'news_title' => 'required|max:100',
            'news_category' => 'required',
            'news_content' => 'required|min:3',
            'published' => 'nullable'
        ], [
            'required' => 'Wajib diisi',
            'max' => 'Maksimal diisi :max karakter',
            'min' => 'Minimal diisi :min karakter'
        ]);

        $destPath = null;
        DB::beginTransaction();
        try {


            if ( isset($request->news_thumbnail)) {

                if ( !is_null($arrData['news_id'])) {
                    // Remove file existing
                    $news = News::where('id', $arrData['news_id'])->first();
                    $this->removeFile(public_path($news->thumbnail));
                }

                $file = $request->news_thumbnail;
                $extFile = $file->extension();
                $newFileName = time() . date('Ymd') . '.' . $extFile;
                $destPath = 'news-img/' . $newFileName;
                $this->uploadImage($request->news_thumbnail, $destPath);
                $arrData['thumbnail'] = $destPath;
            }


            $slug = Str::slug($arrData['news_title'], '-');
            $arrData['slug'] = $slug;
            $arrData['author_id'] = auth()->user()->id;
            $arrData['published'] = isset($arrData['published']);

            if ( is_null($arrData['news_id'])) {
                $newsInserted = News::store($arrData);
            } else {
                $newsInserted = News::updateData($arrData['news_id'], $arrData);
            }

            if ( isset($request->news_tags)) {
                $this->storeTags($request->news_tags, $newsInserted);
            }

            DB::commit();
            return redirect()->route('admin.news')->with('success', 'Berhasil disimpan');
        } catch (\Throwable $ex) {
            Log::error($ex);
            return redirect()
                    ->back()
                    ->withInput($request->input())
                    ->with('error', 'Terjadi kesalahan pada server');
        } catch (\Exception $e) {
            Log::error($e);
            $this->removeFile(public_path($destPath));
            DB::rollback();
            return redirect()
                    ->back()
                    ->withInput($request->input())
                    ->with('error', 'Terjadi kesalahan pada server');
        }
    }

    public function show(Request $request, $id)
    {
        $news = News::with(['comments', 'category', 'author'])->where('id', $id)->first();
        $param['news'] = $news;
        return view('admin.news.detail', $param);
    }

    public function update(Request $request, $id)
    {
        $news = News::with(['comments', 'category', 'author', 'tags'])->where('id', $id)->first();
        $param['news'] = $news;
        return view('admin.news.create', $param);
    }

    public function storeTags($tags, $newsInserted)
    {
        $newsTags = json_decode($tags);

        DB::TABLE('news_tags')->where('news_id', $newsInserted->id)->delete();

        foreach ( $newsTags as $item ) {
            $tag = Tags::whereRaw("LOWER(tag_name)='" . strtolower($item->value) . "'")->first();
            if ( is_null($tag)) {
                $tag = Tags::create([
                    'tag_name' => $item->value,
                    'user_crt_id' => auth()->user()->id
                ]);
            }

            // Insert Pivot Tabel
            DB::TABLE('news_tags')->insert([
                'news_id' => $newsInserted->id,
                'tags_id' => $tag->id
            ]);

        }
    }
}
