@csrf

<div class="mb-4">
    <label class="block mb-1 font-semibold" for="nom">Nom</label>
    <input type="text" name="nom" id="nom"
           value="{{ old('nom', $terminal->nom ?? '') }}"
           class="border rounded px-3 py-2 w-full">
    @error('nom')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block mb-1 font-semibold" for="emplacement">Emplacement</label>
    <input type="text" name="emplacement" id="emplacement"
           value="{{ old('emplacement', $terminal->emplacement ?? '') }}"
           class="border rounded px-3 py-2 w-full">
    @error('emplacement')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block mb-1 font-semibold" for="date_mise_en_service">
        Date de mise en service
    </label>
    <input type="date" name="date_mise_en_service" id="date_mise_en_service"
           value="{{ old('date_mise_en_service', optional($terminal->date_mise_en_service ?? null)->format('Y-m-d')) }}"
           class="border rounded px-3 py-2 w-full">
    @error('date_mise_en_service')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<button type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded">
    {{ $submitLabel ?? 'Enregistrer' }}
</button>
