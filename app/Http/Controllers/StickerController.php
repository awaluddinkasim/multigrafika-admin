<?php

namespace App\Http\Controllers;

use App\Models\Sticker;
use App\Traits\ImageFile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StickerController extends Controller
{
    use ImageFile;

    public function index(): View
    {
        return view('pages.stickers', [
            'stickers' => Sticker::all()
        ]);
    }

    public function create(): View
    {
        return view('pages.sticker-create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'freelance_price' => ['required', 'integer'],
            'type' => ['required', 'string'],
            'brand' => ['required', 'string'],
            'img_file' => ['required'],
        ]);

        $data['image'] = $this->uploadImage($request->file('img_file'), 'images');

        Sticker::create($data);

        return to_route('stickers.list');
    }

    public function show(Sticker $sticker): View
    {
        return view('pages.sticker-detail', [
            'sticker' => $sticker
        ]);
    }

    public function edit(Sticker $sticker): View
    {
        return view('pages.sticker-edit', [
            'sticker' => $sticker
        ]);
    }

    public function update(Request $request, Sticker $sticker): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'freelance_price' => ['required', 'integer'],
            'type' => ['required', 'string'],
            'brand' => ['required', 'string'],
        ]);

        if ($request->hasFile('img_file')) {
            $this->deleteImage('stickers/' . $sticker->image);
            $data['image'] = $this->uploadImage($request->file('img_file'), 'images');
        }

        $sticker->update($data);

        return to_route('stickers.list');
    }

    public function destroy(Sticker $sticker): RedirectResponse
    {
        $this->deleteImage('stickers/' . $sticker->image);

        $sticker->delete();

        return to_route('stickers.list');
    }
}
