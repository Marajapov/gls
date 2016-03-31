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
        $user = User::create($request->except('password','categories','subcategories','q','flag'));

        $categories = $request->input('categories');
        $subcategories = $request->input('subcategories');
        $flag = $request->input('flag');
        if($flag == 0){
            foreach($subcategories as $subcategory){
                UserSubcategoryTie::create([
                    'user_id' => $user->id,
                    'subcategory_id' => $subcategory
                ]);
            }
        } // end if
        $user->flag = 1;
        $user->password = bcrypt($request->input('password'));
        $user->password2 = md5($request->input('password'));
        $user->save();

        return redirect()->route('admin.user.index');
    }
    public function show(User $user)
    {
        $categories = Category::where('published',1)->get();
        $subcategories = Subcategory::where('published',1)->get();
        $listUserSubcategoryTie = UserSubcategoryTie::where('user_id','=',$user->id)->get();

        return view('Admin::user.show', [
            'user' => $user,
            'subcategories' => $subcategories,
            'categories' => $categories,
            'newUserSubcategoryTie' => new UserSubcategoryTie(),
            'listUserSubcategoryTie' => $listUserSubcategoryTie,
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

    public function addSubcategory(Request $request)
    {        
        $userId = $request->input('user');
        $user = User::where('id','=',$userId)->first();
        $categories = $request->input('categories');
        $subcategories = $request->input('subcategories');
        foreach($subcategories as $subcategory){
            UserSubcategoryTie::create([
                'user_id' => $userId,
                'subcategory_id' => $subcategory,
            ]);
        }

        return redirect()->route('admin.user.show', $user);
    }

    public function deleteSubcategory(Request $request, $id)
    {
        $subcategory_id = $request->id;
        $subcategory = UserSubcategoryTie::where('id','=',$subcategory_id)->first();
        $user = User::where('id','=',$subcategory->user_id)->first();
        $subcategory->delete();
        return redirect()->route('admin.user.show', $user);
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::where('id','=',$id)->first();
        return view('Admin::user.password', [
            'user' => $user,
            'userId' => $user->id,
            ]);
    }

    public function newPassword(Request $request)
    {
        $pass1 = $request->input('password');
        $pass2 = $request->input('password2');
        $userId = $request->input('userId');

        if($pass1 == $pass2)
        {
            $password = bcrypt($pass1);
            $password2 = md5($pass1);
            $user = User::where('id','=',$userId)->first();
            $user->password = $password;
            $user->password2 = $password2;
            $user->save();

            return redirect()->route('admin.user.show', $user);

        }
    }
}