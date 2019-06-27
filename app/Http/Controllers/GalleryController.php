<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class GalleryController extends Controller
{
	public function index(Request $request) {
		$user_id = $request->session()->get('user_id', 0);
        $role = $request->session()->get('role', '');

        if ($role == 'admin') {

        }
        else if ($role == 'user') {

        }

        $galleries = DB::table('galleries')
        					->orderBy('gallery_id', 'asc')
        					->get();

        return view('galleries.index', [
        	'role'		=> $role,
        	'galleries'	=> $galleries,
        ]);
	}

	public function create(Request $request) {

	}

	public function store(Request $request) {
		$user_id = $request->session()->get('user_id', 0);
        $description = $request->description ?? '';

        if ($description == '' || !$request->hasFile('photo'))
            return redirect('/galleries');

        $path = null;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('galleries', ['disk' => 'public_uploads']);
        }

        $gallery_id = DB::table('galleries')
                        ->insertGetId([
                        	'photo'				=> $path,
                            'description'		=> $description,
                            'updated_by'		=> $user_id,
                            'updated_at'		=> DB::raw('NOW()'),
                        ]);

        return redirect('/galleries');
	}

	public function edit($id) {

	}

	public function update(Request $request) {

	}

	public function destroy($id) {
		DB::table('galleries')
			->where('gallery_id', $id)
			->delete();

		return redirect('/galleries');
	}
}
