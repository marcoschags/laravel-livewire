<div>
    <h1>Upload Photo de perfil</h1>

    <form action="#" method="POST" wire:submit.prevent="storagePhoto">
        <label for="photo">Upload Photo:</label>
        <input type="file" wire:model="photo">
        <br>
        @error('photo')
            <span class="error">{{ $message }}</span>
        @enderror
        <button type="submit">Upload</button>
    </form>
</div>
