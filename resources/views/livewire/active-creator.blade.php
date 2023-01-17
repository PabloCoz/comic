<div>
    <header class="w-full relative h-auto overflow-hidden">

        <div class="max-w-5xl mx-auto relative z-20 select-none">
            <div class="py-40">
                <h1 class="uppercase ml-5 lg:ml-0 lg:mr-40 mb-6 text-5xl lg:text-6xl font-luckiest text-white">
                    Bienvenido {{ Auth::user()->username }} a la gran comunidad de creadores de comics
                </h1>
                <p class="text-white font-josefin font-bold text-2xl md:text-3xl mx-3">
                    Activa tu cuenta como "creador" para poder empezar a crear tus comics y asi
                    empezar esta gran aventura.
                </p>
            </div>
        </div>
        <div>
            <img class="absolute top-0 left-0 w-full h-full object-cover z-10 brightness-50"
                src="{{ asset('img/banner.jpg') }}">
        </div>
    </header>

    <section class="bg-black py-10">
        <div class="max-w-3xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div>
                    <h1 class="font-josefin text-2xl font-bold text-center text-white">
                        ¿POR QUÉ BAPSCOMIC ES LA MEJOR OPCIÓN PARA TI?
                    </h1>
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('img/images/baps-chiqui.png') }}" class="h-44 w-40 object-contain">
                    </div>
                </div>
                <div>
                    <p class="text-white text-justify">Nuestra empresa reconoce el talento poco valorado en esta parte
                        del mundo,
                        nos interesa apoyar y motivar a seguir creando, publicando excelente contenido.
                        Asi que <b class="font-josefin">BAPSCOMIC</b> ha puesto en marcha beneficios exclusivos para
                        todos los autores
                        y autoras comprometiendose a brindar mas y mejores servicios para tú crecimiento día a día.
                    </p>
                </div>
            </div>
            <div class="mt-10">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div>
                        <h1 class="font-josefin text-rose-500 font-bold text-center text-lg">INGRESOS MENSUALES</h1>
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('img/images/monedas.png') }}"
                                class="w-44 h-44 object-contain object-center">
                        </div>
                    </div>

                    <div>
                        <h1 class="font-josefin text-white font-bold text-center text-lg">FAMA MUNDIAL</h1>
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('img/images/fam.png') }}" class="w-44 h-44 object-contain object-center">
                        </div>
                    </div>

                    <div>
                        <h1 class="font-josefin text-rose-500 font-bold text-center text-lg">GRANDES PREMIOS</h1>
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('img/images/ganar.png') }}"
                                class="w-44 h-44 object-contain object-center">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-20">
                <h1 class="text-center font-josefin text-2xl font-bold text-white">¿CÓMO FUNCIONA NUESTRO SISTEMA DE
                    PAGO?</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-4">
                    <div>
                        <h1 class="font-josefin text-rose-500 font-bold text-center text-lg">1. ANUNCIOS</h1>
                        <div class="flex items-center justify-center">

                        </div>
                    </div>

                    <div>
                        <h1 class="font-josefin text-white font-bold text-center text-lg">2. QUE EL LECTOR DECIDA
                            POTENCIAR SU APOYO</h1>
                        <div class="flex items-center justify-center">

                        </div>
                    </div>

                    <div>
                        <h1 class="font-josefin text-rose-500 font-bold text-center text-lg">3. PAGARAN DIRECTAMENTE TU
                            CONTENIDO</h1>
                        <div class="flex items-center justify-center">

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section class="bg-white py-10">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-3xl text-center uppercase font-josefin font-bold">Formulario de activación</h1>
            <div class="mt-7 p-3 rounded-lg border-2 border-dashed border-black">
                <form action="" wire:submit.prevent="store">
                    <div class="mb-4">
                        <label for="">Nombres Completos</label>
                        <input type="text" wire:model="name" placeholder="Juan Perez"
                            class="w-full rounded-full border focus:border-black ring-0 focus:ring-black">
                    </div>

                    <div class="mb-4">
                        <label for="">Correo Electronico</label>
                        <input type="email" wire:model="email" placeholder="bapscomic@gmail.com"
                            class="w-full rounded-full border focus:border-black ring-0 focus:ring-black">
                    </div>

                    <div class="mb-4">
                        <label for="">Celular</label>
                        <input type="tel" wire:model="phone" placeholder="Ejemplo: 999999999"
                            class="w-full rounded-full border focus:border-black ring-0 focus:ring-black">
                    </div>

                    <div class="mb-4">
                        <label for="">Dirección</label>
                        <input type="text" wire:model="address" placeholder="Av. Los Heroes 123"
                            class="w-full rounded-full border focus:border-black ring-0 focus:ring-black">
                    </div>

                    <div class="mb-4">
                        <label for="">Ciudad</label>
                        <input type="text" wire:model="city" placeholder="Lima"
                            class="w-full rounded-full border focus:border-black ring-0 focus:ring-black">
                    </div>

                    <div class="mb-4">
                        <label for="">Pais</label>
                        <input type="text" wire:model="country" placeholder="Peru"
                            class="w-full rounded-full border focus:border-black ring-0 focus:ring-black">
                    </div>
                    <div class="mb-4">
                        <label for="">Descripcion del creador</label>
                        <textarea wire:model="bio" class="w-full rounded-lg border focus:border-black ring-0 focus:ring-black" cols="3"
                            placeholder="Escribe una breve descripcion de ti y tu trabajo">
                        </textarea>
                    </div>
                    <div
                        class="mb-4 block md:flex items-center justify-center md:space-x-3 space-y-4 md:space-y-0 w-full">
                        <div class="w-full">
                            <label>Facebook</label>
                            <div class="flex">
                                <span
                                    class="inline-flex items-center px-3 text-sm font-bold text-white bg-blue-600 rounded-l-full border border-r-0 border-gray-300">
                                    @
                                </span>
                                <input type="url" wire:model="facebook" placeholder="https://www.facebook.com/"
                                    class="w-full rounded-r-full border focus:border-black ring-0 focus:ring-black">
                            </div>
                        </div>
                        <div class="w-full">
                            <label>Instagram</label>
                            <div class="flex">
                                <span
                                    class="inline-flex items-center px-3 text-sm font-bold text-white bg-gradient-to-bl from-pink-600 via-red-500  to-yellow-500 rounded-l-full border border-r-0 border-gray-300">
                                    @
                                </span>
                                <input type="text" wire:model="instagram" placeholder="https://www.instagram.com/"
                                    class="w-full rounded-r-full border focus:border-black ring-0 focus:ring-black">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 flex items-center justify-end">
                        <button
                            class="bg-rose-600 text-white px-5 py-2 rounded-full font-bold uppercase font-josefin">Enviar</button>

                    </div>
                </form>
            </div>
        </div>
    </section>
    <div>
        <x-footer />
    </div>
</div>
