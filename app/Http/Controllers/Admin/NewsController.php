<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\uploadFile;
use DB;
use Log;
use App\Models\News;
use Illuminate\Support\Str;


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
        return view('admin.news.create');
    }

    public function store(Request $request)
    {

        $arrData = $request->validate([
            'news_id' => 'nullable',
            'news_thumbnail' => 'required_without:news_id',
            'news_title' => 'required|max:100',
            'news_category' => 'required',
            'news_content' => 'required|min:3'
        ], [
            'required' => 'Wajib diisi',
            'max' => 'Maksimal diisi :max karakter',
            'min' => 'Minimal diisi :min karakter'
        ]);

        $destPath = null;
        DB::beginTransaction();
        try {

            if ( isset($arrData['news_thumbnail'])) {
                $file = $arrData['news_thumbnail'];
                $extFile = $file->extension();
                $newFileName = time() . date('Ymd') . '.' . $extFile;
                $destPath = 'news-img/' . $newFileName;
                $this->uploadImage($arrData['news_thumbnail'], $destPath);
                $arrData['thumbnail'] = $destPath;
            }


            $slug = Str::slug($arrData['news_title'], '-');
            $arrData['slug'] = $slug;
            $arrData['author_id'] = auth()->user()->id;
            $arrData['published'] = $published = isset($arrData['published']);

            if ( is_null($arrData['news_id'])) {
                News::store($arrData);
            } else {
                News::updateData($arrData['news_id'], $arrData);
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
}
