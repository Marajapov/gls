<?php
namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Model\User\ModelName as User;

class UserController extends Controller
{
    public function index()
    {
        return view('Admin::user.index', [
        ]);
    }
    public function create()
    {
        $categoryList = \Model\Category\ModelName::lists('name', 'id')->toArray();
        return view('Admin::user.create', [
            'user' => new User(),
            'categoryList' => $categoryList,
            ]);
    }
    public function store(Request $request)
    {
        User::create($request->except('q'));

        return redirect()->route('admin.user.index');
    }
    public function show(User $user)
    {
        return view('Admin::user.show', ['user' => $user]);
    }
    public function edit(User $user)
    {
        return view('Admin::user.edit', ['user' => $user]);
    }
    public function update(Request $request, User $user)
    {
        $user->update($request->except('q'));

        return redirect()->route('admin.user.show', $user);
    }
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.user.index');
    }
}
