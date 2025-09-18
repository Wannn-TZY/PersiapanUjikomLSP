<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    
    <title>Form Login</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('assets/img/smkn1cibinong.png')}}" alt="Logo">
        </div>
        <div class="form-container">
            <div class="tab">
                <button class = "tablinks active" onclick="openTab(event, 'Siswa')">Login Siswa</button>
                <button class = "tablinks " onclick="openTab(event, 'Guru')">Login Guru</button>
            </div>

            <div id="Siswa" class="tabcontent" style="display: block;">
                <h2>Login Siswa</h2>
                <h3>{{session('error')}}</h3>
                <form action="/login-siswa" method="POST">
                    @csrf
                    <label >NIS:</label>
                    <input type="text" name="txt_nis" placeholder="Masukkan NIS" required>
                    <label >Password:</label>
                    <input type="text" name="txt_pass" placeholder="Masukkan Password" required>
                    <button type="submit">LOGIN</button>
                </form>
            </div>
            <div id="Guru" class="tabcontent" style="display: none;">
                <h2>Login Wali Kelas</h2>
                <h3>{{session('error')}}</h3>
                <form action="/login-walas" method="POST">
                    @csrf
                    <label >NIG:</label>
                    <input type="text" name="txt_nig" placeholder="Masukkan NIG" required>
                    <label >Password:</label>
                    <input type="text" name="txt_pass" placeholder="Masukkan Password" required>
                    <button type="submit">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/script.js')}}" defer> </script>
</body>
</html>