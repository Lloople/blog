<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThemeFormRequest;
use App\Http\Resources\ThemeResource;
use App\Models\Theme;
use App\ViewModels\ThemeDetailViewModel;
use Illuminate\Http\Request;
use Lloople\Notificator\Notificator;

class ThemesController extends Controller
{
    private $pagination = 50;

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('backend.themes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.themes.edit', ['view' => new ThemeDetailViewModel(new Theme())]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ThemeFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ThemeFormRequest $request)
    {
        $theme = new Theme();

        $theme->name = $request->name;

        $theme->selected = $request->has('selected');

        $theme->updateColors($request->all());

        $theme->save();

        if ($theme->selected) {
            $theme->disableOtherThemes();
        }

        Notificator::success('Theme created successfully');

        return redirect()->route('backend.themes.edit', $theme);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Theme $theme
     *
     * @return void
     */
    public function edit(Theme $theme)
    {
        return view('backend.themes.edit', ['view' => new ThemeDetailViewModel($theme)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ThemeFormRequest $request
     * @param  \App\Models\Theme $theme
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ThemeFormRequest $request, Theme $theme)
    {
        $theme->name = $request->name;

        $theme->selected = $request->has('selected');

        $theme->updatecolors($request->all());

        $theme->save();

        if ($theme->selected) {
            $theme->disableOtherThemes();
        }

        Notificator::success('Theme edited successfully');

        return redirect()->route('backend.themes.edit', $theme);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \App\Models\Theme $theme
     *
     * @return array
     * @throws \Exception
     */
    public function destroy(Request $request, Theme $theme)
    {
        if ($theme->selected) {
            if ($request->ajax()) {
                return [
                    'result' => false,
                    'message' => 'Default theme cannot be deleted.',
                ];
            }

            Notificator::error('Default theme cannot be deleted.');

            return back();
        }

        $theme->delete();

        if ($request->ajax()) {
            return [
                'result'  => true,
                'message' => 'Theme deleted successfully.',
            ];
        }

        Notificator::success('Theme deleted successfully.');

        return redirect()->route('backend.themes.index');
    }

    public function resource(Request $request)
    {
        $themes = Theme::select('*');

        if ($request->has('q')) {
            $themes->where('name', 'like', "%{$request->q}%");
        }

        return ThemeResource::collection($themes->orderBy('selected', 'DESC')->orderBy('name')->paginate($this->pagination));
    }
}
