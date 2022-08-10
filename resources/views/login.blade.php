<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="bg-orange-400 text-center text-white">
    
    <div class="grid grid-cols-1  lg:grid-cols-2">
        <div class="bg-orange-300 lg:min-h-screen lg:flex lg:items-center p-8 sm:p-12">
            <div class="flex-grow">
                <h1 class="text-white text-center text-2xl sm:text-5xl mb-2">
                    Primeiros passos
                </h1>
                
            </div>
        </div>
        <div class="lg:min-h-screen lg:flex lg:items-center p-12 lg:p-24 xl:p-48">
            <div class="flex-grow bg-white shadow-xl rounded-md border border-grey-300 p-8">
                <div class="text-left">
                    <p class="text-xl  text-gray-800">Usuário</p>
                    <p class="text-base  text-gray-600">Coordenador</p>
                    <div class="mt-4">
                        <button type="button" class="text-xs text-red-500 hover:text-white hover:bg-red-500 border border-red-500 font-semibold rounded-md px-3 py-1">
                            não é um coordenador?
                        </button>
                    </div>
                </div>
                <form class="flex w-full mt-8">
                    <input type="password" class="flex-1 w-full text-gray-700 bg-gray-200 rounded-md hover:bg-white border border-gray-200 outline-none focus:bg-white mr-3  ">
                    <a href="/home">
                        <button class="text-lg text-orange-400 hover:text-white hover:bg-orange-400 border border-orange-400 font-semibold rounded-md px-3 py-1" placeholder="senha">Login</button>
                    </a>
                </form>
            </div>
            
        </div>
    </div>
    
</body>
</html>