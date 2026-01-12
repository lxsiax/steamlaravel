<x-app-layout>
    <x-errores/>
<form action="{{route('login')}}" method="POST" class="flex flex-col gap-4">
    @csrf
    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
        <legend class="fieldset-legend">Login</legend>

        <label for="email" class="label">Email</label>
        <input type="email" class="input" name="email" id="email" required placeholder="Email" />

        <label for="password" class="label">Password</label>
        <input type="password" name="password" id="password" required class="input" placeholder="Password" />

        <button type="submit" class="btn btn-secondary">Login</button>
    </fieldset>
</form>
</x-app-layout>
