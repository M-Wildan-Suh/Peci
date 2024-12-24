<x-layout.guest>
    <div class=" space-y-8 sm:space-y-16">
        <div class="">
            <div class=" w-full aspect-[16/5] bg-second px-4 md:px-8 relative overflow-hidden">
                {{-- <div class=" w-full h-full absolute left-0 bottom-0">
                    <svg id="visual" viewBox="0 0 1400 420" class=" w-full h-full" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"><rect x="0" y="0" width="1400" height="420" fill="#B17457"></rect><g fill="#C4A38C"><circle r="136" cx="746" cy="9"></circle><circle r="9" cx="1098" cy="204"></circle><circle r="50" cx="555" cy="322"></circle><circle r="58" cx="291" cy="185"></circle><circle r="129" cx="846" cy="324"></circle><circle r="8" cx="15" cy="69"></circle><circle r="53" cx="1398" cy="48"></circle><circle r="98" cx="75" cy="396"></circle><circle r="115" cx="1347" cy="378"></circle></g></svg>
                </div> --}}
                <div class=" w-full max-w-[1080px] mx-auto h-full text-white grid grid-cols-1 md:grid-cols-2 gap-20 relative">
                    <div class=" w-full h-full flex flex-col justify-center gap-4">
                        <p class=" text-3xl md:text-4xl font-black text-center md:text-left">Kenakan Peci, <br>Tampil Berwibawa dan Stylish!</p>
                        <p class=" text-sm md:text-base text-neutral-100 text-center md:text-left">Peci kami dirancang dengan bahan berkualitas tinggi untuk memberikan kenyamanan maksimal dan tampilan elegan. Cocok untuk berbagai kesempatan, dari ibadah hingga acara formal. Dapatkan gaya klasik yang penuh makna dengan sentuhan modern!</p>
                    </div>
                    <div class=" hidden md:flex w-full p-10 overflow-hidden relative">
                        <div class=" w-full h-full flex items-center justify-end">
                            <img src="{{asset('assets/images/banner.png')}}" class=" max-w-full max-h-full object-contain" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class=" w-full h-10">
                <svg id="visual" viewBox="0 0 1080 100" class=" w-full max-w-full h-full" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"><path d="M0 3L36 8C72 13 144 23 216 25.7C288 28.3 360 23.7 432 25.2C504 26.7 576 34.3 648 39.5C720 44.7 792 47.3 864 41C936 34.7 1008 19.3 1044 11.7L1080 4L1080 0L1044 0C1008 0 936 0 864 0C792 0 720 0 648 0C576 0 504 0 432 0C360 0 288 0 216 0C144 0 72 0 36 0L0 0Z" fill="#b17457"></path><path d="M0 26L36 36.8C72 47.7 144 69.3 216 71.2C288 73 360 55 432 50.3C504 45.7 576 54.3 648 58C720 61.7 792 60.3 864 61.2C936 62 1008 65 1044 66.5L1080 68L1080 2L1044 9.7C1008 17.3 936 32.7 864 39C792 45.3 720 42.7 648 37.5C576 32.3 504 24.7 432 23.2C360 21.7 288 26.3 216 23.7C144 21 72 11 36 6L0 1Z" fill="#d2b79b"></path><path d="M0 101L36 101C72 101 144 101 216 101C288 101 360 101 432 101C504 101 576 101 648 101C720 101 792 101 864 101C936 101 1008 101 1044 101L1080 101L1080 66L1044 64.5C1008 63 936 60 864 59.2C792 58.3 720 59.7 648 56C576 52.3 504 43.7 432 48.3C360 53 288 71 216 69.2C144 67.3 72 45.7 36 34.8L0 24Z" fill="#faf7f0"></path></svg>
            </div>
        </div>
        <div class=" space-y-8 sm:space-y-16 px-4 md:px-8">
            <div class=" w-full max-w-[1080px] mx-auto">
                <div class=" space-y-8">
                    <div class=" flex flex-row gap-2 items-center">
                        <div class=" w-1 h-6 bg-black rounded-full"></div>
                        <p class=" text-2xl font-black">Recomended</p>
                    </div>
                    @include('components.guest.recomendslider')
                </div>
            </div>
            <div class=" w-full max-w-[1080px] mx-auto">
                <div class=" space-y-8">
                    <div class=" flex flex-row gap-2 items-center">
                        <div class=" w-1 h-6 bg-black rounded-full"></div>
                        <p class=" text-2xl font-black">Product</p>
                    </div>
                    <x-guest.component.product :product="$product->take(5)" />
                    <div class=" w-full flex justify-center">
                        <a href="{{route('allproduct')}}" class=" text-neutral-600 hover:text-third hover:underline">View More</a>
                    </div>
                </div>
            </div>
            <div class=" w-full max-w-[1080px] mx-auto">
                <div class=" space-y-8">
                    <div class=" flex flex-row gap-2 items-center">
                        <div class=" w-1 h-6 bg-black rounded-full"></div>
                        <p class=" text-2xl font-black">Testimony</p>
                    </div>
                    @include('components.guest.testimonislider')
                </div>
            </div>
        </div>
        <div class="">
            <div class=" w-full h-10">
                <svg id="visual" viewBox="0 0 1080 100" class=" w-full max-w-full h-full" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"><path d="M0 3L36 8C72 13 144 23 216 25.7C288 28.3 360 23.7 432 25.2C504 26.7 576 34.3 648 39.5C720 44.7 792 47.3 864 41C936 34.7 1008 19.3 1044 11.7L1080 4L1080 0L1044 0C1008 0 936 0 864 0C792 0 720 0 648 0C576 0 504 0 432 0C360 0 288 0 216 0C144 0 72 0 36 0L0 0Z" fill="#faf7f0"></path><path d="M0 26L36 36.8C72 47.7 144 69.3 216 71.2C288 73 360 55 432 50.3C504 45.7 576 54.3 648 58C720 61.7 792 60.3 864 61.2C936 62 1008 65 1044 66.5L1080 68L1080 2L1044 9.7C1008 17.3 936 32.7 864 39C792 45.3 720 42.7 648 37.5C576 32.3 504 24.7 432 23.2C360 21.7 288 26.3 216 23.7C144 21 72 11 36 6L0 1Z" fill="#e9e4d9"></path><path d="M0 101L36 101C72 101 144 101 216 101C288 101 360 101 432 101C504 101 576 101 648 101C720 101 792 101 864 101C936 101 1008 101 1044 101L1080 101L1080 66L1044 64.5C1008 63 936 60 864 59.2C792 58.3 720 59.7 648 56C576 52.3 504 43.7 432 48.3C360 53 288 71 216 69.2C144 67.3 72 45.7 36 34.8L0 24Z" fill="#d8d2c2"></path></svg>
            </div>
            <div class=" w-full h-56 bg-main px-4 md:px-8">
                <div class=" w-full max-w-[1080px] mx-auto flex flex-col gap-2 items-center justify-center h-full text-third">
                    <p class=" text-lg md:text-2xl text-center font-black">Jadi Reseller Sukses, Mulai dari Sini!</p>
                    <p class=" text-sm md:text-base text-center">Ingin Tambah Cuan? Jadi Reseller Peci Kami & Raih Keuntungan Menjanjikan! Hubungi Kami Sekarang!</p>
                    <a href="" class=" text-sm md:text-base px-3 py-1.5 border border-third rounded-md duration-300 hover:text-background hover:border-background hover:bg-third">Daftar Reseller</a>
                </div>
            </div>
            <div class=" w-full h-10">
                <svg id="visual" viewBox="0 0 1080 100" class=" w-full max-w-full h-full" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"><path d="M0 3L36 8C72 13 144 23 216 25.7C288 28.3 360 23.7 432 25.2C504 26.7 576 34.3 648 39.5C720 44.7 792 47.3 864 41C936 34.7 1008 19.3 1044 11.7L1080 4L1080 0L1044 0C1008 0 936 0 864 0C792 0 720 0 648 0C576 0 504 0 432 0C360 0 288 0 216 0C144 0 72 0 36 0L0 0Z" fill="#d8d2c2"></path><path d="M0 26L36 36.8C72 47.7 144 69.3 216 71.2C288 73 360 55 432 50.3C504 45.7 576 54.3 648 58C720 61.7 792 60.3 864 61.2C936 62 1008 65 1044 66.5L1080 68L1080 2L1044 9.7C1008 17.3 936 32.7 864 39C792 45.3 720 42.7 648 37.5C576 32.3 504 24.7 432 23.2C360 21.7 288 26.3 216 23.7C144 21 72 11 36 6L0 1Z" fill="#8e8a82"></path><path d="M0 101L36 101C72 101 144 101 216 101C288 101 360 101 432 101C504 101 576 101 648 101C720 101 792 101 864 101C936 101 1008 101 1044 101L1080 101L1080 66L1044 64.5C1008 63 936 60 864 59.2C792 58.3 720 59.7 648 56C576 52.3 504 43.7 432 48.3C360 53 288 71 216 69.2C144 67.3 72 45.7 36 34.8L0 24Z" fill="#4a4947"></path></svg>
            </div>
        </div>
    </div>
</x-layout.guest>