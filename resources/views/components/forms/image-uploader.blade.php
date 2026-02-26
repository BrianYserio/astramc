{{-- resources/views/components/forms/image-uploader.blade.php --}}

@props(['label' => 'Upload Files', 'inputName' => 'files', 'accept' => 'image/*', 'multiple' => false])

<div x-data="imageUploader()">

    {{-- Toolbar --}}
    <div class="flex items-center gap-2 px-4 py-3 bg-orange-400">

        <label class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white hover:bg-gray-50
                      border border-gray-200 text-xs font-semibold text-gray-700 cursor-pointer transition shadow-sm select-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
            </svg>
            {{ $label }}
            <input type="file" name="{{ $inputName }}" accept="{{ $accept }}" @multiple($multiple)
                   class="hidden" x-on:change="handleUpload($event)" />
        </label>

        <button type="button" x-on:click="deleteAll"
                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white hover:bg-red-50
                       border border-gray-200 hover:border-red-200 text-xs font-semibold
                       text-gray-700 hover:text-red-600 transition shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
            </svg>
            Delete All
        </button>

        <span x-text="images.length + ' file(s)'" class="ml-auto text-xs text-white/80 font-medium"></span>
    </div>

    {{-- Thumbnail area --}}
    <div class="p-4 bg-white min-h-[140px]">

        {{-- Empty state --}}
        <div x-show="images.length === 0" class="w-full flex flex-col items-center justify-center py-7">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-200 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
            </svg>
            <p class="text-xs text-gray-300 font-medium">No images uploaded yet</p>
            <p class="text-[0.65rem] text-gray-200 mt-0.5">Click "{{ $label }}" to add images</p>
        </div>

        {{-- Image grid --}}
        <div x-show="images.length > 0" class="flex flex-wrap gap-3">
            <template x-for="(src, index) in images" :key="index">
                <img :src="src" class="w-16 h-16 object-cover rounded-lg border border-gray-200" />
            </template>
        </div>

    </div>
</div>

<script>
    function imageUploader() {
        return {
            images: [],

            handleUpload(event) {
                const files = Array.from(event.target.files);
                files.forEach(file => {
                    const reader = new FileReader();
                    reader.onload = e => this.images.push(e.target.result);
                    reader.readAsDataURL(file);
                });
            },

            deleteAll() {
                this.images = [];
            }
        };
    }
</script>