<x-app-layout title="Add Product">
    <div class="w-full p-6 bg-main rounded-md shadow-md shadow-third/20">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6">
                <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="w-full h-[156.8px] flex items-center justify-center">
                        <div class=" aspect-square max-h-full max-w-full rounded-md overflow-hidden shadow-md shadow-black/20 ">
                            <x-admin.component.imageinput :value="''" name="image" status="required" />
                        </div>
                    </div>
                    <div class="md:col-span-2 w-full space-y-2">
                        <x-admin.component.textinput title="Name" placeholder="Input Product Name..." :value="''" name="name" />
                        <x-admin.component.priceinput title="Price" placeholder="Input Price..." :value="''" name="price" />
                    </div>
                </div>
                <x-admin.component.textareainput title="Description" placeholder="Input Description..." value="" name="description" />
                <div x-data="imageGallery" class="flex flex-col gap-2">
                    <label class="font-semibold" for="image_gallery">Gallery</label>
                    <input type="file" class="hidden" id="image_gallery" name="image_gallery[]" multiple @input="previewImages" accept="image/*">
                    
                    <!-- Pratinjau Gambar -->
                    <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                        <!-- Loop Gambar -->
                        <template x-for="(image, index) in images" :key="index">
                            <div class="w-full aspect-[3/2] flex items-center rounded-md relative overflow-hidden">
                                <img :src="image" class="w-full h-full object-cover" alt="Gallery Image Preview">
                                <!-- Tombol Hapus Gambar -->
                                <button @click="removeImage(index)" class="absolute inset-0 text-transparent hover:bg-black/60 hover:text-white/50 transition duration-300 p-[20%]">
                                    <svg viewBox="0 0 24 24" class="w-full h-full" xmlns="http://www.w3.org/2000/svg"><path d="M19.5 8.99h-15a.5.5 0 0 0-.5.5v12.5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9.49a.5.5 0 0 0-.5-.5Zm-9.25 11.5a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0Zm5 0a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0ZM20.922 4.851a11.806 11.806 0 0 0-4.12-1.07 4.945 4.945 0 0 0-9.607 0A12.157 12.157 0 0 0 3.18 4.805 1.943 1.943 0 0 0 2 6.476 1 1 0 0 0 3 7.49h18a1 1 0 0 0 1-.985 1.874 1.874 0 0 0-1.078-1.654ZM11.976 2.01A2.886 2.886 0 0 1 14.6 3.579a44.676 44.676 0 0 0-5.2 0 2.834 2.834 0 0 1 2.576-1.569Z" fill="currentColor" class="fill-000000"></path></svg>
                                </button>
                            </div>
                        </template>
                
                        <!-- Tambahkan Gambar (Placeholder jika kurang dari 8 gambar) -->
                        <template x-if="images.length < 8">
                            <div for="image_gallery" class="w-full aspect-[3/2] border bg-background border-second rounded-md relative border-dashed overflow-hidden">
                                <label for="image_gallery" class="w-full text-second h-full absolute top-0 left-0 flex justify-center items-center p-[20%] hover:bg-third hover:text-white/50 duration-300 cursor-pointer">
                                    <svg viewBox="0 0 24 24" class="w-full h-full" xmlns="http://www.w3.org/2000/svg"><path d="m9 13 3-4 3 4.5V12h4V5c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h8v-4H5l3-4 1 2z" fill="currentColor" class="fill-000000"></path><path d="M19 14h-2v3h-3v2h3v3h2v-3h3v-2h-3z" fill="currentColor" class="fill-000000"></path></svg>
                                </label>
                            </div>
                        </template>
                    </div>
                </div>
                
                <script>
                    function imageGallery() {
                        return {
                            images: [],
                            
                            previewImages(event) {
                                const files = Array.from(event.target.files).slice(0, 8 - this.images.length);
                                files.forEach(file => {
                                    const url = URL.createObjectURL(file);
                                    this.images.push(url);
                                });
                            },
                            
                            removeImage(index) {
                                this.images.splice(index, 1);
                            }
                        };
                    }
                </script>
                <x-admin.component.submitbutton title="Tambah" />
            </div>
        </form>
    </div>
</x-app-layout>
