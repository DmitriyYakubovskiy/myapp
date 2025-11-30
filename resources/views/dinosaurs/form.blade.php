<form action="{{ $action }}" 
      method="POST" 
      enctype="multipart/form-data" 
      class="needs-validation" 
      novalidate>

    @csrf
    @if(isset($method) && $method === 'PUT')
        @method('PUT')
    @endif

    <div class="mb-3">
        <label class="form-label">Название</label>
        <input type="text" 
               name="title" 
               class="form-control @error('title') is-invalid @enderror"
               value="{{ old('title', $dinosaur->title ?? '') }}"
               required>
        <div class="invalid-feedback">Введите название!</div>
        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Тип</label>
        <select name="type" 
                class="form-control @error('type') is-invalid @enderror"
                required>
            <option value="">Выберите...</option>
            <option value="predator"  {{ old('type', $dinosaur->type ?? '') == 'predator' ? 'selected' : '' }}>Плотоядный</option>
            <option value="herbivore" {{ old('type', $dinosaur->type ?? '') == 'herbivore' ? 'selected' : '' }}>Травоядный</option>
        </select>
        <div class="invalid-feedback">Выберите тип!</div>
        @error('type') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Превью (маленькая картинка)</label>
        <input type="file" 
               name="image" 
               class="form-control @error('image') is-invalid @enderror"
               @if(!isset($dinosaur)) required @endif>
        @if(isset($dinosaur))
            <small>Текущее изображение:</small><br>
            <img src="{{ asset($dinosaur->image) }}" width="120" class="mb-2">
        @endif
        @error('image') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Полное изображение</label>
        <input type="file" 
               name="image_full" 
               class="form-control @error('image_full') is-invalid @enderror"
               @if(!isset($dinosaur)) required @endif>
        @if(isset($dinosaur))
            <small>Текущее:</small><br>
            <img src="{{ asset($dinosaur->image_full) }}" width="120" class="mb-2">
        @endif
        @error('image_full') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Краткое описание</label>
        <textarea name="description" 
                  class="form-control @error('description') is-invalid @enderror" 
                  required>{{ old('description', $dinosaur->description ?? '') }}</textarea>
        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Полное описание</label>
        <textarea name="details" 
                  class="form-control @error('details') is-invalid @enderror" 
                  required>{{ old('details', $dinosaur->details ?? '') }}</textarea>
        @error('details') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <button class="btn btn-primary">Сохранить</button>

</form>

<script>
(() => {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) event.preventDefault()
      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
