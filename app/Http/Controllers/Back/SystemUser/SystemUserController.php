<?php

namespace App\Http\Controllers\Back\SystemUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\SystemUser\SystemUserRequest;
use App\Services\SystemUser\SystemUserService;

class SystemUserController extends Controller
{
    protected $user;

    public function __construct(SystemUserService $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->paginate(25);
        return view('back.system-user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.system-user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SystemUserRequest $request)
    {
        $data = $request->all();
        if ($this->user->store($data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('system-user.index');

        }
        toastr()->error('Something went wrong');
        return redirect()->route('system-user.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->findByColumn('id', $id);
        return view('back.system-user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SystemUserRequest $request, $id)
    {
        $data = $request->all();
        if ($this->user->update($id, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('system-user.index');
        }

        toastr()->error('Something went wrong');
        return redirect()->route('system-user.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->user->delete($id)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('system-user.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('system-user.index');
    }
}
