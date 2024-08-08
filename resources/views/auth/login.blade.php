<x-layouts.auth title="Login">

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first py-2">
                <i class="fas fa-user"></i>
            </div>

            <!-- Login Form -->
            <form action="{{ route('authenticate') }}" method="POST">
                @csrf
                <input type="email" id="login" class="fadeIn second" name="email"
                    placeholder="Pochta manzili, m. palonchi@mail.com" required>
                <input type="password" id="password" class="fadeIn third" name="password"
                    placeholder="Parol m. 12345678" required>
                <input type="submit" class="fadeIn fourth" value="Kirish">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Parolni unutdingizmi?</a>
            </div>
            <div id="formFooter">
                <a class="underlineHover" href="{{ route('register') }}">Ro'yxatdan o'tish</a>
            </div>

        </div>
    </div>

</x-layouts.auth>
