<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.5/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
    
    <title>Home</title>
</head>
<body class="bg-orange-300 mb-24">
    <header class=""> 
        <img src="https://unifil.br/assets/uploads/2019/10/logo.svg"  class=" w-40 m-5 mr-56 inline text-left" alt="logoUnifil"/>
        <h1 class="text-xl font-bold ml-36 inline">Primeiros Passos do seu curso</h1>
    </header>

    
    
    <div class="grid grid-cols-3 gap-4">
        
        
        @foreach($card as $cards)
        
            
                <button class="max-w-smm rounded m-12 text-center hover:text-white bg-white hover:bg-orange-600 overflow-hidden shadow-lg px-6 py-4" type="button" data-modal-toggle={{$cards -> id_card}}>
                    <p class="font-bold text-xl mb-2">{{$cards->titulo}}</p> 
                </button>
            
        
          
          <!-- first modal -->
          <div id={{$cards->id_card}} tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
              <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                  <!-- Modal content -->
                  <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                      <!-- Modal header -->
                    <form 
                    {{-- action="{{ route('image.upload.post') }}"  --}}
                    enctype="multipart/form-data"
                    action="/home/{{$cards->id_card}}" 
                    method="POST">
                        @csrf
                        @method('PUT')
                        <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                            <div>
                                <input type="text" id="titulo" name="titulo" value="{{$cards -> titulo}}" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle={{$cards -> id_card}}>
                                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                            </button>
                        </div>
                    
                    
                      <!-- Modal body -->
                      <div class="p-6 space-y-6">
                        
                            
                            <div class="mb-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                                <div class="flex justify-between items-center py-2 px-3 border-b dark:border-gray-600">
                                    {{-- <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x dark:divide-gray-600">
                                        <div class="flex items-center space-x-1 sm:pr-4">
                                            <input type="file" class="block w-full text-sm text-slate-500
                                            file:mr-4 file:py-2 file:px-4
                                            file:rounded-full file:border-0
                                            file:text-sm file:font-semibold
                                            file:bg-violet-50 file:text-violet-700
                                            hover:file:bg-violet-100
                                          "/>
                                        </label>
                                            
                                            
                                        </div>
                                    </div> --}}
                                    
                                    <div id="tooltip-fullscreen" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                        Show full screen
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                                <div class="py-2 px-4 bg-white rounded-b-lg dark:bg-gray-800">
                                    <label for="editor" class="sr-only">Publish post</label>
                                    <textarea id="editor" name="descricao" rows="8" class="block px-0 w-full text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" required>{{$cards -> descricao}}</textarea>
                                </div>
                            </div>
                            
                        
                      </div>
                      <!-- Modal footer -->
                      <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                          <button data-modal-toggle={{$cards -> id_card}} type="submit" class="text-white bg-orange-400 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Confirmar</button>
                          <button data-modal-toggle={{$cards -> id_card}} type="button" class="text-red-500 hover:text-white hover:bg-red-500 border border-red-500 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar   </button>
                      </div>
                    </form>
                    
                  </div>
              </div>
          </div>
        @endforeach
        
    </div>
    <div class="text-right mr-8">
        <button type="button" data-modal-toggle="criarCard" class="text-white  bg-orange-600 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xl  text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 mt-8 dark:focus:ring-blue-800">
            <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
          </button>
          {{-- modal criarCard --}}
          <!-- Main modal -->
<div id="criarCard" tabindex="-1" aria-hidden="true" class="hidden text-left overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="criarCard">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
            </button>
            <div class="py-6 px-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Criar um card</h3>
                <form class="space-y-6" action="/home" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Título do card</label>
                        <input type="text" name="titulo" id="titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Escreva o título..." required>
                    </div>
                    <label for="descricao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Descrição</label>
                    <div class="mb-4 w-full  rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">                        
                        <div class="py-2 px-4 bg-white rounded-t-lg dark:bg-gray-800">                            
                            <textarea id="descricao" name="descricao" rows="4" class="px-0 w-full text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Descreva aqui..." required></textarea>
                        </div>                        
                    </div>
                    
                    
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Criar card</button>
                    
                </form>
            </div>
        </div>
    </div>
</div> 
    </div>

    <footer class="p-4 bg-orange-300 rounded-lg  mt-32 md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="https://unifil.br" class="hover:underline">UniFil</a>. Todos os direitos reservados.
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
        <li>
        <a href="#" class="mr-4 hover:underline md:mr-6 ">Sobre</a>
        </li>
        <li>
        <a href="#" class="mr-4 hover:underline md:mr-6">Política de privacidade</a>
        </li>
        <li>
        <a href="#" class="mr-4 hover:underline md:mr-6">Licensas</a>
        </li>
        <li>
        <a href="#" class="hover:underline">Contatos</a>
        </li>
        </ul>
        </footer>
      
    
</body>
</html>