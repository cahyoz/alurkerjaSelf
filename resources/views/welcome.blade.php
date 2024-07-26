<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AlurKerja</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=G-3425WT64XJ"
    ></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());
      gtag("config", "G-3425WT64XJ");
    </script>
  </head>

  <body>
    <div class="min-h-screen">
      <div class="dark-mode:bg-gray-900 antialiased">
        <!--NAVBAR-->
        <div
          class="dark-mode:text-gray-200 dark-mode:bg-gray-800 fixed z-20 w-full bg-white text-gray-700"
        >
          <div
            x-data="{ open: true }"
            class="mx-auto flex max-w-screen-xl flex-col px-4 md:flex-row md:items-center md:justify-between md:px-6 lg:px-8"
          >
            <div class="flex flex-row items-center justify-between p-4">
              <a
                href="#"
                class="dark-mode:text-white focus:shadow-outline rounded-lg text-lg font-semibold uppercase tracking-widest text-gray-900 focus:outline-none"
              >
                <img src="{{ asset('images/AlurKerja.png') }}" alt="Logo" />
              </a>
              <button
                class="focus:shadow-outline rounded-lg focus:outline-none md:hidden"
                @click="open = !open"
              >
                <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                  <path
                    x-show="open"
                    fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                    clip-rule="evenodd"
                  ></path>
                  <path
                    x-show="!open"
                    fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </button>
            </div>
            <nav
              aria-label=""
              :class="{'flex': !open, 'hidden': open}"
              class="hidden flex-grow flex-col pb-4 md:flex md:flex-row md:justify-end md:pb-0"
            >
              <a
                class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 hover:no-underline focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4"
                href="#"
                >Beranda</a
              >
              <a
                class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 hover:no-underline focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4"
                href="#about"
                >Tentang</a
              >
              <a
                class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 hover:no-underline focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4"
                href="#feature"
                >Fitur</a
              >
              <a
                class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 hover:no-underline focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4"
                href="#demo"
                >Demo</a
              >
              <a
                class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 hover:no-underline focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4"
                href="#contact"
                >Kontak</a
              >
            </nav>
          </div>
        </div>
        <!--END NAVBAR-->

        <!--HERO-->
        <div
          class="h-96 w-full bg-blue-500 bg-cover bg-center bg-no-repeat md:h-full"
          style="background-image: url('images/Union.png')"
        >
          <div
            class="flex w-full items-center justify-center bg-contain py-32"
            style="background-image: url('images/Union_1.png')"
          >
            <div class="mx-4 h-96 text-center text-white">
              <div class="flex justify-center">
                <h1
                  class="mb-8 max-w-5xl text-3xl font-light md:text-6xl md:leading-normal"
                >
                  <span class="font-bold">Automate</span>
                  your business processes now with
                  <span class="font-bold">AlurKerja.com</span>
                </h1>
              </div>
              <div>
                <a
                  href=""
                  class="mr-2 rounded-md border-2 border-white bg-white px-4 py-3 text-center text-blue-700 transition duration-300 ease-in-out hover:border-gray-300 hover:bg-gray-300 hover:text-blue-700 hover:no-underline"
                >
                  Demo AlurKerja
                </a>
                <a
                  href="#contact"
                  class="y- ml-2 rounded-md border-2 border-white px-4 py-3 text-center text-white transition duration-300 ease-in-out hover:border-white hover:bg-gray-300 hover:text-white hover:no-underline"
                >
                  Hubungi Kami
                </a>
              </div>
              <div class="mt-8 grid w-screen place-items-center">
                <div class="w-3/4">
                  <img src="{{ asset('images/Group 68 (1).png') }}" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--END HERO-->

        <!--ABOUT-->
        <div class="mx-auto mt-24 max-w-6xl py-20 px-4 lg:px-8" id="about">
          <div
            class="grid grid-cols-1 place-content-center gap-12 md:grid-cols-2"
          >
            <div><img src="{{ asset('images/rocket.png') }}" alt="" /></div>
            <div>
              <h3 class="mx-auto max-w-3xl text-4xl font-bold text-gray-600">
                Tentang <span class="text-blue-600">AlurKerja.com</span>
              </h3>
              <p class="mt-6 text-lg leading-loose tracking-wide text-gray-700">
                <span class="font-bold">AlurKerja</span> adalah sekumpulan
                library yang mempercepat pembuatan aplikasi berbasis workflow.
                Dengan menggunakan AlurKerja, proses pembuatan aplikasi yang
                manual, koding satu demi satu line of code menjadi semi
                otomatis. Fitur-fitur umum dan generic sudah tersedia fungsi
                abstractnya yang tinggal di extends dan juga tersedia tools
                untuk menghasilkan code. Developer kemudian melanjutkan untuk
                melakukan kustomisasi terhadap fitur-fitur yang spesifik.
              </p>
            </div>
          </div>
        </div>
        <!--END ABOUT-->

        <!--FITUR-->
        <div class="mx-auto max-w-6xl py-20 px-4 lg:px-8" id="feature">
          <h3
            class="mx-auto max-w-3xl text-center text-4xl font-bold text-gray-600"
          >
            Fitur <span class="text-blue-600">AlurKerja.com</span>
          </h3>

          <div class="mt-20 grid grid-cols-1 gap-8 md:grid-cols-3">
            <div class="rounded bg-blue-50 p-6 shadow-lg">
              <span
                class="rounded bg-blue-100 px-4 py-1 text-sm font-bold leading-loose text-blue-600"
                >Fitur 1</span
              >
              <h3 class="mt-2 text-4xl font-bold text-gray-600">CRUD</h3>
              <p class="mt-3 mr-8">
                Search, Filter, Create, Read, Update, Delete
              </p>
              <img class="mt-8" src="{{ asset('images/features/crud.png') }}" alt="" />
            </div>
            <div class="rounded bg-blue-50 p-6 shadow-lg">
              <span
                class="rounded bg-blue-100 px-4 py-1 text-sm font-bold leading-loose text-blue-600"
                >Fitur 2</span
              >
              <h3 class="mt-2 text-4xl font-bold text-gray-600">BPMN</h3>
              <p class="mt-3 mr-8">
                Start, List Process, Submit Task, List Process in Specific User
                Task
              </p>
              <img class="mt-8" src="{{ asset('images/features/diagram.png') }}" alt="" />
            </div>
            <div class="rounded bg-blue-50 p-6 shadow-lg">
              <span
                class="rounded bg-blue-100 px-4 py-1 text-sm font-bold leading-loose text-blue-600"
                >Fitur 3</span
              >
              <h3 class="mt-2 text-4xl font-bold text-gray-600">Modern UI</h3>
              <p class="mt-3 mr-8">
                Search, Filter, Create, Read, Update, Delete
              </p>
              <img
                class="mt-8"
                src="{{ asset('images/features/Group 100.png') }}.png"
                alt=""
              />
            </div>
          </div>
        </div>
        <!--END FITUR-->

        <!--SUBSCRIPTION FORM-->
        <div class="mx-auto max-w-6xl py-32 sm:px-6 lg:px-8" id="demo">
          <h3
            class="mx-auto max-w-3xl text-center text-4xl font-bold text-gray-600"
          >
            Coba sekarang dan dapatkan kemudahan dengan produk
            <span class="text-blue-600">AlurKerja.com</span>
          </h3>
          <form class="m-4 mt-8 flex">
            <input
              class="mr-0 w-4/5 rounded-l-lg border-t border-b border-l border-gray-200 bg-white p-4 text-gray-800 placeholder:italic focus:border-[#2563EB] focus:outline-none"
              placeholder="Masukkan email anda di sini"
            />
            <button
              class="w-1/3 rounded-r-lg border-t border-b border-r border-blue-500 bg-blue-600 p-4 px-8 text-white hover:bg-blue-800 md:w-1/5"
            >
              Ajukan Demo
            </button>
          </form>
        </div>
        <!--END SUBSCRIPTION FORM-->

        <!--CONTACT FORM-->
        <div class="scroll-mt-20 bg-[#EDF2FD]" id="contact">
          <div class="mx-auto max-w-6xl sm:px-6 lg:px-8">
            <div class="mt-8 py-9">
              <h3 class="text-center text-4xl font-bold text-gray-600">
                Hubungi Kami
              </h3>
              <div class="grid grid-cols-1 items-center gap-4 md:grid-cols-2">
                <div class="grid w-4/5 place-self-center md:w-full md:p-8">
                  <img class="md:pb-12" src="{{ asset('images/pana.png') }}" alt="" />
                </div>
                <form
                  onsubmit="event.preventDefault()"
                  class="flex flex-col p-6"
                  method="post"
                >
                  <input
                    type="hidden"
                    name="app_name"
                    value="alurkerja"
                    readonly
                    class="input-form"
                  />
                  <input
                    type="hidden"
                    name="client_subject"
                    value="Ada Leads Baru dari Alurkerja"
                    class="input-form"
                  />
                  <div class="flex flex-col">
                    <label for="name" class="hidden">Nama</label>
                    <input
                      type="name"
                      name="client_fullname"
                      id="name"
                      placeholder="Nama"
                      class="input-form w-100 mt-8 rounded-lg border border-white bg-white py-3 px-3 text-gray-800 placeholder:italic focus:border-indigo-500 focus:outline-none dark:border-gray-700"
                    />
                  </div>

                  <div class="mt-2 flex flex-col">
                    <label for="email" class="hidden">Email</label>
                    <input
                      type="email"
                      name="client_email"
                      id="email"
                      placeholder="Email"
                      class="input-form w-100 mt-2 rounded-lg border border-white bg-white py-3 px-3 text-gray-800 placeholder:italic focus:border-indigo-500 focus:outline-none dark:border-gray-700"
                    />
                  </div>

                  <div class="mt-2 flex flex-col">
                    <label for="textarea-message" class="hidden">Pesan</label>
                    <textarea
                      placeholder="Pesan"
                      id="textarea-message"
                      name="client_message"
                      class="input-form w-100 border-whit4e mt-2 h-64 rounded-lg border bg-white py-3 px-3 text-gray-800 placeholder:italic focus:border-indigo-500 focus:outline-none dark:border-gray-700"
                    ></textarea>
                  </div>

                  <button
                    type="submit"
                    class="btn-contact mt-8 flex w-48 items-center justify-center place-self-center rounded-lg bg-blue-600 py-3 px-6 text-white transition duration-300 ease-in-out hover:bg-blue-800"
                  >
                    <svg
                      class="loader-btn-contact mr-2 inline hidden h-4 w-4 animate-spin fill-blue-600 text-gray-200 dark:text-gray-600"
                      viewBox="0 0 100 101"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor"
                      />
                      <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill"
                      />
                    </svg>
                    Kirim
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!--END CONTACT FORM-->

        <!--CLIENTS-->
        <div class="py-24 text-center">
          <h3 class="mb-8 text-4xl font-bold text-gray-600">
            Dipercaya Oleh :
          </h3>
          <div
            class="flex flex-col items-center gap-2 md:flex-row md:justify-center"
          >
            <div class="w-56">
              <img src="{{ asset('images/clients/ombudsman.png') }}" alt="" />
            </div>
            <div class="w-56">
              <img src="{{ asset('images/clients/xl.png') }}" alt="" />
            </div>
            <div class="w-56">
              <img src="{{ asset('images/clients/lkpp.png') }}" alt="" />
            </div>
            <div class="w-56">
              <img src="{{ asset('images/clients/kai.png') }}" alt="" />
            </div>
          </div>
        </div>
        <!--END CLIENTS-->

        <!--FOOTER-->
        <footer class="bg-blue-600 text-white">
          <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
              <div class="grid place-items-center">
                <div
                  class="flex h-fit w-fit justify-center rounded-lg bg-white p-4"
                >
                  <img
                    src="{{ asset('images/AlurKerja.png') }}"
                    class="text-center"
                    alt="logo"
                  />
                </div>
              </div>
              <div>
                <h3 class="font-bold">Kantor Pusat</h3>
                <p class="mt-2 flex flex-col space-y-2 text-sm text-gray-100">
                  Perum Sukoharjo Indah J100 RT 11/RW 16, Kalurahan Sukoharjo,
                  Kapanewon Ngaglik, Kabupaten Sleman, Yogyakarta
                </p>
                <p class="flex flex-col space-y-2 text-sm text-gray-100">
                  Call: +62-274-2876612
                </p>
                <h3 class="mt-4 font-bold">Jakarta Branchless Business Team</h3>
                <p class="mt-2 flex flex-col space-y-2 text-sm text-gray-100">
                  Whatsapp: +62812-2783-5715
                </p>
              </div>
              <div class="">
                <h3 class="font-bold">Bandung Branchless Business Team</h3>
                <p class="mt-2 flex flex-col space-y-2 text-sm text-gray-100">
                  Call: +62-22-30500250
                </p>
                <h3 class="mt-4 font-bold">Email Contact</h3>
                <p class="mt-2 flex flex-col space-y-2 text-sm text-gray-100">
                  info@alurkerja.com
                </p>
              </div>
            </div>
          </div>
        </footer>
        <!--END FOOTER-->
      </div>
    </div>

    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>
