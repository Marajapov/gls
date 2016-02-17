<?php
namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Model\Menu\ModelName as Menu;
use Model\Menu\ModelRepository as MenuRepository;

class MenuController extends Controller
{
    protected $menuRepository;

    public function __construct(MenuRepository $menuRepository)
    {
        $this->menu = $menuRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::groupBy('code')->get();
        return view('Admin::menu.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $codes = Menu::groupBy('code')->lists('code');
        return view('Admin::menu.create', [
            'menu'  => new Menu,
            'codes' => $codes,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = Menu::create($request->except('q'));

        return redirect()->route('admin.menu.code', $menu->getCode());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel, Menu $menu)
    {
        return view('Admin::menu.show', [
            'channel' => $channel,
            'menu'    => $menu,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $codes = Menu::groupBy('code')->lists('code');
        return view('Admin::menu.edit', [
            'menu'    => $menu,
            'codes' => $codes,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->update($request->except('q'));

        return redirect()->route('admin.menu.code', $menu->getCode());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $code = $menu->getCode();
        $menu->delete();

        if(count(Menu::where('code', '=', $code)->get()) > 0)
            return redirect()->route('admin.menu.code', $code);
        else
            return redirect()->route('admin.menu.index');
    }

    public function save(Request $request, $code)
    {
        $items = json_decode($request->input('json'), true);

        $this->menu->saveOrder($items);

        return redirect()->route('admin.menu.code', $code);
    }

    public function code($code)
    {
        $menus = Menu::where('code', '=', $code)->where('parent_id', '=', null)->get();

        return view('Admin::menu.name', ['menus' => $menus, 'code' => $code]);
    }
}
