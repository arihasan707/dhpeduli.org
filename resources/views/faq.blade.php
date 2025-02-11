<x-app-layout>
    <x-slot name="header">
        <div class="max-w-[430px] bg-blue z-10 w-[100%] flex justify-between sticky top-0">
            <div class="py-3 px-4 text-white">
                <button id="back">
                    <i class="fa-solid fa-arrow-left text-[24px]"></i>
                </button>
                <span class="relative bottom-1 pl-3 font-bold">FAQ</span>
            </div>
        </div>
    </x-slot>

    <div class="bg-white min-h-screen">
        <div class="">
            <div class="p-4">
                <div>
                    <ul class="mb-16 faq-content">
                        <li class="tab w-full overflow-hidden border-b">
                            <details>
                                <summary
                                    class="block py-3 leading-normal cursor-pointer text-sm relative pr-6 font-medium">
                                    Bagaimana Cara Registrasi &amp; Login di dhpeduli.org ?</summary>
                                <div class="overflow-hidden leading-normal content-tab">
                                    <div class="pb-4 text-gray-600 text-sm">
                                        <p>Anda bisa langsung klik tombol Masuk/Daftar yang ada di menu paling atas
                                            sebelah kanan, atau <a class=" font-semibold underline"
                                                href="{{route('register')}}" rel="noopener noreferrer nofollow">klik
                                                disini</a>.</p>
                                    </div>
                                </div>
                            </details>
                        </li>
                        <li class="tab w-full overflow-hidden border-b">
                            <details>
                                <summary
                                    class="block py-3 leading-normal cursor-pointer text-sm relative pr-6 font-medium">
                                    Bagaimana cara berdonasi di dhpeduli.org?</summary>
                                <div class="overflow-hidden leading-normal content-tab">
                                    <div class="pb-4 text-gray-600 text-sm">
                                        <p><strong>Pilih Program</strong> Kebaikan yang ingin Anda bantu di <a
                                                href="{{route('home.index')}}"
                                                rel="noopener noreferrer nofollow"><u>www.dhpeduli.org</u></a></p>
                                        <ol>
                                            <li>
                                                <p>Klik tombol "<strong>Donasi Sekarang</strong>"</p>
                                            </li>
                                            <li>
                                                <p>Isi nominal donasi</p>
                                            </li>
                                            <li>
                                                <p>Login jika sudah registrasi sebelumnya, atau isi form yang disediakan
                                                </p>
                                            </li>
                                            <li>
                                                <p>Klik <strong>Lanjut Pembayaran</strong></p>
                                            </li>
                                        </ol>
                                        <p>Keterangan: Pastikan Anda melakukan pembayaran sesuai dengan Nominal yang
                                            tertera dan metode bayar yang sesuai dengan pilihan pada saat berdonasi agar
                                            donasi Anda dapat diproses secara otomatis.</p>
                                    </div>
                                </div>
                            </details>
                        </li>
                        <li class="tab w-full overflow-hidden border-b">
                            <details>
                                <summary
                                    class="block py-3 leading-normal cursor-pointer text-sm relative pr-6 font-medium">
                                    Apa saja metode pembayaran yang dapat digunakan untuk berdonasi?</summary>
                                <div class="overflow-hidden leading-normal content-tab">
                                    <div class="pb-4 text-gray-600 text-sm">
                                        <p>Anda dapat berbagi kebaikan dengan berdonasi menggunakan pilihan metode yang
                                            kami sediakan yaitu</p>
                                        <ol>
                                            <li>
                                                <p><strong>Virtual Account</strong> Permata, BNI, BRI dan Mandiri</p>
                                            </li>
                                            <li>
                                                <p><strong>Gopay</strong></p>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </details>
                        </li>
                        <!--<li class="tab w-full overflow-hidden border-b">-->
                        <!--    <details>-->
                        <!--        <summary-->
                        <!--            class="block py-3 leading-normal cursor-pointer text-sm relative pr-6 font-medium">-->
                        <!--            Bagaimana cara berdonasi menggunakan Transfer Bank?</summary>-->
                        <!--        <div class="overflow-hidden leading-normal content-tab">-->
                        <!--            <div class="pb-4 text-gray-600 text-sm">-->
                        <!--                <p>Berikut langkah-langkah berdonasi di Amalsholeh.com dengan Metode-->
                        <!--                    <strong>Transfer Bank</strong>-->
                        <!--                </p>-->
                        <!--                <ol>-->
                        <!--                    <li>-->
                        <!--                        <p><strong>Pilih Program</strong> <strong>Kebaikan </strong>yang ingin-->
                        <!--                            Anda bantu di <a href="http://www.amalsholeh.com"-->
                        <!--                                rel="noopener noreferrer nofollow"><u>www.amalsholeh.com</u></a>-->
                        <!--                        </p>-->
                        <!--                    </li>-->
                        <!--                    <li>-->
                        <!--                        <p>Klik tombol <strong>Donasi Sekarang</strong></p>-->
                        <!--                    </li>-->
                        <!--                    <li>-->
                        <!--                        <p><strong>Isi Nominal</strong> donasi (minimal Rp 10.000 jika melalui-->
                        <!--                            website)</p>-->
                        <!--                    </li>-->
                        <!--                    <li>-->
                        <!--                        <p><strong>Pilih Metode Pembayaran</strong> menggunakan Transfer Bank-->
                        <!--                            yang tersedia (BCA, Mandiri, BRI, atau BNI Syariah)</p>-->
                        <!--                    </li>-->
                        <!--                    <li>-->
                        <!--                        <p>Login atau Isi Form (jika belum)</p>-->
                        <!--                    </li>-->
                        <!--                    <li>-->
                        <!--                        <p>Klik <strong>Lanjutkan Pembayaran</strong></p>-->
                        <!--                    </li>-->
                        <!--                    <li>-->
                        <!--                        <p>Nomor rekening bank tujuan Amalsholeh akan tertera pada akhir proses-->
                        <!--                            donasi online</p>-->
                        <!--                    </li>-->
                        <!--                    <li>-->
                        <!--                        <p>Lakukan transfer ke rekening bank yang Anda pilih sejumlah nominal-->
                        <!--                            beserta kode unik dan dalam batas waktu yang ditentukan.</p>-->
                        <!--                    </li>-->
                        <!--                </ol>-->
                        <!--                <p>Apabila Anda mengikuti langkah tersebut maka donasi akan diproses secara-->
                        <!--                    otomatis.</p>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </details>-->
                        <!--</li>-->
                        <li class="tab w-full overflow-hidden border-b">
                            <details>
                                <summary
                                    class="block py-3 leading-normal cursor-pointer text-sm relative pr-6 font-medium">
                                    Bagaimana cara berdonasi menggunakan Virtual Account?</summary>
                                <div class="overflow-hidden leading-normal content-tab">
                                    <div class="pb-4 text-gray-600 text-sm">
                                        <p>Berikut langkah-langkah berdonasi di Amalsholeh.com dengan Virtual Account:
                                        </p>
                                        <ol>
                                            <li>
                                                <p><strong>Pilih Program</strong> <strong>Kebaikan </strong>yang ingin
                                                    Anda bantu di <a href="{{route('home.index')}}"
                                                        rel="noopener noreferrer nofollow"><u>www.dhpeduli.org</u></a>
                                                </p>
                                            </li>
                                            <li>
                                                <p>Klik tombol <strong>Donasi Sekarang</strong></p>
                                            </li>
                                            <li>
                                                <p><strong>Isi Nominal</strong> donasi (minimal Rp 10.000)</p>
                                            </li>
                                            <li>
                                                <p>Login atau Isi Form (jika belum)</p>
                                            </li>
                                            <li>
                                                <p>Klik <strong>Lanjutkan Pembayaran</strong></p>
                                            </li>
                                            <li>
                                                <p><strong>Pilih Metode Pembayaran</strong> menggunakan Virtual Account
                                                    yang tersedia (Permata, Mandiri, BRI atau BNI)</p>
                                            </li>
                                            <li>
                                                <p><strong>Nomor Virtual Account</strong> tujuan Yayasan Daarul Huffadz
                                                    Indonesia akan tertera
                                                    pada akhir proses donasi online</p>
                                            </li>
                                            <li>
                                                <p>Silakan buka akun rekening Anda dan lakukan transfer dengan memilih
                                                    <strong>metode&nbsp;Virtual Account</strong>
                                                </p>
                                            </li>
                                        </ol>
                                        <p>Apabila Anda mengikuti langkah tersebut maka donasi akan diproses secara
                                            otomatis.</p>
                                    </div>
                                </div>
                            </details>
                        </li>
                        <li class="tab w-full overflow-hidden border-b">
                            <details>
                                <summary
                                    class="block py-3 leading-normal cursor-pointer text-sm relative pr-6 font-medium">
                                    Bagaimana cara menggunakan Gopay untuk berdonasi?</summary>
                                <div class="overflow-hidden leading-normal content-tab">
                                    <div class="pb-4 text-gray-600 text-sm">
                                        <p>Berikut langkah-langkah yang harus dilakukan untuk berdonasi menggunakan
                                            Gopay:</p>
                                        <ol>
                                            <li>
                                                <p><strong>Pilih Program</strong> <strong>Kebaikan </strong>yang ingin
                                                    Anda bantu di <a href="{{route('home.index')}}"
                                                        rel="noopener noreferrer nofollow"><u>www.dhpeduli.org</u></a>
                                                </p>
                                            </li>
                                            <li>
                                                <p>Klik tombol <strong>Donasi Sekarang</strong></p>
                                            </li>
                                            <li>
                                                <p><strong>Isi Nominal</strong> donasi (minimal Rp 10.000)</p>
                                            </li>
                                            <li>
                                                <p>Login atau Isi Form (jika belum)</p>
                                            </li>
                                            <li>
                                                <p>Klik <strong>Lanjutkan Pembayaran</strong></p>
                                            </li>
                                            <li>
                                                <p><strong>Pilih Metode Pembayaran</strong> menggunakan Gopay</p>
                                            </li>
                                            <li>
                                                <p>Buka akun Gojek Anda dan ikuti instruksi yang diberikan.</p>
                                            </li>
                                        </ol>
                                        <p>Donasi Anda akan diproses secara langsung (<em>real time</em>) dengan
                                            notifikasi di layar perangkat Anda.</p>
                                    </div>
                                </div>
                            </details>
                        </li>
                        <li class="tab w-full overflow-hidden border-b">
                            <details>
                                <summary
                                    class="block py-3 leading-normal cursor-pointer text-sm relative pr-6 font-medium">
                                    Bagaimana jika saya lupa memasukan kode unik pada nominal transfer?</summary>
                                <div class="overflow-hidden leading-normal content-tab">
                                    <div class="pb-4 text-gray-600 text-sm">
                                        <p>Jika Anda lupa memasukan kode unik saat transfer segera melakukan konfirmasi
                                            kepada admin melalui nomor Whatsapp 0821-2202-2947 atau email ke alamat <a
                                                href="mailto:admin@dhpeduli.org"
                                                rel="noopener noreferrer nofollow"><u>admin@dhpeduli.org</u></a></p>
                                    </div>
                                </div>
                            </details>
                        </li>
                        <!-- <li class="tab w-full overflow-hidden border-b">
                            <details>
                                <summary
                                    class="block py-3 leading-normal cursor-pointer text-sm relative pr-6 font-medium">
                                    Bagaimana jika saya sudah melakukan transfer namun tidak mendapat notifikasi via
                                    whatsapp atau email?</summary>
                                <div class="overflow-hidden leading-normal content-tab">
                                    <div class="pb-4 text-gray-600 text-sm">
                                        <p>Jika dalam waktu 1x24 jam Anda belum mendapatkan notifikasi via whatsapp atau
                                            email, segera lakukan konfirmasi kepada admin melalui nomor Whatsapp
                                            0821-2202-2947 atau email ke alamat <a href="mailto:admin@dhpeduli.org"
                                                rel="noopener noreferrer nofollow"><u>admin@dhpeduli.org</u></a></p>
                                    </div>
                                </div>
                            </details>
                        </li> -->
                        <li class="tab w-full overflow-hidden border-b">
                            <details>
                                <summary
                                    class="block py-3 leading-normal cursor-pointer text-sm relative pr-6 font-medium">
                                    Apakah nominal/metode bayar bisa diganti?</summary>
                                <div class="overflow-hidden leading-normal content-tab">
                                    <div class="pb-4 text-gray-600 text-sm">
                                        <p>Bisa. Silakan lakukan proses donasi online kembali dan masukkan nominal/pilih
                                            metode pembayaran yang Anda inginkan.</p>
                                    </div>
                                </div>
                            </details>
                        </li>
                        <li class="tab w-full overflow-hidden border-b">
                            <details>
                                <summary
                                    class="block py-3 leading-normal cursor-pointer text-sm relative pr-6 font-medium">
                                    Bagaimana jika rekening bank saya tidak terdaftar?</summary>
                                <div class="overflow-hidden leading-normal content-tab">
                                    <div class="pb-4 text-gray-600 text-sm">
                                        <p>Anda dapat memilih salah satu rekening yang tersedia dan melakukan transfer
                                            antar bank.</p>
                                        <p>Catatan: Transfer antar bank akan dikenakan biaya administrasi sesuai dengan
                                            kebijakan bank terkait.</p>
                                    </div>
                                </div>
                            </details>
                        </li>
                        <li class="tab w-full overflow-hidden border-b">
                            <details>
                                <summary
                                    class="block py-3 leading-normal cursor-pointer text-sm relative pr-6 font-medium">
                                    Bagaimana cara donasi tanpa mencantumkan nama?</summary>
                                <div class="overflow-hidden leading-normal content-tab">
                                    <div class="pb-4 text-gray-600 text-sm">
                                        <p>Ketika Anda melakukan donasi, pada saat mengisi form silakan centang donasi
                                            sebagai <strong>Hamba Allah</strong></p>
                                    </div>
                                </div>
                            </details>
                        </li>
                        <li class="tab w-full overflow-hidden border-b">
                            <details>
                                <summary
                                    class="block py-3 leading-normal cursor-pointer text-sm relative pr-6 font-medium">
                                    Bagaimana jika saya belum transfer hingga melewati batas waktu?</summary>
                                <div class="overflow-hidden leading-normal content-tab">
                                    <div class="pb-4 text-gray-600 text-sm">
                                        <p>Anda bisa mengulangi proses donasi dengan memilih Program Kebaikan yang ingin
                                            dibantu.<br>Catatan: Abaikan tagihan sebelumnya, untuk mendapat nominal dan
                                            kode unik terbaru.</p>
                                    </div>
                                </div>
                            </details>
                        </li>
                    </ul>
                </div>
            </div>
            <style>
            details[open] summary {
                font-weight: bold;
                color: #FF7600;
            }
            </style>
        </div>
    </div>


</x-app-layout>