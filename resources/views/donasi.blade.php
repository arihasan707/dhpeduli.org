<x-app-layout>

    @push('styles')
    <x-pixel track="PageView" />
    <style>
        .checkbox {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 44px;
            height: 24px;
            background-color: #e3e3e3;
            border: #e1e1e1;
            border-radius: 4em;
            position: relative;
            transition: .3s ease;
        }

        .checkbox::before {
            content: "";
            width: 20px;
            height: 20px;
            background-color: #fff;
            border-radius: 50%;
            display: block;
            position: absolute;
            left: 2px;
            top: 2px;
            transition: .3s ease;
        }

        #snap-container {
            width: 430px;
            height: 100vh;
        }
    </style>

    @endpush

    <template id="my-template">
        <swal-title>Silahkan untuk mengisi terlebih dahulu Nominal Sedekahnya 😊</swal-title>
    </template>

    <div id="slug" data-slug="{{$program->slug}}"></div>

    <x-slot name="header">
        <div class="max-w-[430px] bg-blue z-10 w-[100%] justify-between sticky top-0">
            <div class="p-4 text-white">
                <button id="back">
                    <i class="fa-solid fa-arrow-left text-[24px]"></i>
                </button>
                <span class="relative bottom-1 pl-3 font-bold">{{ $judulDonasi }}</span>
            </div>
        </div>
    </x-slot>

    <x-slot name="navbar">
        <nav
            class="bg-white font-medium w-[100%] max-w-[430px] h-[55px] fixed rounded-t-lg flex bottom-0 px-4 py-2 gap-3 z-40">
            <button id="submit"
                class="text-white tes bg-blue px-5 py-2 hover:bg-sky-700 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm text-center w-full">
                <span class="btn">Lanjutkan Pembayaran</span>
                <svg aria-hidden="true" class="w-8 h-5 inline text-gray-200 animate-spin fill-blue spin hidden"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
            </button>
        </nav>
    </x-slot>


    <div class="w-full bg-white min-h-screen p-4 nominal">
        <h3 class="text-md font-semibold pt-3 mb-2">Pilih Nominal Donasi</h3>
        <button class="responsive-h block mb-2 w-full p-2 border text-left rounded hover:border-orange-500 shadow">
            <div class="flex justify-between">
                <div class=" text-left font-bold text-sm nominal-label">Rp&nbsp;50.000</div>
                <div class=" flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="text-gray-600 h-5">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg></div>
            </div>
        </button>
        <button class="responsive-h block mb-2 w-full p-2 border text-left rounded hover:border-orange-500 shadow">
            <div class=" flex justify-between">
                <div class=" text-left font-bold text-sm nominal-label">Rp&nbsp;100.000</div>
                <div class=" flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="text-gray-600 h-5">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg></div>
            </div>
        </button>
        <button class="responsive-h block mb-2 w-full p-2 border text-left rounded hover:border-orange-500 shadow">
            <div class=" flex justify-between">
                <div class=" text-left font-bold text-sm nominal-label">Rp&nbsp;200.000</div>
                <div class=" flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="text-gray-600 h-5">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg></div>
            </div>
        </button>
        <button class="responsive-h block mb-2 w-full p-2 border text-left rounded hover:border-orange-500 shadow">
            <div class=" flex justify-between">
                <div class=" text-left font-bold text-sm nominal-label">Rp&nbsp;300.000</div>
                <div class=" flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="text-gray-600 h-5">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg></div>
            </div>
        </button>
        <button class="responsive-h block mb-2 w-full p-2 border text-left rounded hover:border-orange-500 shadow">
            <div class=" flex justify-between">
                <div class=" text-left font-bold text-sm nominal-label">Rp&nbsp;500.000</div>
                <div class=" flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="text-gray-600 h-5">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg></div>
            </div>
        </button>
        <button class="responsive-h block mb-2 w-full p-2 border text-left rounded hover:border-orange-500 shadow">
            <div class=" flex justify-between">
                <div class=" text-left font-bold text-sm nominal-label">Rp&nbsp;1.000.000</div>
                <div class=" flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="text-gray-600 h-5">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg></div>
            </div>
        </button>
        <button class="responsive-h block mb-2 w-full p-2 border text-left rounded hover:border-orange-500 shadow">
            <div class=" flex justify-between">
                <div class=" text-left font-bold text-sm nominal-label">Rp&nbsp;5.000.000</div>
                <div class=" flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="text-gray-600 h-5">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg></div>
            </div>
        </button>
        <div class=" block mb-4 w-full p-2 border rounded text-sm">
            <p class="text-gray-600 font-bold">Nominal Lainnya</p>
            <div class=" flex bg-gray-100 rounded items-center px-2 my-2 nominallainnya"><strong>Rp</strong>
                <input inputmode="numeric" placeholder="0"
                    class="text-lg min-w-0 border-transparent focus:border-transparent focus:ring-0 font-bold flex-1 bg-transparent text-right pl-10 py-2 text-gray-900 rupiah"
                    type="text" name="amount">
            </div>
            <span class="text-red-600 alert text-sm" style="display: none;">Donasi Minimal Rp 10.000</span>
        </div>
    </div>

    <form autocomplete="off">
        <div class="w-full bg-white min-h-screen p-4 konfirm hidden" data-id="{{$program->id}}">
            <p class="pt-3 text-gray-600 font-semibold mb-2">Nominal Lainnya</p>
            <div class="required">
                <div class="flex mb-2 relative donasi">
                    <span
                        class="absolute top-0 bottom-0 left-4 flex items-center font-medium text-md angkabebas">Rp</span>
                    <input inputmode="numeric" placeholder="0"
                        class="max-w-full rupiah text-lg font-bold flex-1 bg-white text-right amount pl-10 py-2 pr-2 rounded transition duration-150 text-gray-900 focus:outline-none border-solid border-1 border-gray-300 focus:border-red-500 focus:ring-0"
                        type="text" name="amount">
                </div>
                <span class="text-red-600 alert text-sm" style="display: none;">Donasi Minimal Rp 10.000</span>
                @guest
                <div class="text-gray-600 mb-2 text-sm">Silahkan <a href="{{route('login')}}"
                        class="text-blue underline inline-block w-auto p-0 m-0 focus:outline-none border focus:border-red-500 focus:ring-0">Login</a>
                    dahulu atau lengkapi data berikut
                </div>
                <input type="text" name="name" placeholder="Nama Lengkap *"
                    class="text-sm w-full border rounded border-gray-300 p-2 mb-2 focus:outline-none focus:border-red-500 focus:ring-0"
                    value="">
                <input type="text" name="telp" placeholder="Nomor Telfon *"
                    class="text-sm w-full border rounded p-2 mb-2 border-gray-300 focus:outline-none focus:border-red-500 focus:ring-0"
                    value="">
                <input type="email" name="email" placeholder="Alamat Email "
                    class="text-sm w-full border rounded p-2 mb-3 border-gray-300 focus:outline-none focus:border-red-500 focus:ring-0"
                    value="">
                @endguest
                @auth
                <div id="user" data-id="{{Auth::user()}}"></div>
                <input type="text" name="name" placeholder="Nama Lengkap *"
                    class="text-sm w-full border rounded border-gray-300 p-2 mb-2 focus:outline-none focus:border-red-500 focus:ring-0"
                    value="{{ Auth::user()->name }}" hidden>
                <input type="text" name="telp" placeholder="Nomor Telfon *"
                    class="text-sm w-full border rounded p-2 mb-2 border-gray-300 focus:outline-none focus:border-red-500 focus:ring-0"
                    value="{{ Auth::user()->no_wa }}" hidden>
                <input type="email" name="email" placeholder="Alamat Email "
                    class="text-sm w-full border rounded p-2 mb-3 border-gray-300 focus:outline-none focus:border-red-500 focus:ring-0"
                    value="{{ Auth::user()->email }}" hidden>
                <div class="my-3">
                    <div class="font-bold block">{{ Auth::user()->name }}</div>
                    <div class="color text-sm text-gray-600">{{ Auth::user()->email }} - {{ Auth::user()->no_wa }}
                    </div>
                </div>
                @endauth
            </div>
            <label class="flex justify-between items-center mb-4 cursor-pointer">
                <div>
                    <span class="text-sm">Sembunyikan nama saya </span>
                    <p class="text-[13px] font-normal italic text-gray-600">(Hamba Allah)</p>
                </div>
                <input type="checkbox" name="anonimus" class="sr-only peer">
                <div
                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-0 peer-focus:ring-blue dark:peer-focus:ring-blue rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue">
                </div>
            </label>
            <div class="text-sm flex items-center mb-2"><label for="message" class="block flex-1">Tulis pesan dan
                    do‘a</label></div>
            <textarea id="message" placeholder="Tulis pesan dan do'a untuk pribadi atau penerima manfaat" name="message"
                rows="5"
                class="w-full border rounded- p-2 text-sm mb-4 border-gray-300 focus:outline-none focus:border-red-500 focus:ring-0"></textarea>


            <div class="border border-blue bg-sky-100 p-3 text-gray-600 text-xs mb-8">Pembayaran donasi ditujukan ke
                rekening atas nama Yayasan Daarul Huffadz Indonesia. Untuk nominal donasi yang tidak sesuai dengan
                angka
                unik yang
                tertera, akan kami catat di kategori akad infak</div>
        </div>

    </form>





    @push('scripts')

    <!-- jQuery library js -->
    <script src="{{asset('backend/js/lib/jquery-3.7.1.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- mask mata uang -->
    <script src="{{asset('backend/js/jquery.mask.min.js')}}"></script>

    <script>
        // Format mata uang.

        $(document).ready(function() {

            let amount = null;
            let tes = $('.nominal-label');
            var b;
            var nominal;
            var l;
            var bb;
            let anonim = 0;
            let program_id = $('.konfirm').data('id')

            function IsEmail(email) {
                const regex =
                    /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!regex.test(email) && email) {
                    return false;
                } else {
                    return true;
                }
            }

            function validWithNominal() {
                $('.required input').on('input', function() {
                    // let amount = $("input[name='amount']").val()
                    let k = nominal.replaceAll('.', '')
                    let kosong = true

                    // console.log(k);


                    $('.required input').each(function() {
                        if (k < 10000 || $("input[name='name']").val() == '' || $(
                                "input[name='telp']").val() == '' || $(
                                "input[name='telp']").val()
                            .length < 8 || IsEmail($("input[name='email']").val()) ==
                            false)
                            kosong = false
                    })

                    if (kosong) {
                        $('#submit').removeClass('opacity-30 cursor-not-allowed')
                        $('#submit').prop('disabled', false)
                        // b = amount;
                    } else {
                        $('#submit').addClass('opacity-30 cursor-not-allowed')
                        $('#submit').prop('disabled', true)

                    }
                })
            }

            $("input[name='telp']").on('keyup', function() {
                this.value = this.value.replace(/[^0-9\.]/g, "")
            })

            $('.rupiah').mask('000.000.000.000.000', {
                reverse: true
            });

            $('.nominal button').on('click', function() {
                let user = $('#user').data('id');
                // console.log(user);
                amount = "tidak null";
                if (user != undefined) {
                    b = $(this).text();
                    b = b.replace('Rp', '')
                    b = $.trim(b)
                    $('#submit').removeClass('cursor-not-allowed opacity-30');
                    $('#submit').prop('disabled', false);
                } else {
                    $('#submit').addClass('cursor-not-allowed opacity-30');
                    $('#submit').prop('disabled', true);
                }
                let k = $(this).find('.nominal-label').text();
                let tes = k.replace('Rp', '');

                nominal = tes;

                $('.nominal').addClass('hidden');
                $('.konfirm').removeClass('hidden');
                $('.konfirm').find('.donasi input').val(tes)

                $("input[name='anonimus']").on('click', function() {
                    anonim = $(this).prop('checked') == true ? 1 : 0
                })

                validWithNominal()

                $("input[name='amount']").on('keyup', function() {

                    nominal = $(this).val()
                    let kosong = true;
                    let k = nominal.replaceAll('.', '');

                    // console.log(k);

                    $('.required input').each(function() {
                        if (k < 10000)
                            kosong = false
                    })

                    if (kosong) {
                        $('#submit').removeClass('opacity-30 cursor-not-allowed')
                        $('#submit').prop('disabled', false)
                        $('.donasi').addClass('mb-2')
                        $('.alert').hide()
                    } else {
                        $('#submit').addClass('opacity-30 cursor-not-allowed')
                        $('#submit').prop('disabled', true)
                        $('.donasi').removeClass('mb-2')
                        $('.alert').show()

                    }

                });

                $('#submit').on('click', function() {

                    fbq()

                    // console.log(nominal);
                    // console.log(tes);

                    if (nominal != undefined) {
                        let angka = nominal.replaceAll('.', '');

                        $('.konfirm').find('.donasi input').val(nominal)
                        beforePayment(nominal)
                        payment(angka, anonim, program_id)
                    } else {
                        let angka = tes.replaceAll('.', '');

                        $('.konfirm').find('.donasi input').val(tes)
                        beforePayment(tes)
                        payment(angka, anonim, program_id)
                    }
                })

            })

            $('.nominallainnya input').on('change', function() {
                l = $(this).val()
                nominal = l
                bb = l
                var angka = l.replaceAll('.', '');

                if (angka < 10000 || l == '') {
                    $('.alert').show()
                } else {
                    $('#submit').removeClass('cursor-not-allowed opacity-30');
                    $('#submit').prop('disabled', false);
                    $('.alert').hide()

                    $('#submit').on('click', function() {

                        let user = $('#user').data('id')

                        if (user != undefined) {

                            let kosong = true

                            $('.required input').each(function() {
                                if (angka < 10000 || $("input[name='name']")
                                    .val() == '' ||
                                    $(
                                        "input[name='telp']").val() == '' || $(
                                        "input[name='telp']").val()
                                    .length < 8 || IsEmail($(
                                            "input[name='email']")
                                        .val()) == false)
                                    kosong = false
                            })

                            if (kosong) {
                                $('#submit').removeClass('opacity-30 cursor-not-allowed')
                                $('#submit').prop('disabled', false)
                            } else {
                                $('#submit').addClass('opacity-30 cursor-not-allowed')
                                $('#submit').prop('disabled', true)
                            }

                        } else {
                            $('#submit').addClass('cursor-not-allowed opacity-30');
                            $('#submit').prop('disabled', true);
                        }

                        $('.nominal').addClass('hidden');
                        $('.konfirm').removeClass('hidden');
                        $('.konfirm').find('.donasi input').val(l)

                        $("input[name='anonimus']").on('click', function() {
                            anonim = $(this).prop('checked') == true ? 1 : 0
                        })

                        validWithNominal()

                        $("input[name='amount']").on('keyup', function() {

                            nominal = $(this).val()
                            let kosong = true;
                            let k = nominal.replaceAll('.', '');

                            bb = nominal
                            l = nominal

                            $('.required input').each(function() {
                                if (k < 10000)
                                    kosong = false
                            })

                            if (kosong) {
                                $('#submit').removeClass('opacity-30 cursor-not-allowed')
                                $('#submit').prop('disabled', false)
                                $('.donasi').addClass('mb-2')
                                $('.alert').hide()
                            } else {
                                $('#submit').addClass('opacity-30 cursor-not-allowed')
                                $('#submit').prop('disabled', true)
                                $('.donasi').removeClass('mb-2')
                                $('.alert').show()

                            }
                        })


                        $('#submit').on('click', function() {

                            if (nominal != undefined) {
                                $('.konfirm').find('.donasi input').val(bb)
                                let angka = nominal.replaceAll('.', '');

                                beforePayment(bb)
                                payment(angka, anonim, program_id)
                            } else {

                                let angka = l.replaceAll('.', '');
                                // console.log(angka);

                                $('.konfirm').find('.donasi input').val(l)

                                beforePayment(l)
                                payment(angka, anonim, program_id)
                            }
                        })
                    });
                }
            })


            //notif nominal donasi tidak boleh kosong

            function disableBtn() {
                $("input[name='amount']").prop('disabled', true);
                $("#submit").prop('disabled', true);
                $('.nominal').children('button').prop('disabled', true);

            }

            function enableBtn() {
                $("input[name='amount']").prop('disabled', false);
                $("#submit").prop('disabled', false);
                $('.nominal').children('button').prop('disabled', false);
            }

            $('#submit').on('click', function() {
                if (amount == "" || amount == null) {
                    $(this).attr("data-swal-toast-template", "#my-template")
                    Swal.mixin({
                        toast: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        didOpen: () => {
                            // Disable semua tombol dengan class tertentu
                            disableBtn();
                        },
                        didClose: () => {
                            // Aktifkan kembali tombol setelah swal ditutup
                            enableBtn();
                        }
                    }).bindClickHandler("data-swal-toast-template");

                } else {
                    $(this).removeAttr("data-swal-toast-template")
                }
            })

            $("input[name='amount']").on('keyup', function() {
                amount = $(this).val()
            })




        });


        function beforePayment(tes) {

            $('.btn').text('Proses..')
            $('.spin').removeClass('hidden')
            $('#submit').attr('disabled')
            $('#submit').addClass('opacity-50 cursor-not-allowed')
            $('.konfirm').find('.donasi input').val(tes)
        }


        function payment(angka, anonim, program_id) {

            let nama = $("input[name='name']").val()
            let telp = $("input[name='telp']").val()
            let email = $("input[name='email']").val()
            let pesan = $("textarea[name='message']").val()

            $.ajax({
                type: "POST",
                url: "{{route('transaksi')}}",
                data: {
                    _token: '{{ csrf_token() }}',
                    program_id: program_id,
                    amount: angka,
                    nama: nama,
                    telp: telp,
                    email: email,
                    anonim: anonim,
                    pesan: pesan,
                },
                success: function(response) {
                    let slug = $('#slug').data('slug')
                    let url = '{{route("payment",[":id", ":slug"])}}'
                    url = url.replace(':id', response.order_id)
                    url = url.replace(':slug', slug)
                    window.location.href = url
                }
            });
        }
    </script>

    @endpush


</x-app-layout>