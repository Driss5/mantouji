<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h2>Update Your Company Information</h2>

@if ($information)
    <form action="{{ route('updateInfo') }}" method="post">
        @csrf
        @method('PUT')
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10">{{ old('description', $information->description) }}</textarea>

        <label for="contuct">Contact</label>
        <textarea name="contuct" id="contuct" cols="30" rows="10">{{ old('contuct', $information->contact) }}</textarea>

        <button type="submit">Update Information</button>
    </form>
@else
    <form action="{{ route('insertInfoJaam') }}" method="post">
        @csrf
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>

        <label for="contuct">Contact</label>
        <textarea name="contuct" id="contuct" cols="30" rows="10">{{ old('contuct') }}</textarea>

        <button type="submit">Confirmer Information</button>
    </form>
@endif

    
</body>
</html>