<!-- resources/views/contact.blade.php -->
<form method="POST" action="{{ route('contact.store') }}">
    @csrf
    <input type="text" name="naam" placeholder="Naam" required>
    <input type="email" name="email" placeholder="E-mailadres" required>
    <textarea name="bericht" placeholder="Bericht" required></textarea>
    <button type="submit">Versturen</button>
</form>

@if (session('success'))
    <p class="text-green-600">{{ session('success') }}</p>
@endif
    </div>
</form>