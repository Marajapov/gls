<?php
namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Model\User\ModelName as User;
use Model\Category\ModelName as Category;
use Model\UserSubcategoryTie\ModelName as UserSubcategoryTie;
use Model\Subcategory\ModelName as Subcategory;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Admin::user.index', [
            'users' => $users,
        ]);
    }
    public function create()
    {
        $categories = Category::where('published','=','1')->get();
        return view('Admin::user.create', [
            'user' => new User(),
            'categories' => $categories,
            ]);
    }
    public function store(Request $request)
    {
        $user = User::create($request->except('password','categories','subcategories','q'));

        $categories = $request->input('categories');
        $subcategories = $request->input('subcategories');
        foreach($subcategories as $subcategory){
            UserSubcategoryTie::create([
                'user_id' => $user->id,
                'subcategory_id' => $subcategory
            ]);
        }

        $user->password = bcrypt($request->input('password'));
        $user->password2 = md5($request->input('password'));
        $user->save();

        return redirect()->route('admin.user.index');
    }
    public function show(User $user)
    {
        $categories = Category::where('published',1)->get();
        $subcategories = Subcategory::where('published',1)->get();

        return view('Admin::user.show', [
            'user' => $user,
            'subcategories' => $subcategories,
            'categories' => $categories,
        ]);
    }
    public function edit(User $user)
    {
        $categories = Category::where('published','=','1')->get();
        return view('Admin::user.edit', [
            'user' => $user,
            'categories' => $categories,
            ]);
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
