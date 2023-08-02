<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog</title>


</head>

<body>
    <nav class="font-sans flex flex-col text-center content-center sm:flex-row sm:text-left sm:justify-between py-2 px-6 bg-white shadow sm:items-baseline w-full">
        <div class="mb-2 sm:mb-0 inner">
            <a href="#" class="text-2xl no-underline text-grey-darkest hover:text-blue-dark font-sans font-bold">Laravel с нуля</a><br>
            <span class="text-xs text-grey-dark">Уроки от CutCode</span>
        </div>

        <div class="sm:mb-0 self-center">
            <a href="#" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Войти</a>

            <!--
            <a href="#" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Выйти</a>
            -->
        </div>
    </nav>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 mb-20">

        <div class="px-4 py-8 max-w-xl">
            <div class="bg-white shadow-2xl">
                <div>
                    <a href="#">
                        <img src="https://via.placeholder.com/600" alt="Post 1" />
                    </a>
                </div>

                <div class="px-4 py-2 mt-2 bg-white">
                    <h2 class="font-bold text-2xl text-gray-800">Post 1</h2>

                    <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                        Post preview description
                    </p>
                </div>
            </div>
        </div>

        <div class="px-4 py-8 max-w-xl">
            <div class="bg-white shadow-2xl">
                <div>
                    <a href="#">
                        <img src="https://via.placeholder.com/600" alt="Post 2" />
                    </a>
                </div>

                <div class="px-4 py-2 mt-2 bg-white">
                    <h2 class="font-bold text-2xl text-gray-800">Post 2</h2>

                    <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                        Post preview description
                    </p>
                </div>
            </div>
        </div>

    </div>
</body>

</html>