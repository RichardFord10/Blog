<section>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
        {{ __('Upload Image') }}
    </h2>
    <div class="flex items-start justify-start space-x-6">
        <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data" class="mt-6">
            @csrf
            @method('patch')
            <div class="bg-dark-800 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition relative">
                <label for="image" class="cursor-pointer block">
                    @if($user->image)
                    <div class="relative">
                        <!-- Image -->
                        <img src="{{ $user->image }}" alt="Profile Image" class="mb-3 rounded-full" style="max-width: 100px; max-height: 100px; display: block;">
                        <!-- Camera Icon Overlay -->
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 rounded-full" style="background-color: rgba(0, 0, 0, 0.5); transition: opacity 0.3s;">
                            <i class="fa fa-camera text-grey text-lg"></i>
                        </div>
                    </div>
                    @else
                    <div class="flex flex-col p-4 border-2 border-dashed rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        <i class="fa fa-user"></i>
                    </div>
                    @endif
                </label>
                <input type="file" name="image" id="image" class="hidden" onchange="this.form.submit()">
            </div>
        </form>
    </div>
</section>