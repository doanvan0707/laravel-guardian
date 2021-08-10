<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Page;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $groups = Group::select(['id', 'name'])->get();
            $pages = Page::select(['id', 'name'])->get();
            return view('admin.permission.create', compact('groups', 'pages'));
        }

        return redirect()->route('login')->withSuccess('You are not allowed to access');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'group_id' => $request->group_id,
            'page_id' => $request->page_id,
            'actions' => json_encode(array_values($request->actions[$request->page_id]))
        ];
        $Permission = Permission::insert($data);
        return $Permission 
            ?  redirect()->route('dashboard')->withSuccess('Create permision')
            : back()->withInput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setjoinGroup()
    {
        $users = User::select(['id', 'name'])->get();
        $groups = Group::select(['id', 'name'])->get();
        return view('admin.permission.join-group', compact('users', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storejoinGroup(Request $request)
    {
        $user = \App\Models\User::find($request->user_id);
        $check = $user->joinGroup($request->group_id);
        return $check 
        ?  redirect()->route('dashboard')->withSuccess('Set user join group')
        : back()->withInput();
    }
}
