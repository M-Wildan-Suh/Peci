<x-app-layout title="Product">
    <div x-data="auctionTable()"
        class="w-full p-4 sm:p-8 bg-main rounded-md shadow-md shadow-third/20 flex flex-col gap-6">
        <!-- Top Actions -->
        <div class="w-full flex flex-col sm:flex-row gap-2 justify-between items-center">
            <a href="{{ route('product.create') }}"
                class=" w-full text-sm sm:text-base sm:w-auto px-4 py-1.5 bg-second text-white rounded-md font-semibold border border-second hover:border-third hover:bg-third duration-300">
                Add Produk
            </a>

            <!-- Search -->
            <div class=" w-full sm:w-auto flex flex-row font-semibold duration-300">
                <input type="text" x-model="search" placeholder="Search..."
                    class=" w-full text-sm sm:text-base sm:w-auto py-2 px-3 border border-second rounded-md overflow-hidden focus:ring-third focus:border-third bg-background font-normal">
            </div>
        </div>

        <!-- Table -->
        <div class="w-full">
            <table class="w-full text-sm sm:text-base rounded-md overflow-hidden">
                <thead>
                    <tr class="h-10 bg-second text-white divide-x-2 divide-main">
                        <th class=" px-1 sm:px-2 py-1 w-1/3">Name</th>
                        <th class=" px-1 sm:px-2 py-1 w-1/3">Price</th>
                        <th class=" px-1 sm:px-2 py-1 w-1/3">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(item, index) in paginatedData" :key="index">
                        <tr :class="index % 2 === 0 ? 'bg-background' : 'bg-[#E9E4D9]'"
                            class="h-9 text-third divide-x-2 divide-main">
                            <td class=" px-2 sm:px-4 py-1.5 text-left font-semibold line-clamp-2" x-text="item.name"></td>
                            <td class=" px-2 sm:px-4 py-1.5 text-center">Rp. <span x-text="item.price"></span></td>
                            <td class=" px-1 sm:px-2">
                                <div class="flex gap-2 justify-center">
                                    <!-- Detail -->
                                    <button @click="showDetail(item)" class="w-5 h-5 hover:text-blue-500 duration-300">
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2Zm-.5 3A1.5 1.5 0 1 1 10 6.5 1.5 1.5 0 0 1 11.5 5ZM14 18h-1a2 2 0 0 1-2-2v-4a1 1 0 0 1 0-2h1a1 1 0 0 1 1 1v5h1a1 1 0 0 1 0 2Z"
                                                fill="currentColor" class="fill-464646"></path>
                                        </svg>
                                    </button>

                                    <!-- Edit -->
                                    <a :href="`{{ route('product.show', '') }}/${item.id}`"
                                        class="w-5 h-5 hover:text-green-500 duration-300">
                                        <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3 17.75A3.25 3.25 0 0 0 6.25 21h4.915l.356-1.423c.162-.648.497-1.24.97-1.712l5.902-5.903a3.279 3.279 0 0 1 2.607-.95V6.25A3.25 3.25 0 0 0 17.75 3H11v4.75A3.25 3.25 0 0 1 7.75 11H3v6.75ZM9.5 3.44 3.44 9.5h4.31A1.75 1.75 0 0 0 9.5 7.75V3.44Zm9.6 9.23-5.903 5.902a2.686 2.686 0 0 0-.706 1.247l-.458 1.831a1.087 1.087 0 0 0 1.319 1.318l1.83-.457a2.685 2.685 0 0 0 1.248-.707l5.902-5.902A2.286 2.286 0 0 0 19.1 12.67Z"
                                                fill="currentColor" class="fill-212121"></path>
                                        </svg>
                                    </a>

                                    <!-- Delete -->
                                    <button @click="confirmDelete(item)"
                                        class="w-5 h-5 hover:text-red-500 duration-300">
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M19.5 8.99h-15a.5.5 0 0 0-.5.5v12.5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9.49a.5.5 0 0 0-.5-.5Zm-9.25 11.5a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0Zm5 0a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0ZM20.922 4.851a11.806 11.806 0 0 0-4.12-1.07 4.945 4.945 0 0 0-9.607 0A12.157 12.157 0 0 0 3.18 4.805 1.943 1.943 0 0 0 2 6.476 1 1 0 0 0 3 7.49h18a1 1 0 0 0 1-.985 1.874 1.874 0 0 0-1.078-1.654ZM11.976 2.01A2.886 2.886 0 0 1 14.6 3.579a44.676 44.676 0 0 0-5.2 0 2.834 2.834 0 0 1 2.576-1.569Z"
                                                fill="currentColor" class="fill-000000"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="w-full flex justify-center">
            <div class="space-y-2">
                <div class="flex flex-row gap-2 text-neutral-400 font-bold">
                    <!-- Previous button -->
                    <template x-if="currentPage > 1">
                        <div @click="prevPage"
                            class="w-7 aspect-square flex items-center justify-center rounded-md bg-neutral-300 hover:text-black hover:bg-neutral-400 duration-300">
                            <div class="w-4">
                                <svg class="rotate-180 feather feather-chevron-right" fill="none"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <polyline points="9 18 15 12 9 6" />
                                </svg>
                            </div>
                        </div>
                    </template>

                    <!-- Pagination numbers -->
                    <template x-for="page in totalPages" :key="page">
                        <div>
                            <!-- Current page -->
                            <template x-if="page === currentPage">
                                <div class="w-7 aspect-square flex items-center justify-center rounded-md bg-second text-white"
                                    x-text="page"></div>
                            </template>

                            <!-- Inactive page -->
                            <template x-if="page !== currentPage">
                                <div @click="goToPage(page)"
                                    class="w-7 aspect-square flex items-center justify-center rounded-md bg-neutral-100 hover:text-black hover:bg-neutral-200 duration-300"
                                    x-text="page"></div>
                            </template>
                        </div>
                    </template>

                    <!-- Next button -->
                    <template x-if="currentPage < totalPages">
                        <div @click="nextPage"
                            class="w-7 aspect-square flex items-center justify-center rounded-md bg-neutral-300 hover:text-black hover:bg-neutral-400 duration-300">
                            <div class="w-4">
                                <svg class="feather feather-chevron-right" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <polyline points="9 18 15 12 9 6" />
                                </svg>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- Detail Modal -->
        <div x-show="showModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-40 px-4 md:px-8">
            <div class="w-full max-w-[720px] bg-background pb-6 rounded-md flex flex-col gap-4 relative overflow-hidden border-2 border-second">
                <button @click="showModal = false"
                    class=" absolute top-6 right-6 w-6 h-6 text-white hover:text-red-500 duration-300">
                    <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                        enable-background="new 0 0 512 512">
                        <path
                            d="M437.5 386.6 306.9 256l130.6-130.6c14.1-14.1 14.1-36.8 0-50.9-14.1-14.1-36.8-14.1-50.9 0L256 205.1 125.4 74.5c-14.1-14.1-36.8-14.1-50.9 0-14.1 14.1-14.1 36.8 0 50.9L205.1 256 74.5 386.6c-14.1 14.1-14.1 36.8 0 50.9 14.1 14.1 36.8 14.1 50.9 0L256 306.9l130.6 130.6c14.1 14.1 36.8 14.1 50.9 0 14-14.1 14-36.9 0-50.9z"
                            fill="currentColor" class="fill-000000"></path>
                    </svg>
                </button>
                <div class=" pt-6 pb-3 pl-6 pr-14 bg-second text-white">
                    <h2 class="text-2xl font-bold">Detail Data</h2>
                </div>
                <div class=" w-full px-4 space-y-3 max-h-[calc(100vh-200px)] overflow-auto">
                    <div class=" w-full">
                        <div class=" float-left pb-4 sm:pb-0 sm:pr-4">
                            <img class=" w-full sm:w-[190px] aspect-square object-contain rounded-md" :src="modalData.status === '' ? '{{ asset('assets/images/placeholder.png') }}' : '{{ asset('storage/images/product/') }}' + '/' + modalData.image" alt="">
                        </div>
                        <div class=" col-span-2 space-y-2">
                            <p class=" text-lg font-black" x-text="modalData.name"></p>
                            <p class=" text-third">Rp. <span x-text="modalData.price"></span></p>
                            <p class="text-third" x-html="modalData.description === '' ? 'Description' : modalData.description.replace(/\n/g, '<br>')"></p>
                        </div>
                    </div>
                    <div class=" w-full grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-4">
                        <template x-for="(data, index) in modalData.productgallery" :key="index">
                            <div class=" w-full aspect-square rounded-md">
                                <img class=" w-full sm:w-[190px] aspect-square object-contain rounded-md" :src="data.image === '' ? '{{ asset('assets/images/placeholder.png') }}' : '{{ asset('storage/images/product/gallery/') }}' + '/' + data.image" alt="">
                            </div>
                        </template>
                    </div>
                </div>
                <div class="flex justify-end space-x-4 px-6">
                    <button @click="showModal = false"
                        class="px-4 py-1.5 bg-red-600 duration-300 hover:bg-red-900 text-white rounded">Close</button>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div x-show="confirmDeleteModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-40 px-4 md:px-8">
            <div class="w-full max-w-[720px] bg-background pb-6 rounded-md flex flex-col gap-4 relative overflow-hidden border-2 border-second">
                <button @click="confirmDeleteModal = false"
                    class=" absolute top-6 right-6 w-6 h-6 text-white hover:text-red-500 duration-300">
                    <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                        enable-background="new 0 0 512 512">
                        <path
                            d="M437.5 386.6 306.9 256l130.6-130.6c14.1-14.1 14.1-36.8 0-50.9-14.1-14.1-36.8-14.1-50.9 0L256 205.1 125.4 74.5c-14.1-14.1-36.8-14.1-50.9 0-14.1 14.1-14.1 36.8 0 50.9L205.1 256 74.5 386.6c-14.1 14.1-14.1 36.8 0 50.9 14.1 14.1 36.8 14.1 50.9 0L256 306.9l130.6 130.6c14.1 14.1 36.8 14.1 50.9 0 14-14.1 14-36.9 0-50.9z"
                            fill="currentColor" class="fill-000000"></path>
                    </svg>
                </button>
                <div class=" pt-6 pb-3 pl-6 pr-14 bg-second text-white">
                    <h2 class="text-2xl font-bold">Are you sure you want to delete this data??</h2>
                </div>
                <p class="px-6 text-base">You will delete the Product : <span x-text="modalData.name"></span></p>
                <div class="flex justify-end space-x-4 px-6">
                    {{-- <button @click="confirmDeleteModal = false"
                        class="px-4 py-1.5 bg-neutral-600 duration-300 hover:bg-second text-white rounded">Cancel</button> --}}
                    <form :action="`{{ route('product.destroy', '') }}/${modalData.id}`" method="POST"
                        class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-1.5 bg-red-600 duration-300 hover:bg-red-900 text-white rounded">Delete</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script>
        function auctionTable() {
            return {
                data: @json($data), // Fetch data from the backend
                search: '',
                currentPage: 1,
                perPage: 15,
                showModal: false,
                confirmDeleteModal: false,
                modalData: {},

                get paginatedData() {
                    let start = (this.currentPage - 1) * this.perPage;
                    let end = start + this.perPage;
                    return this.filteredData.slice(start, end);
                },

                get filteredData() {
                    if (this.search === '') {
                        return this.data;
                    }
                    return this.data.filter(item => item.name.toLowerCase().includes(this.search.toLowerCase()));
                },

                get totalPages() {
                    return Math.ceil(this.filteredData.length / this.perPage); // Menghitung total halaman
                },

                nextPage() {
                    if (this.currentPage < this.totalPages) {
                        this.currentPage++;
                    }
                },

                prevPage() {
                    if (this.currentPage > 1) {
                        this.currentPage--;
                    }
                },

                goToPage(page) {
                    if (page >= 1 && page <= this.totalPages) {
                        this.currentPage = page;
                    }
                },

                applySearch() {
                    this.currentPage = 1;
                },

                showDetail(item) {
                    this.modalData = item;
                    this.showModal = true;
                },

                confirmDelete(item) {
                    this.modalData = item;
                    this.confirmDeleteModal = true;
                }
            }
        }
    </script>
</x-app-layout>