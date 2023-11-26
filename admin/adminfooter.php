<script>
    document.getElementById('showPassword').addEventListener('change', function () {
        var passwordInput = document.getElementById('passwordInput');
        passwordInput.type = this.checked ? 'text' : 'password';
    });
</script>