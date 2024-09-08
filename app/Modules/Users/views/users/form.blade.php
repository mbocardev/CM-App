<div>
    <label>Nom:</label>
    <input type="text" name="first_name" value="{{ old('first_name', $user->first_name ?? '') }}">
</div>
<div>
    <label>Prénom:</label>
    <input type="text" name="last_name" value="{{ old('last_name', $user->last_name ?? '') }}">
</div>
<div>
    <label>Téléphone:</label>
    <input type="text" name="telephone" value="{{ old('telephone', $user->telephone ?? '') }}">
</div>
<div>
    <label>Type:</label>
    <select name="type">
        <option value="admin" {{ old('type', $user->type ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="supplier" {{ old('type', $user->type ?? '') == 'supplier' ? 'selected' : '' }}>Supplier</option>
        <option value="customer" {{ old('type', $user->type ?? '') == 'customer' ? 'selected' : '' }}>Customer</option>
    </select>
</div>

<div>
    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}">
</div>
@if(empty($user))
<div>
    <label>Mot de passe:</label>
    <input type="password" name="password">
</div>
@endif
<button type="submit">Enregistrer</button>
