<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.5/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <title>Home</title>
</head>
<body class="bg-orange-300 min-h-screen">    
    <header>
        <nav class="bg-orange-600 border-gray-200 px-4 lg:px-6 py-2.5  :bg-gray-800">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="https://flowbite.com" class="flex items-center">
                    <img src="http://portal.filadelfia.br:7778/TemplatePortais/assets/images/logos/UNIFIL_GRADUACAO.png" class="mx-3 h-6 sm:h-12" alt="Unifil Logo" />
                    
                </a>
                <div class="flex items-center lg:order-2">
                    <a href="#" class="text-gray-800 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none">Log out</a>
                    <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200  :text-gray-400  :hover:bg-gray-700  :focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="#" data-modal-toggle="criarCard" class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0  :text-white" aria-current="page">Criar Card</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0  :text-gray-400 lg: :hover:text-white  :hover:bg-gray-700  :hover:text-white lg: :hover:bg-transparent  :border-gray-700">Usuários</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0  :text-gray-400 lg: :hover:text-white  :hover:bg-gray-700  :hover:text-white lg: :hover:bg-transparent  :border-gray-700">Reportar erro</a>
                        </li> 
                        <li>
                            <button id="openModalBtn" class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0  :text-gray-400 lg: :hover:text-white  :hover:bg-gray-700  :hover:text-white lg: :hover:bg-transparent  :border-gray-700">Organizar Cards</button>
                        </li>                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    
    
    <div class="grid grid-cols-3 gap-4">
        
        
        @foreach($card as $cards)
        
            
                {{-- <button class="max-w-smm rounded m-12 text-center hover:text-white bg-white hover:bg-orange-600 overflow-hidden shadow-lg px-6 py-4" type="button" data-modal-toggle={{$cards -> id_card}}>
                    <p class="font-bold text-xl mb-2">{{$cards->titulo}}</p> 
                </button> --}}

                <button class="max-w-sm max-h-48 min-h-48 inline rounded m-12 text-center hover:text-white bg-white hover:bg-orange-600 overflow-hidden shadow-lg" type="button" data-modal-toggle={{$cards -> id_card}}>
                    <div class="contents grid justify-items-end">
                    <img class="max-h-32 w-auto mx-auto" src="images/cards/{{$cards->midia}}" alt="imagemCard" />
                        <div class="flex justify-center">
                            <div>
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{$cards->titulo}}</h5>
                            <div>    
                        </div>
                    </div>
                </button>
            
        
          
          <!-- first modal -->
          <div id="{{$cards->id_card}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
              <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                  <!-- Modal content -->
                  <div class="relative bg-white rounded-lg shadow :bg-gray-700">
                      <!-- Modal header -->
                    <form 
                    enctype="multipart/form-data"
                    action="/home/{{$cards->id_card}}" 
                    method="POST">
                        @csrf
                        @method('PUT')
                        <div class="flex justify-between items-start p-4 rounded-t border-b :border-gray-600">
                            <div class="grid grid-cols-2">
                                <input type="text" id="titulo" name="titulo" value="{{$cards -> titulo}}" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 :bg-gray-700 :border-gray-600 :placeholder-gray-400 :text-white :focus:ring-blue-500 :focus:border-blue-500">
                                <label for="titulo" class="p-2 w-full text-gray-900 sm:text-xs focus:ring-blue-500 focus:border-blue-500">- Título do card </label>
                            </div>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center :hover:bg-gray-600 :hover:text-white" data-modal-toggle={{$cards -> id_card}}>
                                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                            </button>
                        </div>
                    
                      <!-- Modal body -->
                      <div class="p-6 space-y-6">
                            <div class="mb-4 w-full bg-gray-50 rounded-lg border border-gray-200">
                                {{-- sAttachment bar  --}}
                                <div class="grid grid-cols-2 justify-items-center justify-between p-3 border-b">
                                        <div class="space-x-1 sm:pr-4">
                                            <button type="button" id="dropdownImg" data-dropdown-toggle="ddImg{{$cards-> id_card}}" class="flex text-center inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                                </svg>                                              
                                            </button>
                                            <div id="ddImg{{$cards->id_card}}" class="hidden w-auto bg-white rounded divide-y divide-gray-100">
                                                <div class="flex justify-center items-center w-full">
                                                    <label for="dzImg" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                        <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                                            <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                                        </div>
                                                        <input id="dzImg" name="dzImg" type="file" class="hidden" />
                                                    </label>
                                                </div> 
                                            </div>
                                            @if($cards->anexo)
                                                <div class="mt-4 justify-center">
                                                    <a href="{{ asset('attachments/cards/' . $cards->anexo) }}" target="_blank"
                                                    class="text-blue-500 hover:text-blue-700 font-semibold flex items-center">
                                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                        </svg>
                                                        Baixar Anexo
                                                    </a>
                                                </div>
                                            @endif 
                                        </div>
                                        <div class="grid grid-cols-2 justify-items-between space-x-1 sm:pr-4">
                                            <button type="button" id="dropdownAtt" data-dropdown-toggle="ddAtt{{$cards-> id_card}}" class="flex text-center inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-auto h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                                </svg>                                            
                                            </button>
                                            <div id="ddAtt{{$cards-> id_card}}" class="hidden bg-white rounded divide-y divide-gray-100">
                                                <div class="flex justify-center items-center w-full">
                                                    <label for="dzAtt" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                        <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                                            <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                            <p class="text-xs text-gray-500 dark:text-gray-400">PDF</p>
                                                        </div>
                                                        <input id="dzAtt" name="dzAtt" type="file" class="hidden" />
                                                    </label>
                                                </div> 
                                            </div> 
                                        </div>                                    
                                </div>
                                <div class="py-2 px-4 bg-white rounded-b-lg :bg-gray-800">
                                    <label for="editor" class="sr-only">Publish post</label>
                                    <textarea id="editor" name="descricao" rows="8" class="block px-0 w-full text-sm text-gray-800 bg-white border-0 :bg-gray-800 focus:ring-0 :text-white :placeholder-gray-400" required>{{$cards -> descricao}}</textarea>
                                </div>
                            </div>
                            
                        
                      </div>
                      <!-- Modal footer -->
                      <div class="flex items-center justify-evenly p-6 space-x-2 rounded-b border-t border-gray-200 :border-gray-600">
                            <button data-modal-toggle="{{$cards -> id_card}}" type="submit" class="text-white bg-orange-400 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center :bg-blue-600 :hover:bg-blue-700 :focus:ring-blue-800">Confirmar</button>
                            <button data-modal-toggle="{{$cards -> id_card}}" type="button" class="text-orange-500 hover:bg-gray-200 border border-orange-500 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancelar</button>
                            <button data-modal-toggle="{{$cards -> id_card}}" type="submit" name="delete" value="delete" class="text-red-500 hover:text-white hover:bg-red-500 border border-red-500 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Deletar</button>                            
                      </div>
                    </form>            
                      
                    
                  </div>
              </div>
          </div>
        @endforeach
        
    </div>
    
    <div class="text-right mr-8">
          {{-- modal criarCard --}}
          <!-- Main modal -->
    <div id="criarCard" tabindex="-1" aria-hidden="true" class="hidden text-left overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow :bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center :hover:bg-gray-800 :hover:text-white" data-modal-toggle="criarCard">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
            </button>
            <div class="py-6 px-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 :text-white">Criar um card</h3>
                <form class="space-y-6" action="/home" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 :text-gray-300">Título do card</label>
                        <input type="text" name="titulo" id="titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 :bg-gray-600 :border-gray-500 :placeholder-gray-400 :text-white" placeholder="Escreva o título..." required>
                    </div>
                    <label for="descricao" class="block mb-2 text-sm font-medium text-gray-900 :text-gray-300">Descrição</label>
                    <div class="mb-4 w-full  rounded-lg border border-gray-200 :bg-gray-700 :border-gray-600">                        
                        <div class="py-2 px-4 bg-white rounded-t-lg :bg-gray-800">                                                        
                            <textarea id="descricao" name="descricao" rows="4" class="px-0 w-full text-sm text-gray-900 bg-white border-0 :bg-gray-800 focus:ring-0 :text-white :placeholder-gray-400" placeholder="Descreva aqui..." required></textarea>
                        </div>                        
                    </div>
                    
                    <div class="mb-4 w-full  rounded-lg">                        
                        <label for="midia" class="block mb-2 text-sm font-medium text-gray-900 :text-gray-300">Imagem do card</label>
                        <input id="midia" name="midia" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none" id="small_size" type="file">                        
                    </div>
                    <button type="submit" class="w-full text-white bg-orange-600 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center :bg-blue-600 :hover:bg-blue-700 :focus:ring-blue-800">Criar card</button>
                </form>
            </div>
        </div>
    </div>
