<form action="/action/tochnozaregan.php" method="POST" enctype="multipart/form-data">
    <div class="">
        <label for="reg-username" class="form-label">Username</label>
        <input
            type="text"
            placeholder="login"
            class="form-control"
            name="login"
            id="reg-username"
            required
        >
    </div>
    <div class="">
        <label for="reg-password" class="form-label">Password</label>
        <input
            type="password"
            name="password"
            placeholder="password"
            class="form-control"
            id="reg-password"
            required
        >
    </div>
    <div class="">
        <label for="avatar" class="form-label">Avatar</label>
        <input
            type="file"
            name="avatar"
            id="avatar"
            accept="image/*"
        >
    </div>
    <button type="submit">Register</button>
</form>
<form action="/action/tochnozaregan.php" method="POST">
    <div class="">
        <label for="auth-username" class="form-label">Username</label>
        <input
            type="text"
            placeholder="login"
            class="form-control"
            name="login"
            id="auth-username"
            required
        >
    </div>
    <div class="">
        <label for="auth-password" class="form-label">Password</label>
        <input
            type="password"
            name="password"
            placeholder="password"
            class="form-control"
            id="auth-password"
            required
        >
    </div>
    <button type="submit">Authorization</button>
</form>