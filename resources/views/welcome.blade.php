<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" sizes="180x180" href="./favicon_io/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./favicon_io/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./favicon_io/favicon-16x16.png">
        <link rel="manifest" href="./site.webmanifest">
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="w-full max-w-xs">
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('saveItem') }}" method="post">
                    @csrf
                  <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        <h1>TODOLIST</h1>
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="listItem" type="text" placeholder="Item Name" name="listItem" aria-label="Item name">
                  </div>

                  <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                      Add Item
                    </button>
                  </div>
                  
                
                </form>
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    
                    <h2 class="w-full py-5">List:</h2>
                  <div class="flex  items-center justify-between">
                    
                    <ul class="flex flex-wrap mb-4 list-disc list-inside justify-around">                
                      @if(count($listItems)<1)
                        <p class="w-full bg-gray-300 py-2">Empty</p>
                      @else
                        @foreach ($listItems as $listItem)
                            <li class="w-1/2 py-2">{{ $listItem->name }}</li>
                            <form class="w-1/2" action="{{ route('markComplete', $listItem->id) }}" method="post">
                                @csrf
                                <button class=" bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold my-2 px-2 rounded">
                                    Mark As Done
                                </button>
                            </form> 
                        @endforeach
                      @endif  
                    </ul>
                  </div>
                </div>
              </div>
            
            
        </div>
    </body>
</html>