</div> 
    </div>
    <!-- modalOrganizarCards -->
    <div id="cardsModal" tabindex="-1" aria-hidden="true" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow :bg-gray-700">
            <div class="flex justify-between items-start p-4 rounded-t border-b :border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 :text-white">
                    Organizar Cards
                </h3>
                <button type="button" id="closeModalBtn" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center :hover:bg-gray-600 :hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>  
                </button>
            </div>

            <!-- Formulário para enviar a ordem dos cards -->
            <form id="saveOrderForm" method="POST" action="{{ route('cards.order') }}">
                @csrf
                <input type="hidden" name="order" id="orderInput">

                <div class="p-6 space-y-6">
                    <ul id="cardsList" class="list-none grid grid-cols-3 gap-4">
                        @foreach($card as $cards)
                            <li class="ui-state-default bg-white rounded-lg shadow p-4 cursor-pointer" data-id="{{$cards->id_card}}">
                                <div class="text-center">
                                    <img class="h-24 w-auto mx-auto" src="images/cards/{{$cards->midia}}" alt="imagemCard" />
                                    <h5 class="mt-2 text-xl font-semibold">{{$cards->titulo}}</h5>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="flex items-center justify-end p-6 space-x-2 rounded-b border-t border-gray-200 :border-gray-600">
                    <button type="submit" id="saveOrderBtn" class="text-white bg-orange-400 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Salvar Ordem</button>
                    <button type="button" id="cancelModalBtn" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>


    
