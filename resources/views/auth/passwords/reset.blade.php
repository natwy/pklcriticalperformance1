<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password baru" required><br>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi password" required><br>

        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
