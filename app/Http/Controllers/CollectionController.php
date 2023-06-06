<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    // Метод для добавления новой категории
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Collection::create($validatedData);

        return redirect()->back()->with('success', 'Категория успешно добавлена.');
    }

    // Метод для обновления существующей категории
    public function update(Request $request, Collection $collection)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $collection->update($validatedData);

        return redirect()->back()->with('success', 'Категория успешно обновлена.');
    }

    // Метод для удаления категории
    public function destroy(Collection $collection)
    {
        $collection->delete();

        return redirect()->back()->with('success', 'Категория успешно удалена.');
    }
}