<footer class="fixed bottom-0 left-0 z-20 p-4 w-full bg-orange-600 shadow md:flex md:items-center md:justify-between md:p-4">
    <span class="text-sm text-white sm:text-center :text-gray-400">© 2022 <a href="https://unifil.br" class="hover:underline">UniFil</a>. Todos os direitos reservados.</span>
    <ul class="flex flex-wrap items-center mt-2 text-sm text-white sm:mt-0">
        <li>
            <a href="https://unifil.br/conheca-unifil/" class="mr-4 hover:underline md:mr-6 ">Sobre</a>
        </li>
        <li>
            <a href="https://unifil.br/fale-conosco/" class="hover:underline">Contatos</a>
        </li>
    </ul>
</footer>

      
    
</body>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const cancelModalBtn = document.getElementById('cancelModalBtn');
    const cardsModal = document.getElementById('cardsModal');
    const saveOrderForm = document.getElementById('saveOrderForm');
    const orderInput = document.getElementById('orderInput');

    if (openModalBtn) {
        openModalBtn.addEventListener('click', () => {
            cardsModal.classList.remove('hidden');
            loadCards();
        });
    }

    closeModalBtn.addEventListener('click', () => {
        cardsModal.classList.add('hidden');
    });

    cancelModalBtn.addEventListener('click', () => {
        cardsModal.classList.add('hidden');
    });

    saveOrderForm.addEventListener('submit', (event) => {
        event.preventDefault(); // Evita o envio imediato

        const order = Array.from(document.querySelectorAll('#cardsList li'))
            .map(item => item.getAttribute('data-id'));

        // Define a ordem no campo hidden do formulário
        orderInput.value = JSON.stringify(order);

        // Envia o formulário
        saveOrderForm.submit();
    });

    function initializeSortable() {
        new Sortable(document.getElementById('cardsList'), {
            onEnd: function(evt) {
                // A ordem é atualizada a cada movimento, mas será capturada ao enviar o formulário
                console.log('Order changed');
            }
        });
    }

    function loadCards() {
        // Se os cards já estão carregados via PHP, esta função pode não ser necessária
        initializeSortable();
    }
});
</script>
</html>