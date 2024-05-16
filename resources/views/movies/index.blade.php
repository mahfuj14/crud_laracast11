<x-layout>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
        {{--<h1 class="text-3xl font-bold tracking-tight text-gray-900">{{$heading}}</h1>--}}
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Movie List</h1>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Producer
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Release Date
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Budget
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Genre
                </th>
                <th scope="col" class="px-7 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($movies as $movie)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="/movies/{{$movie->id}}">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="{{asset('images/'.$movie->image)}}" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{$movie->title}}
                                </div>
                                <div class="text-sm text-gray-500">
                                    Cast: {{$movie->cast}}
                                </div>
                            </div>
                        </div>
                    </a>

                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{--<div class="text-sm text-gray-900">{{$movie->producer}}</div>
                    <div class="text-sm text-gray-500">Optimization</div>--}}
                    <span class="px-2 inline-flex leading-5 font-semibold rounded-full text-sm text-gray-900 ">
                        {{$movie->producer}}
                    </span>

                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{$movie->release_date}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        {{$movie->budget}} USD
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{$movie->genre}}
                </td>


                <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                    <a href="/movies/{{$movie->id}}/edit" class=" ml-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                    <a>
                    <form method="post" action="/movies/{{$movie->id}}">
                        @csrf
                        @method('delete')
                    <button type="submit" class="text-red-600 hover:text-red-900">
                        Delete
                    </button>
                    </form></a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>

</x-layout>
