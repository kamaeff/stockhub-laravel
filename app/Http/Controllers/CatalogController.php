<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Updates;

class CatalogController extends Controller
{
    public function show_catalog()
    {
        $data_msk = DB::table('Updates')->select()->paginate(10);
        $data_poizon = DB::table('poizon')->select()->paginate(10);
        return view('admin.admin-catalog', ['data_msk' => $data_msk, 'data_poizon' => $data_poizon]);
    }

    public function getPhoto($id)
    {
        $photo = DB::table('Updates')->select('photo_path')->where('id', $id)->first();

        if ($photo && $photo->photo_path) {
            $imageData = $photo->photo_path;
            $response = response($imageData)->header('Content-Type', 'image/png');
            return $response;
        } else {
            return response()->json(['error' => 'Image not found'], 404);
        }
    }

    public function addShoe(Request $request)
    {
        $updates = new Updates();

        $updates->name = $request->input('name');
        $updates->name_shooes = $request->input('brand');
        $updates->material = $request->input('material');
        $updates->color = $request->input('color');
        $updates->artilul = $request->input('articul');
        $updates->size = $request->input('size');
        $updates->photo_path = file_get_contents($request->file('photo')->getRealPath());
        $updates->price = $request->input('price');
        $updates->flag_order = 0;
        $updates->gender_option = $request->input('gender');
        $updates->style = $request->input('style');

        $updates->save();
        return redirect()->route('catalog');
    }
}
