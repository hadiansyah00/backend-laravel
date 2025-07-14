<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\PageSections;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PageSectionController extends Controller
{
    public function index(Pages $page): View
    {
        $sections = $page->sections()->orderBy('order')->get();

        return view('admin.sections.index', compact('page', 'sections'));
    }

    public function create(Pages $page): View
    {
        return view('admin.sections.create', compact('page'));
    }



    public function edit(PageSections $section): View
    {
        return view('admin.sections.edit', compact('section'));
    }

    public function store(Request $request, Pages $page): RedirectResponse
    {
        $validated = $request->validate([/* ... */]);
        $page->sections()->create($validated);

        return redirect()
            ->route('admin.pages.sections.index', ['page' => $page->id])
            ->with('success', 'Section created!');
    }

    public function update(Request $request, PageSections $section): RedirectResponse
    {
        $validated = $request->validate([/* ... */]);
        $section->update($validated);

        return redirect()
            ->route('admin.sections.edit', ['section' => $section->id])
            ->with('success', 'Section updated!');
    }

    public function destroy(PageSections $section): RedirectResponse
    {
        $section->delete();
        return redirect()
            ->route('admin.pages.sections.index', ['page' => $section->page_id])
            ->with('success', 'Section deleted!');
    }
}