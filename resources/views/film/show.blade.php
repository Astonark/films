@extends('layout.app')

@section('content')
    <div class="sm:container mx-auto mt-20">
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ $film->title }}</div>
            <p class="text-gray-700 text-base">
                {{ $film->synopsis }}
            </p>
        </div>
        <div class="px-6 pt-4 pb-2">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Duréé du film : {{ $film->running_time }}</span>
        </div>
        </div>

        <div class="mt-20">
            <p>Liste des acteurs : </p>
        </div>


        <table class="min-w-full mt-10">
            <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Id
                </th>
                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Nom
                </th>
                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Supprimer
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach($actors as $actor)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $actor->id }}
                        </td>
                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $actor->name }}
                        </td>
                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <form action="{{ route('actor.datach') }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="film_id" value="{{ $film->id }}">
                            <input type="hidden" name="actor_id" value="{{ $actor->id }}">
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

                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    ?
                </td>
                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <form class="pt-8" method="post" action="{{ route('actor.film.link', $film->id) }}">
                        @csrf
                        <select name="actor_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($all_actors as $actor)
                                <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                            @endforeach
                        </select>
                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer</button>
                        </td>
                    </form>
                </td>
            </tbody>
        </table>
    </div>
@endsection
