<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body class="text-center text-white">
    <section class="bg-orange-600 :bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <img src="http://portal.filadelfia.br:7778/TemplatePortais/assets/images/logos/UNIFIL_GRADUACAO.png" class="mx-3 h-14 sm:h-24" alt="Unifil Logo" />
            <div class="w-full bg-orange-400 rounded-lg shadow :border md:mt-0 sm:max-w-md xl:p-0 :bg-gray-800 :border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-white md:text-2xl :text-white">
                        Onboarding UniFil
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login') }}">
    @csrf
    <div>
        <label for="email" class="block mb-2 text-sm font-medium text-white">Usuário</label>
        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="E-mail" required="">
    </div>
    <div>
        <label for="password" class="block mb-2 text-sm font-medium text-white">Senha</label>
        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
    </div>
    <div class="flex items-center justify-between">
        <div class="flex items-start">
            <div class="flex items-center h-5">
                <input id="is_student" name="is_student" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
            </div>
            <div class="ml-3 text-sm">
                <label for="is_student" class="text-white">Sou aluno</label>
            </div>
        </div>
    </div>
    <button type="submit" class="w-full text-white bg-orange-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login</button>
</form>

                </div>
            </div>
        </div>
    </section>


</body>

</html>