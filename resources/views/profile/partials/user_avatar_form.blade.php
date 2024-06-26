<section>
    <header>
  <div class="flex gap-4 items-center">
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
        user avatar form 
            
        
        </h2>
        <img src="{{"/storage/$user->avatar"}}" alt="dddddd" class="w-10 h-10 rounded-full">
  </div>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
add or update your own user avatar        </p>
    </header>


    @if (session('message'))
    <div class="text-green-500 text-3xl">
        {{ session('message') }}
    </div>
@endif
   <form action="{{route('profile.avatar')}}" method="POST" enctype="multipart/form-data">
    @method("patch")
    @csrf
   <div class="py-4">
    <x-input-label for="avatar" :value="__('Avatar')" />
    <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)"  autofocus autocomplete="avatar" />
    <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
</div>



<div class="flex items-center gap-4 mt-5">
    <x-primary-button>{{ __('Save') }}</x-primary-button>

    @if (session('status') === 'profile-updated')
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600 dark:text-gray-400"
        >{{ __('Saved.') }}</p>
    @endif
</div> </form>

  
</section>
