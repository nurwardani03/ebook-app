<?php

namespace App\Http\Controllers;

use App\Models\Eebook;
use App\Models\Ebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class EbookController extends Controller
{
    public function index(Request $request)
    {
        $ebooks = Ebook::orderBy('id')->get();
        $viewId = $request->query('view');
        $current = $viewId ? Ebook::find($viewId) : null;

        return view('dashboard', compact('ebooks', 'current'));
    }

    public function destroy(Ebook $ebook)
    {
        if (Storage::disk('local')->exists('private/'.$ebook->file_path)) {
            Storage::disk('local')->delete('private/'.$ebook->file_path);
        }
        $ebook->delete();
        return redirect()->route('dashboard')->with('status', 'Ebook deleted.');
    }

    public function stream(Ebook $ebook): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        $absolutePath = storage_path('app/private/'.$ebook->file_path);
        if (!file_exists($absolutePath)) abort(404);

        $size = filesize($absolutePath);

        return \Illuminate\Support\Facades\Response::stream(function () use ($absolutePath) {
            $fp = fopen($absolutePath, 'rb');
            fpassthru($fp);
            fclose($fp);
        }, 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.basename($absolutePath).'"',

            'Accept-Ranges'       => 'none',
            'Content-Length'      => $size,

            'Cache-Control'       => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma'              => 'no-cache',

            'Content-Security-Policy' => "default-src 'self'; frame-ancestors 'self';",
            'X-Content-Type-Options'  => 'nosniff',
        ]);
    }

}
