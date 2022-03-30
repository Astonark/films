@extends('layout.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-center text-xl pt-8">MES CATÉGORIES</h1>

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><a href="{{ route('category-create') }}">Créer une categorie</a></button>

        <table class="table-auto">
            <tbody>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <table class="min-w-full">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Id
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Nom
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $category->id }}
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $category->name }}
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                            <a href="{{ route('category.edit.show', $category->id) }}" class="text-blue-600 dark:text-blue-500 hover:underline">Modifer</a>
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                            <form action="{{ route('category.delete') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="id" value="{{ $category->id }}">
                                                <input type="submit" name="delete" value="Supprimer">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @if($errors->any())
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        <strong class="font-bold">Erreur :</strong>
                                        <span class="block sm:inline">{{$errors->first()}}</span>
                                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                              </span>
                                    </div>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </tbody>
        </table>
    </div>
@endsection
